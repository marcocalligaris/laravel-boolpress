@if($category->exists)
<form action="{{ route('admin.categories.update', $category) }}" method="POST">
    @method('PUT')
@else
<form action="{{ route('admin.categories.store') }}" method="POST">
@endif

    @csrf
    <div class="row">
        <div class="col-12">
            <div class="form-group">
                <label for="title">Label</label>
                <input type="text" class="form-control" name="label" id="label" value="{{ old('label', $category->label) }}" required maxlength="50">
            </div>
        </div>
    <hr>
    <footer class="d-flex justify-content-end">
        <a class="btn btn-secondary mr-2" href="{{ route('admin.categories.index') }}">
            <i class="fa-solid fa-rotate-left mr-2"></i>Indietro
        </a>
        <button class="btn btn-success" type="submit"><i class="fa-solid fa-floppy-disk mr-2"></i> Salva</button>
    </footer>
</form>
