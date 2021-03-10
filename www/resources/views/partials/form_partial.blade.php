
<!-- body  -->
<label for="body" class="col-sm-12 col-form-label">Body</label>
<div class="col-sm-10">
    <textarea type="text" name="body" class="form-control mb-3" rows="3" id="body" placeholder="your body"> {{ old('body', $post->body ?? null) }}</textarea>
</div>
@if($errors->has('body'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('body')[0] }}
    </div>
@endif

<!-- Select User  -->
<label for="user" class="col-sm-12 col-form-label">Author</label>
<select id="user" name="user_id" class="form-select mb-3" aria-label="Default select example">
    <option selected>Choose author</option>
    @foreach($users as $user)
        <option value="{{ $user->id }}" @if($user->id == old('user_id', $post->user_id ?? null)) selected=true @endif > {{ $user->name }} </option>
    @endforeach
</select>
@if($errors->has('user_id'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('user_id')[0] }}
    </div>
@endif

<!-- Select Category  -->
<label for="category" class="col-sm-12 col-form-label">Category</label>
<select id="category" name="category_id" class="form-select  mb-3" aria-label="Default select example">
    <option selected>Choose your category</option>
    @foreach($categories as $category)
        <option value="{{ $category->id }}" @if($category->id == old('category_id', $post->category_id ?? null)) selected=true @endif > {{ $category->title }} </option>
    @endforeach
</select>
@if($errors->has('category_id'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('category_id')[0] }}
    </div>
@endif

<!-- Select tags  -->
<div class="control-group">
    <p class="mb-3">Choose tags</p>
    <div class="controls span2">
        <table class="table table-sm">
            <thead>
                <tr>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                    <th scope="col"></th>
                </tr>
            </thead>
            <tbody>
            @php $i=6 @endphp
            @foreach($tags as $key => $tag)
                @if($loop->iteration == $i-5)
                    <tr>
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"  > {{ $tag->title }}
                            </label>
                        </td>
                @endif
                @if($loop->iteration == $i-4)
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"   > {{ $tag->title }}
                            </label>
                        </td>
                @endif
                @if($loop->iteration == $i-3)
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"   > {{ $tag->title }}
                            </label>
                        </td>
                @endif
                @if($loop->iteration == $i-2)
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"   > {{ $tag->title }}
                            </label>
                        </td>
                @endif
                @if($loop->iteration == $i-1)
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"   > {{ $tag->title }}
                            </label>
                        </td>
                @endif
                @if($loop->iteration == $i)
                        <td>
                            <label class="form-check-label mb-1" for="tags">
                                <input @if(in_array($tag->id, old('tags', $fuck_you_php ?? []) ?? [])) checked @endif class="form-check-input" type="checkbox" id="tags" name="tags[]" value="{{ $tag->id }}"   > {{ $tag->title }}
                            </label>
                        </td>
                    </tr>
                @endif
                @if($loop->iteration % 6 == 0)
                    @php $i=$i+6 @endphp
                @endif
            @endforeach
            <tbody>
        <table>
    </div>
</div>
@if($errors->has('tags'))
    <div class="alert alert-danger mb-3" role="alert">
        {{ $errors->get('tags')[0] }}
    </div>
@endif
