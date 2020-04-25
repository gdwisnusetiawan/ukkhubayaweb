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

@section('title', 'ANGGOTA')

@section('breadcumb')
  <li class="breadcrumb-item">Master</li>
  <li class="breadcrumb-item"><a href="#">Anggota</a></li>
  <li class="breadcrumb-item active">Lihat</li>
@endsection

@section('content')
<div class="row">
  <div class="col-md-3">
    <!-- Profile Image -->
    <div class="card">
    	<div class="card-header">
    		<a href="{{ url()->current() == url()->previous() ? route('members.index') : url()->previous() }}"><i class="fas fa-chevron-left"></i> Kembali</a>
    	</div>
      <div class="card-body box-profile">
        <div class="text-center">
          <img class="img-fluid"
          	@if ($member->type == 'student')
              src="https://my.ubaya.ac.id/img/mhs/{{ $member->id }}_m.jpg"
          	@else
          		src="https://my.ubaya.ac.id/img/krwyn/{{ $member->id }}_m.jpg"
          	@endif
              alt="User profile picture">
        </div>

        <h3 class="profile-username text-center">{{ $member->name }}</h3>

        <p class="text-muted text-center">{{ ucfirst($member->type) }}</p>

        <ul class="list-group list-group-unbordered mb-3">
          <li class="list-group-item">
            <b>{{ ($member->type == 'student') ? 'NRP' : 'NPK' }}</b> <a class="float-right">{{ $member->id }}</a>
          </li>
          @if ($member->type == 'student')
          <li class="list-group-item">
            <b>Angkatan</b> <a class="float-right">{{ $member->year }}</a>
          </li>
          <li class="list-group-item">
            <b>Fakultas</b> <a class="float-right">{{ $member->faculty->name }}</a>
          </li>
          @endif

          <a href="{{ route('members.edit', $member) }}" class="btn btn-primary btn-block"><b>Ubah profil</b></a>
        </ul>
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

            <div class="d-flex justify-content-between align-items-center">
            	<strong><i class="fas fa-pencil-alt mr-1"></i>Kontak</strong>
              <button type="button" class="btn btn-primary m-1" data-toggle="modal" data-target="#modal-add"><i class="fas fa-plus"></i> Tambah</button>
              <!-- Modal Add -->
              @component('components.modal')
                @slot('id') modal-add @endslot
                @slot('title') Tambah Kontak @endslot
                @slot('button_type') primary @endslot
                @slot('button_name') Tambah @endslot
                @slot('form_id') form-add @endslot

                <form action="{{ route('member.contact.store', $member) }}" method="post" id="form-add">
                  @csrf

                  <div class="form-group row">
                    <label for="name" class="col-sm-2 col-form-label">Kontak</label>
                    <div class="col-sm-10">
                      <select class="form-control select2bs4 @error('contact_id') is-invalid @enderror" name="contact_id" required style="width: 100%;">
                        @foreach ($contacts as $contact)
                          <option value="{{ $contact->id }}" {{ $contact->id == old('contact_id') ? 'selected' : '' }}>{{ $contact->name }}</option>
                        @endforeach
                      </select>
                      @error('contact_id')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                  <div class="form-group row">
                    <label for="link" class="col-sm-2 col-form-label">Link</label>
                    <div class="col-sm-10">
                      <input type="text" class="form-control @error('link') is-invalid @enderror" name="link" value="{{ old('link') }}" required autocomplete="link" placeholder="Link menuju kontak">
                      @error('link')
                        <span class="invalid-feedback" role="alert">
                          <strong>{{ $message }}</strong>
                        </span>
                      @enderror
                    </div>
                  </div>
                </form>
              @endcomponent
              <!-- /.modal -->
            </div>
          	<ul class="list-group my-3">
              @forelse($member->contacts as $contact)
          		<li class="list-group-item d-flex justify-content-between align-items-center">
          	    <span>
                  <i class="{{ $contact->icon }}"></i> &nbsp; 
                  <a href="{{ $contact->pivot->link }}" target="_BLANK">{{ $contact->name }}</a> &nbsp;
                </span>
                <span>
                  <a href="{{ route('member.contact.edit', [$member, $contact]) }}" class="btn btn-outline-primary btn-sm m-1"><i class="fas fa-edit"></i></a>
                  <button type="button" class="btn btn-outline-danger btn-sm m-1" data-toggle="modal" data-target="#modal-delete-{{ $contact->id }}"><i class="fas fa-trash"></i></button>
                </span>
          	  </li>
              @empty
              <p class="text-center w-100">Tidak ada kontak.</p>
              @endforelse

              @foreach ($member->contacts as $contact)
                <!-- Modal Delete -->
                @component('components.modal')
                  @slot('id') modal-delete-{{ $contact->id }} @endslot
                  @slot('title') Hapus Kontak @endslot
                  @slot('button_type') danger @endslot
                  @slot('button_name') Hapus @endslot
                  @slot('form_id') form-delete-{{ $contact->id }} @endslot

                  <p>Apakah Anda yakin ingin menghapus data <strong>{{ $contact->name }}</strong>?</p>
                  <form action="{{ route('member.contact.destroy', [$member, $contact]) }}" method="post" id="form-delete-{{ $contact->id }}">
                    @csrf
                    @method('delete')
                  </form>
                @endcomponent
                <!-- /.modal -->
              @endforeach
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
      if('{{ session("error") }}') {
        Toast.fire({
          type: 'error',
          title: '{{ session("error") }}'
        })
      }
	  });
	</script>
@endpush