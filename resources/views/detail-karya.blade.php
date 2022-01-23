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
  <link rel="stylesheet" href="{{ asset('css/scrollbar.css') }}" />

  <style>
    .comments-wrap {
        margin-top: 0px !important;
        padding: 0px !important;
    }
    #comments form {
        padding-top: 0px !important;
    }
    textarea {
        min-height: 10rem !important;
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
    .swal2-popup { font-size: 1.5rem !important; }
    .swal2-styled { padding: 0 3rem !important; }
  </style>
</head>

<body id="top">

    <x-navbar></x-navbar>

    <section class="s-content s-content--narrow s-content--no-padding-bottom">
        <article class="row format-gallery">
            <div class="s-content__header col-full">
                <h1 class="s-content__header-title">
                    {{ $creation->title ?? '-' }}
                </h1>
                <ul class="s-content__header-meta">
                    <li class="date">Jumlah Vote: {{ $creation->vote_count ?? '0' }}</li>
                </ul>
            </div>
            <div class="s-content__media col-full">
                <div class="s-content__slider slider">
                    <div class="slider__slides">
                        @foreach ($creation->photo as $item)                        
                            <div class="slider__slide">
                                <img src="{{ $item->picture }}" srcset="{{ $item->picture }} 2000w,
                                            {{ $item->picture }} 1000w,
                                            {{ $item->picture }} 500w"
                                    sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-full s-content__main">
                {!! $creation->description ?? 'Belum ada deskripsi karya.' !!}
            </div>
        </article>

        <div class="comments-wrap">
            <div id="comments" class="row">
                <div class="col-full">
                    <div class="respond">
                        <h3 class="h2">Berikan Vote</h3>
                        <form method="post" action="{{ route('submit-vote') }}">
                            @csrf
                            <fieldset>
                                <div class="message form-field">
                                    <input type="hidden" name="creation_id" value="{{ $creation->id }}">
                                    <textarea name="cMessage" id="cMessage" class="full-width"
                                        placeholder="Kesan, Kritik ataupun Saran" autocomplete="off">{{ old('cMessage') }}</textarea>
                                </div>
                                <button type="submit" class="submit btn--primary btn--large full-width">Vote Sekarang</button>
                            </fieldset>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <div class="go-top">
        <a class="smoothscroll" title="Back to Top" href="#top"></a>
    </div>

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
  @include('sweetalert::alert')
    <script>
        @if (session('change'))
            Swal.fire({
                title: 'Apakah anda ingin mengganti vote?',
                text: "Anda sudah memberikan vote pada karya lain di Matakuliah yang sama!",
                icon: 'question',
                width: '600px',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                reverseButtons: true,
                cancelButtonText: 'Tidak Jadi',
                confirmButtonText: 'Ya, Ganti Vote!'
            }).then((result) => {
                if (result.isConfirmed) {
                    var _token = "{{ csrf_token() }}"
                    var creation = "{{ $creation->id }}"
                    var study = "{{ $creation->study_id }}"
                    var message = $('#cMessage').val()

                    $.ajax({
                        url: "{{ route('change-vote') }}",
                        type:'POST',
                        data: {
                            _token: _token,
                            creation_id: creation,
                            study_id: study,
                            cMessage: message
                        },
                        success: function(data) {
                            Swal.fire(
                            'Terimakasih!',
                            'Vote diganti, Anda berhasil memberikan vote pada karya ini!',
                            'success'
                            )
                            setTimeout(() => {
                                window.location.reload()
                            }, 3000);
                        }
                    });
                }
            })
        @endif
    </script>
</body>
</html>