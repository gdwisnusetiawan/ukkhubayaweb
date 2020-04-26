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

@section('title', 'Profil')

@section('breadcumb')
  <li class="breadcrumb-item">Beranda</li>
  <li class="breadcrumb-item active">Profil Organisasi</li>
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
          <li class="nav-item"><a class="nav-link" href="#contact" data-toggle="tab">Kontak</a></li>
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
          <div class="tab-pane" id="contact">
	          <label for="contact">Kontak</label>&nbsp;
	          <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i> Tambah</button>
	          <!-- Modal Add -->
	          @component('components.modal')
	            @slot('id') modal-add @endslot
	            @slot('title') Tambah Kontak @endslot
	            @slot('button_type') primary @endslot
	            @slot('button_name') Tambah @endslot
	            @slot('form_id') form-add @endslot

	            <form action="{{ route('profile.contact.store', $profile) }}" method="post" id="form-add">
	              @csrf

	              <div class="form-group row">
	                <label for="name" class="col-sm-2 col-form-label">Kontak</label>
	                <div class="col-sm-10">
	                  <select class="form-control select2bs4 @error('contact_id') is-invalid @enderror" name="contact_id" required style="width: 100%;">
	                    @foreach ($contacts as $contact)
	                      <option value="{{ $contact->id }}" {{ $contact->id == old('contact_id') ? 'selected' : '' }}>{{ $contact->name }}</option>
	                    @endforeach
	                  </select>
	                  @error('contact_id')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	              </div>
	              <div class="form-group row">
	                <label for="link" class="col-sm-2 col-form-label">Link</label>
	                <div class="col-sm-10">
	                  <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link" placeholder="Link menuju kontak">
	                  @error('link')
	                    <span class="invalid-feedback" role="alert">
	                      <strong>{{ $message }}</strong>
	                    </span>
	                  @enderror
	                </div>
	              </div>
	            </form>
	          @endcomponent
	          <!-- /.modal -->
	          @forelse($profile->contacts as $contact)
          		<li class="list-group-item d-flex justify-content-between align-items-center">
          	    <span>
                  <i class="{{ $contact->icon }}"></i> &nbsp; 
                  <a href="{{ $contact->pivot->link }}" target="_BLANK">{{ $contact->name }}</a> &nbsp;
                </span>
                <span>
                  <a href="{{ route('profile.contact.edit', [$profile, $contact]) }}" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
                  <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $contact->id }}"><i class="fas fa-trash"></i></button>
                </span>
          	  </li>
              @empty
              <p class="text-center w-100">Tidak ada kontak.</p>
              @endforelse

              @foreach ($profile->contacts as $contact)
                <!-- Modal Delete -->
                @component('components.modal')
                  @slot('id') modal-delete-{{ $contact->id }} @endslot
                  @slot('title') Hapus Kontak @endslot
                  @slot('button_type') danger @endslot
                  @slot('button_name') Hapus @endslot
                  @slot('form_id') form-delete-{{ $contact->id }} @endslot

                  <p>Apakah Anda yakin ingin menghapus data <strong>{{ $contact->name }}</strong>?</p>
                  <form action="{{ route('profile.contact.destroy', [$profile, $contact]) }}" method="post" id="form-delete-{{ $contact->id }}">
                    @csrf
                    @method('delete')
                  </form>
                @endcomponent
                <!-- /.modal -->
              @endforeach
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