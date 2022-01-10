
    $(document).ready(function(){
       
       count();
        $('.addtocart').on('click',function(){
            var shop_id=$("#shopid").val();
            //alert(shop_id)
         
          count();
            var id=$(this).data('id');
            
            var name=$(this).data('name');
            var price=$(this).data('price');
            var status=$(this).data('status');
            var qty = 1;
           
            //alert(id);
            var water=localStorage.getItem('cart');
            if(!water){
                var water='{"cart":[]}';
            }
            var waters=JSON.parse(water);
            var waterlist={id:id,price:price,qty:qty,status:status,shop_id:shop_id};
            // console.log(waterlist);

            var mycart=waters.cart;
            var length=mycart.length;

            console.log(length);


            for(var i=0; i<length; i++)
            {
                if(id == mycart[i].id)
                {
                console.log(mycart[i].id);

                    var exit = 1;
                    mycart[i].qty += 1;
                }
            }

            if (!exit) 
            {
                waters.cart.push(waterlist);
            }
            
            var cart=JSON.stringify(waters);
            localStorage.setItem('cart',cart);
           

        })

        function count(){
                var water = localStorage.getItem('cart');
                if(water){
                  water = JSON.parse(water);
                  var total=0;
                  var mycart = water.mycart;
                  $.each(water.cart,function(i,v){
                    total+=v.qty;
                    


                  })
                  $('#b1').html(total);
                }
          }

      

    })

