@extends('maintemplate')
@section('content')

<div class="container">
	<h2 class="text-center">Bottle water Edit Form</h2>
<!-- @if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif -->
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
      <form method="post" action="{{route('water.update',$water->id)}}" enctype="multipart/form-data">
          @csrf
          @method('PUT')
             <div class="form-group">
                <input type="text" name="amount" class="form-control" value="{{$water->amount}}">
             </div>
           
            <div class="form-group">
               <input type="text" name="size" class="form-control" value="{{$water->size}}">
            </div>
           
            <div class="form-group">
               <input type="number" name="price" class="form-control" value="{{$water->price}}">
            </div>
           
          <div class="form-group">
              <label>Photo:</label><span class="text-danger">[supported file types:jpeg,png]</span>
              <input type="file" name="photo" class="form-control">
              <img src="{{asset($water->image)}}" class="img-fluid w-50">
              <input type="hidden" name="oldphoto" value="{{$water->image}}">
          </div>
          <div class="form-group">
            <label>Shop:</label>
              <select name="shop" class="form-control">
                <option value="">Choose Shop</option>
                  @foreach($shop as $row)
                  <option value="{{$row->id}}"
                  @if($row->id == $water->shop_id)
                  {{'selected'}}
                  @endif
                  >{{$row->name}}
                  </option>
                @endforeach
              </select>
          </div>
          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Update">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection