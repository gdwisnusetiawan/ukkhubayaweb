@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.css') }}">
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

@section('title', 'Profil')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Beranda</a></li>
  <li class="breadcrumb-item active">Profil</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
		@isset ($profile)
		<div class="card mb-3">
			<h5 class="card-header">
	    	Profil
	    	<span class="float-right">
	      	<a href="{{ route('profiles.edit', $profile) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
		      <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete"><i class="fas fa-trash"></i> Hapus</button>
	      </span>
	  	</h5>
      <!-- Modal Delete -->
    	@component('components.modal')
    		@slot('id') modal-delete @endslot
    		@slot('title') Hapus Kegiatan @endslot
    		@slot('button_type') danger @endslot
    		@slot('button_name') Hapus @endslot
    		@slot('form_id') form-delete @endslot

    		<p>Apakah Anda yakin ingin menghapus data profil <strong>{{ $profile->name }}</strong>?</p>
    		<form action="{{ route('profiles.destroy', $profile) }}" method="post" id="form-delete">
    			@csrf
    			@method('delete')
    		</form>
    	@endcomponent
    	<!-- /.modal -->
		  <div class="row no-gutters">
		    <div class="col-md-2">
		      <img src="{{ asset($profile->logo) }}" class="card-img img-fluid m-3" alt="Logo Kegiatan">
		    </div>
		    <div class="col-md-10">
		      <div class="card-body m-3">
		        <h3 class="card-title"><strong>{{ $profile->name }}</strong></h3>
		        <p class="card-text text-justify">Berdiri pada: <strong>{{ Carbon\Carbon::parse($profile->established)->format('d F Y') }}</strong></p>
		        <p class="card-text text-justify">{{ $profile->address }}</p>
		      </div>
		    </div>
		  </div>
		</div>

    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#address" data-toggle="tab">Deskripsi</a></li>
          <li class="nav-item"><a class="nav-link" href="#vision" data-toggle="tab">Visi</a></li>
          <li class="nav-item"><a class="nav-link" href="#mission" data-toggle="tab">Misi</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="address">
            <div class="card-text" id="textareaDescription"></div>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="vision">
          	<label for="textareaVision">Visi</label>
          	<div id="textareaVision"></div>
            <!-- <textarea id="textareaVision" class="textarea" name="vision" disabled style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $profile->vision }}</textarea> -->
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="mission">
	          <label for="textareaMission">Misi</label>
	            <div id="textareaMission"></div>
	            <!-- <textarea id="textareaMission" class="textarea" name="mission" disabled style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $profile->mission }}</textarea> -->
	        </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
    @else
    <div class="card mb-3">
			<h5 class="card-header">
	    	Profil
	    	<span class="float-right">
	    		<a href="{{ route('profiles.create') }}" type="button" class="btn btn-primary m-1"><i class="fas fa-plus"></i> Tambah</a>
	  	</h5>
		</div>
    @endisset
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- Select2 -->
	<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
	<!-- Summernote -->
  <script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(function () {
	  	//Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	      width: 'auto',
	    });

	    // Summernote
      $('.textarea').summernote({
        toolbar: [],
        height: 'auto',
        disableResizeEditor: true,
      });
      // $('#textareaAddress').summernote('disable');
      // $('#textareaVision').summernote('disable');
      // $('#textareaMission').summernote('disable');
      // $('#textareaHistory').summernote('disable');
      // $('#textareaDescription').summernote('disable');

      @if(isset($profile))
	      var vision = @json($profile->vision);
	      var mission = @json($profile->mission);
	      var description = @json($profile->description);
	      $('#textareaVision').html(vision);
	      $('#textareaMission').html(mission);
	      $('#textareaDescription').html(description);
      @endif

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
	    if('{{ session("error") }}') {
	    	Toast.fire({
	        type: 'error',
	        title: '{{ session("error") }}'
	      })
	    }
	  });
	</script>
@endpush