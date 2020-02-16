@extends('layouts.master')

@push('css')
@endpush

@section('title', 'KONTAK')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('periods.index') }}">Kontak</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">
      	Ubah Kontak
      </h5>
      <div class="card-body">
      	<form action="{{ route('contacts.update', $contact) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf

	        	<div class="form-group row">
	            <label for="name" class="col-sm-4 col-form-label">Nama</label>
	            <div class="col-sm-8">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $contact->name }}" required autocomplete="name" placeholder="Nama">
	              @error('name')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="icon" class="col-sm-4 col-form-label">Icon</label>
	            <div class="col-sm-8">
	              <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $contact->icon }}" required autocomplete="icon" placeholder="ex: fas fa-circle">
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
	          <a href="{{ url()->current() == url()->previous() ? route('contacts.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
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
@endpush