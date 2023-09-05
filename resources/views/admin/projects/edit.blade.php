@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <header>
        <h1>Crea Progetto</h1>
    </header>
    <hr>
    <form method="POST" action="{{ route('admin.projects.update', $project) }}" enctype="multipart/form-data">
        @csrf
        @method('PUT')
        <div class="row">
            <div class="col-12">
                <div class="mb-3">
                    <label for="title" class="form-label">Title</label>
                    <input type="text" class="form-control" id="title" name="title" placeholder="Inserisci il Titolo"
                        value="{{ old('title', $project->title) }}" maxlength="50" required>
                </div>
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="description" class="form-label">Descrizione</label>
                    <textarea class="form-control" name="description" id="description" rows="10">
                        {{ old('description', $project->description) }}
                    </textarea>
                </div>
            </div>
            <div class="col-11">
                <div class="mb-3">
                    <label for="image" class="form-label">Immagine</label>
                    <input type="file" class="form-control" id="image" name="image"
                        placeholder="Inserisci un URL valido" value="{{ old('image', $project->image) }}">
                </div>
            </div>
            <div class="col-1">
                <img src="{{ $project->image ? asset('storage/' . $project->image) : '' }}" alt="Preview" class="img-fluid"
                    id="image-preview">
            </div>
            <div class="col-12">
                <div class="mb-3">
                    <label for="url" class="form-label">URL Progetto</label>
                    <input type="url" class="form-control" id="url" name="url"
                        placeholder="Inserisci un URL valido" value="{{ old('url', $project->url) }}">
                </div>
            </div>
        </div>

        <div class="d-flex justify-content-end">
            <a href="{{ route('admin.projects.show', $project) }}" class="btn btn-warning ms-2"><i
                    class="fas fa-pencil me-2"></i>Modifica</a>
        </div>
    </form>

@endsection

@section('scripts')
    <script>
        const placeholder =
            'https://img.freepik.com/premium-vector/photo-icon-picture-icon-image-sign-symbol-vector-illustration_64749-4409.jpg'
        const imageFiled = document.getElementById('image');
        const previewField = document.getElementById('image-preview');

        imageFiled.addEventListener('input', () => {
            previewField.src = imageFiled.value ? imageFiled.value : placeholder
        });
    </script>
@endsection


{{-- $table->string('title', 50)->unique(); 
$table->string('image')->nullable();
$table->string('url')->unique();
$table->text('description');
--}}
