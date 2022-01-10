@extends('maintemplate')
@section('content')
	<div class="container">
    <div class="row my-5">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<h1>Laundry Edit Form</h1>
          @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif

        <form method="post" action="{{route('laundry.update',$laundry->id)}}" enctype="multipart/form-data">
         @csrf
         @method('PUT')
         <!-- <div class="form-group">
            <label>Categories</label>
            <select name="category" class="form-control">
              <option value="">Choose Category</option>
             {-- accept data and loop--}
              @foreach($categories as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
          </div> -->
           <div class="form-group">
            <label>Categories</label>
            <select name="category" class="form-control">
              <option value="">Choose Category</option>
             {-- accept data and loop--}
              @foreach($categories as $row)
              <option value="{{$row->id}}"
                @if($row->id==$laundry->category_id){{'selected'}}
                @endif
                >{{$row->name}}</option >
              @endforeach
            </select>
          </div>
          <!-- <div class="form-group">
            <label>Shops</label>
            <select name="shop" class="form-control">
              <option value="">Choose Shops</option>
             {-- accept data and loop--}
             @foreach($categories as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
          </div> -->
           <div class="form-group">
            <label>Shops</label>
            <select name="shop" class="form-control">
              <option value="">Choose Shop</option>
             {-- accept data and loop--}
              @foreach($shops as $row)
              <option value="{{$row->id}}"
                @if($row->id==$laundry->category_id){{'selected'}}
                @endif
                >{{$row->name}}</option >
              @endforeach
            </select>
          </div>
          <div class="form-group">
          <label>Price:</label>
          <input type="text" name="price" class="form-control" value="{{$laundry->price}}">
          </div>
          <div class="form-group">
          <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
          </div>
        </form>   
      </div>
    </div>
  </div>
@endsection
အပြန်အလှန်စကားဝိုင်း ပြီးဆုံးပါပြီ
မက်ဆေ့တစ်စောင် ရိုက်ပါ...