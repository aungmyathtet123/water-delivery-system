<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Order;
use App\Order_detail;
use Auth;

class OrderController extends Controller
{

      public function __construct()
        {
            $this->middleware('role:admin',['except'=>['store']]);
            // $this->middleware('role:shop');

         }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $orders=Order::all();
        $order_details=Order_detail::all();
        return view('order',compact('orders','order_details'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $orders=Order::all();
        $order_details=Order_detail::all();
        return view('order.create',compact('orders','order_details'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //dd($request);
        $water=request('water');
        $total=request('total');
        $cartarr=json_decode($water);
        $carts=$cartarr->cart;
       // dd($carts);
        $voucherno=uniqid();
        $order_date=date('Y-m-d');

        
         
        $order=Order::create([
                'user_id'=>Auth::id(),
                'order_date'=>$order_date,
                'voucher_no'=>$voucherno,
                'total_price'=>$total,
                'order_status'=>0,
                
            ]);
        foreach($carts as $cart){
        //dd($cart->shop_id);
            $orderdetail=Order_detail::create([

                'item_id'=>$cart->id,
                'shop_id'=>$cart->shop_id,
                'qty'=>$cart->qty,
                'price'=>$cart->price,
                'voucher_no'=>$voucherno,
                'status'=>$cart->status
            ]);
        }
        return response('success');


    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $voucher_no=request('order');

        $order_detail=Order_detail::where('voucher_no',$voucher_no)->get();
        
        
        return view('orderdetail',compact('order_detail'));
            }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
