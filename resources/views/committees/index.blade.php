@extends('layouts.master')

@push('css')
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

@section('title', 'PANITIA')

@section('breadcumb')
  <li class="breadcrumb-item">Kepanitiaan</li>
  <li class="breadcrumb-item active">Panitia</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <div class="card-header">
      	<div class="d-flex justify-content-between mb-2">
    	    <h5 for="event_id">Daftar Panitia</h5>
		      <a href="{{ route('committees.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
	      </div>
	      <form action="{{ route('committees.index') }}" method="get" class="form-horizontal">
		      <select class="select2bs4" name="event_id" required onchange="this.form.submit()">
	        	@foreach ($events as $event)
	        		<option value="{{ $event->id }}" {{ $eventLast == $event->id ? 'selected' : '' }}>{{ $event->name() }}</option>
	        	@endforeach
	        </select>
        </form>
	  </div>
      <div class="card-body">

  	    <div class="row d-flex align-items-stretch">
  	    	@forelse ($committees as $committee)
  	    		@forelse ($committee->members as $member)
			      <div class="col-12 col-sm-6 col-md-4 d-flex align-items-stretch">
			        <div class="card bg-light">
			          <div class="card-header text-muted border-bottom-0">
			            
			          </div>
			          <div class="card-body pt-0">
			            <div class="row">
			            	<div class="col-5 text-center">
			              	<img class="img-fluid rounded"
			              		@if ($member->type == 'student')
			              	    src="https://my.ubaya.ac.id/img/mhs/{{ $member->id }}_m.jpg"
			              		@else
			              			src="https://my.ubaya.ac.id/img/krwyn/{{ $member->id }}_m.jpg"
			              		@endif
			              	    alt="User profile picture">
			              </div>
			              <div class="col-7">
			              	<h4 class="text-muted"><a href="{{ route('committees.show', $committee) }}"><i class="{{ $committee->position->icon }}"></i> {{ $committee->position->name }}</a></h4>
			              	@if (strlen($member->name) > 30)
			              		<h5><b>{{ $member->name }}</b></h5>
			              	@else
			              		<h3><b>{{ $member->name }}</b></h3>
			              	@endif
			              </div>
			            </div>
			          </div>
			          <div class="card-footer">
			            <div class="text-right">
  	      	      	<a href="{{ route('members.show', $member->id) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-eye"></i></a>
  	      	      	<a href="{{ route('committee.member.edit', [$committee, $member]) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
  		      	      <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $member->id }}"><i class="fas fa-trash"></i></button>
			            </div>
			          </div>
			        </div>
			      </div>
			      @empty
			      <p></p>
			      @endforelse
			    @empty
			    <p></p>
			    @endforelse

			    @foreach ($committees as $committee)
			    	@forelse ($committee->members as $member)
		      	<!-- Modal Delete -->
			      	@component('components.modal')
			      		@slot('id') modal-delete-{{ $member->id }} @endslot
			      		@slot('title') Hapus Panitia @endslot
			      		@slot('button_type') danger @endslot
			      		@slot('button_name') Hapus @endslot
			      		@slot('form_id') form-delete-{{ $member->id }} @endslot

			      		<p>Apakah Anda yakin ingin menghapus data <strong>{{ $member->name }}</strong> sebagai <strong>{{ $committee->position->name }} {{ $committee->event->name() }}</strong>?</p>
			      		<form action="{{ route('committee.member.destroy', [$committee, $member]) }}" method="post" id="form-delete-{{ $member->id }}">
			      			@csrf
			      			@method('delete')
			      		</form>
			      	@endcomponent
			      	<!-- /.modal -->
		    		@endforeach
		    	@endforeach
  	    </div>
  	    <!-- /.row -->

      	<div class="row">
      		@forelse ($committees as $committee)
      		<!-- I don't know why, but this is making it not flickering when loading -->
      	  <div class="col-md-3 mb-3">
      	  </div>
      	  @empty
      	  <p class="text-center w-100"></p>
	      	@endforelse
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
	  $(function () {
	  	//Initialize Select2 Elements
	    $('.select2bs4').select2({
	      theme: 'bootstrap4',
	      width: 'auto',
	    });

	    $("#example1").DataTable();
	    $('#example2').DataTable({
	      "paging": true,
	      "lengthChange": false,
	      "searching": false,
	      "ordering": true,
	      "info": true,
	      "autoWidth": false,
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