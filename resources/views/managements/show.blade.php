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
          <li class="nav-item"><a class="nav-link active" href="#activity" data-toggle="tab">Information</a></li>
          <li class="nav-item"><a class="nav-link" href="#timeline" data-toggle="tab">Activity</a></li>
        </ul>
      </div><!-- /.card-header -->
      <div class="card-body">
        <div class="tab-content">
          <div class="active tab-pane" id="activity">
            <strong><i class="fas fa-book mr-1"></i> Tempat, Tanggal Lahir</strong>
            <p class="text-muted">Mataram, 12 Februari 1999</p>

            <hr>

            <strong><i class="fas fa-map-marker-alt mr-1"></i> Alamat</strong>
            <p class="text-muted">Jalan Rungkut Harapan Blok D No.10, Rungkut, Surabaya</p>

            <hr>

            <strong><i class="fas fa-pencil-alt mr-1"></i> Kontak</strong>
            <ul class="list-group my-3">
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-phone"></i> &nbsp; Telepon &nbsp;</span><a href="">087 xxx xxx xxx</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fas fa-envelope"></i> &nbsp; Email &nbsp;</span><a href="">gedewisnusetiawan@gmail.com</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fab fa-whatsapp"></i> &nbsp; Whatsapp &nbsp;</span><a href="">087 xxx xxx xxx</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fab fa-instagram"></i> &nbsp; Instagram &nbsp;</span><a href="">gdwisnusetiawan</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fab fa-facebook"></i> &nbsp; Facebook &nbsp;</span><a href="">Wisnu Setiawan</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fab fa-twitter"></i> &nbsp; Twitter &nbsp;</span><a href="">@gdwisnusetiawan</a>
              </li>
              <li class="list-group-item d-flex justify-content-between align-items-center">
                <span><i class="fab fa-linkedin"></i> &nbsp; LinkedIn &nbsp;</span><a href="">gdwisnusetiawan</a>
              </li>
            </ul>

            <hr>

            <strong><i class="far fa-file-alt mr-1"></i> Catatan</strong>

            <p class="text-muted">Lorem ipsum dolor sit amet, consectetur adipiscing elit. Etiam fermentum enim neque.</p>
          </div>
          <!-- /.tab-pane -->
          <div class="tab-pane" id="timeline">
            <!-- The timeline -->
            <div class="timeline timeline-inverse">
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-dark">
                  2019 / 2020
                </span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Mei 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">Bali Festival</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Februari 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">U-Champ</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Agustus 2019</span>
                  <h3 class="timeline-header">Anggota Mahasiswa Pendamping <a href="#">Dharma Yowana</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline time label -->
              <div class="time-label">
                <span class="bg-dark">
                  2018 / 2019
                </span>
              </div>
              <!-- /.timeline-label -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Mei 2019</span>
                  <h3 class="timeline-header">Wakil Ketua <a href="#">Bali Festival</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Maret 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">Tirta Yatra</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Januari 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">Bazaar</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> November 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">Pekan Olahraga Hindu</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Agustus 2019</span>
                  <h3 class="timeline-header">Steering Committee <a href="#">Dharma Yowana</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
              <!-- timeline item -->
              <div>
                <i class="fas fa-check bg-success"></i>

                <div class="timeline-item">
                  <span class="time"><i class="far fa-clock"></i> Juli 2019</span>
                  <h3 class="timeline-header">Wakil Ketua II <a href="#">Badan Pengurus Harian</a></h3>
                </div>
              </div>
              <!-- /.timeline-item -->
            </div>
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