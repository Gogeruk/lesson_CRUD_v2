@extends('layout')

@section('form-post')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <div class="m-3">
                <p class="m-3 text-center">Post form</p>
                <form class="m-3" action="" method="post">
                    @csrf
                    <!-- title, slug  -->
                    @include('partials.form_partial_title_and_slug')
                    <!-- body, category, user ,tags  -->
                    @include('partials.form_partial', ['users'   => $users,
                                                    'categories' => $categories,
                                                    'tags'       => $tags ])
                    <div class="m-3 text-center">
                        <button type="submit" class="btn btn-danger" id="button" name="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
