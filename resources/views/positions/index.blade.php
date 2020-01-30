@extends('layouts.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">
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

@section('title', 'POSISI')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Posisi</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
	      Daftar Posisi
	      <span class="float-right">
		      <a href="{{ route('positions.create') }}" class="btn btn-primary"><i class="fas fa-plus"></i><span class="button-text"> Tambah</span></a>
	      </span>
	  </h5>
      <div class="card-body">
      	<div class="table-responsive">
	        <table id="example1" class="table">
	          <thead>
	          <tr>
	            <th>#</th>
	            <th>Nama</th>
	            <th>Action</th>
	          </tr>
	          </thead>
	          <tbody>
	          @forelse ($positions as $position)
	          <tr>
	            <td>{{ $position->order }}</td>
	            <td><i class="{{ $position->icon }}"></i> {{ $position->name }}</td>
	            <td>
	            	<a href="{{ route('positions.edit', $position) }}" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
	            	<button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $position->id }}"><i class="fas fa-trash"></i></button>
	            </td>
	          </tr>
	          </tbody>
	          @empty
	          	<td colspan="4" class="text-center">Tidak ada data</td>
	          @endforelse
	          <!-- <tfoot>
	          <tr>
	            <th>NRP</th>
	            <th>Nama</th>
	            <th>Email</th>
	            <th>Action</th>
	          </tr>
	          </tfoot> -->
	        </table>
      	</div><!-- /.table-responsive -->

      	@foreach ($positions as $position)
	      	<!-- Modal Delete -->
	      	@component('components.modal')
	      		@slot('id') modal-delete-{{ $position->id }} @endslot
	      		@slot('title') Hapus Posisi @endslot
	      		@slot('button_type') danger @endslot
	      		@slot('button_name') Hapus @endslot
	      		@slot('form_id') form-delete-{{ $position->id }} @endslot

	      		<p>Apakah Anda yakin ingin menghapus data <strong>({{ $position->id }}) {{ $position->name }}</strong>?</p>
	      		<form action="{{ route('positions.destroy', $position) }}" method="post" id="form-delete-{{ $position->id }}">
	      			@csrf
	      			@method('delete')
	      		</form>
	      	@endcomponent
	      	<!-- /.modal -->
      	@endforeach

      </div><!-- /.card-body -->
    </div><!-- /.card -->
  </div>
  <!-- /.col-md-12 -->
</div>
<!-- /.row -->
@endsection

@push('js')
	<!-- DataTables -->
	<script src="{{ asset('admin-lte/plugins/datatables/jquery.dataTables.js') }}"></script>
	<script src="{{ asset('admin-lte/plugins/datatables-bs4/js/dataTables.bootstrap4.js') }}"></script>
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