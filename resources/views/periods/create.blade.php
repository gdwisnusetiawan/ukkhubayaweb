@extends('layouts.master')

@push('css')
@endpush

@section('title', 'ANGGOTA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('periods.index') }}">Periode</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Tambah Periode
      </h5>
      <div class="card-body">
      	<form action="{{ route('periods.store') }}" method="post" class="form-horizontal" id="form-add">
	        	@csrf

	        	<div class="form-group row">
	            <label for="year_begin" class="col-sm-2 col-form-label">Tahun Mulai</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('year_begin') is-invalid @enderror" name="year_begin" value="{{ old('year_begin') }}" required autocomplete="year_begin" placeholder="Tahun Mulai">
	              @error('year_begin')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="year_end" class="col-sm-2 col-form-label">Tahun Selesai</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('year_end') is-invalid @enderror" name="year_end" value="{{ old('year_end') }}" required autocomplete="year_end" placeholder="Tahun Selesai">
	              @error('year_end')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('periods.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
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
@endpush