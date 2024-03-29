@extends('layouts.master')

@push('css')
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

@section('title', 'POSISI')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item active">Posisi</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
	      Daftar Posisi
	      <span class="float-right">
		      <a href="{{ route('positions.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
	      </span>
	  </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($positions as $position)
      	  <div class="col-md-3 mb-3">
      	    <div class="card h-100 m-0 text-center">
      	      <div class="card-body">
      	      	<h1><i class="{{ $position->icon }}"></i></h1>
	      	      <h2 class="card-text">{{ $position->name }}</h2>
      	      </div>
      	      <div class="card-footer">
      	      	<a href="{{ route('positions.edit', $position) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	        <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $position->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </div>
      	    </div>
      	  </div>
      	  @empty
      	  <p>Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($positions as $position)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $position->id }} @endslot
		      		@slot('title') Hapus Posisi @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $position->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $position->name }}</strong>?</p>
		      		<form action="{{ route('positions.destroy', $position) }}" method="post" id="form-delete-{{ $position->id }}">
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