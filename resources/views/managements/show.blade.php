@extends('layouts.master')

@push('css')
  <!-- summernote -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/summernote/summernote-bs4.css') }}">
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

@section('title', 'PENGURUS')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="#">Pengurus</a></li>
  <li class="breadcrumb-item active">Lihat</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card">
      <div class="card-header">
        <a href="{{ url()->current() == url()->previous() ? route('managements.index') : url()->previous() }}"><i class="fas fa-chevron-left"></i> Kembali</a>
      </div>
      <div class="card-body box-profile">
        @isset ($head)
        <div class="text-center">
          <img class="img-fluid"
            @if ($head->type == 'student')
              src="https://my.ubaya.ac.id/img/mhs/{{ $head->id }}_m.jpg"
            @else
              src="https://my.ubaya.ac.id/img/krwyn/{{ $head->id }}_m.jpg"
            @endif
              alt="User profile picture">
        </div>
        <h3 class="profile-username text-center">{{ $head->name }}</h3>

        <p class="text-muted text-center">{{ ucfirst($head->type) }}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>{{ ($head->type == 'student') ? 'NRP' : 'NPK' }}</b> <a class="float-right">{{ $head->id }}</a>
          </li>
          @if ($head->type == 'student')
          <li class="list-group-item">
            <b>Angkatan</b> <a class="float-right">{{ $head->year }}</a>
          </li>
          <li class="list-group-item">
            <b>Fakultas</b> <a class="float-right">{{ $head->faculty->name }}</a>
          </li>
          @endif
        </ul>
        @endisset
      </div>
      <!-- /.card-body -->
    </div>
    <!-- /.card -->
  </div>
  <!-- /.col -->
  <div class="col-md-9">
    <div class="card">
      <div class="card-header p-2">
        <ul class="nav nav-pills">
          <li class="nav-item"><a class="nav-link active" href="#job" data-toggle="tab">Tugas</a></li>
          <li class="nav-item"><a class="nav-link" href="#information" data-toggle="tab">Informasi</a></li>
          @if ($management->has('members')->where('role', 'staff'))
          <li class="nav-item"><a class="nav-link" href="#member" data-toggle="tab">Anggota</a></li>
          @endif
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="job">
            <textarea id="textareaJob" class="textarea" name="job" disabled style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $management->job }}</textarea>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="information">
            <textarea id="textareaInformation" class="textarea" name="information" disabled style="font-size: 14px; line-height: 18px; border: 1px solid #dddddd; padding: 10px;">{{ $management->information }}</textarea>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="member">
            
          </div>
          <!-- /.tab-pane -->
        </div>
        <!-- /.tab-content -->
      </div><!-- /.card-body -->
    </div>
    <!-- /.nav-tabs-custom -->
  </div>
  <!-- /.col -->
</div>
<!-- /.row -->
@endsection

@push('js')
  <!-- Summernote -->
  <script src="{{ asset('admin-lte/plugins/summernote/summernote-bs4.min.js') }}"></script>
  <!-- SweetAlert2 -->
  <script src="{{ asset('admin-lte/plugins/sweetalert2/sweetalert2.min.js') }}"></script>
  <!-- page script -->
  <script>
    $(document).ready(function () {
      // Summernote
      $('.textarea').summernote({
        toolbar: [],
        height: 'auto',
        disableResizeEditor: true,
      });
      $('#textareaJob').summernote('disable');
      $('#textareaInformation').summernote('disable');

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