@extends('maintemplate')
@section('content')
	<div class="container">
    <div class="row my-5">
      <div class="col-lg-8 col-md-10 mx-auto">
      	<h1>Laundry Create Form</h1>
         <!--  @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
            @endif -->
 <form method="post" action="{{route('laundry.store')}}" enctype="multipart/form-data">
         @csrf
        
          <div class="form-group">
            
          <select name="shop_id" class="form-control">

              <option value="">Choose shop</option>
             {-- accept data and loop--}
             @foreach($shops as $row)
              <option value="{{$row->id}}">{{$row->name}}</option>
              @endforeach
            </select>
          </div>
          <div class="form-group">

            <select name="service" class="form-control">
            <option value="">Choose laundryCat</option>
          @foreach($categories as $row)
          <option value="{{$row->id}}">{{$row->name}}
          </option>
        @endforeach
        </select>
          </div>
          <div class="form-group">
          <label>Price:</label>
          <input type="text" name="price" class="form-control">
          </div>
          <div class="form-group">
          <input type="submit" name="btnsubmit" class="btn btn-primary" value="Save">
          </div>
        </form>       
      </div>
    </div>
  </div>
@endsection