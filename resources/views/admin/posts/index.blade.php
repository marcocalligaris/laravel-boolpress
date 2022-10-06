@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h1>Elenco dei post</h1>
    <a class="btn btn-success" href="{{ route('admin.posts.create') }} ">
      <i class="fa-solid fa-plus mr-2"></i>Crea nuovo post
    </a>
</header>
<section>
  <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Autore</th>
            <th>Titolo</th>
            <th>Slug</th>
            <th>Categoria</th>
            <th>Tags</th>
            <th>Creato il</th>
            <th>Modificato il</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @forelse($posts as $post)
            <tr>
                <th scope="row">{{ $post->id }}</th>
                <td>
                  @if($post->user)
                  {{ $post->user->name }}</td>
                  @else Generic
                  @endif
                <td>{{ $post->title }}</td>
                <td>{{ $post->slug }}</td>
                <td> @if ($post->category)  {{ $post->category->label }} @else  Generic @endif </td>
                <td>  
                  <ul class="list-unstyled">
                    @forelse($post->tags as $tag)
                    <li>
                      {{ $tag->label }}
                      @empty - 
                    </li>
                  </ul> 
                  @endforelse </td>
                <td>{{ $post->created_at }}</td>
                <td>{{ $post->updated_at }}</td>
                <td class="d-flex justify-content-end">
                  <a class="btn btn-sm btn-info text-white mr-2" href="{{ route('admin.posts.edit', $post) }}">
                    <i class="fa-solid fa-pencil"></i>
                  </a>
                  <form action="{{ route('admin.posts.destroy', $post->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-2" type="submit">
                        <i class="fa-solid fa-trash"></i>
                    </button>
                </form>
                  <a class="btn btn-sm btn-primary" href="{{ route('admin.posts.show', $post) }}">
                    <i class="fa-solid fa-eye"></i>
                  </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">
                    <h3 class="text-center">Nessun post</h3>
                </td>
            </tr>
            @endforelse
            
        </tbody>
  </table>
</section>
<section class="mt-5" id="posts-by-cat">
  <h3 class="mb-3"><strong>Post ordinati per categoria</strong></h3>
  <div class="row">
    @foreach ($categories as $category)
    <div class="col-2">
      <h4>{{ $category->label }} ({{ count($category->posts) }})</h4>
      @forelse($category->posts as $post)
      <p><a href="{{ route('admin.posts.show', $post) }}">{{ $post->title }}</a></p>
      @empty
        Nessun post da mostrare
      @endforelse
    </div>
    @endforeach
  </div>
</section>
      @endsection