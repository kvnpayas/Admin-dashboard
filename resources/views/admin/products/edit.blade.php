@extends('admin.app')

@section('content')
      <!-- Content Wrapper. Contains page content -->
      <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <div class="content-header">
          <div class="container-fluid">
            <div class="row mb-2">
              <div class="col-sm-6">
                <h1 class="m-0">Edit Product</h1>
              </div><!-- /.col -->
            </div><!-- /.row -->
          </div><!-- /.container-fluid -->
        </div>
        <!-- /.content-header -->
    
        <!-- Main content -->
        <section class="content">
          <div class="container-fluid">

            <!-- Main row -->
            <div class="row">
              <!-- Left col -->
              <div class="col-md-8">
                <div>
                    <router-view></router-view>   
                    {{-- <Edit-product :auth-user="{{ Auth::user() }}"></Edit-product> --}}
                </div>
              </div>
              <!-- /.col -->
            </div>
            <!-- /.row -->
          </div><!--/. container-fluid -->
        </section>
        <!-- /.content -->
      </div>
      <!-- /.content-wrapper -->
    
      <!-- Control Sidebar -->
      <aside class="control-sidebar control-sidebar-dark">
        <!-- Control sidebar content goes here -->
      </aside>
      <!-- /.control-sidebar -->
  <!-- ./wrapper -->
  
@endsection