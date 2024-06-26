@extends('layout.lte-layout')

@section('content')
  <!-- Content Header (Page header) -->
  <div class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1 class="m-0">History Perbaikan</h1>
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
              <a class="btn btn-primary ml-2 btn-sm" href="{{ route('perbaikan.ajukan') }}">Ajukan Perbaikan Baru</a>
            </div>
            <!-- /.card-header -->
            <div class="card-body">
              @if (session('success'))
                <div class="alert alert-success">{{ session('success') }}</div>
              @endif

              @if (session('error'))
                <div class="alert alert-danger">{{ session('error') }}</div>
              @endif
              <table id="history-pengajuan" class="table table-bordered table-hover">
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
                      <a href="{{ route('perbaikan.editpegawai', ['id' => $list->id]) }}" class="btn btn-secondary btn-sm">edit</a>
                      <a href="#" class="btn btn-sm btn-danger" onclick="
                        event.preventDefault();
                        if (confirm('Do you want to remove this?')) {
                          document.getElementById('delete-row-{{ $list->id }}').submit();
                        }">
                        delete
                      </a>
                      <form id="delete-row-{{ $list->id }}" action="{{ route('perbaikan.hapusperbaikan', ['id' => $list->id]) }}" method="POST">
                        @method('DELETE')
                        @csrf
                      </form>
                    </td>
                  </tr>
                  @empty
                  <tr>
                    <td>Data kosong</td>
                  </tr>
                  @endforelse
                </tbody>
                <tfoot>
                  <tr>
                    <th>ID</th>
                    <th>Judul</th>
                    <th>Tanggal</th>
                    <th>Status</th>
                    <th>Action</th>
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
      let table = new DataTable('#history-pengajuan');
    });
  </script>
@endsection