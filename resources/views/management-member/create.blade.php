@extends('layouts.master')

@section('title', 'PENGURUS')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('managements.index') }}">Pengurus</a></li>
  <li class="breadcrumb-item active">Tambah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Tambah Pengurus
      </h5>
      <div class="card-body">
      	<form action="{{ route('management.member.store', $management) }}" method="post" class="form-horizontal" id="form-add">
	        	@csrf

	        	<input type="hidden" name="management_id" value="{{ $management->id }}">
	        	<div class="form-group row">
	            <label for="period_id" class="col-sm-2 col-form-label">Periode</label>
	            <div class="col-sm-10">
	            	@isset($management->period->id)
		            	<input type="text" class="form-control" value="{{ $management->period->name() }}" readonly>
		              <input type="hidden" class="form-control @error('period_id') is-invalid @enderror" name="period_id" value="{{ $management->period->id }}" required autocomplete="period_id" placeholder="Periode" readonly>
	              @else
		              <select class="form-control select2bs4 @error('period_id') is-invalid @enderror" name="period_id" required style="width: 100%;">
		              	@foreach ($periods as $item)
		              		<option value="{{ $item->id }}" {{ $management->period->id == $item->id ? 'selected' : '' }}>{{ $item->name() }}</option>
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
	            	@isset($management->position->id)
		            	<input type="text" class="form-control" value="{{ $management->position->name }}" readonly>
		              <input type="hidden" class="form-control @error('position_id') is-invalid @enderror" name="position_id" value="{{ $management->position->id }}" required autocomplete="event_id" placeholder="Kegiatan" readonly>
	              @else
			            <select class="form-control select2bs4 @error('position_id') is-invalid @enderror" name="position_id" required style="width: 100%;">
		              	@foreach ($positions as $item)
		              		<option value="{{ $item->id }}" {{ $management->position->id == $item->id ? 'selected' : '' }}>{{ $item->name }}</option>
		              	@endforeach
	                </select>
                @endisset
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
                    <input type="radio" id="{{ $role }}" name="role" value="{{ $role }}" required {{ $role == 'staff' ? 'checked' : '' }}>
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
	            <label for="member_id" class="col-sm-2 col-form-label">Pengurus</label>
	            <div class="col-sm-10">
	              <select class="form-control select2bs4 @error('member_id') is-invalid @enderror" name="member[]" required style="width: 100%;" multiple="multiple">
	              	@foreach ($members as $member)
	              		<option value="{{ $member->id }}">{{ $member->name }}</option>
	              	@endforeach
                </select>
	              @error('member_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	              <small class="form-text text-muted">
	                Pilih orang yang mengisi posisi ini
	              </small>
	            </div>
	          </div>
	        </form>
	        <div class="float-right">
	          <a href="{{ url()->current() == url()->previous() ? route('managements.show', $management) : url()->previous() }}" type="button" class="btn btn-default">Kembali</a>
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
  		$('.select2bs4').select2({
  		  theme: 'bootstrap4',
  		  tags: true,
  		  maximumSelectionLength: 1,
  		});
	  	var maxSelectLength;
	  	$('input[name="role"]').click(function(){
  	    if ($(this).is(':checked')){
  	    	if($(this).val() == 'staff'){
  		  		$('.select2bs4').select2({
  		  		  theme: 'bootstrap4',
  		  		  tags: true,
  		  		});
  	    	}
  	    	else
  	    	{
  	    		$('.select2bs4').select2({
  		  		  theme: 'bootstrap4',
  		  		  tags: true,
  		  		  maximumSelectionLength: 1,
  		  		});
  	    	}
  	    }
  	  });
	    
	  });
	</script>
@endpush