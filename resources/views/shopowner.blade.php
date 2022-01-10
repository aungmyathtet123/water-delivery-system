@extends('maintemplate')
@section('content')
<div class="container">
	<h1>Order Table</h1>
	<div class="row">
		<div class="col-md-8">
			<form method="post" action="">
				@csrf
			  <table class="table  table-bordered" cellpadding="10"  cellspacing="0">
				<thead>
					<th>No</th>
					<th>User_id</th>
					<th>item_id</th>
					<th>qty</th>
					<th>order_date</th>
				</thead>
				<tbody>
					@php
					$i=1;
					@endphp
					@foreach($shopowners as $order)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$order->user_id}}</td>
						<td>{{$order->item_id}}</td>
						<td>{{$order->qty}}</td>
						<td>{{$order->order_date}}</td>
						
					
					</tr>
					@endforeach
				</tbody>
			</table>
			</form>
		</div>
		
	</div>
	
</div>

@endsection