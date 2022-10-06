@extends('layouts.app')

@section('content')
    <header>
        <h1>{{ $post->title }}</h1>
    </header>
    <div class="clearfix">
        @if($post->image)
            <img class="float-left mr-2 mb-2" src="{{ $post->image }}" alt="{{ $post->slug }}">
        @endif
            <p>{{ $post->content }}</p>
    </div>
        <p><u><strong>Categoria:</strong></u> @if ($post->category)  {{ $post->category->label }} @else  Generic @endif </p>
        <p><u><strong>Autore:</strong></u> @if ($post->user)  {{ $post->user->name }} @else  Generic @endif </p>
        <p><u><strong>Creato il:</strong></u><time> {{ $post->created_at }}</time></p>
        <p><u><strong>Ultima modifica:</strong></u><time> {{ $post->updated_at }}</time></p>
        <p><u><strong>Tags:</strong></u>
            @forelse($post->tags as $tag) 
            <span>'{{ $tag->label }}' </span>
            @empty - 
            @endforelse
        </p>

    <hr>
    <footer class="d-flex align-items-center justify-content-end">
        <a href="{{ route('admin.posts.index') }} " class="btn btn-secondary mr-2">
            <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
        </a>
        <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
             @csrf
            @method('DELETE')
            <button class="btn btn-danger mr-2" type="submit">
                <i class="fa-solid fa-trash mr-2"></i>Elimina
            </button>
        </form>
        <a class="text-white btn btn-info mr-2" href="{{ route('admin.posts.edit', $post) }}">
            <i class="fa-solid fa-pencil mr-2"></i>Modifica</a>
    </footer>

@endsection

