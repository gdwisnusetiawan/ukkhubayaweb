@extends('layouts.master')

@section('title', 'PENGURUS')

@section('breadcumb')
  <li class="breadcrumb-item">Kepengurusan</li>
  <li class="breadcrumb-item"><a href="{{ route('managements.index') }}">Pengurus</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Ubah Divisi
      </h5>
      <div class="card-body">
      	<form action="{{ route('managements.update', $management) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="period_id" class="col-sm-2 col-form-label">Periode</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $management->period->name() }}" readonly>
	              <input type="hidden" class="form-control @error('period_id') is-invalid @enderror" name="period_id" value="{{ $management->period->id }}" required autocomplete="period_id" placeholder="Periode">
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
	              <input type="text" class="form-control" value="{{ $management->position->name }}" readonly>
	              <input type="hidden" class="form-control @error('position_id') is-invalid @enderror" name="position_id" value="{{ $management->position->id }}" required autocomplete="period_id" placeholder="Posisi">
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
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $management->job }}</textarea>
	              @error('name')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="information" class="col-sm-2 col-form-label">Informasi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('information') is-invalid @enderror" name="information" value="{{ old('information') }}" required autocomplete="information"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $management->information }}</textarea>
	              @error('information')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('managements.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
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