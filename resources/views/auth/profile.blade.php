@extends('layout.lte-layout')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Profile User</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('perbaikan.index') }}">Home</a></li>
            <li class="breadcrumb-item active">Profile</li>
          </ol>
        </div><!-- /.col -->
      </div><!-- /.row -->
    </div><!-- /.container-fluid -->
  </div>
  <!-- /.content-header -->
  <!-- Main content -->
  <section class="content">
    <div class="container-fluid">
      <div class="row">
        <div class="col-12 col-md-6 offset-md-3">
          <div class="card">
            <div class="card-body login-card-body">
              <div class="mb-3">
                <h5 class="card-title font-weight-bold title-big">Name:</h5>
                <p class="card-text">I Made Riyan</p>
              </div>
              <div class="mb-3">
                <h5 class="card-title font-weight-bold title-big" id="">Email:</h5>
                <p class="card-text">made@gmail.com</p>
              </div>
              <div class="mb-3">
                <h5 class="card-title font-weight-bold title-big">Ruangan:</h5>
                <p class="card-text">IGD(LY001)</p>
              </div>
            </div>
            <!-- /.login-card-body -->
          </div>
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection