@extends('layouts.master')

@push('css')
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">
@endpush

@section('title', 'FAKULTAS')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Periode</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
      	Daftar Periode
      	<a href="{{ route('periods.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
      </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($periods as $period)
      	  <div class="col-md-3 mb-3">
      	    <div class="card h-100 m-0 text-center">
      	      <div class="card-body">
	      	      <h1 class="card-text">{{ $period->year_begin }} / {{ $period->year_end }}</h1>
      	      </div>
      	      <div class="card-footer">
      	      	<a href="{{ route('periods.edit', $period) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	        <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $period->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </div>
      	    </div>
      	  </div>
      	  @empty
      	  <p>Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($periods as $period)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $period->id }} @endslot
		      		@slot('title') Hapus Periode @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $period->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $period->year_begin }} / {{ $period->year_end }}</strong>?</p>
		      		<form action="{{ route('periods.destroy', $period) }}" method="post" id="form-delete-{{ $period->id }}">
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
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(document).ready(function () {
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