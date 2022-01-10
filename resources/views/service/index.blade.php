@extends('maintemplate')
@section('content')
<div class="container">
	<h1>Service Form</h1>
	<a href="{{route('service.create')}}" class="btn btn-primary my-2">Add Service</a>

	<div class="row">
		<div class="col-md-8">
			 <table class="table  table-bordered" cellpadding="10"  cellspacing="0">
				<thead>
				<tr>
					<th>No</th>
					<th>Name</th>
					<th colspan="2">Action</th>
					
					
				</tr>
			</thead>
			<tbody>
				@php
				$i=1;
				@endphp
				@foreach($services as $row)
				<tr>
					<td>{{$i++}}</td>
					<td>{{$row->name}}</td>
					<td>
						<a href="{{route('service.edit',$row->id)}}" class="btn btn-info">Edit</a>
					</td>
					<td>
          				<form method="post" action="{{route('service.destroy',$row->id)}}">
            			@csrf
            			@method('DELETE')
            			<input type="submit" value="Delete" class="btn btn-danger">
          				</form>
      				</td>
				</tr>
				@endforeach
			</tbody>
			</table>
		</div>
	</div>
</div>
@endsection