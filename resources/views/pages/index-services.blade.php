<section id="services" class="section-bg">
  <div class="container">

    <header class="section-header">
      <h3>Program Kerja</h3>
      <p>Kegiatan - kegiatan yang kami lakukan.</p>
    </header>

    <div class="row">
      @foreach($events as $event)
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #e1eeff;"><i class="ion-ios-analytics-outline" style="color: #2282ff;"></i></div>
          <h4 class="title"><a href="">{{ $event->program->name }} {{ $event->year }}</a></h4>
          <p><i class="ion-ios-calendar-outline" style="color: #2282ff;"></i>&nbsp;
            @if ($event->date_end == null || Carbon\Carbon::parse($event->date_begin)->format('d F Y') == Carbon\Carbon::parse($event->date_end)->format('d F Y'))
              {{ Carbon\Carbon::parse($event->date_begin)->format('d F Y') }}
            @else
              @if (Carbon\Carbon::parse($event->date_begin)->format('Y') == Carbon\Carbon::parse($event->date_end)->format('Y'))
                <!-- if the year and month are the same -->
                @if (Carbon\Carbon::parse($event->date_begin)->format('F') == Carbon\Carbon::parse($event->date_end)->format('F'))
                  {{ Carbon\Carbon::parse($event->date_begin)->format('d') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
                <!-- if the year is the same and the month is different -->
                @else
                  {{ Carbon\Carbon::parse($event->date_begin)->format('d F') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
                @endif
              <!-- if the date, month and year are different -->
              @else
                {{ Carbon\Carbon::parse($event->date_begin)->format('d F Y') }} - {{ Carbon\Carbon::parse($event->date_end)->format('d F Y') }}
              @endif
            @endif
          
          @if ($event->time_begin != null)
            &nbsp; | &nbsp; 
            <span class="text-muted"><i class="ion-ios-time-outline" style="color: #2282ff;"></i>&nbsp;
              {{ Carbon\Carbon::parse($event->time_begin)->format('H:i') }}
              @if ($event->time_end != null)
                - {{ Carbon\Carbon::parse($event->time_end)->format('H:i') }}
              @endif
            </span>
          @endif
          </p>
          <p class="description"><i class="ion-ios-location-outline" style="color: #2282ff;"></i>&nbsp; {{ $event->location }}</p>
        </div>
      </div>
      @endforeach
      <!-- <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #fff0da;"><i class="ion-ios-bookmarks-outline" style="color: #e98e06;"></i></div>
          <h4 class="title"><a href="">Dolor Sitema</a></h4>
          <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #e6fdfc;"><i class="ion-ios-paper-outline" style="color: #3fcdc7;"></i></div>
          <h4 class="title"><a href="">Sed ut perspiciatis</a></h4>
          <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.1s" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #eafde7;"><i class="ion-ios-speedometer-outline" style="color:#41cf2e;"></i></div>
          <h4 class="title"><a href="">Magni Dolores</a></h4>
          <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
        </div>
      </div>

      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #e1eeff;"><i class="ion-ios-world-outline" style="color: #2282ff;"></i></div>
          <h4 class="title"><a href="">Nemo Enim</a></h4>
          <p class="description">At vero eos et accusamus et iusto odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque</p>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 wow bounceInUp" data-wow-delay="0.2s" data-wow-duration="1.4s">
        <div class="box">
          <div class="icon" style="background: #ecebff;"><i class="ion-ios-clock-outline" style="color: #8660fe;"></i></div>
          <h4 class="title"><a href="">Eiusmod Tempor</a></h4>
          <p class="description">Et harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est eligendi</p>
        </div>
      </div> -->

    </div>

  </div>
</section><!-- #services -->