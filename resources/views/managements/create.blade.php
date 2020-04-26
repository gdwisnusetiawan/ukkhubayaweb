@extends('layouts.master')

@section('title', 'PENGURUS')

@section('breadcumb')
  <li class="breadcrumb-item">Kepengurusan</li>
  <li class="breadcrumb-item"><a href="{{ route('managements.index') }}">Pengurus</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Tambah Divisi
      </h5>
      <div class="card-body">
      	<form action="{{ route('managements.store') }}" method="post" class="form-horizontal" id="form-add">
	        	@csrf

	        	<div class="form-group row">
	            <label for="period_id" class="col-sm-2 col-form-label">Periode</label>
	            <div class="col-sm-10">
	            	@isset($period->id)
		            	<input type="text" class="form-control" value="{{ $period->name() }}" readonly>
		              <input type="hidden" class="form-control @error('period_id') is-invalid @enderror" name="period_id" value="{{ $period->id }}" required autocomplete="period_id" placeholder="Periode">
	              @else
		              <select class="form-control select-single @error('period_id') is-invalid @enderror" name="period_id" required style="width: 100%;">
		              	@foreach ($periods as $item)
		              		<option value="{{ $item->id }}" {{ $period->id == $item->id ? 'selected' : '' }}>{{ $item->name() }}</option>
		              	@endforeach
	                </select>
                @endisset
	              @error('period_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="position_id" class="col-sm-2 col-form-label">Posisi</label>
	            <div class="col-sm-10">
	              <select class="form-control select-single @error('position_id') is-invalid @enderror" name="position_id" required style="width: 100%;">
	              	@foreach ($positions as $position)
	              		<option value="{{ $position->id }}">{{ $position->name }}</option>
	              	@endforeach
                </select>
	              @error('position_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="role" class="col-sm-2 col-form-label">Peran</label>
	            <div class="col-sm-10">
                <!-- radio -->
                <div class="form-group clearfix">
                	@foreach ($roles as $role)
                  <div class="icheck-primary d-inline @error('role') is-invalid @enderror">
                    <input type="radio" id="{{ $role }}" name="role" value="{{ $role }}" required @if($loop->first) {{ 'checked' }} @endif>
                    <label for="{{ $role }}"> {{ $role }}
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
	          <div class="form-group row">
	            <label for="member" class="col-sm-2 col-form-label">Pengurus</label>
	            <div class="col-sm-10">
	              <select class="form-control select2bs4 @error('member') is-invalid @enderror" name="member[]" required style="width: 100%;" multiple="multiple">
	              	@foreach ($members as $member)
	              		<option value="{{ $member->id }}">{{ $member->name }}</option>
	              	@endforeach
                </select>
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
	            <label for="job" class="col-sm-2 col-form-label">Tugas</label>
	            <div class="col-sm-10">
	            	<textarea class="textarea form-control @error('job') is-invalid @enderror" name="job" value="{{ old('job') }}" required autocomplete="job"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
	              <textarea class="textarea form-control @error('information') is-invalid @enderror" name="information" value="{{ old('information') }}" autocomplete="information"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;"></textarea>
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
	<!-- page script -->
	<script>
	  $(document).ready(function () {
	    //Initialize Select2 Elements
	    $('.select-single').select2({
  		  theme: 'bootstrap4',
  		});
  		$('.select2bs4').select2({
  		  theme: 'bootstrap4',
  		  placeholder: "Pilih anggota",
  		  tags: true,
  		  maximumSelectionLength: 1,
  		});
	  	var maxSelectLength;
	  	$('input[name="role"]').click(function(){
  	    if ($(this).is(':checked')){
  	    	if($(this).val() == 'staff'){
  		  		$('.select2bs4').select2({
  		  		  theme: 'bootstrap4',
  		  		  placeholder: "Pilih anggota",
  		  		  tags: true,
  		  		});
  	    	}
  	    	else
  	    	{
  	    		$('.select2bs4').select2({
  		  		  theme: 'bootstrap4',
  		  		  placeholder: "Pilih anggota",
  		  		  tags: true,
  		  		  maximumSelectionLength: 1,
  		  		});
  		  		if($('.select2bs4').select2('data').length > 1){
  		  			$('.select2bs4').val(null).trigger('change');
  		  		}
  	    	}
  	    }
  	  });

	    // Summernote
	    $('.textarea').summernote({
	    	placeholder: 'write here . . .',
	    	height: 200,
	    });
	  });
	</script>
@endpush