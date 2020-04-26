@extends('layouts.master')

@section('title', 'FAKULTAS')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item active">Fakultas</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
      	Daftar Fakultas
      	<a href="{{ route('faculties.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
      </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($faculties as $faculty)
      	  <div class="col-md-3 mb-3">
      	    <div class="card h-100 m-0 text-center">
      	      <div class="card-body d-flex justify-content-center bg-{{ $faculty->color }}">
      	      	<span class="align-self-center">
	      	        <h1><i class="{{ $faculty->icon }}"></i></h1>
	      	        <h2 class="card-text">{{ strtoupper($faculty->name) }}</h2>
      	        </span>
      	      </div>
      	      <div class="card-footer">
      	      	<a href="{{ route('faculties.edit', $faculty) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	        <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $faculty->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </div>
      	    </div>
      	  </div>
      	  @empty
      	  <p>Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($faculties as $faculty)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $faculty->id }} @endslot
		      		@slot('title') Hapus Posisi @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $faculty->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $faculty->name }}</strong>?</p>
		      		<form action="{{ route('faculties.destroy', $faculty) }}" method="post" id="form-delete-{{ $faculty->id }}">
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
	  $(document).ready(function () {
	    function formatState (state) {
	      if (!state.id) { return state.text; }
	      var $state = $(
	        '<i class="fas fa-square text-'+state.element.value.toLowerCase()+'"> '+state.element.value.toLowerCase()+'</i>'
	     	);
	     	return $state;
	    };

	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	      templateResult: formatState,
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