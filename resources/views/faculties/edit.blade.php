@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('title', 'FAKULTAS')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('faculties.index') }}">Fakultas</a></li>
  <li class="breadcrumb-item active">Edit</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">
      	Ubah Fakultas
      </h5>
      <div class="card-body">
      	<form action="{{ route('faculties.update', $faculty) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	          <div class="form-group row">
	            <label for="name" class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $faculty->name }}" required autocomplete="name" placeholder="Nama">
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
	              		<option value="{{ $color }}" class="text-{{ $color }}" {{ $faculty->color == $color ? 'selected' : '' }}>{{ $color }}</option>
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
	              <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $faculty->icon }}" required autocomplete="icon" autofocus placeholder="ex: fas fa-circle">
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
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('faculties.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
	          <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#modal-delete">Hapus</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->

    <!-- Modal Delete -->
    @component('components.modal')
    	@slot('id') modal-delete @endslot
    	@slot('title') Hapus Fakultas @endslot
    	@slot('button_type') danger @endslot
    	@slot('button_name') Hapus @endslot
    	@slot('form_id') form-delete @endslot

    	<p>Apakah Anda yakin ingin menghapus data <strong>{{ $faculty->name }}</strong>?</p>
    	<form action="{{ route('faculties.destroy', $faculty) }}" method="post" class="form-horizontal" id="form-delete">
    		@csrf
    		@method('delete')
    	</form>
    @endcomponent
    <!-- /.modal -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
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