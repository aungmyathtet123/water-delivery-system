@extends('template')
@section('content')
<div class="card bg-dark text-white">
  <img src="https://i.gifer.com/2DW3.gif" class="card-img" alt="..." height="700px">
  <div class="card-img-overlay">

    <section class="feature_part padding_top">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-8">
                    <div class="section_tittle text-center">
                        <marquee behivour="alternate">
                        <h2 class="text-white">Our Services</h2>
                    </marquee>
                    </div>
                </div>
            </div>
            <div class="row align-items-center justify-content-between">
                @foreach($services as $row)
                <div class="col-lg-6 col-sm-6">
                    
                    
                        <img src="{{$row->photo}}"class="img-fluid w-50" style="border-radius: 30%"></br>
                        <h3 class="text-white">{{$row->name}}</h3>
                        <a href="frontendshop?shop_id={{$row->id}}" class="btn btn-danger btn-3 text-white">Go to shop</a>
                    
                </div>
                @endforeach
                
                
            </div>
        </div>
    </section>
    
    </section> -->
    @endsection