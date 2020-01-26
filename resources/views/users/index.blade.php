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

@section('title', 'USERS')

@section('breadcumb')
  <li class="breadcrumb-item"><a href="#">Master</a></li>
  <li class="breadcrumb-item active">Users</li>
@endsection

@section('content')
<div class="row">
  <div class="col-lg-12">
    <div class="card">
      <h5 class="card-header">Daftar User</h5>
      <div class="card-body">
      	<div class="table-responsive">
	        <table id="example1" class="table">
	          <thead>
	          <tr>
	            <th>NRP</th>
	            <th>Nama</th>
	            <th>Email</th>
	            <th>Action</th>
	          </tr>
	          </thead>
	          <tbody>
	          @forelse ($users as $user)
	          <tr>
	            <td>{{ $user->id }}</td>
	            <td>{{ $user->name }}</td>
	            <td>{{ $user->email }}</td>
	            <td>
	            	<button type="button" class="btn btn-outline-primary btn-sm m-1" data-toggle="modal" data-target="#modal-edit-{{ $user->id }}"><i class="fas fa-edit"></i></button>
	            	<button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $user->id }}"><i class="fas fa-trash"></i></button>
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

      	@foreach ($users as $user)
	      	<!-- Modal Edit -->
	      	@component('components.modal')
	      		@slot('id') modal-edit-{{ $user->id }} @endslot
	      		@slot('title') Ubah User @endslot
	      		@slot('button_type') primary @endslot
	      		@slot('button_name') Ubah @endslot

	      		<form action="{{ route('users.update', $user) }}" method="post" class="form-horizontal" id="form-edit-{{ $user->id }}">
		        	@csrf

		          <div class="form-group row">
		            <label for="id" class="col-sm-2 col-form-label">ID</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control @error('id') is-invalid @enderror" id="id" value="{{ $user->id }}" required autocomplete="id" autofocus placeholder="ID / NRP">
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="name" class="col-sm-2 col-form-label">Nama</label>
		            <div class="col-sm-10">
		              <input type="text" class="form-control @error('name') is-invalid @enderror" id="name" value="{{ $user->name }}" required autocomplete="name" placeholder="Nama">
		            </div>
		          </div>
		          <div class="form-group row">
		            <label for="email" class="col-sm-2 col-form-label">Email</label>
		            <div class="col-sm-10">
		              <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ $user->email }}" required autocomplete="email" placeholder="Email">
		            </div>
		          </div>
		        </form>
	      	@endcomponent
	      	<!-- /.modal -->

	      	<!-- Modal Delete -->
	      	@component('components.modal')
	      		@slot('id') modal-delete-{{ $user->id }} @endslot
	      		@slot('title') Hapus User @endslot
	      		@slot('button_type') danger @endslot
	      		@slot('button_name') Hapus @endslot

	      		<p>Apakah Anda yakin ingin menghapus data <strong>({{ $user->id }}) {{ $user->name }}</strong>?</p>
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