@extends('layouts.app')

@section('content')
    <header>
        <h1>{{ $category->label }}</h1>
    </header>
        <p><u><strong>Colore:</strong></u>{{ $category->color }}</p>
        <p><u><strong>Creata il:</strong></u><time> {{ $category->created_at }}</time></p>
        <p><u><strong>Ultima modifica:</strong></u><time> {{ $category->updated_at }}</time></p>
    <hr>
    <footer class="d-flex align-items-center justify-content-end">
        <a href="{{ route('admin.categories.index') }} " class="btn btn-secondary mr-2">
            <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
        </a>
        <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="delete-form">
             @csrf
            @method('DELETE')
            <button class="btn btn-danger mr-2" type="submit">
                <i class="fa-solid fa-trash mr-2"></i>Elimina
            </button>
        </form>
        <a class="text-white btn btn-info mr-2" href="{{ route('admin.categories.edit', $category) }}">
            <i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
    </footer>

@endsection

