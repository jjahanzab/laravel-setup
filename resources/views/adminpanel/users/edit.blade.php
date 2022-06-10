@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Update Vendor</div>
        <div class="card-body">
            
          @if (\Session::has('successMessage'))
            <div class="alert alert-success">{!! \Session::get('successMessage') !!}</div>
          @endif

          @if (\Session::has('errorMessage'))
            <div class="alert alert-danger">{!! \Session::get('errorMessage') !!}</div>
          @endif

          <form action="{{route('admin.users.update')}}" method="POST">
            @csrf
            <input type="hidden" name="id" value="{{ isset($user->id) ? $user->id: '' }}">
            <div class="mb-3">
              <label class="form-label">Username</label>
              <input type="text" name="username" class="form-control" value="{{ isset($user->username) ? $user->username: '' }}">
              @if ($errors->has('username'))
                <div class="form-text text-danger">{{ $errors->first('username') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label">Email</label>
              <input type="email" name="email" class="form-control" value="{{ isset($user->email) ? $user->email: '' }}">
              @if ($errors->has('email'))
                <div class="form-text text-danger">{{ $errors->first('email') }}</div>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Update</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection