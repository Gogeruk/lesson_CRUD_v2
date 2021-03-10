@extends('layout')

@section('category-display')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <h2 class="mb-3 text-center">List categories</h2>
            @if ($message = Session::get('status'))
                <p class="text-center"><strong>{{ $message }}</strong></p>
            @endif
            @forelse ($categories as $category)
                @include('partials.categories_partial', ['category' => $category])
                @empty
                    <p class="m-3 text-center">No categories, sorry fren. Better luck next time.</p>
                @endforelse
            <div class="m-3 text-center">
                <button onclick="location.href='{{ route('create_a_new_category') }}'" type="submit" class="btn btn-danger" name="button">create a new category</button>
            </div>
            @include('pages.pagination.pagination', ['pagination_of' => $_SESSION['pagination_of']])
        </div>
        @php
            unset($_SESSION);
        @endphp
    </div>
</div>
@endsection
