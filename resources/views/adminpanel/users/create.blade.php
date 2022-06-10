@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Create Vendor</div>
        <div class="card-body">
            
          @if (\Session::has('successMessage'))
            <div class="alert alert-success">{!! \Session::get('successMessage') !!}</div>
          @endif

          @if (\Session::has('errorMessage'))
            <div class="alert alert-danger">{!! \Session::get('errorMessage') !!}</div>
          @endif

          <form action="{{route('admin.users.save')}}" method="POST">
            @csrf
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" value="{{old('username')}}">
              @if ($errors->has('username'))
                <div class="form-text text-danger">{{ $errors->first('username') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{old('email')}}">
              @if ($errors->has('email'))
                <div class="form-text text-danger">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label">Password</label>
              <input type="text" name="password" class="form-control" value="{{old('password')}}">
              @if ($errors->has('password'))
                <div class="form-text text-danger">{{ $errors->first('password') }}</div>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Submit</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection