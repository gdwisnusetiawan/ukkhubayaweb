@extends('layouts.master')

@section('title', 'PROFIL')

@section('breadcumb')
  <li class="breadcrumb-item">Beranda</li>
  <li class="breadcrumb-item"><a href="{{ route('profiles.index') }}">Profil Organisasi</a></li>
  <li class="breadcrumb-item">Kontak</li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-8">
    <div class="card">
      <h5 class="card-header">
      	Ubah Kontak Organisasi
      </h5>
      <div class="card-body">
      	<form action="{{ route('profile.contact.update', [$profile, $contact]) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="event_id" class="col-sm-2 col-form-label">Organisasi</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $profile->name }}" readonly>
	              <input type="hidden" class="form-control @error('profile_id') is-invalid @enderror" name="profile_id" value="{{ $profile->id }}" required autocomplete="profile_id" placeholder="Organisasi">
	              @error('profile_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        	<div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Kontak</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" value="{{ $contact->name }}" readonly>
	              <input type="hidden" class="form-control @error('contact_id') is-invalid @enderror" name="contact_id" value="{{ $contact->id }}" required autocomplete="profile_id" placeholder="Kontak">
                @error('contact_id')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
            <div class="form-group row">
              <label for="link" class="col-sm-2 col-form-label">Link</label>
              <div class="col-sm-10">
                <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ $link }}" required autocomplete="link" placeholder="Link menuju kontak">
                @error('link')
                  <span class="invalid-feedback" role="alert">
                    <strong>{{ $message }}</strong>
                  </span>
                @enderror
              </div>
            </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('profiles.index') : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
	          <button type="submit" class="btn btn-primary" form="form-edit">Ubah</button>
	        </div>
      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection