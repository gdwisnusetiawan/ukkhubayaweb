@extends('layouts.master')

@section('title', 'KEGIATAN')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Kegiatan</a></li>
  <li class="breadcrumb-item active">Ubah</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-12">
    <div class="card">
      <h5 class="card-header">
      	Ubah Kegiatan
      </h5>
      <div class="card-body">
      	<form action="{{ route('events.update', $event) }}" method="post" class="form-horizontal" id="form-edit">
	        	@csrf
	        	@method('put')

	        	<div class="form-group row">
	            <label for="period_id" class="col-sm-2 col-form-label">Periode</label>
	            <div class="col-sm-10">
	            	@isset($period)
		            	<input type="text" class="form-control @error('period_id') is-invalid @enderror" value="{{ $period->name() }}" readonly>
		              <input type="hidden" class="form-control @error('period_id') is-invalid @enderror" name="period_id" value="{{ $period->id }}" required autocomplete="period_id" placeholder="Periode" readonly>
	              @else
		              <select class="form-control select2bs4" name="period_id" required style="width: 100%;">
		              	@foreach ($periods as $item)
		              		<option value="{{ $item->id }}">{{ $item->name() }}</option>
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
	            <label for="program_id" class="col-sm-2 col-form-label">Program Kerja</label>
	            <div class="col-sm-10">
	            	@isset($program->id)
		            	<input type="text" class="form-control @error('program_id') is-invalid @enderror" value="{{ $program->name }}" readonly>
		              <input type="hidden" class="form-control" name="program_id" value="{{ $program->id }}" required autocomplete="program_id" placeholder="Program" readonly>
	              @else
		              <select class="form-control select2bs4 @error('program_id') is-invalid @enderror" name="program_id" required style="width: 100%;">
		              	@foreach ($programs as $item)
		              		<option value="{{ $item->id }}">{{ $item->name }}</option>
		              	@endforeach
	                </select>
                @endisset
	              @error('program_id')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
            	<div class="col-sm-6">
            		<div class="row">
		              <label for="date_begin" class="col-sm-4 col-form-label">Tanggal Mulai</label>
		              <div class="col-sm-8">
			              <div class="input-group date" id="date_begin" data-target-input="nearest">
		                  <input type="text" class="form-control datetimepicker-input @error('date_begin') is-invalid @enderror" data-target="#date_begin" data-toggle="datetimepicker" name="date_begin" autocomplete="off" value="{{ $event->date_begin }}">
		                  <div class="input-group-append" data-target="#date_begin" data-toggle="datetimepicker">
		                    <div class="input-group-text"><i class="far fa-clock"></i></div>
		                  </div>
		                  @error('date_begin')
		                    <span class="invalid-feedback" role="alert">
		                      <strong>{{ $message }}</strong>
		                    </span>
		                  @enderror
		                </div>
		                <small class="form-text text-muted">
		                	Tanggal mulai harus diisi.
		                </small>
		              </div>
	              </div>
              </div>
              <div class="col-sm-6">
              	<div class="row">
		              <label for="date_end" class="col-sm-4 col-form-label">Tanggal Selesai</label>
		              <div class="col-sm-8">
			              <div class="input-group date" id="date_end" data-target-input="nearest">
		                  <input type="text" class="form-control datetimepicker-input @error('date_end') is-invalid @enderror" data-target="#date_end" data-toggle="datetimepicker" name="date_end" autocomplete="off" value="{{ $event->date_end }}">
		                  <div class="input-group-append" data-target="#date_end" data-toggle="datetimepicker">
		                    <div class="input-group-text"><i class="far fa-clock"></i></div>
		                  </div>
		                  @error('date_end')
		                    <span class="invalid-feedback" role="alert">
		                      <strong>{{ $message }}</strong>
		                    </span>
		                  @enderror
		                </div>
		                <small class="form-text text-muted">
		                	Tanggal selesai boleh tidak diisi.
		                </small>
		              </div>
		            </div>
              </div>
            </div>
            <div class="form-group row">
            	<div class="col-sm-6">
            		<div class="row">
		              <label for="time_begin" class="col-sm-4 col-form-label">Waktu Mulai</label>
		              <div class="col-sm-8">
			              <div class="input-group date" id="time_begin" data-target-input="nearest">
		                  <input type="text" class="form-control datetimepicker-input @error('time_begin') is-invalid @enderror" data-target="#time_begin" data-toggle="datetimepicker" name="time_begin" autocomplete="off" value="{{ $event->time_begin }}">
		                  <div class="input-group-append" data-target="#time_begin" data-toggle="datetimepicker">
		                    <div class="input-group-text"><i class="far fa-clock"></i></div>
		                  </div>
		                  @error('time_begin')
		                    <span class="invalid-feedback" role="alert">
		                      <strong>{{ $message }}</strong>
		                    </span>
		                  @enderror
		                </div>
		                <small class="form-text text-muted">
		                	Waktu mulai boleh tidak diisi.
		                </small>
		              </div>
	              </div>
              </div>
              <div class="col-sm-6">
              	<div class="row">
		              <label for="time_end" class="col-sm-4 col-form-label">Waktu Selesai</label>
		              <div class="col-sm-8">
			              <div class="input-group date" id="time_end" data-target-input="nearest">
		                  <input type="text" class="form-control datetimepicker-input @error('time_end') is-invalid @enderror" data-target="#time_end" data-toggle="datetimepicker" name="time_end" autocomplete="off" value="{{ $event->time_end }}">
		                  <div class="input-group-append" data-target="#time_end" data-toggle="datetimepicker">
		                    <div class="input-group-text"><i class="far fa-clock"></i></div>
		                  </div>
		                  @error('time_end')
			                  <span class="invalid-feedback" role="alert">
			                    <strong>{{ $message }}</strong>
			                  </span>
			                @enderror
		                </div>
		                <small class="form-text text-muted">
		                	Waktu selesai boleh tidak diisi.
		                </small>
		              </div>
		            </div>
              </div>
            </div>
	          <div class="form-group row">
	            <label for="location" class="col-sm-2 col-form-label">Lokasi</label>
	            <div class="col-sm-10">
	            	<textarea class="textarea form-control @error('location') is-invalid @enderror" name="location" required autocomplete="location"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $event->location }}</textarea>
	              @error('location')
	                <span class="invalid-feedback" role="alert">
	                  <strong>{{ $message }}</strong>
	                </span>
	              @enderror
	            </div>
	          </div>
	          <div class="form-group row">
	            <label for="description" class="col-sm-2 col-form-label">Deskripsi</label>
	            <div class="col-sm-10">
	              <textarea class="textarea form-control @error('description') is-invalid @enderror" name="description" autocomplete="description"
                          style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $event->description }}</textarea>
	              @error('description')
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
	<!-- page script -->
	<script>
	  $(document).ready(function () {
	    //Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	    });

	    //Date Time Picker
	    $('#date_begin').datetimepicker({
	      format: 'Y-MM-DD'
	    });
	    $('#date_end').datetimepicker({
	      format: 'Y-MM-DD'
	    });
	    $('#time_begin').datetimepicker({
	      format: 'HH:mm'
	    });
	    $('#time_end').datetimepicker({
	      format: 'HH:mm'
	    });
	  });
	</script>
@endpush