@extends('layouts.master')

@section('title', 'REGISTER')
@section('body-class', 'register-page')

@section('content')
<div class="register-box">
  <div class="register-logo">
    <a href="{{ route('home') }}"><b>UKKH</b> UBAYA</a>
  </div>
  <!-- /.register-logo -->
  <div class="card">
    <div class="card-body register-card-body">
      <h4 class="register-box-msg">{{ __('Register') }}</h4>

      <form action="{{ route('register') }}" method="post">
        @csrf

        <div class="input-group mb-3">
          <input id="id" type="text" class="form-control @error('id') is-invalid @enderror" name="id" value="{{ old('id') }}" required autocomplete="id" autofocus placeholder="ID (NRP)">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-user"></span>
            </div>
          </div>
          @error('id')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input id="email" type="text" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="{{ __('E-Mail Address') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-envelope"></span>
            </div>
          </div>
          @error('email')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
          <small class="text-muted">Gunakan email Gooaya untuk dapat mendaftarkan diri dan pastikan Anda adalah anggota UKKH UBAYA</small>
        </div>

        <div class="input-group mb-3">
          <input id="password" type="password" class="form-control @error('password') is-invalid @enderror" name="password" required autocomplete="new-password" placeholder="{{ __('Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
          @error('password')
            <span class="invalid-feedback" role="alert">
              <strong>{{ $message }}</strong>
            </span>
          @enderror
        </div>

        <div class="input-group mb-3">
          <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required autocomplete="new-password" placeholder="{{ __('Confirm Password') }}">
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-lock"></span>
            </div>
          </div>
        </div>

        <div class="d-flex justify-content-between">
            <a href="{{ route('login') }}" class="text-center">{{ __('Login') }}</a>
            <button type="submit" class="btn btn-primary">{{ __('Register') }}</button>
        </div>
      </form>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection

@push('js')
<script type="text/javascript">
  $('#id').on('keyup', function() {
    var id = $('#id').val();
    $('#email').val('s'+id+'@student.ubaya.ac.id');
  });
</script>
@endpush