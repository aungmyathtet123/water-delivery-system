@extends('maintemplate')
@section('content')
<div class="container">
	<h1>Order-detail Table</h1>
	<div class="row">
		<div class="col-md-8">
			<form method="post" >
				  <table class="table table-responsive-md table-bordered" cellpadding="10"  cellspacing="0">
					<thead>
						<th>qty</th>
						<th>price</th>
						<th>item_id</th>
						<th>shop_id</th>
						<th>voucher_no</th>
						<th>status</th>
					</thead>
					<tbody>
						@foreach($order_detail as $orderdetail)
						<tr>
							<td>{{$orderdetail->qty}}</td>
							<td>{{$orderdetail->price}}</td>
							<td>{{$orderdetail->item_id}}</td>
							<td>{{$orderdetail->shop_id}}</td>
							<td>{{$orderdetail->voucher_no}}</td>
							<td>{{$orderdetail->status}}</td>
						</tr>
						@endforeach
						
					</tbody>
				</table>
			</form>
			
		</div>
		
	</div>
	
</div>
@endsection