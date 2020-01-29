@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
@endpush

@section('title', 'ANGGOTA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('faculties.index') }}">Anggota</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Ubah Anggota
      </h5>
      <div class="card-body">
      	<form action="{{ route('members.update', $member) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="id" class="col-sm-2 col-form-label">ID (NRP/NPK)</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $member->id }}" required autocomplete="id" placeholder="ID (NRP/NPK)">
	              @error('id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="name" class="col-sm-2 col-form-label">Nama</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $member->name }}" required autocomplete="name" placeholder="Nama">
	              @error('name')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="year" class="col-sm-2 col-form-label">Angkatan</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $member->year }}" required autocomplete="year" placeholder="Angkatan">
	              @error('year')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="faculty" class="col-sm-2 col-form-label">Fakultas</label>
	            <div class="col-sm-10">
	              <select class="form-control select2bs4 @error('faculty') is-invalid @enderror" name="faculty" required style="width: 100%;">
	              	<option value="none">None</option>
	              	@foreach ($faculties as $faculty)
	              		<option value="{{ $faculty->id }}" {{ $member->faculty->id == $faculty->id ? 'selected' : '' }}>{{ $faculty->name }}</option>
	              	@endforeach
                </select>
	              @error('faculty')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="type" class="col-sm-2 col-form-label">Tipe</label>
	            <div class="col-sm-10">
	              <select class="form-control select2bs4 @error('type') is-invalid @enderror" name="type" required style="width: 100%;">
	              	@foreach ($types as $type)
	              		<option value="{{ $type }}" {{ $member->type == $type ? 'selected' : '' }}>{{ ucfirst($type) }}</option>
	              	@endforeach
                </select>
	              @error('type')
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
	<!-- Select2 -->
	<script src="{{ asset('admin-lte/plugins/select2/js/select2.full.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(document).ready(function () {
	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	    });
	  });
	</script>
@endpush