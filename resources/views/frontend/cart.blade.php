@extends('template')
@section('content')

<!-- <section class="breadcrumb breadcrumb_bg">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="breadcrumb_iner">
            <div class="breadcrumb_iner_item">
              <h2>Cart Products</h2>
              <p>Home <span>-</span>Cart Products</p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </section> -->
  <!-- breadcrumb start-->

  <!--================Cart Area =================-->
  <section class="cart_area padding_top">
    <div class="container">
      <div class="inner-card">
      <div class="row">
        <div class="col-md-6">
          <div class="card-body">
 <img src="frontend/image/l.jpg" class="img-fluid w-100" style="border-radius: 20%">          </div>
          
        </div>
        <div class="col-md-6">
        <div class="table-responsive">
          
          <table class="table table-responsive-md table-bordered">
                            <thead class="bg-secondary text-white">
                                <tr class="bg-faded">
                                    <th>No</th>
                                    <th>Item_id</th>
                                    <th>Price</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>   
                            </thead>
                            <tbody>
                                
                            </tbody>
                        </table>
        </div>
          </div>
        </div>
      </div>
  </section>
  @endsection
  @section('script')
  <script type="text/javascript">
    $(document).ready(function(){

      showtable();
      function showtable(){
            var water = localStorage.getItem('cart');
                if (water) {
                    var water = JSON.parse(water);
                    var mycart = water.cart;

                    var mytable ='';
                    var total =0;
                    var j=1;
                    $.each(mycart,function (i,v) {
                        if (v) {
                            var id = v.id;
                            //alert(id);
                            var amount = v.amount;
                            var size = v.size;
                            var price = v.price;
                            var qty = v.qty;

                            mytable +='<tr>'+
                            '<td>'+j+'</td>'+
                           
                            '<td>'+id+'</td>'+
                            '<td>'+price+'</td>'+
                            '<td><button class="max" data-id="'+i+'">+</button>'+qty+'<button class="min" data-id="'+i+'">-</button></td>'+
                            '<td>'+(price*qty)+'</td>'+
                            '</tr>';
                            total += (price*qty);
                            j++;
                        }
                    })

                    mytable +='<tr>'+
                                    '<td colspan="3" class="text-right">Total Amount:</td>'+
                                    '<td colspan="3" class="text-center">'+total+'</td>'+
                                '</tr>';
                    mytable +='<tr><td colspan="6" class="text-center"><button class="order" data-total="'+total+'">Order</button></td></tr>';
                    $('tbody').html(mytable);
                }else{
                    $('tbody').html('<tr><td colspan="5" class="text-center">Empty Cart!</td></tr>');
                }
            }
            //add qty
            $('tbody').on('click','.max',function () {
                var id = $(this).data('id');
                var water = localStorage.getItem('cart');
                if(water){
                    var water = JSON.parse(water);
                    var mycart = water.cart;
                    $.each(mycart,function (i,v) {
                        if (i == id) {
                            v.qty++;
                        }
                    })
                   var cart = JSON.stringify(water);
                    localStorage.setItem('cart',cart);
                    showtable();
                }
            })
        
            // Sub Qty
            $('tbody').on('click','.min',function () {
                var id = $(this).data('id');
                var shop_id=$("#shopid").val();
                alert(shop_id);
                var water = localStorage.getItem('cart');
                if(water){
                    var water = JSON.parse(water);
                    var mycart = water.cart;
                    $.each(mycart,function (i,v) {
                        if (i == id) {
                            v.qty--;
                            if (v.qty == 0) {
                                mycart.splice(id,1);
                            }
                        }
                    })
                    var cart = JSON.stringify(water);
                    localStorage.setItem('cart',cart);
                    showtable();
                }
            })

            $('tbody').on('click','.order',function () {
              //alert('you order successful,thanks');
                var water=localStorage.getItem('cart');
                //console.log(water);

                var total = $(this).data('total');
                if(water)
                {
                  var cartobj=JSON.parse(water);
                  var waterlist=cartobj.cart;

                  $.ajaxSetup({
                    headers:
                    {
                      'X-CSRF-TOKEN':$('meta[name="csrf-token"]').attr('content')
                    }
                  });
                  $.post('order',{water:water,total:total},function(response){
                    console.log(response);
                    if(response=='success')
                    {
                      alert('you order successful,thanks');
                      localStorage.clear();
                      showtable();
                    }
                  })
                }
                    
            })

            
          })

  </script>


@endsection