@extends('maintemplate')
@section('content')
	<div class="container">

    <div class="row">

      <!-- Blog Entries Column -->
      <div class="col-md-8">

        <h1 class="my-4">Laundry Item</small>
        </h1>
        <a href="{{route('laundry.create')}}" class="btn btn-primary my-2">Add item</a>
        <div class="table-responsive">
          <table class="table table-bordered"cellspacing="0" cellpadding="10">
            <thead>
              <tr>
                <th>No</th>
                <th>Price</th>
                <th>Shop_id</th>
                <th>Category_id</th>
                <th colspan="2" class="text-center">Action</th>
              </tr>
            </thead>
              <tbody>
                @php 
                $i=1;
                @endphp
                @foreach($laundries as $row)
                <tr>
                  <td>{{$i++}}</td>
                  <td>{{$row->price}}</td>
                  <td>{{$row->shop_id}}</td>
                  <td>{{$row->category_id}}</td>
                  <td><a href="{{route('laundry.edit',$row->id)}}" class="btn btn-info">Edit</a></td>
                  <td>
                    <form method="post" action="{{route('laundry.destroy',$row->id)}}">
                      @csrf
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger" value="Delete">
                  </form>
                  </td>
                </tr>
                @endforeach
              </tbody>
          
          </table>
        </div>
        
        
      </div>

      
      </div>

    </div>
@endsection

