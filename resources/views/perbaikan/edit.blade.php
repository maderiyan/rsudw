@extends('layout.lte-layout')
@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Insert Perbaikan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('perbaikan.index') }}">Perbaikan</a></li>
            <li class="breadcrumb-item active">Insert Perbaikan</li>
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
        <div class="col-12">
          <form method="post" action="{{ route('perbaikan.update', $perbaikan->id) }}">
            @method('PUT')
            @csrf
            <div class="card">
              <div class="card-header">
                <h3>Edit Data Perbaikan</h3>
              </div>
              <div class="card-body">
                @if ($errors->any())
                  <div class="alert alert-danger">
                    <div class="alert-title"><h4>Whoops!</h4></div>
                      There are some problems with your input.
                      <ul>
                        @foreach ($errors->all() as $error)
                          <li>{{ $error }}</li>
                        @endforeach
                      </ul>
                  </div> 
                @endif

                @if (session('success'))
                  <div class="alert alert-success">{{ session('success') }}</div>
                @endif

                @if (session('error'))
                  <div class="alert alert-danger">{{ session('error') }}</div>
                @endif

                <div class="mb-3">
                  <label class="form-label">Judul</label>
                  <input type="text" class="form-control" name="judul" value="{{ old('judul', $perbaikan->judul) }}" placeholder="Judul">
                </div>
                <div class="mb-3">
                  <label class="form-label">Keterangan</label>
                  <input type="text" class="form-control" name="keterangan" value="{{ old('keterangan', $perbaikan->keterangan) }}"  placeholder="Keterangan">
                </div>
                <div class="mb-3">
                  <label class="form-label">Status</label>
                  <select class="form-control" name="status">
                    <option value="open" @selected(old('status', $perbaikan->status) == 'open')>Open</option>
                    <option value="process" @selected(old('status', $perbaikan->status) == 'process')>Process</option>
                    <option value="closed" @selected(old('status', $perbaikan->status) == 'closed')>Closed</option>
                  </select>
                </div>
              </div>
              <div class="card-footer">
                <button class="btn btn-primary" type="submit">Update</button>
              </div>
            </div>
          </form>
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection