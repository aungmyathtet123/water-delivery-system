@extends('maintemplate')
@section('content')

<div class="container">
  <h2 class="text-center">Bottled water Create Form</h2>
@if ($errors->any())
    <div class="alert alert-danger">
        <ul>
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif
    <div class="row">
      <div class="col-lg-8 col-md-10 mx-auto">
        <form method="post" action="{{route('water.store')}}" enctype="multipart/form-data">
          @csrf
          <div class="form-group">
            <label>Amount:</label>
            <input type="text" name="amount" class="form-control">
          </div>

           <div class="form-group">
            <label>Size:</label>
            <input type="text" name="size" class="form-control">
          </div>

           <div class="form-group">
            <label>Price:</label>
            <input type="text" name="price" class="form-control">
          </div>
          <select name="shop" class="form-control">
              <option value="">Choose Shop</option>
              @foreach($shop as $row)
              <option value="{{$row->id}}">{{$row->name}}
              </option>
              @endforeach
            </select>
           <div class="form-group">
            <label>Image:</label>
            <input type="file" name="photo" class="form-control">
          </div>
          <div class="form-group">
            <input type="submit" name="btnsubmit" class="btn btn-primary" value="Save">
          </div>
        </form>
      </div>
    </div>
  </div>
@endsection