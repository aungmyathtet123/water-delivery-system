@extends('template')
@section('content')
<section class="feature_part padding_top">
	<div style="margin-left: 800px">
		       	<select class="select form-control text-danger bg-secondary align-content-center">
		       		<option value="" class="text-danger" > you can search township here</option>
		       		@foreach($townships as $township)
		       		<option value="{{$township->id}}" class="text-dark">{{$township->name}}</option>
		       		@endforeach
		       	</select>
       			</div>
	
       <div class="container" style="margin-top: 200px">
       	
       	<div id="all">
       		<div class="row align-items-center justify-content-between">
       		@foreach($shop as $row)

       			<div class="col-lg-3 col-sm-2 my-5">

				      <img src="{{$row->image}}" width="320px" height="200px">
				      	<i class="fas fa-file-signature"></i>
				        <label>Name:	{{$row->name}}</label><br>
				        <i class="fas fa-mobile-alt"></i>
				        <label>Phone-no:	{{$row->phone}}</label><br>
				        <i class="fas fa-home"></i>
				        <label>Address: {{$row->address}}</label><br> <a href="frontendwater?water_id={{$row->id}}&service_id={{$row->service_id}}" class="btn btn-primary" >View Detail</a>
				      
				    
				</div>
			
			@endforeach 
			</div> 
		</div>
		</div>
          
</section>
@endsection
@section('script')
<script type="text/javascript">
	$(document).ready(function(){
		$(".select").change(function(){
  			var id=$(this).val();
  			// alert(id);

  			var currentroute = window.location.href;
  			var currentroute_array = currentroute.split("=");

  			var service_id = currentroute_array[1];

  			console.log(service_id);

  			$.ajaxSetup({
                    headers:
                    {
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                  });
  			$.post('findshop',{id:id,service_id:service_id},function(response){
  				console.log(response);
                   var html="";
                   $.each(response,function(i,v)
                   {
                   	var sid=v.id;
                   	//alert(sid);
                   	var tname=v.name;
                   	var phone=v.phone;
                   	var taddress=v.address;
                   	var img=v.image;
                   	//console.log(img);
                   	var service_id=v.service_id;
                   	//alert( service_id)
              	// var routeURL="{{route('frontendwater', ':w_id', ':s_id')}}";
              		console.log(sid);

              		// url1 = routeURL.replace(":w_id", sid);
              		// url2 = routeURL.replace(":s_id", service_id);
                   	// routeURL=routeURL.replace(':s_id',service_id);

                   	var js_route = "{{ route('frontendwater',[':w_id',':s_id']) }}";
                   	js_route = js_route.replace(":w_id", 'water_id='+sid);
                   	js_route = js_route.replace(":s_id", 'service_id='+service_id);



                   	console.log(js_route);

                   	html+=`<div class="card mb-3" >
				<div class="row no-gutters">
				    <div class="col-md-4">
				      <img src="`+img+`" width="320px" height="200px">
				    </div>
				    <div class="col-md-8">
				      <div class="card-body">
				      	<i class="fas fa-file-signature"></i>
				        <label>Name:	`+tname+`</label><br>
				        <i class="fas fa-mobile-alt"></i>
				        <label>Phone-no:	`+phone+`</label><br>
				        <i class="fas fa-home"></i>
				        <label>Address: `+taddress+`</label><br><br><br>

				        <a href="`+js_route+`" class="btn btn-primary" >View Detail</a>
				      </div>
				    </div>
				</div>
			</div>`
                   });
                   $('#all').html(html);
                   
                  })
});
	})
</script>
@endsection