@extends('layouts.master')

@section('title', 'POSISI')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('positions.index') }}">Posisi</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Ubah Posisi
      </h5>
      <div class="card-body">
      	<form action="{{ route('positions.update', $position) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="name" class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $position->name }}" required autocomplete="name" placeholder="Nama">
	              @error('name')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="icon" class="col-sm-2 col-form-label">Icon</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('icon') is-invalid @enderror" name="icon" value="{{ $position->icon }}" required autocomplete="icon" placeholder="ex: fas fa-circle">
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
	          <div class="form-group row">
	            <label for="order" class="col-sm-2 col-form-label">Urutan</label>
	            <div class="col-sm-10">
	              <input type="number" class="form-control @error('order') is-invalid @enderror" name="order" value="{{ $position->order }}" required autocomplete="order" placeholder="Urutan" min="0" step="1">
	              @error('order')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('positions.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection