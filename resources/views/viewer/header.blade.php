<header id="header">
  <div id="topbar">
    <div class="container">
      <div class="social-links">
        <a href="#" class="twitter"><i class="fa fa-twitter"></i></a>
        <a href="#" class="facebook"><i class="fa fa-facebook"></i></a>
        <a href="#" class="linkedin"><i class="fa fa-linkedin"></i></a>
        <a href="#" class="instagram"><i class="fa fa-instagram"></i></a>
      </div>
    </div>
  </div>

  <div class="container">

    <div class="logo float-left">
      <!-- Uncomment below if you prefer to use an image logo -->
      <h1 class="text-light"><a href="#intro" class="scrollto"><span>UKKH UBAYA</span></a></h1>
      <!-- <a href="#header" class="scrollto"><img src="img/logo.png" alt="" class="img-fluid"></a> -->
    </div>

    <nav class="main-nav float-right d-none d-lg-block" id="navbar">
      <ul>
        <li class="active"><a href="#intro">Beranda</a></li>
        <li><a href="#about">Tentang Kami</a></li>
        <li><a href="#services">Program Kerja</a></li>
        <li><a href="#features">Visi & Misi</a></li>
        <!-- <li><a href="#portfolio">Portfolio</a></li>
        <li><a href="#team">Team</a></li>
        <li class="drop-down"><a href="">Drop Down</a>
          <ul>
            <li><a href="#">Drop Down 1</a></li>
            <li class="drop-down"><a href="#">Drop Down 2</a>
              <ul>
                <li><a href="#">Deep Drop Down 1</a></li>
                <li><a href="#">Deep Drop Down 2</a></li>
                <li><a href="#">Deep Drop Down 3</a></li>
                <li><a href="#">Deep Drop Down 4</a></li>
                <li><a href="#">Deep Drop Down 5</a></li>
              </ul>
            </li>
            <li><a href="#">Drop Down 3</a></li>
            <li><a href="#">Drop Down 4</a></li>
            <li><a href="#">Drop Down 5</a></li>
          </ul>
        </li> -->
        <li><a href="#footer">Hubungi Kami</a></li>
        <li><a href="{{ route('login') }}" class="btn-primary">Login</a></li>
        <li><a href="{{ route('register') }}" class="btn-primary">Register</a></li>
      </ul>
    </nav><!-- .main-nav -->
    
  </div>
</header><!-- #header -->

<!--==========================
  Intro Section
============================-->
<section id="intro" class="clearfix">
  <div class="container d-flex h-100">
    <div class="row justify-content-center align-self-center">
      <div class="col-md-6 intro-info order-md-first order-last">
        <h2>Unit Kegiatan Kerohanian Hindu<br><span>Universitas Surabaya</span></h2>
        <div>
          <a href="#about" class="btn-get-started scrollto">Get Started</a>
        </div>
      </div>

      <div class="col-md-6 intro-img order-md-last order-first">
        <img src="{{ asset('rapid/img/undraw_stand_out.svg') }}" alt="" class="img-fluid">
      </div>
    </div>

  </div>
</section><!-- #intro -->