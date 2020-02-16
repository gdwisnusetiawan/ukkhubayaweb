@extends('layouts.master')

@push('css')
@endpush

@section('title', 'ANGGOTA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('periods.index') }}">Kontak Anggota</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-6">
    <div class="card">
      <h5 class="card-header">
      	Ubah Kontak Anggota
      </h5>
      <div class="card-body">
      	<form action="{{ route('member.contact.update', [$member, $contact]) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="event_id" class="col-sm-2 col-form-label">Anggota</label>
	            <div class="col-sm-10">
	            	<input type="text" class="form-control" value="{{ $member->name }}" readonly>
	              <input type="hidden" class="form-control @error('member_id') is-invalid @enderror" name="member_id" value="{{ $member->id }}" required autocomplete="member_id" placeholder="Periode">
	              @error('member_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	        	<div class="form-group row">
              <label for="name" class="col-sm-2 col-form-label">Kontak</label>
              <div class="col-sm-10">
                <select class="form-control select2bs4 @error('contact_id') is-invalid @enderror" name="contact_id" required style="width: 100%;">
                  @foreach ($contacts as $item)
                    <option value="{{ $item->id }}" {{ $item->id == $contact->id ? 'selected' : '' }}>{{ $item->name }}</option>
                  @endforeach
                </select>
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
@endpush