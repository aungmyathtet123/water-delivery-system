<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Service;

class ServiceController extends Controller
{
    public function __construct()
        {
            $this->middleware(['role:admin']);
            }
    /**
     * Display a listing of the resource.
     *
     * index@return \Illuminate\Http\Response
     */
    public function index()
    {
            $services=Service::All();
            return view('service.index',compact('services'));       
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('service.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        if($request->hasfile('photo')){
            $photo=$request->file('photo');
            $name=time().','.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo='';
        }

        $service=new Service();
        $service->name=request('name');
        $service->photo=$photo;
        $service->save();
        return redirect()->route('service.index');
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
        $service=Service::find($id);
        return view('service.edit',compact('service'));
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

        if($request->hasfile('photo')){
            $photo = $request->file('photo');
            $name = time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo = '/storage/image/'.$name;
        }else{
            $photo = request('oldphoto');
        }

        $service=Service::find($id);
        $service->name=request('name');
        $shop->photo=request('photo');
        $service->save();
        return redirect()->route('service.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $service=Service::find($id);
        $service->delete();
        return redirect()->route('service.index');
    }
}
