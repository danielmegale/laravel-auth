@extends('layouts.app')

@section('title', 'Create Project')

@section('content')
    <header class="d-flex justify-content-between align-items-center">
        <h1>Modifica Progetto</h1>
        <a class="btn btn-sm btn-secondary" href="{{ route('admin.projects.index') }}"><i class="fas fa-arrow-left"></i>Torna
            Indietro</a>
    </header>
    <hr>
    @include('includes.layout.form')

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
