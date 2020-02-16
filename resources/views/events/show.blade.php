@extends('layouts.master')

@push('css')
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

@section('title', 'KEGIATAN')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="{{ route('events.index') }}">Kegiatan</a></li>
  <li class="breadcrumb-item active">Lihat</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card">
    	<div class="card-header">
    		<a href="{{ url()->current() == url()->previous() ? route('events.index') : url()->previous() }}"><i class="fas fa-chevron-left"></i> Kembali</a>
    	</div>
      <div class="card-body box-profile">
        <h3 class="text-center">{{ $event->name() }}</h3>
        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>Anggota</b> <a class="float-right">{{ $membersCount }}</a>
          </li>
        </ul>
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <h5 class="card-header">
        Daftar Divisi
        <span class="float-right">
          <a href="{{ route('committees.createEvent', $event) }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
        </span>
      </h5>
      <div class="card-body">

        <div class="row">
          @forelse ($committees as $committee)
          <div class="col-md-3 mb-3">
            <div class="card h-100 m-0 text-center">
              <div class="card-body">
                <h1><i class="{{ $committee->position->icon }}"></i></h1>
                <h2 class="card-text">{{ $committee->position->name }}</h2>
              </div>
              <div class="card-footer">
                <a href="{{ route('committees.show', $committee) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-eye"></i></a>
                <a href="{{ route('committees.edit', $committee) }}" type="button" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
                <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $committee->id }}"><i class="fas fa-trash"></i></button>
              </div>
            </div>
          </div>
          @empty
          <p class="text-center w-100">Tidak ada data.</p>
          @endforelse

          @foreach ($committees as $committee)
          <!-- Modal Delete -->
            @component('components.modal')
              @slot('id') modal-delete-{{ $committee->id }} @endslot
              @slot('title') Hapus Divisi @endslot
              @slot('button_type') danger @endslot
              @slot('button_name') Hapus @endslot
              @slot('form_id') form-delete-{{ $committee->id }} @endslot

              <p>Apakah Anda yakin ingin menghapus data <strong>{{ $committee->position->name }}</strong> pada kegiatan <strong>{{ $committee->event->name() }}</strong>?</p>
              <form action="{{ route('committees.destroy', $committee) }}" method="post" id="form-delete-{{ $committee->id }}">
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
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- SweetAlert2 -->
	<script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
	<!-- page script -->
	<script>
	  $(function () {
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