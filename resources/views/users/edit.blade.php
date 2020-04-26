@extends('layouts.master')

@section('title', 'PENGGUNA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item">Pengguna</li>
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
      	<form action="{{ route('users.update', $user) }}" method="post" class="form-horizontal" id="form-edit">
        	@csrf
        	@method('put')

          <div class="form-group row">
            <label for="id" class="col-sm-2 col-form-label">ID</label>
            <div class="col-sm-10">
              <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $user->id }}" required autocomplete="id" autofocus placeholder="ID / NRP" readonly>
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
              <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $user->name }}" required autocomplete="name" placeholder="Nama" readonly>
              @error('name')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="email" class="col-sm-2 col-form-label">Email</label>
            <div class="col-sm-10">
              <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Email" readonly>
              @error('email')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
          <div class="form-group row">
            <label for="role" class="col-sm-2 col-form-label">Role</label>
            <div class="col-sm-10">
              <div class="icheck-primary d-inline">
                <input type="radio" id="radio-admin" class="form-control @error('role') is-invalid @enderror" name="role" value="admin" checked>
                <label for="radio-admin">Admin</label>
              </div>
              &nbsp;
              <div class="icheck-primary d-inline">
                <input type="radio" id="radio-viewer" class="form-control @error('role') is-invalid @enderror" name="role" value="viewer">
                <label for="radio-viewer">Viewer</label>
              </div>
              @error('role')
                <span class="invalid-feedback" role="alert">
                  <strong>{{ $message }}</strong>
                </span>
              @enderror
            </div>
          </div>
        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('users.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection