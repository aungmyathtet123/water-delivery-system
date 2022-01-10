@extends('maintemplate')
@section('content')

<div id="content-wrapper" class="d-flex flex-column">

      <div id="content">
          
            <div class="card-header py-3">
              <h6 class="m-0 font-weight-bold text-primary">Shops</h6>
              
            </div>
            <div class="card-body">
              <form method="post" action="{{route('shop.store')}}" enctype="multipart/form-data">
              	@csrf
                <label>Name:</label>
                <input type="text" name="name" id="name" class="form-control" placeholder="enter your name"><br>
                <label>Phone Number:</label>
                <input type="number" name="phone" id="price" class="form-control" placeholder="enter you phone number"><br>
                <label>Enter your address:</label>
                <textarea name="address"  class="form-control" placeholder="enter you address"></textarea><br>
                <div class="form-group">
                <label>photo</label><span class="text-danger">[ Support file types: jpeg,png,jpg]</span>
                <input type="file" name="photo" class="form-control">
              </div>

                <div class="form-group">
                  <label>select service</label>
                  <select name="service" class="form-control">
                  <option value="">Choose</option>
                @foreach($service as $row)
                <option value="{{$row->id}}">{{$row->name}}
                </option>
              @endforeach
            </select>
                </div>
                <div class="form-group">
                  <label>select township</label>
                  <select name="township" class="form-control">
                  <option value="">Choose</option>
                @foreach($township as $row)
                <option value="{{$row->id}}">{{$row->name}}
                </option>
              @endforeach
            </select>
                </div>
                <input type="submit" name="Submit" value="submit">
              </form>
            </div>
        </div>
      </div>
      


@endsection