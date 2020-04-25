@extends('layouts.master')

@push('css')
  <!-- icheck bootstrap -->
  <link rel="stylesheet" href="{{ asset('admin-lte/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
@endpush

@section('body-class', 'login-page')

@section('content')
<div class="login-box">
  <div class="login-logo">
    <a href="{{ route('home') }}"><b>UKKH</b> UBAYA</a>
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      @if (session('status'))
        <div class="alert alert-success" role="alert">
          {{ session('status') }}
        </div>
      @endif

      <h4 class="login-box-msg">{{ __('Reset Password') }}</h4>

      <form action="{{ route('password.email') }}" method="post">
        @csrf

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
        </div>

        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">{{ __('Send Password Reset Link') }}</button>
          </div>
          <!-- /.col -->
        </div>
      </form>

      <p class="my-1">
        <a href="{{ route('login') }}">{{ __('Login') }}</a> or <a href="{{ route('register') }}" class="text-center">{{ __('Register') }}</a>
      </p>
    </div>
    <!-- /.login-card-body -->
  </div>
</div>
<!-- /.login-box -->
@endsection