@if($post->exists)
<form action="{{ route('admin.posts.update', $post) }}" enctype="multipart/form-data" method="POST">
    @method('PUT')
@else
<form action="{{ route('admin.posts.store') }}" enctype="multipart/form-data" method="POST">

@endif
    @csrf
    <div class="row">
        <div class="col-9">
            <div class="form-group">
                <label for="title">Titolo</label>
                <input type="text" class="form-control" name="title" id="title" value="{{ old('title', $post->title) }}" required maxlength="50">
            </div>
        </div>
        <div class="col-3">
            <div class="form-group">
                <label for="category_id">Categoria</label>
                <select class="form-control" id="category_id" name="category_id">
                    <option value="">Seleziona categoria</option>
                    @foreach($categories as $category)
                    <option @if(old('category_id', $post->category_id) == $category->id) selected @endif 
                    value="{{ $category->id }}">{{ $category->label }}</option>
                    @endforeach
                </select>
              </div>
        </div>
        @if(count($tags))
        <div class="col-12 mb-3">
            <fieldset class="d-flex">
                <h5><strong>Tags:</strong></h5>
                @foreach($tags as $tag)
                <div class="ml-4 form-check">
                    <input 
                    class="form-check-input" 
                    type="checkbox" 
                    id="{{ $tag->label }}" 
                    value="{{ $tag->id }}" 
                    name="tags[]"
                    @if(in_array($tag->id, old('tags', $tags_ids_array ?? []))) checked @endif
                    >
                    <label class="form-check-label" for="{{ $tag->label }}">{{ $tag->label }}</label>
                </div>
                @endforeach
            </fieldset>
        </div>
        @endif
        <div class="col-12">
            <div class="form-group">
                <label for="content">Testo</label>
                <textarea type="text" name='content' rows="10" class="form-control" id="content" required>{{ old('content', $post->content) }}</textarea>
              </div>
        </div>
        <div class="col-4">
            <div class="form-group d-flex flex-column">
                <label for="image">Immagine</label>
                <input type="file" name="image" id="image">
              </div>
        </div>
        <div class="col-1">
            <img class="img-fluid" src="{{ $post->image ? asset('storage/'.$post->image) : asset('storage/posts_uploads/placeholder.jpg')}}" alt="{{ $post->image ? $post->slug : 'placeholder image' }}" id="preview">
        </div>
    </div>
    <hr>
    <footer class="d-flex justify-content-end">
        <a class="btn btn-secondary mr-2" href="{{ route('admin.posts.index') }}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
        </a>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i> Salva</button>
    </footer>
</form>