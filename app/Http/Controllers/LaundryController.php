<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Laundry;
use App\Category;
use App\Shop;
use App\Service;
class LaundryController extends Controller
{

    public function __construct()
        {
            $this->middleware(['role:admin']);
            }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $laundries=Laundry::all();
        


        return view('laundry.index',compact('laundries'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shops=Shop::all();
        $categories=Category::all();
        $services=Service::all();
        //dd($categories);

        return view('laundry.create',compact('categories','shops','services'));
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
        $request->validate([
            'price'=>'required',
            'shop_id'=>'required',
            'service'=>'required'
        ]);
        $laundry=new Laundry();
        $laundry->price=request('price');
        $laundry->shop_id=request('shop_id');
        $laundry->category_id=request('service');
        $laundry->save();
        //Redrite
        return redirect()->route('laundry.index'); 
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         
         $laundry=Laundry::find($id);
         $shops=Shop::all();
         $categories=Category::all();//

        return view('laundry.edit',compact('categories','laundry','shops'));

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
          $request->validate([
            'price'=>'required',
            'shop'=>'required',
            'category'=>'required'
        ]);
        $laundry=new Laundry();
        $laundry->price=request('price');
        $laundry->shop_id=1;
        $laundry->category_id=1;
        $laundry->save();
        //Redrite
        return redirect()->route('laundry.index'); 
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $laundry=Laundry::find($id);
        $laundry->delete();
        return redirect()->route('laundry.index');
    }
}

