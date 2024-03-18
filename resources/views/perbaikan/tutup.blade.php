@extends('layout.lte-layout')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">Tutup Perbaikan</h1>
        </div><!-- /.col -->
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="{{ route('perbaikan.dashpegawai') }}">Home</a></li>
            <li class="breadcrumb-item active">Perbaikan</li>
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
          <div class="card">
            <div class="card-header">
              <h3 class="card-title">Data Perbaikan</h3>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
              <table id="example1" class="table table-bordered table-hover">
                <thead>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
                  </tr>
                </thead>
                <tbody>
                  @forelse ($listperbaikan as $list)
                  <tr>
                    <td>{{ $list['id'] }}</td>
                    <td>{{ $list['judul'] }}</td>
                    <td>{{ $list['keterangan'] }}</td>
                    <td>{{ $list['status'] }}</td>
                    <td>
                      <a href="{{ route('perbaikan.edit', ['id' => $list->id]) }}" class="btn btn-warning btn-sm">Tutup</a>
                    </td>
                  </tr>
                  <tr>
                    <td colspan="5">
                      @if ($list->eviden)
                        @foreach ($list->eviden as $image)
                          <a href="{{ asset('storage/eviden/'.$image->filename) }}" target="_blank">
                            <img src="{{ asset('storage/eviden/'.$image->filename) }}" style="width: 80px; height: 60px;">
                          </a>
                        @endforeach
                      @else
                        <p>No images available!</p>
                      @endif
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td colspan="4">Data kosong</td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                  </tr>
                </tfoot>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
    </div><!-- /.container-fluid -->
  </section>
  <!-- /.content -->
@endsection

@section('js-section')
  <!-- AdminLTE for demo purposes -->
  <script>
    $(function () {
      $("#example1").DataTable({
        "responsive": true, "lengthChange": false, "autoWidth": false,
        "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
      }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
    });
  </script>
@endsection