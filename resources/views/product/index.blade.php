@extends('master-dasboard.main')

@section('datatables')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('adminlte/bower_components/datatables.net-bs/css/dataTables.bootstrap.min.css')}}">
  <style>
    .btn-success {
    background-color: #48aa33;
    border-color: #48aa33;
    }
    
    .bg-green, .callout.callout-success, .alert-success, .label-success, .modal-success .modal-body {
    background-color: #48aa33 !important;
    }
    
    .pagination>.active>a, .pagination>.active>a:focus, .pagination>.active>a:hover, .pagination>.active>span, .pagination>.active>span:focus, .pagination>.active>span:hover {
    z-index: 3;
    color: #fff;
    cursor: default;
    background-color: #48aa33 !important;
    border-color: #48aa33 !important;
    }
    
    .bg-green-active, .modal-success .modal-header, .modal-success .modal-footer {
    background-color: #48aa33 !important;
        
    }
    
        
    .table>thead>tr>th {
    border-bottom: 2px solid #ffffff;
    background: #48aa33 !important;
    color: #ffffff;
        
    }
    
    .box {
    border-top: 3px solid #48aa33 !important;
    }
  </style>
@endsection

@section('content')


  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Product
        <small>Managemen Product</small>
      </h1>
    </section>

    <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-xs-12">
          <div class="box">
            <div class="box-header">
              <h3 class="box-title">List Product</h3>
              <div class="box-tools pull-right">
                <button class="btn btn-sm btn-success" data-toggle="modal" data-target="#modal-success">
                    <i class="fa fa-plus"></i> Add
                </button>
              </div>
            </div>
            <!-- /.box-header -->
            <div class="box-body">
            <div class="table-responsive">
              <table id="example1" class="table table-bordered table-striped">
                <thead>
                <tr>
                  <th>Name</th>
                  <th>Stock</th>
                  <th>Action</th>
                </tr>
                </thead>
                <tbody>
                @foreach($products as $product)
                <tr>
                  <td>{{$product->name}}</td>
                  <td>{{$product->stock}}<td>
                    <div class="dropdown">
                     <button class="btn btn-sm btn-flat btn-block bg-green dropdown-toggle" type="button" data-toggle="dropdown" aria-expanded="false"> Action <span class="caret"></span></button>
                     <ul class="dropdown-menu animated-fast fadeIn">
                         <li><a class="btn-edit" data-toggle="modal" data-target="#modalUpdateProduct{{ $product->id }}" role="button" style="color: #7b0c0c;" ><i class="fa fa-pencil"></i>Update Product</a></li>
                         </li><li><a class="btn-delete" data-toggle="modal" data-target="#modalHapusBarang{{ $product->id }}" role="button" style="color: #7b0c0c;" ><i class="fa fa-trash"></i>Delete Product</a></li>
                     </ul>
                     </div>
                </td>
                </tr>
                <!-- modal-update -->
                <div class="modal fade" id="modalUpdateProduct{{ $product->id }}">
                  <div class="modal-dialog">
                    <div class="modal-content">
                      <div class="modal-header">
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                          <span aria-hidden="true">&times;</span></button>
                        <h4 class="modal-title">Edit Data Product</h4>
                      </div>
                      <div class="modal-body">
                        <!--FORM TAMBAH BARANG-->
                        <form action="products/{{$product->id}}" method="POST">
                            @method('PUT')
                            @csrf
                        <div class="form-group">
                        <label for="">Nama</label>
                        <input type="text" class="form-control" name="name" value="{{ $product->name}}">
                        </div>
                        <div class="form-group">
                        <label for="">Stock</label>
                        <input type="number" class="form-control" name="stock" value="{{ $product->stock}}">
                        </div>
                        <div class="modal-footer">
                        <button type="button" class="btn" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-success">Submit</button>
                        </div>
                        </form>
                        <!--END FORM TAMBAH BARANG-->
                      </div>
                   
                    </div>
                    <!-- /.modal-content -->
                  </div>
                  <!-- /.modal-dialog -->
                </div>
                <!-- modal-hapus -->
                 <div class="modal fade" id="modalHapusBarang{{ $product->id }}" tabindex="-1" aria-labelledby="modalHapusBarang" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-body">
                                    <h4 class="text-center">Apakah anda yakin menghapus Product ini? </h4>
                                    </div>
                                    <div class="modal-footer">
                                    <form action="products/{{$product->id}}" method="POST">
                                       @method('DELETE')
                                       @csrf
                                    <button type="submit" class="btn btn-success">Delete</button>
                                    </form>
                                    <button type="button" class="btn" data-dismiss="modal">Close</button>
                                </div>
                            </div>
                        </div>
                    </div>
                @endforeach
                </tbody>
              </table>
            </div>
            </div>
            <!-- /.box-body -->
          </div>
          <!-- /.box -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
    <!-- modal-add -->
       <div class="modal fade" id="modal-success">
          <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span></button>
                <h4 class="modal-title">Add New Product</h4>
              </div>
              <div class="modal-body">
                <!--FORM TAMBAH BARANG-->
                <form action="{{route('products.store')}}" method="POST">
                    @csrf
                <div class="form-group">
                <label for="">Nama Product</label>
                <input type="text" class="form-control" name="name" required>
                </div>
                <div class="form-group">
                <label>Stock Product</label>
                <input type="number" class="form-control" name="stock" required> 
                </div>
                <input name="is_deleted" type="hidden" value="0">
                <div class="modal-footer">
                <button type="button" class="btn" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-success">Submit</button>
                </div>
                </form>
                <!--END FORM TAMBAH BARANG-->
              </div>
           
            </div>
            <!-- /.modal-content -->
          </div>
          <!-- /.modal-dialog -->
        </div>
        <!-- /.modal -->
    </div>
@endsection
@section('datatables2')
    <!-- DataTables -->
    <script src="{{ asset('adminlte/bower_components/datatables.net/js/jquery.dataTables.min.js')}}"></script>
    <script src="{{ asset('adminlte/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js')}}"></script>
  <script>
  $(function () {
    $('#example1').DataTable()
    $('#example2').DataTable({
      'paging'      : true,
      'lengthChange': false,
      'searching'   : false,
      'ordering'    : true,
      'info'        : true,
      'autoWidth'   : false
    })
  })
</script>
@endsection
