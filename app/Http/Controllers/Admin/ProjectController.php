<?php

namespace App\Http\Controllers\Admin;

use App\Models\Project;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Storage;

class ProjectController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $projects = Project::orderBy('updated_at', 'DESC')->get();
        return view('admin.projects.index', compact('projects'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Project $project)
    {
        return view('admin.projects.create', compact('project'));
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'title' => 'required|string',
            'description' => 'required|string',
            'image' => 'required|image',
            'url' => 'required|string',
        ]);
        $data = $request->all();
        $project = new Project();
        if (array_key_exists('image', $data)) {
            $img_url = Storage::putFile('project_images', $data['image']);
            $data['image'] = $img_url;
        }
        $project->title = $data['title'];
        $project->image = $data['image'];
        $project->url = $data['url'];
        $project->description = $data['description'];
        $project->save();

        return to_route('admin.projects.show', $project)->with('alert-type', 'success')->with('alert-message', 'Progetto Creato con Successo');
    }

    /**
     * Display the specified resource.
     */
    public function show(Project $project)
    {
        return view('admin.projects.show', compact('project'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Project $project)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, Project $project)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Project $project)
    {
        $project->delete();

        return to_route('admin.projects.index')->with('alert-type', 'success')->with('alert-message', 'Progetto Eliminato');
    }
}
