@extends('layouts.master')

@push('css')
@endpush

@section('title', 'PROGRAM KERJA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('periods.index') }}">Program Kerja</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Ubah Program Kerja
      </h5>
      <div class="card-body">
      	<form action="{{ route('programs.update', $program) }}" method="post" class="form-horizontal" id="form-edit" enctype="multipart/form-data">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="name" class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $program->name }}" required autocomplete="name" placeholder="Nama">
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
	            	  <input type="file" class="custom-file-input form-control @error('logo') is-invalid @enderror" id="customFile" name="logo" value="{{ $program->logo }}" required autocomplete="logo" onchange="readURL(this);">
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
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('programs.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Tambah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-6">
  	<img src="{{ asset($program->logo) }}" id="logoDisplay" class="img-fluid img-thumbnail" alt="{{ $program->logo }}" style="max-width: 100%; height: auto;">
  </div>
</div>
<!-- /.row -->
@endsection

@push('js')
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
          .style.width('100%')
          .style.height('auto');
      };

      reader.readAsDataURL(input.files[0]);
    }
  }
</script>
@endpush