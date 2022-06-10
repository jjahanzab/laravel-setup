@extends('layouts.app')
   
@section('content')
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-8">
      <div class="card">
        <div class="card-header">Contact</div>
        <div class="card-body">
            
          @if (\Session::has('successMessage'))
            <div class="alert alert-success">{!! \Session::get('successMessage') !!}</div>
          @endif

          @if (\Session::has('errorMessage'))
            <div class="alert alert-danger">{!! \Session::get('errorMessage') !!}</div>
          @endif

          <form action="{{ route('user.contact.save') }}" method="POST" enctype="multipart/form-data">
            @csrf
            <div class="mb-3">
              <label class="form-label">Title</label>
              <input type="text" name="title" class="form-control" value="{{old('title')}}" required>
              @if ($errors->has('title'))
                <div class="form-text text-danger">{{ $errors->first('title') }}</div>
              @endif
            </div>
            <div class="mb-3">
              <label class="form-label">Upload File</label>
              <input type="file" name="contact_file" class="form-control" required>
              @if ($errors->has('contact_file'))
                <div class="form-text text-danger">{{ $errors->first('contact_file') }}</div>
              @endif
            </div>
            <button type="submit" class="btn btn-primary">Send</button>
          </form>

        </div>
      </div>
    </div>
  </div>
</div>
@endsection