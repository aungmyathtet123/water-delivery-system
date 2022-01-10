@extends('maintemplate')
@section('content')
<div class="container">
  <div class="row">
      <div class="col-md-8">
         <h1 class="my-4">Bottle Water Product </h1>
         <a href="{{route('water.create')}}" class="btn btn-primary my-2">Add item</a>
        <div class="card mb-4">
          <table  cellspacing ="0" class="table table-responsive">
            <thead>
              <th>ID</th>
              <th>Amount</th>
              <th>Size</th>
              <th>Price</th>
              <th>image</th>
              <th class="text-center" colspan="2">Action</th>
            </thead>
            <tbody>
              @php
                $i=1;
              @endphp
               @foreach($waters as $row)
                <tr>
                 <td>{{$i++}}</td>
                 <td>{{$row->amount}} kg</td>
                  <td>{{$row->size}}</td>
                  <td>{{$row->price}}</td>
                 <td><img src="{{$row->image}}" class="w-25"></td>
                 <td><a href="{{route('water.edit',$row->id)}}" class="btn btn-info mx3">Edit</a></td>
                  <td>
                    <form method="post" action="{{route('water.destroy',$row->id)}}">
                      @csrf
                      @method('DELETE')
                      <input type="submit" class="btn btn-danger" value="DELETE">
                    </form>
                </td>
              </tr>
                  @endforeach;
            </tbody>
          </table>
        </div>
      </div>
  </div>
</div>

@endsection