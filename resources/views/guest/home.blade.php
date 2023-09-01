@extends('layouts.app')
@section('content')
    <div class="jumbotron p-5 mb-4 bg-light rounded-3">
        <h1>Vedi i mei Progetti</h1>
        @forelse ($projects as $project)
        @empty
        @endforelse
    </div>
@endsection
