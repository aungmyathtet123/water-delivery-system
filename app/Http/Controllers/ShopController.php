<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Shop;
use App\Service;
use App\Township;
class ShopController extends Controller
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
        $shops=Shop::all();
        $service=Service::all();
        return view('shop.index',compact('shops','service'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $service=Service::all();
        $township=Township::all();
        return view('shop.create',compact('service','township'));

    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
           // dd($request);
        if($request->hasfile('photo')){
            $photo=$request->file('photo');
            $name=time().','.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo='';
        }


        $shop=new Shop();
        $shop->name=request('name');
        $shop->phone=request('phone');
        $shop->address=request('address');
        $shop->image=$photo;
        $shop->township_id=request('township');
        $shop->service_id=request('service');

        $shop->save();
        return redirect()->route('shop.index');


        
        
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $shop=Shop::find($id);
        
        return view('shop.detail',compact('shop'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $shop=Shop::find($id);
        
        return view('shop.edit',compact('shop'));
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
        $shop=Shop::find($id);
        $shop->name=request('name');
        $shop->phone=request('phone');
        $shop->address=request('address');
        $shop->image=request('photo');
        $shop->township_id=request('township');
        $shop->service_id=request('service');

        $shop->save();
        return redirect()->route('shop.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $shop=Shop::find($id);
        $shop->delete();
        return redirect()->route('shop.index');
    }
}
