@extends('maintemplate')
@section('content')
<div class="container">
	<h1>Post Edit Form</h1>
	 @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
  
<div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form method="post" action="{{route('township.update',$township->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
          <div class="form-group">
            <label>Name:</label>
            <input type="text" name="name"class="form-control" required="required" value="{{$township->name}}">
          </div>
           <div class="form-group"> 
            <input type="submit"  name="btnsubmit" class="btn btn-primary" value="Update">
            
          </div> 
        </form>
  
      </div>
    </div>
</div>



@endsection