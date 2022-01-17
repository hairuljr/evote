<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

  <meta charset="utf-8">
  <title>{{ config('app.name') }}</title>
  <meta name="description" content="Aplikasi evote karya">
  <meta name="author" content="Jr Comp">

  <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

  <link rel="stylesheet" href="{{ asset('frontend/css/base.css') }}" />

  <script src="{{ asset('frontend/js/modernizr.js') }}"></script>
  <script>eval(mod_pagespeed_F_5s4xpU58);</script>
  <script>eval(mod_pagespeed_6uAVvYLEkz);</script>

  <link rel="shortcut icon" href="{{ asset('template/assets/favicon.ico') }}" type="image/x-icon">
  <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />
  <style>
    .disabled {
      pointer-events: none;
    }
  </style>
</head>

<body id="top">
  <x-navbar></x-navbar>

  <section class="s-content">
    <div class="row masonry-wrap">
      <div class="masonry">
        <div class="grid-sizer"></div>
        @forelse ($creations as $item)
          <article class="masonry__brick entry format-gallery" data-aos="fade-up">
            <div class="entry__thumb slider">
              <div class="slider__slides">
                @foreach ($item->photo as $photo)
                  <div class="slider__slide">
                    <img src="{{ $photo->picture }}"
                      srcset="{{ $photo->picture }} 1x, {{ $photo->picture }} 2x"
                      alt="Foto karya">
                  </div> 
                @endforeach
              </div>
            </div>
            <div class="entry__text">
              <div class="entry__header">
                <h1 class="entry__title"><a href="{{ route('detail', $item->slug) }}">{{ $item->title }}</a></h1>
              </div>
              <div class="entry__excerpt">
                {{-- <p> --}}
                  {!! Str::words($item->description, 25, '...') !!}
                {{-- </p> --}}
              </div>
              <div class="entry__meta">
                <span class="entry__meta-links">
                  <a href="{{ route('detail', $item->slug) }}">Lihat Selengkapnya</a>
                </span>
              </div>
            </div>
          </article>
        @empty
            <h3 class="text-center">Belum ada karya yang diupload.</h3>
        @endforelse
      </div>
    </div>
    <div class="row">
      <div class="col-full">
        {{ $creations->withQueryString()->links('components.pagination') }}
      </div>
    </div>
  </section>

  <div id="preloader">
    <div id="loader">
      <div class="line-scale">
        <div></div>
        <div></div>
        <div></div>
        <div></div>
        <div></div>
      </div>
    </div>
  </div>

  <script src="{{ asset('frontend/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ asset('frontend/js/plugins.js') }}"></script>
  <script src="{{ asset('frontend/js/main.js') }}"></script>
  <script>
    $("p").removeClass("lead");
  </script>
</body>
</html>