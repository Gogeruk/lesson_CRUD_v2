@extends('layout')

@section('form-login')
<div class="m-3 border border-danger">
    <div class="form-group row m-2">
        <div class="m-3">
            <div class="m-3">
                <p class="m-3 text-center">Login please</p>
                <form class="m-3" action="" method="post">
                    @csrf
                    <div class="form-group row">
                          <label for="email" class="col-sm-2 col-form-label">Email</label>
                          <div class="col-sm-10">
                              <input value="{{ old('email', null) }}" type="text" class="form-control" name="email" id="email" placeholder="email@example.com">
                          </div>
                      </div>
                      @if($errors->has('email'))
                          <div class="alert alert-danger mb-3" role="alert">
                              {{ $errors->get('email')[0] }}
                          </div>
                      @endif
                      <div class="form-group row">
                          <label for="password" class="col-sm-2 col-form-label">Password</label>
                          <div class="col-sm-10">
                              <input type="password" class="form-control" name="password" id="password" placeholder="Password">
                          </div>
                      </div>
                      @if($errors->has('password'))
                          <div class="alert alert-danger mb-3" role="alert">
                              {{ $errors->get('password')[0] }}
                          </div>
                      @endif
                    <div class="m-3 text-center">
                        <button type="submit" class="btn btn-danger" id="button" name="submit">submit</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endsection
