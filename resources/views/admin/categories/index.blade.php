@extends('layouts.app')

@section('content')

<header class="d-flex justify-content-between align-items-center">
    <h1>Elenco categorie</h1>
    <a class="btn btn-success" href="{{ route('admin.categories.create') }} ">
      <i class="fa-solid fa-plus mr-2"></i>Crea nuova categoria
    </a>
</header>
<section>
  <table class="table table-striped">
        <thead>
          <tr>
            <th scope="col">#</th>
            <th>Label</th>
            <th>Color</th>
            <th>Creato il</th>
            <th>Modificato il</th>
            <th>Azioni</th>
          </tr>
        </thead>
        <tbody>
            @forelse($categories as $category)
            <tr>
                <th scope="row">{{ $category->id }}</th>
                <td>{{ $category->label }}</td>
                <td>{{ $category->color }}</td>
                <td>{{ $category->created_at }}</td>
                <td>{{ $category->updated_at }}</td>
                <td class="d-flex justify-content-end">
                  <a class="btn btn-sm btn-info text-white mr-2" href="{{ route('admin.categories.edit', $category) }}">
                    <i class="fa-solid fa-pencil mr-2"></i>Modifica
                  </a>
                  <form action="{{ route('admin.categories.destroy', $category->id) }}" method="POST" class="delete-form">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger btn-sm mr-2" type="submit">
                        <i class="fa-solid fa-trash mr-2"></i>Elimina
                    </button>
                </form>
                  <a class="btn btn-sm btn-primary" href="{{ route('admin.categories.show', $category) }}">
                    <i class="fa-solid fa-eye mr-2"></i>Vedi
                  </a>
                </td>
            </tr>
            @empty
            <tr>
                <td colspan="9">
                    <h3 class="text-center">Nessuna categoria</h3>
                </td>
            </tr>
            @endforelse
            
        </tbody>
  </table>
</section>

      @endsection