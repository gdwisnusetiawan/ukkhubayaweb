@extends('layouts.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <style type="text/css">
  	table.dataTable tbody td {
  	  vertical-align: middle;
  	}
  	@media screen and (max-width: 480px) {
	    .button-text {
        display: none;
	    }
  	}
  </style>
@endpush

@section('title', 'PERIODE')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="#">Periode</a></li>
  <li class="breadcrumb-item active">Lihat</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card">
    	<div class="card-header">
    		<a href="{{ url()->current() == url()->previous() ? route('periods.index') : url()->previous() }}"><i class="fas fa-chevron-left"></i> Kembali</a>
    	</div>
      <div class="card-body box-profile">
        <h3 class="profile-username text-center">{{ $period->name() }}</h3>
        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Anggota</b> <a class="float-right">0</a>
          </li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#divisi" data-toggle="tab">Divisi</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="divisi">
          	<div class="row">
              @forelse ($managements as $management)
              <div class="col-md-3 mb-3">
                <div class="card h-100 m-0 text-center">
                  <div class="card-body">
                    <h1><i class="{{ $management->position->icon }}"></i></h1>
                    <h2 class="card-text">{{ $management->position->name }}</h2>
                  </div>
                  <div class="card-footer">
                    <a href="{{ route('managements.edit', $management) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
                    <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $management->id }}"><i class="fas fa-trash"></i> Hapus</button>
                  </div>
                </div>
              </div>
              @empty
              <p class="text-center w-100">Tidak ada data.</p>
              @endforelse

              @foreach ($managements as $management)
              <!-- Modal Delete -->
                @component('components.modal')
                  @slot('id') modal-delete-{{ $management->id }} @endslot
                  @slot('title') Hapus Divisi @endslot
                  @slot('button_type') danger @endslot
                  @slot('button_name') Hapus @endslot
                  @slot('form_id') form-delete-{{ $management->id }} @endslot

                  <p>Apakah Anda yakin ingin menghapus data <strong>{{ $management->position->name }}</strong> pada <strong>{{ $period->name() }}</strong>?</p>
                  <form action="{{ route('managements.destroy', $management) }}" method="post" id="form-delete-{{ $management->id }}">
                    @csrf
                    @method('delete')
                  </form>
                @endcomponent
                <!-- /.modal -->
              @endforeach
            </div>
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(function () {
	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false,
	    });

	    const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

	    if('{{ session("status") }}') {
	    	Toast.fire({
	        type: 'success',
	        title: '{{ session("status") }}'
	      })
	    }
	  });
	</script>
@endpush