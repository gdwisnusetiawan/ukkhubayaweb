@extends('layouts.master')

@push('css')
  <!-- DataTables -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/datatables-bs4/css/dataTables.bootstrap4.css') }}">

  <style type="text/css">
  	table.dataTable tbody td {
  	  vertical-align: middle;
  	}
  </style>
@endpush

@section('title', 'ANGGOTA')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Anggota</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">
	      Daftar Anggota
	      <a href="{{ route('members.create') }}" class="btn btn-primary float-right"><i class="fas fa-plus"></i> Tambah</a>
	  </h5>
      <div class="card-body">
      	<div class="table-responsive">
	        <table id="example1" class="table">
	          <thead>
	          <tr>
	            <th>NRP/NPK</th>
	            <th>Nama</th>
	            <th>Fakultas</th>
	            <th>Angkatan</th>
	            <th>Tipe</th>
	            <th>Action</th>
	          </tr>
	          </thead>
	          <tbody>
	          @forelse ($members as $member)
	          <tr>
	            <td>{{ $member->id }}</td>
	            <td>{{ $member->name }}</td>
	            <td>{{ $member->faculty->name }}</td>
	            <td>{{ $member->year }}</td>
	            <td>{{ $member->type }}</td>
	            <td>
	            	<a href="{{ route('members.edit') }}" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
	            	<button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $member->id }}"><i class="fas fa-trash"></i></button>
	            </td>
	          </tr>
	          </tbody>
	          @empty
	          	<td colspan="4">Tidak ada data</td>
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

      	@foreach ($members as $member)
	      	<!-- Modal Delete -->
	      	@component('components.modal')
	      		@slot('id') modal-delete-{{ $member->id }} @endslot
	      		@slot('title') Hapus member @endslot
	      		@slot('button_type') danger @endslot
	      		@slot('button_name') Hapus @endslot
	      		@slot('form_id') form-delete-{{ $member->id }} @endslot

	      		<p>Apakah Anda yakin ingin menghapus data <strong>({{ $member->id }}) {{ $member->name }}</strong>?</p>
	      		<form action="{{ route('members.destroy', $member) }}" method="post" id="form-delete-{{ $member->id }}">
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
	  });
	</script>
@endpush