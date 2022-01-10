@extends('maintemplate')
@section('content')
<div class="container">
	<div class="row">
		<div class="col-lg-8 col-md-10 mx-auto my-5">
		<h1> Shop Edit Form</h1>

		@if ($errors->any())
		    <div class="alert alert-danger">
	        <ul>
	            @foreach ($errors->all() as $error)
	                <li>{{ $error }}</li>
	            @endforeach
	        </ul>
		    </div>
		@endif


			<form method="post" action="{{route('shop.update',$shop->id)}}" enctype="multipart/form-data">
				@csrf
				{{--not post update using method PUT--}}
				@method('PUT')
				<div class="form-group">
					<label>Name</label>
					<input type="text" name="name" class="form-control" value="{{$shop->name}}">
					
				</div>
				<div class="form-group">
					<label>Phone</label>
				<input type="text" name="phone" class="form-control"value="{{$shop->phone}}">
				</div>
				<div class="form-group">
					<label>Address</label>
				<input type="text" name="address" class="form-control"value="{{$shop->address}}">
				</div>
				<div class="form-group">
					<label>Township_id</label>
				<input type="text" name="township_id" class="form-control"value="{{$shop->township_id}}">
				</div>

				<div class="form-group">
				<input type="submit" name="submit" value="update" class="btn btn-primary">
					
				</div>
				

			</form>
			
		</div>
		
	</div>
	

</div>


@endsection