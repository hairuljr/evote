<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no" />
        <meta name="description" content="" />
        <meta name="author" content="" />
        <title>{{ config('app.name') }}</title>
        <link rel="icon" type="image/x-icon" href="{{ asset('template/assets/favicon.ico') }}" />
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
                  <h5 class="m-0">Login menggunakan NIM</h5>
                  <span class="mobile-text">Masukkan 6 digit NIM anda ex: <b class="text-danger">199901 </b>
                  </span>
                  <div class="d-flex flex-row mt-5 input-lg">
                    @foreach ($digits as $key => $item)
                    @php
                        $no = (int)$key+1;
                    @endphp
                    <input name="{{ 'digit_'.$no }}" value="{{ $item }}" type="text" class="form-control" autofocus="">
                    @endforeach
                  </div>
                  <input name="all_digit" type="text" value="{{ $number }}" class="form-control d-md-none" placeholder="Masukkan NIM disini" required>
                  @if ($errors->any())
                    @foreach ($errors->all() as $error)
                      <div class="mt-2 p-2 alert alert-warning alert-dismissible fade show" role="alert">{{ $error }}
                        <button type="button" class="p-3 btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endforeach
                  @endif
                  <div class="text-center mt-4">
                    <button type="submit" class="btn btn-primary">MASUK</button>
                    <span class="d-block mobile-text mt-3">*Anda hanya bisa melakukan satu kali Vote.</span>
                  </div>
                </form>
              </div>
          </div>
          </div>
        </section>
        <!-- Bootstrap core JS-->
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"></script>
        <!-- Core theme JS-->
        <script src="{{ asset('template/js/scripts.js') }}"></script>
    </body>
</html>
