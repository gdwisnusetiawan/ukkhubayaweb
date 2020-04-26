@extends('layouts.master')

@section('title', 'PROFIL')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('members.show', $member) }}">Profil</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
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
	              <input type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ $member->id }}" required autocomplete="id" placeholder="ID (NRP/NPK)" readonly>
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
	              <input type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ $member->name }}" required autocomplete="name" placeholder="Nama" readonly>
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
	              <input type="text" class="form-control @error('year') is-invalid @enderror" name="year" value="{{ $member->year }}" required autocomplete="year" placeholder="Angkatan" readonly>
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
	              <select class="form-control select2bs4 @error('faculty') is-invalid @enderror" name="faculty" required style="width: 100%;" readonly>
	              	<option value="none">None</option>
	              	@foreach ($faculties as $faculty)
	              		<option value="{{ $faculty->id }}" 
	              			@isset($member->faculty)
	              				{{ $member->faculty->id == $faculty->id ? 'selected' : '' }}
	              			@endisset
	              		>{{ $faculty->name }}</option>
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
	            	<div class="icheck-primary d-inline @error('type') is-invalid @enderror">
	            	  &nbsp;
	            	  <input type="radio" id="{{ $member->type }}" class="form-control" name="type" value="{{ $member->type }}" checked>
	            	  <label for="{{ $member->type }}">{{ ucfirst($member->type) }}</label>
	            	</div>
	              @error('type')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	          	<label for="place_of_birth" class="col-sm-2 col-form-label">Tempat Lahir</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('place_of_birth') is-invalid @enderror" name="place_of_birth" value="{{ old('place_of_birth') ?? $member->place_of_birth }}" required autocomplete="place_of_birth" placeholder="Tempat lahir">
	              @error('place_of_birth')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
              <label for="date_of_birth" class="col-sm-2 col-form-label">Tanggal Lahir</label>
              <div class="col-sm-10">
	              <div class="input-group date" id="date_of_birth" data-target-input="nearest">
                  <input type="text" class="form-control datetimepicker-input @error('date_of_birth') is-invalid @enderror" data-target="#date_of_birth" data-toggle="datetimepicker" name="date_of_birth" autocomplete="off" value="{{ old('date_of_birth') ?? $member->date_of_birth }}">
                  <div class="input-group-append" data-target="#date_of_birth" data-toggle="datetimepicker">
                    <div class="input-group-text"><i class="far fa-calendar"></i></div>
                  </div>
                  @error('date_of_birth')
                    <span class="invalid-feedback" role="alert">
                      <strong>{{ $message }}</strong>
                    </span>
                  @enderror
                </div>
              </div>
	          </div>
	          <div class="form-group row">
	          	<label for="original_address" class="col-sm-2 col-form-label">Alamat Asal</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('original_address') is-invalid @enderror" name="original_address" value="{{ old('original_address') ?? $member->original_address }}" required autocomplete="original_address" placeholder="Alamat asal">
	              @error('original_address')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	          	<label for="residence_address" class="col-sm-2 col-form-label">Alamat Domisili</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('residence_address') is-invalid @enderror" name="residence_address" value="{{ old('residence_address') ?? $member->residence_address }}" required autocomplete="residence_address" placeholder="Alamat domisili">
	              @error('residence_address')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	              <div class="icheck-primary">
	                <input type="checkbox" name="same_address" id="same_address" {{ old('same_address') ? 'checked' : '' }}>
	                <label for="same_address">Sama seperti alamat asal</label>
	              </div>
	            </div>
	          </div>
	          <div class="form-group row">
	          	<label for="hobby" class="col-sm-2 col-form-label">Hobi</label>
	            <div class="col-sm-10">
	              <input type="text" class="form-control @error('hobby') is-invalid @enderror" name="hobby" value="{{ $member->hobby }}" required autocomplete="hobby" placeholder="contoh: Olahraga, mendaki, berenang">
	              @error('hobby')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	              <small class="text-muted">Pisahkan tiap hobi dengan tanda koma ( , )</small>
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
	  	$('#same_address').click(function(){
        if($(this).prop("checked") == true){
          $('input[name="residence_address"]').val($('input[name="original_address"]').val());
        }
        else if($(this).prop("checked") == false){
          $('input[name="residence_address"]').val('');
        }
      });
	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	      disabled: true,
	    });

	    //Date Time Picker
	    $('#date_of_birth').datetimepicker({
	      format: 'Y-MM-DD'
	    });
	  });
	</script>
@endpush