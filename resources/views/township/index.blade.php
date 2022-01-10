@extends('maintemplate')
@section('content')
<div class="container">
    <div class="row">
      <!-- Blog Entries Column -->
      <div class="col-md-8">
        <h1 class="my-4">
          <small>Township Items</small>
        </h1>
        <!-- Blog Post -->
  <a href="{{route('township.create')}}"class="btn btn-primary">Additems</a>
        <table class="table  table-bordered" cellpadding="10"  cellspacing="0">
            <thead>
            <tr>
              <th>No</th>
              <th>Name</th>
              <th colspan="2">Action</th>
            </tr>
          </thead>
          <tbody>
               @php
             $i=1; 
            @endphp  
            @foreach($township as $row)
            <tr>
              <td>{{$i++}}</td>  
              <td>{{$row->name}}</td>
              <td>
                <a href="{{route('township.edit',$row->id)}}"class="btn btn-info">Edit</a>
               </td>
               <td>
                 <form method="post" action="{{route('township.destroy',$row->id)}}">
                   @csrf
                   @method('DELETE')
                   <input type="submit" class="btn btn-danger" value="Delete">
                 </form>
                  @endforeach

               </td>
           </tr>
           
          </tbody>
        </table>
          
        </div>
        </div>
        
      
    <!-- /.row -->
  </div>



@endsection