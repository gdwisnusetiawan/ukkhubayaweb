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

@section('title', 'KONTAK')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Kontak</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
	      Daftar Posisi
	      <span class="float-right">
		      <a href="{{ route('contacts.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
	      </span>
	  </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($contacts as $contact)
      	  <div class="col-md-3 mb-3">
      	    <div class="card h-100 m-0 text-center">
      	      <div class="card-body">
      	      	<h1><i class="{{ $contact->icon }}"></i></h1>
	      	      <h2 class="card-text">{{ $contact->name }}</h2>
      	      </div>
      	      <div class="card-footer">
      	      	<a href="{{ route('contacts.edit', $contact) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	      <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $contact->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </div>
      	    </div>
      	  </div>
      	  @empty
      	  <p class="text-center w-100">Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($contacts as $contact)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $contact->id }} @endslot
		      		@slot('title') Hapus Kontak @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $contact->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $contact->name }}</strong>?</p>
		      		<form action="{{ route('contacts.destroy', $contact) }}" method="post" id="form-delete-{{ $contact->id }}">
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