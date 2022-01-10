<?php

namespace App\Http\Controllers;
 
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Water;
use App\Laundry;
use App\Category;
use App\Service;

class FrontendwaterController extends Controller
{
    public function water(Request $request){
    	$water_id=request('water_id');
    	$service_id=request('service_id');
    	if($service_id==3){
    		$water=Water::where('shop_id',$water_id)->get();
    	return view('frontend.water',compact('water'));
    	}
    	if($service_id==4){
    		$services=Service::all();
    		$laundries = DB::table('laundries')
            ->join('categories', 'categories.id', '=', 'laundries.category_id')
            ->where('laundries.shop_id',$water_id)
            ->select('laundries.*','categories.*', 'categories.name as categoryname')
            ->get();

    		
            //dd($laundries);
    	return view('frontend.laundry',compact('laundries','services','categories'));
    	}
    	
    }
}
