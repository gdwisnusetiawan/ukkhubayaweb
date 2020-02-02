@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.css') }}">
@endpush

@section('title', 'PENGURUS')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('faculties.index') }}">Divisi Pengurus</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Tambah Divisi
      </h5>
      <div class="card-body">
      	<form action="{{ route('managements.store') }}" method="post" class="form-horizontal" id="form-add">
	        	@csrf

	        	<div class="form-group row">
	            <label for="period_id" class="col-sm-2 col-form-label">Periode</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $period->name() }}" readonly>
	              <input type="hidden" class="form-control @error('period_id') is-invalid @enderror" name="period_id" value="{{ $period->id }}" required autocomplete="period_id" placeholder="Periode" readonly>
	              @error('period_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="position_id" class="col-sm-2 col-form-label">Posisi</label>
	            <div class="col-sm-10">
	              <select class="form-control select2bs4 @error('position_id') is-invalid @enderror" name="position_id" required style="width: 100%;">
	              	@foreach ($positions as $position)
	              		<option value="{{ $position->id }}">{{ $position->name }}</option>
	              	@endforeach
                </select>
	              @error('position_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="job" class="col-sm-2 col-form-label">Tugas</label>
	            <div class="col-sm-10">
	            	<textarea class="textarea form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}" required autocomplete="job"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	              @error('job')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="information" class="col-sm-2 col-form-label">Informasi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('information') is-invalid @enderror" name="information" value="{{ old('information') }}" autocomplete="information"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
	              @error('information')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('members.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-add">Tambah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
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
	<!-- page script -->
	<script>
	  $(document).ready(function () {
	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	    });

	    // Summernote
	    $('.textarea').summernote({
	    	placeholder: 'write here . . .',
	    	height: 200,
	    });
	  });
	</script>
@endpush