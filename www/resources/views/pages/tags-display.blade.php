@extends('layout')

@section('tag-display')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <h2 class="mb-3 text-center">List tags</h2>
            @if ($message = Session::get('status'))
                <p class="text-center"><strong>{{ $message }}</strong></p>
            @endif
            @forelse ($tags as $tag)
                @include('partials.tag_partial', ['tag' => $tag])
                @empty
                    <p class="m-3 text-center">No tags, sorry fren. Better luck next time.</p>
                @endforelse
            <div class="m-3 text-center">
                <button onclick="location.href='{{ route('create_a_new_tag') }}'" type="submit" class="btn btn-danger" name="button">create a new tag</button>
            </div>
            @include('pages.pagination.pagination', ['pagination_of' => $_SESSION['pagination_of']])
        </div>
        @php
            unset($_SESSION);
        @endphp
    </div>
</div>
@endsection
