@extends('viewer.master')

@section('title', 'WELCOME')

@push('css')
<style type="text/css">
  #intro {
    background: #f5f8fd;
  }
  #about .about-img::before {
    content: none;
  }
  #about .about-img::after {
    content: none;
  }

  #features .feature-item ul {
    list-style: none;
    padding: 0;
  }

  #features .feature-item ul li {
    padding-bottom: 10px;
  }

  #features .feature-item ul li i {
    font-size: 20px;
    padding-right: 4px;
    color: #1bb1dc;
  }
</style>
@endpush

@section('content')
<!--==========================
  About Us Section
============================-->
@include('pages.index-about')

<!--==========================
  Services Section
============================-->
@include('pages.index-services')

<!--==========================
  Why Us Section
============================-->

<!--==========================
  Call To Action Section
============================-->

<!--==========================
  Features Section
============================-->
@include('pages.index-features')

<!--==========================
  Portfolio Section
============================-->

<!--==========================
  Testimonials Section
============================-->

<!--==========================
  Team Section
============================-->

<!--==========================
  Clients Section
============================-->

<!--==========================
  Pricing Section
============================-->

<!--==========================
  Frequently Asked Questions Section
============================-->

@endsection

@push('js')
<script type="text/javascript">
  @if(isset($profile))
    var description = @json($profile->description);
    $('#about-description').html(description);
    var vision = @json($profile->vision);
    $('#feature-vision').html(vision);
    var mission = @json($profile->mission);
    $('#feature-mission').html(mission);
  @endif
</script>
@endpush