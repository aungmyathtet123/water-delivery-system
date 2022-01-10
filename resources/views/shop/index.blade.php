@extends('maintemplate')
@section('content')

<div id="wrapper">

    <div id="content-wrapper" class="d-flex flex-column">
      <div id="content">
          <div class="card shadow mb-4">
            <div class="card-header py-3">
              <h4 class="m-0 font-weight-bold text-primary">Shop Table</h4>
              <a href="{{asset('shop/create')}}" class="btn-primary  btn btn-link ml-auto text-white" style="float:right" >AddShop</a>
            </div>
            <div class="card-body">
              <div class="table-responsive">
                <table class="table  table-bordered" cellpadding="10"  cellspacing="0" id="DataTables">
                  <thead>
                    <tr>
                      <th>Shop</th>
                      <th>Name</th>
                      <th>Address</th>
                      <th>Township_id</th>
                      <th colspan="2" class="text-center">Action</th>
                    </tr>
                  </thead >
                  
                  
                  <tbody>
                    
                    
                    @foreach($shops as $row):
                    
                   
                    <tr>
                      <td><img src="{{$row->image}}" width="100" height="100"></td>
                      <td>{{$row->name}}</td>
                      <td>{{$row->address}}</td>
                      <td>{{$row->township_id}}</td>
                      
                      <td>
                        <a href="{{route('shop.edit',$row->id)}}" class="btn btn-info">Edit</a>
                      </td>
                       <td><form action="{{route('shop.destroy',$row->id)}}" method="post">
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
        <!-- /.container-fluid -->

      </div>
      <!-- End of Main Content -->
</div>


@endsection