@extends('layouts.master')

@push('css')
  <!-- iCheck for checkboxes and radio inputs -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@section('title', 'PANITIA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('committees.index') }}">Panitia</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Ubah Panitia
      </h5>
      <div class="card-body">
      	<form action="{{ route('committee.member.update', [$committee, $member]) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<input type="hidden" name="committee_id" value="{{ $committee->id }}">
	        	<div class="form-group row">
	            <label for="event_id" class="col-sm-2 col-form-label">Kegiatan</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $committee->event->name() }}" readonly>
	              <input type="hidden" class="form-control @error('event_id') is-invalid @enderror" name="event_id" value="{{ $committee->event->id }}" required autocomplete="event_id" placeholder="Periode">
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
	              <input type="hidden" class="form-control @error('position_id') is-invalid @enderror" name="position_id" value="{{ $committee->position->id }}" required autocomplete="event_id" placeholder="Periode">
	              @error('position_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="member" class="col-sm-2 col-form-label">Panitia</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control" value="{{ $member->name }}" readonly>
	              <input type="hidden" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ $member->id }}" required autocomplete="event_id" placeholder="Periode">
	              @error('member')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	              <small class="form-text text-muted">
	                Pilih orang yang mengisi posisi ini
	              </small>
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="role" class="col-sm-2 col-form-label">Peran</label>
	            <div class="col-sm-10">
                <!-- radio -->
                <div class="form-group clearfix">
                	@foreach ($roles as $item)
                  <div class="icheck-primary d-inline @error('role') is-invalid @enderror">
                    <input type="radio" id="{{ $item }}" name="role" value="{{ $item }}" required {{ $role == $item ? 'checked' : '' }}>
                    <label for="{{ $item }}" > {{ $item }}
                    </label>
                  </div>
                  @endforeach
                </div>
	              @error('role')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	              <small class="form-text text-muted">
	                Jika posisi bukan suatu divisi, pilih 'none'
	              </small>
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('committees.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
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
	<!-- Summernote -->
	<script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(document).ready(function () {

	  });
	</script>
@endpush