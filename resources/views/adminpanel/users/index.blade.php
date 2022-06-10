@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Vendors</div>
        <div class="card-body">

          @if (\Session::has('successMessage'))
            <div class="alert alert-success">{!! \Session::get('successMessage') !!}</div>
          @endif

          @if (\Session::has('errorMessage'))
            <div class="alert alert-danger">{!! \Session::get('errorMessage') !!}</div>
          @endif
            
          <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.users.create') }}">New Vendor</a>

          <table class="table table-bordered">
            <thead>
              <tr>
                <th scope="col">#</th>
                <th scope="col">Username</th>
                <th scope="col">Email</th>
                <th scope="col">Action</th>
              </tr>
            </thead>
            <tbody>

              @isset($users)
                @foreach ($users as $key => $user)
                  <tr>
                    <th>{{ $key + 1 }}</th>
                    <td>{{ $user->username }}</td>
                    <td>{{ $user->email }}</td>
                    <td>
                      <a class="btn btn-outline-secondary btn-sm" href="{{ route('switch.user', $user->id) }}">Switch</a>
                      <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.users.edit', $user->id) }}">Edit</a>
                      <a class="btn btn-outline-secondary btn-sm" href="{{ route('admin.users.delete', $user->id) }}">Delete</a>
                    </td>
                  </tr>
                @endforeach
              @endisset

            </tbody>
          </table>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection