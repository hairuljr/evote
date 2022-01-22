<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />
        <link rel="apple-touch-icon" sizes="180x180" href="{{ asset('apple-touch-icon.png') }}">
        <link rel="icon" type="image/png" sizes="32x32" href="{{ asset('favicon-32x32.png') }}">
        <link rel="icon" type="image/png" sizes="16x16" href="{{ asset('favicon-16x16.png') }}">
        <!-- Bootstrap icons-->
        <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.5.0/font/bootstrap-icons.css" rel="stylesheet" />
        <!-- Google fonts-->
        <link rel="preconnect" href="https://fonts.gstatic.com" />
        <link href="https://fonts.googleapis.com/css2?family=Newsreader:ital,wght@0,600;1,600&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Mulish:ital,wght@0,300;0,500;0,600;0,700;1,300;1,500;1,600;1,700&amp;display=swap" rel="stylesheet" />
        <link href="https://fonts.googleapis.com/css2?family=Kanit:ital,wght@0,400;1,400&amp;display=swap" rel="stylesheet" />
        <!-- Core theme CSS (includes Bootstrap)-->
        <link href="{{ asset('template/css/styles.css') }}" rel="stylesheet" />
        <link href="{{ asset('css/custom.css') }}" rel="stylesheet" />
    </head>
    <body id="page-top">
        <section class="bg-light" style="height: 100vh">
          <div class="container">
            <div class="d-flex justify-content-center align-items-center">
              <div class="card py-5 px-3">
                <form action="{{ route('login-qr') }}" method="post">
                  @csrf
                  <h4 class="m-0">Login menggunakan NIM</h4>
                  <span class="mobile-text">Masukkan 10 digit NIM anda ex: <b class="text-danger fst-italic">0025103001 </b>
                  </span>
                  <div class="d-flex flex-row mt-5">
                    <input maxlength="10" name="digit" type="text" value="{{ old('digit') }}" class="form-control" placeholder="Masukkan NIM disini" required autocomplete="off">
                  </div>
                  @if (session('error'))
                      <div class="mt-2 p-2 alert alert-warning alert-dismissible fade show" role="alert">{{ session('error') }}
                        <button type="button" class="p-3 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                  @endif
                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">MASUK</button>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('template/js/scripts.js') }}"></script>
        <script>
          $(function() {
              $("input[name='digit']").on('input', function(e) {
                  $(this).val($(this).val().replace(/[^0-9]/g, ''));
              });
          });
      </script>
    </body>
</html>
