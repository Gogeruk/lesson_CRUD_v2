@extends('layout')

@section('post-display')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <h2 class="mb-3 text-center">List posts
            @if(isset($_SESSION['user']))
                of a user named {{ $_SESSION['user'] }}
            @endif
            @if(isset($_SESSION['category']))
                of a category named {{ $_SESSION['category'] }}
            @endif
            @if(isset($_SESSION['tag']))
                of a tag {{ $_SESSION['tag'] }}
            @endif
            </h2>
            @if ($message = Session::get('status'))
                <p class="text-center"><strong>{{ $message }}</strong></p>
            @endif
            @forelse ($posts as $post)
                @include('partials.post_partial', ['post' => $post])
                @empty
                    <p class="m-3 text-center">No posts, sorry fren. Better luck next time.</p>
            @endforelse
            <div class="m-3 text-center">
                <button onclick="location.href='{{ route('create_a_new_post') }}'" type="submit" class="btn btn-danger" name="button">create a new post</button>
            </div>
            @include('pages.pagination.pagination', ['pagination_of' => $_SESSION['pagination_of']])
        </div>
        @php
            unset($_SESSION);
        @endphp
    </div>
</div>
@endsection
