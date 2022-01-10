<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Shop;
use App\Township;

class FrontendshopController extends Controller
{
    public function shop(Request $request)
    {
    	$shop_id=request('shop_id');
    	
    	//dd($township_id);
    	$townships=Township::all();

    	$shop=Shop::where('service_id',$shop_id)->get();
    	return view('frontend.shop',compact('shop','townships'));
    }
    public function find(Request $request)
    {
    	# code...
        $service_id=request('service_id');
    	$township_id=request('id');
    	$townships=Township::all();
        
    	//dd($township_id);
    	$shop = DB::table('shops')->where([
                        ['service_id', '=', $service_id],
                        ['township_id', '=', $township_id],
                    ])->get();
    	//dd($shop);
    	return response($shop);

    }
}
