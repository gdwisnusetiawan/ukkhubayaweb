@extends('layouts.master')

@push('css')
  <!-- Select2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2/css/select2.min.css') }}">
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
  <!-- SweetAlert2 -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/sweetalert2-theme-bootstrap-4/bootstrap-4.min.css') }}">

  <style type="text/css">
  	table.dataTable tbody td {
  	  vertical-align: middle;
  	}
  	@media screen and (max-width: 480px) {
	    .button-text {
        display: none;
	    }
  	}
  </style>
@endpush

@section('title', 'PROGRAM KERJA')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Kegiatan</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
      	<div class="d-flex justify-content-between">
		      <span>
	    	    <label for="period_id" class="col-form-label">Daftar Kegiatan</label>
	    	    <form action="{{ route('events.index') }}" method="get" class="form-horizontal">
				      <select class="select2bs4" name="period_id" required onchange="this.form.submit()">
			        	@foreach ($periods as $period)
			        		<option value="{{ $period->id }}" {{ $periodLast == $period->id ? 'selected' : '' }}>Periode {{ $period->name() }}</option>
			        	@endforeach
			        </select>
		        </form>
		      </span>
		      <span class="float-right">
			      <a href="{{ route('events.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
		      </span>
		    </div>
	  	</h5>
      <div class="card-body">

      	<div class="row">
      		@forelse ($events as $event)
      		<div class="card mb-3">
      		  <div class="row no-gutters">
      		    <div class="col-md-2">
      		      <img src="{{ asset($event->program->logo) }}" class="card-img" alt="Logo Kegiatan">
      		    </div>
      		    <div class="col-md-10">
      		      <div class="card-body">
      		        <h3 class="card-title"><strong>{{ $event->program->name }} {{ $event->year }}</strong></h3>
      		        <p class="card-text text-justify">{{ $event->description }}</p>
      		        <p class="card-text text-muted"><i class="far fa-calendar-alt"></i>&nbsp;
      		      		@if ($event->date_end == null)
	      		      		{{ Carbon\Carbon::parse($event->date_begin)->format('d F Y') }}
			      		  	@else
			      		  		@if (Carbon\Carbon::parse($event->date_begin)->format('Y') == Carbon\Carbon::parse($event->date_end)->format('Y'))
			      		  			<!-- if the year and month are the same -->
			      		  			@if (Carbon\Carbon::parse($event->date_begin)->format('F') == Carbon\Carbon::parse($event->date_end)->format('F'))
			      		  				{{ Carbon\Carbon::parse($event->date_begin)->format('d') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
			      		  			<!-- if the year is the same and the month is different -->
			      		  			@else
			      		  				{{ Carbon\Carbon::parse($event->date_begin)->format('d F') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
			      		  			@endif
			      		  		<!-- if the date, month and year are different -->
			      		  		@else
			      		  			{{ Carbon\Carbon::parse($event->date_begin)->format('d F Y') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
			      		  		@endif
			      		  	@endif
			      		  
			      		  @if ($event->time_begin != null)
      		      		&nbsp; | &nbsp; 
      		      		<span class="text-muted"><i class="far fa-clock"></i>&nbsp;
			    		  			{{ Carbon\Carbon::parse($event->time_begin)->format('H:i') }}
			    		  			@if ($event->time_end != null)
			    		  				- {{ Carbon\Carbon::parse($event->time_end)->format('H:i') }}
			    		  			@endif
			      		  	</span>
			      		  @endif
			      		  </p>
      		        <h5 class="card-text"><small class="text-muted"><i class="fas fa-map-marker-alt"></i>&nbsp; {{ $event->location }}</small></h5>
      		      </div>
      		    </div>
      		  </div>
      		  <div class="card-footer">
      		  	<span class="float-right">
	    	      	<a href="{{ route('events.edit', $event) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i> Ubah</a>
	      	      <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $event->id }}"><i class="fas fa-trash"></i> Hapus</button>
      	      </span>
  	      	</div>
      		</div>
      	  @empty
      	  <p class="text-center w-100">Tidak ada data.</p>
	      	@endforelse

	      	@foreach ($events as $event)
	      	<!-- Modal Delete -->
		      	@component('components.modal')
		      		@slot('id') modal-delete-{{ $event->id }} @endslot
		      		@slot('title') Hapus Kegiatan @endslot
		      		@slot('button_type') danger @endslot
		      		@slot('button_name') Hapus @endslot
		      		@slot('form_id') form-delete-{{ $event->id }} @endslot

		      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $event->program->name }} {{ $event->year }}</strong>?</p>
		      		<form action="{{ route('events.destroy', $event) }}" method="post" id="form-delete-{{ $event->id }}">
		      			@csrf
		      			@method('delete')
		      		</form>
		      	@endcomponent
		      	<!-- /.modal -->
		    	@endforeach
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
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(function () {
	  	//Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	      width: 'auto',
	    });

	    const Toast = Swal.mixin({
	      toast: true,
	      position: 'top-end',
	      showConfirmButton: false,
	      timer: 3000
	    });

	    if('{{ session("status") }}') {
	    	Toast.fire({
	        type: 'success',
	        title: '{{ session("status") }}'
	      })
	    }
	  });
	</script>
@endpush