@extends('layouts.master')

@inject('storage','Illuminate\Support\Facades\Storage')

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

@section('title', 'PROGRAM KERJA')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Program Kerja</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
	      Daftar Program Kerja
	      <span class="float-right">
		      <a href="{{ route('programs.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
	      </span>
	  </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($programs as $program)
      	  <div class="col-md-3 mb-3">
      	    <div class="card h-100 m-0 text-center">
      	    	<img src="{{ asset($program->logo) }}" alt="Logo Program Kerja" class="img-fluid">
      	      <div class="card-body">
	      	      <h2 class="card-text">{{ $program->name }}</h2>
      	      </div>
      	      <div class="card-footer">
      	      	<a href="{{ route('programs.edit', $program) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	      <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $program->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </div>
      	    </div>
      	  </div>
      	  @empty
      	  <p class="text-center w-100">Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($programs as $program)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $program->id }} @endslot
		      		@slot('title') Hapus Program Kerja @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $program->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $program->name }}</strong>?</p>
		      		<form action="{{ route('programs.destroy', $program) }}" method="post" id="form-delete-{{ $program->id }}">
		      			@csrf
		      			@method('delete')
		      		</form>
		      	@endcomponent
		      	<!-- /.modal -->
		    	@endforeach
      	</div>

      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- DataTables -->
	<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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