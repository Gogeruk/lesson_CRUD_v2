@extends('layout')

@section('form-tag')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <div class="m-3">
                <p class="m-3 text-center">Tag form</p>
                <form class="m-3" action="" method="post">
                    @csrf
                    <!-- title, slug  -->
                    @include('partials.form_partial_title_and_slug')
                    <div class="m-3 text-center">
                        <button type="submit" class="btn btn-danger" id="button" name="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
