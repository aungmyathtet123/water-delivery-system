@extends('maintemplate')
@section('content')
<div class="container">
	<h1>Service Create Form</h1>

    <form method="post" action="{{route('service.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Name:</label>
          <input type="text" name="name" class="form-control">
          </div>
          <div class="form-group">
            <label>Photo:</label>
          <input type="file" name="photo" class="form-control">
          </div>

        <div class="form-group">
          <input type="submit" name="btnsubmit" class="btn btn-primary" value="save">
        </div>
        </form>
    </div>
@endsection