<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;


class CategoryController extends Controller
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
    /*public function __construct()
    {
        $this->middleware(['role:admin']);
    }*/


    public function index()
    {
         $categories=Category::all();
     return view ('category.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view ('category.create',compact('categories'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name'=>'required',
            'photo'=>'required|mimes:jpeg,png,jpg'

        ]);
        if ($request->hasfile('photo')) {
            $photo=$request->file('photo');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo="";
        }
        $category=new Category();
        $category->name=request('name');
        $category->image=$photo;
        $category->save();
        return redirect()->route('category.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $category=Category::find($id);
       //$post=Post::where('status',1)->first();
       return view ('category.detail',compact('categories'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
         $category=Category::find($id);//
      return view('category.edit',compact('category'));
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
            'name'=>'required',
            'photo'=>'mimes:jpeg,png,jpg'
        ]);

          if ($request->hasfile('photo')) {
            $photo=$request->file('photo');
            $name=time().'.'.$photo->getClientOriginalExtension();
            $photo->move(public_path().'/storage/image/',$name);
            $photo='/storage/image/'.$name;
        }else{
            $photo="";
        }
        $category=Category::find($id);
        $category->name=request('name');
         $category->image=$photo;
        $category->save();
        
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
         $category=Category::find($id);
        
        $category->delete();
        return redirect()->route('category.index');

    }
}