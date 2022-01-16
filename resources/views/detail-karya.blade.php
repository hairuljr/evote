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
  </style>
</head>

<body id="top">

  <section class="s-content s-content--narrow s-content--no-padding-bottom">
    <article class="row format-gallery">
        <div class="s-content__header col-full">
            <h1 class="s-content__header-title">
                This Is a Gallery Post Format.
            </h1>
            <ul class="s-content__header-meta">
                <li class="date">December 16, 2017</li>
                <li class="cat">
                    In
                    <a href="#0">Lifestyle</a>
                    <a href="#0">Travel</a>
                </li>
            </ul>
        </div>
        <div class="s-content__media col-full">
            <div class="s-content__slider slider">
                <div class="slider__slides">
                    <div class="slider__slide">
                        <img src="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-01-1000.jpg') }}" srcset="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-01-2000.jpg') }} 2000w,
                                     {{ asset('frontend/images/thumbs/single/gallery/single-gallery-01-1000.jpg') }} 1000w,
                                     {{ asset('frontend/images/thumbs/single/gallery/single-gallery-01-500.jpg') }} 500w"
                            sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-02-1000.jpg') }}" srcset="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-02-2000.jpg') }} 2000w,
                                     {{ asset('frontend/images/thumbs/single/gallery/single-gallery-02-1000.jpg') }} 1000w,
                                     {{ asset('frontend/images/thumbs/single/gallery/single-gallery-02-500.jpg') }} 500w"
                            sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                    </div>
                    <div class="slider__slide">
                        <img src="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-03-1000.jpg') }}" srcset="{{ asset('frontend/images/thumbs/single/gallery/single-gallery-03-2000.jpg') }} 2000w,
                                    {{ asset('frontend/images/thumbs/single/gallery/single-gallery-03-1000.jpg') }} 1000w,
                                    {{ asset('frontend/images/thumbs/single/gallery/single-gallery-03-500.jpg') }} 500w"
                            sizes="(max-width: 2000px) 100vw, 2000px" alt="">
                    </div>
                </div>
            </div>
        </div>
        <div class="col-full s-content__main">
            <p class="lead">Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor
                sunt sint sit nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit
                amet anim veniam dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat
                qui labore cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint.</p>
            <p>Duis ex ad cupidatat tempor Excepteur cillum cupidatat fugiat nostrud cupidatat dolor sunt sint sit
                nisi est eu exercitation incididunt adipisicing veniam velit id fugiat enim mollit amet anim veniam
                dolor dolor irure velit commodo cillum sit nulla ullamco magna amet magna cupidatat qui labore
                cillum sit in tempor veniam consequat non laborum adipisicing aliqua ea nisi sint ut quis proident
                ullamco ut dolore culpa occaecat ut laboris in sit minim cupidatat ut dolor voluptate enim veniam
                consequat occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit
                quis nostrud sed sed.
            </p>
            <p>
                <img src="{{ asset('frontend/images/wheel-1000.jpg') }}"
                    srcset="{{ asset('frontend/images/wheel-2000.jpg') }} 2000w, {{ asset('frontend/images/wheel-1000.jpg') }} 1000w, {{ asset('frontend/images/wheel-500.jpg') }}"
                    sizes="(max-width: 2000px) 100vw, 2000px" alt="">
            </p>
            <h2>Large Heading</h2>
            <p>Harum quidem rerum facilis est et expedita distinctio. Nam libero tempore, cum soluta nobis est
                eligendi optio cumque nihil impedit quo minus <a href="http://#">omnis voluptas assumenda est</a> id
                quod maxime placeat facere possimus, omnis dolor repellendus. Temporibus autem quibusdam et aut
                officiis debitis aut rerum necessitatibus saepe eveniet ut et.</p>
            <blockquote>
                <p>This is a simple example of a styled blockquote. A blockquote tag typically specifies a section
                    that is quoted from another source of some sort, or highlighting text in your post.</p>
            </blockquote>
            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et
                quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu
                leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a
                pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat
                fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
            </p>
            <h3>Smaller Heading</h3>
            <p>Dolores et quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.
                Aenean eu leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit
                libero, a pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat
                occaecat fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud
                sed sed.
            <pre><code>
code {
    font-size: 1.4rem;
    margin: 0 .2rem;
    padding: .2rem .6rem;
    white-space: nowrap;
    background: #F1F1F1;
    border: 1px solid #E1E1E1;
    border-radius: 3px;
}
</code></pre>
            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et
                quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa.</p>
            <ul>
                <li>Donec nulla non metus auctor fringilla.
                    <ul>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                        <li>Lorem ipsum dolor sit amet.</li>
                    </ul>
                </li>
                <li>Donec nulla non metus auctor fringilla.</li>
                <li>Donec nulla non metus auctor fringilla.</li>
            </ul>
            <p>Odio dignissimos ducimus qui blanditiis praesentium voluptatum deleniti atque corrupti dolores et
                quas molestias excepturi sint occaecati cupiditate non provident, similique sunt in culpa. Aenean eu
                leo quam. Pellentesque ornare sem lacinia quam venenatis vestibulum. Nulla vitae elit libero, a
                pharetra augue laboris in sit minim cupidatat ut dolor voluptate enim veniam consequat occaecat
                fugiat in adipisicing in amet Ut nulla nisi non ut enim aliqua laborum mollit quis nostrud sed sed.
            </p>
        </div>
    </article>

    <div class="comments-wrap">
        <div id="comments" class="row">
            <div class="col-full">
                <div class="respond">
                    <h3 class="h2">Berikan Vote</h3>
                    <form name="contactForm" id="contactForm" method="post" action="#">
                        <fieldset>
                            <div class="message form-field">
                                <textarea name="cMessage" id="cMessage" class="full-width"
                                    placeholder="Kesan, Kritik ataupun Saran"></textarea>
                            </div>
                            <button type="submit" class="submit btn--primary btn--large full-width">Submit</button>
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
</body>
</html>