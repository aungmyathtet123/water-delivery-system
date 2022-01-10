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
					<th>Order_date</th>
					<th>Price</th>
					<th>Voucher_no</th>
				</thead>
				<tbody>
					@php
					$i=1;
					@endphp
					@foreach($orders as $order)
					<tr>
						<td>{{$i++}}</td>
						<td>{{$order->order_date}}</td>
						<td>{{$order->total_price}}</td>
					<td>
				<a href="{{route('order.show',$order->voucher_no)}}">{{$order->voucher_no}}</a></td>
					</tr>
					@endforeach
				</tbody>
			</table>
			</form>
		</div>
		
	</div>
	
</div>

@endsection