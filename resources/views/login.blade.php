<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Login - Hotel</title>
  <link rel="manifest" href="{{ asset('Assets/assets/favicon/manifest.json') }}">
  <meta name="msapplication-TileColor" content="#ffffff">
  <meta name="msapplication-TileImage" content="assets/favicon/ms-icon-144x144.png">
  <meta name="theme-color" content="#ffffff">
  <!-- Vendors styles-->
  <link rel="stylesheet" href="{{ asset('Assets/vendors/simplebar/css/simplebar.css') }}">
  <link rel="stylesheet" href="{{ asset('Assets/css/vendors/simplebar.css') }}">
  <!-- Main styles for this application-->
  <link href="{{ asset('Assets/css/style.css') }}" rel="stylesheet">
  <!-- We use those styles to show code examples, you should remove them in your application.-->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/prismjs@1.23.0/themes/prism.css">
  <link href="{{ asset('Assets/css/examples.css') }}" rel="stylesheet">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <!-- Global site tag (gtag.js) - Google Analytics-->
  <script async="" src="https://www.googletagmanager.com/gtag/js?id=UA-118965717-3"></script>
  <script>
    window.dataLayer = window.dataLayer || [];

    function gtag() {
      dataLayer.push(arguments);
    }
    gtag('js', new Date());
    // Shared ID
    gtag('config', 'UA-118965717-3');
    // Bootstrap ID
    gtag('config', 'UA-118965717-5');
  </script>
</head>

<body>
  <div class="bg-light min-vh-100 d-flex flex-row align-items-center">
    <div class="container">
      <div class="row justify-content-center">
        <div class="col-lg-8">
          <div class="card-group d-block d-md-flex row shadow-lg">
            <div class="card col-md-7 p-4 mb-0">
              <div class="card-body">
                <h1>Login</h1>
                <form action="{{route('login')}}" method="POST">
                  @csrf
                  <p class="text-medium-emphasis">Silahkan Masuk Menggunakan Akun Anda</p>
                  <div class="input-group"><span class="input-group-text">
                      <i class="fa-solid fa-envelope"></i></span>
                    <input class="form-control" type="text" placeholder="Email" name="email">
                  </div>
                  @if ($message = Session::get('loginError'))
                  <div class="text-danger">{{ $message }}</div>
                  @endif
                  <div class="input-group mt-3"><span class="input-group-text">
                      <i class="fa-solid fa-lock"></i></span>
                    <input class="form-control" type="password" placeholder="Password" name="password">
                  </div>
                  @if ($message = Session::get('loginError'))
                  <div class="text-danger">{{ $message }}</div>
                  @endif
                  <div class="row  mt-4">
                    <div class="col-6">
                      <button class="btn btn-dark px-4" type="submit">Login</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div class="card col-md-5 text-white bg-dark py-5">
              <div class="card-body text-center">
                <div>
                  <h2>Hotel Pangeran Cirebon</h2>
                  <p>Ini adalah sistem pengelolaan data Hotel Pangeran Cirebon, untuk bisa login silahkan isi email dan password yang sudah terdaftar.</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="{{ asset('Assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('Assets/vendors/simplebar/js/simplebar.min.js') }}"></script>
  <script>
  </script>

</body>

</html>