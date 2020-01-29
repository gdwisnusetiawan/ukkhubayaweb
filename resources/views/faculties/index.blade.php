@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.6.1/css/font-awesome.min.css" rel="stylesheet"/>
  <style type="text/css">
  	table.dataTable tbody td {
  	  vertical-align: middle;
  	}
  </style>
@endpush

@section('title', 'FAKULTAS')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Fakultas</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
      	Daftar Fakultas
      	<button type="button" class="btn btn-primary float-right" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i> Tambah</button>
      </h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($faculties as $faculty)
      	  <div class="col-md-3 mb-3">
      	  	<a href="{{ route('faculties.edit', $faculty) }}" type="button" class="btn btn-block btn-light h-100">
	      	    <div class="card h-100 m-0 text-center bg-{{ $faculty->color }}">
	      	      <div class="card-body d-flex justify-content-center">
	      	      	<span class="align-self-center">
		      	        <h1><i class="{{ $faculty->icon }}"></i></h1>
		      	        <h2 class="card-text">{{ strtoupper($faculty->name) }}</h2>
	      	        </span>
	      	      </div>
	      	    </div>
      	  	</a>
      	  </div>
      	  @empty
      	  <p>Tidak ada data.</p>
	      	@endforelse

	      	<!-- Modal Add -->
	      	@component('components.modal')
	      		@slot('id') modal-add @endslot
	      		@slot('title') Tambah Fakultas @endslot
	      		@slot('button_type') primary @endslot
	      		@slot('button_name') Tambah @endslot
	      		@slot('form_id') form-add @endslot

	      		<form action="{{ route('faculties.store') }}" method="post" class="form-horizontal" id="form-add">
		        	@csrf

		          <div class="form-group row">
		            <label for="name" class="col-sm-2 col-form-label">Nama</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="Nama">
		              @error('name')
		                <span class="invalid-feedback" role="alert">
		                  <strong>{{ $message }}</strong>
		                </span>
		              @enderror
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="color" class="col-sm-2 col-form-label">Warna</label>
		            <div class="col-sm-10">
		              <select class="form-control select2bs4 @error('color') is-invalid @enderror" name="color" required style="width: 100%;">
		              	@foreach ($colors as $color)
		              		<option value="{{ $color }}" class="text-{{ $color }}">{{ $color }}</option>
		              	@endforeach
                  </select>
		              @error('color')
		                <span class="invalid-feedback" role="alert">
		                  <strong>{{ $message }}</strong>
		                </span>
		              @enderror
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ old('icon') }}" required autocomplete="icon" autofocus placeholder="ex: fas fa-circle">
		              <small class="form-text text-muted">
		                You can see all supported icons here: <a href="https://fontawesome.com/icons?d=gallery&m=free" target="_BLANK">Font Awesome</a><br>
		                <a href="#">How to use it?</a>
		              </small>
		              @error('icon')
		                <span class="invalid-feedback" role="alert">
		                  <strong>{{ $message }}</strong>
		                </span>
		              @enderror
		            </div>
		          </div>
		        </form>
	      	@endcomponent
	      	@if ($errors->any())
		      	@push ('js')
		      		<script type="text/javascript">
		      			$('#modal-add').modal('show')
		      		</script>
		      	@endpush
	      	@endif
	      	<!-- /.modal -->
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
	<!-- Select2 -->
	<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
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