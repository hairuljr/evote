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

  <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />
  <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
  <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
  <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
  <style>
    .disabled {
      pointer-events: none;
    }
    .header__logo img {
      height: 60px !important;
    }
    .header__nav-wrap {
      margin-top: 8px !important;
      padding-top: 8px !important;
    }

    @media only screen and (max-width: 540px) {
      .header__logo img {
        height: auto !important;
      }
    }

  </style>
</head>

<body id="top">
  <x-navbar></x-navbar>

  <section class="s-content" style="{{ count($creations) < 1 ? 'padding-bottom: 54rem' : '' }}">
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
            <h5 class="text-center">Belum ada karya yang diupload.</h5>
        @endforelse
      </div>
    </div>
    <div class="row">
      <div class="col-full">
        {{ $creations->withQueryString()->links('components.pagination') }}
      </div>
    </div>
  </section>
  <footer class="bg-black text-center py-5">
    <div class="container px-5">
        <div class="text-white-50 small">
            <div class="mb-2">&copy; {{ config('app.name') }} {{ date('Y') }}. All Rights Reserved.</div>
        </div>
    </div>
  </footer>
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