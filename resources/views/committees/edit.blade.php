@extends('layouts.master')

@section('title', 'PANITIA')

@section('breadcumb')
  <li class="breadcrumb-item">Kepanitiaan</li>
  <li class="breadcrumb-item"><a href="{{ route('committees.index') }}">Panitia</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Ubah Divisi
      </h5>
      <div class="card-body">
      	<form action="{{ route('committees.update', $committee) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="event_id" class="col-sm-2 col-form-label">Kegiatan</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $committee->event->name() }}" readonly>
		            <input type="hidden" class="form-control @error('event_id') is-invalid @enderror" name="event_id" value="{{ $committee->event->id }}" required autocomplete="event_id" placeholder="Kegiatan" readonly>
	              @error('event_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="position_id" class="col-sm-2 col-form-label">Posisi</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" value="{{ $committee->position->name }}" readonly>
		            <input type="hidden" class="form-control @error('position_id') is-invalid @enderror" name="position_id" value="{{ $committee->position->id }}" required autocomplete="position_id" placeholder="Posisi" readonly>
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
	            	<textarea class="textarea form-control @error('job') is-invalid @enderror" name="job" required autocomplete="job"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $committee->job }}</textarea>
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
	              <textarea class="textarea form-control @error('information') is-invalid @enderror" name="information"  autocomplete="information"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $committee->information }}</textarea>
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
	    // Summernote
	    $('.textarea').summernote({
	    	placeholder: 'write here . . .',
	    	height: 200,
	    });
	  });
	</script>
@endpush