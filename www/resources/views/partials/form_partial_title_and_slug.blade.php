<!-- title  -->
<label for="title" class="col-sm-12 col-form-label">Title</label>
<div class="col-sm-10">
    <input type="text" name="title" class="form-control mb-3" id="title" placeholder="your title" value="{{ old('title', $post->title ?? null) }}">
</div>
@if($errors->has('title'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('title')[0] }}
    </div>
@endif

<!-- slug  -->
<label for="slug" class="col-sm-12 col-form-label">Slug</label>
<div class="col-sm-10">
    <input type="text" name="slug" class="form-control mb-3" id="slug" placeholder="your slug" value="{{ old('slug', $post->slug ?? null) }}">
</div>
@if($errors->has('slug'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('slug')[0] }}
    </div>
@endif
