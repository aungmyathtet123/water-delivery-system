@extends('template')
@section('content')
<section class="feature_part padding_top">
    @php
    $shop_id=$_REQUEST['water_id'];
    
   
    @endphp
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                     <input type="hidden" name="" value="{{$shop_id}}" id="shopid">
                    <div class="section_tittle text-center">
                        <h2>Our Services</h2>

                        
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach($water as $waters)
                <div class="col-lg-4 col-sm-4">
                   	
                    <img src="{{$waters->image}}" height="230px"><br>
                        <h4>{{$waters->amount}}</h4>                  <h5>{{$waters->size}}</h5>
                        <h5>{{$waters->price}}</h5>

                
                @if(Auth::check())
                    @hasrole('user')
                    
                 <a href="#" class="addtocart d-none d-sm-block home_page_btn btn btn-primary" data-id="{{$waters->id}}"  data-name="{{$waters->size}}" data-price="{{$waters->price}}" data-status="water">Add To Cart</a>
                        @endhasrole
                
               @endif
               </div>
               
                @endforeach




                
                
                
            </div>
        </div>
    </section>
@endsection
@section('script')




@endsection