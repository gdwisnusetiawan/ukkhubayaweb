@extends('layouts.master')

@push('css')
	<!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.css') }}">
  <!-- Tempusdominus Bbootstrap 4 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.min.css') }}">
@endpush

@section('title', 'PROFIL')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Profil</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Ubah Profil
      </h5>
      <div class="card-body">
      	<form action="{{ route('profiles.update', $profile) }}" method="post" class="form-horizontal" id="form-edit" enctype="multipart/form-data">
	        	@csrf
	        	@method('put')
	        	<div class="form-group row">
	            <label for="name" class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') ?? $profile->name }}" required autocomplete="name" placeholder="Nama">
	              @error('name')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="logo" class="col-sm-2 col-form-label">Logo</label>
	            <div class="col-sm-10">
	            	<div class="custom-file">
	            	  <input type="file" class="custom-file-input form-control @error('logo') is-invalid @enderror" id="customFile" name="logo" value="{{ old('logo') }}" autocomplete="logo" onchange="readURL(this);">
	            	  <label class="custom-file-label" for="customFile">Choose file</label>
	            	  @error('logo')
	            	    <span class="invalid-feedback" role="alert">
	            	      <strong>{{ $message }}</strong>
	            	    </span>
	            	  @enderror
	            	</div>
	            	<small class="form-text text-muted">
	            		Max Size: 1,000 KB (1 MB), Allowed Type: JPEG or PNG.
	            	</small>

	            	<img src="{{ asset($profile->logo) }}" id="logoDisplay" class="img-fluid img-thumbnail mt-3" alt="Logo Profil" style="max-width: auto; height: 240px;">
	            </div>
	          </div>
	          <div class="form-group row">
              <label for="established" class="col-sm-2 col-form-label">Tanggal Berdiri</label>
              <div class="col-sm-10">
	              <div class="input-group date" id="established" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input @error('established') is-invalid @enderror" data-target="#established" data-toggle="datetimepicker" name="established" autocomplete="off" value="{{ old('established') ?? $profile->established }}">
                  <div class="input-group-append" data-target="#established" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-clock"></i></div>
                  </div>
                  @error('established')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
            </div>
            <div class="form-group row">
	            <label for="address" class="col-sm-2 col-form-label">Alamat</label>
	            <div class="col-sm-10">
	              <textarea class="form-control @error('address') is-invalid @enderror" name="address" autocomplete="address"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('address') ?? $profile->address }}</textarea>
	              @error('address')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="vision" class="col-sm-2 col-form-label">Visi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('vision') is-invalid @enderror" name="vision" autocomplete="vision"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('vision') ?? $profile->vision }}</textarea>
	              @error('vision')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="mission" class="col-sm-2 col-form-label">Misi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('mission') is-invalid @enderror" name="mission" autocomplete="mission"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('mission') ?? $profile->mission }}</textarea>
	              @error('mission')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('description') is-invalid @enderror" name="description" autocomplete="description"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ old('description') ?? $profile->description }}</textarea>
	              @error('description')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('profiles.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- Summernote -->
	<script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- InputMask -->
	<script src="{{ asset('admin-lte/plugins/moment/moment.min.js') }}"></script>
	<script src="{{ asset('admin-lte/plugins/inputmask/min/jquery.inputmask.bundle.min.js') }}"></script>
	<!-- Tempusdominus Bootstrap 4 -->
	<script src="{{ asset('admin-lte/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>

	<script type="text/javascript">
		$(document).ready(function () {
			$('#customFile').on('change',function(){
		    //get the file name
		    var fullPath = $(this).val();
		    if (fullPath) {
	        var startIndex = (fullPath.indexOf('\\') >= 0 ? fullPath.lastIndexOf('\\') : fullPath.lastIndexOf('/'));
	        var fileName = fullPath.substring(startIndex);
	        if (fileName.indexOf('\\') === 0 || fileName.indexOf('/') === 0) {
	          fileName = fileName.substring(1);
	        }
	        //replace the "Choose a file" label
	      	$(this).next('.custom-file-label').html(fileName);
		    }
		  });
		});
		function readURL(input) {
	    if (input.files && input.files[0]) {
	      var reader = new FileReader();

	      reader.onload = function (e) {
	        $('#logoDisplay')
	          .attr('src', e.target.result)
	          .style.width('auto')
	          .style.height('240px');
	      };

	      reader.readAsDataURL(input.files[0]);
	    }
	  }

	  // Summernote
    $('.textarea').summernote({
    	placeholder: 'write here . . .',
    	height: 200,
    });

    //Date Time Picker
    $('#established').datetimepicker({
      format: 'Y-MM-DD'
    });
	</script>
@endpush