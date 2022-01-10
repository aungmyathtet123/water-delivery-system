<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Water;
use App\Shop;
class WaterController extends Controller
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
         $waters = Water::all(); 

        return view('water.index',compact('waters'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $shop = Shop::all();
        $waters = Water::all();

        return view('water.create',compact('shop','waters'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
          // Check valitation
        $request->validate([
            'amount' => 'required|min:1',
            'size' =>'required|min:3',
            'price' =>'required|min:3',
            'photo' => 'required|mimes:jpeg,png.jpg',
            'shop'=>'required'
        ]);

        //File upload
        //dd($request);

        if($request->hasfile('photo')){
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo = 'storage/image/'.$name;
        }else{
            $photo = '';
        }

        //data insert
        $water = new Water();
        $water->amount =request('amount');
        $water->size =request('size');
        $water->price =request('price');
        $water->shop_id =request('shop');
        $water->image = $photo;
        $water->save();

        //Redirect
        return redirect()->route('water.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $water = Water::find($id); 
        $shop = Shop::all();
        return view('water.edit',compact('water','shop'));
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
        //dd($request);
       

         //File upload
        if($request->hasfile('photo')){
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo = '/storage/image/'.$name;
        }else{
            $photo = request('oldphoto');
        }

     

        //data update
        $water = Water::find($id);
        $water->amount =request('amount');
        $water->size =request('size');
        $water->price =request('price');
        $water->shop_id =request('shop');
        $water->image = $photo; 
        $water->save();

        return redirect()->route('water.index');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $water = Water::find($id);
        $water->delete();

        return redirect()->route('water.index');
    }
}
