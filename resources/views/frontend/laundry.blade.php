@extends('template')
@section('content')

	<div class="container my-5 bg-light">
    @php
    $shop_id=$_REQUEST['water_id'];
    
   
    @endphp

   		<div class="row" style="margin-top: 200px">
         
         <input type="hidden" name="" value="{{$shop_id}}" id="shopid">
        
         <table class="table  table-bordered" cellpadding="10"  cellspacing="0">

        		<thead>
                    <th>shop</th>
        			<th>categories</th>
        			<th class="text-center"> washing price</th>
        			
        		</thead>
        		@foreach($laundries as $laundry)
        		<tbody>
        		<tr>
        		<td><img src="{{$laundry->image}}" width="70" height="70"></td>
             	<td>{{$laundry->categoryname}}</td>
              
              <td><input type="number" name="number" class="form-control" readonly="readonly" id="price" value="{{$laundry->price}}">
              </td>
               @if(Auth::check())
                    @hasrole('user')
				<td><a href="#" class="addtocart d-none d-sm-block home_page_btn btn btn-outline-primary" data-id="{{$laundry->id}}" data-name="{{$laundry->category_id}}" data-price="{{$laundry->price}}" data-status="laundry">Add To Cart</a>
				</td>
                  @endhasrole
                
               @endif
				</tr>
				</tbody>
				@endforeach
			</table>
    	</div>
    </div>    
    @endsection
    
