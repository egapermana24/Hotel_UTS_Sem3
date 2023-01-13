<!DOCTYPE html>
<!--
* CoreUI - Free Bootstrap Admin Template
* @version v4.2.2
* @link https://coreui.io
* Copyright (c) 2022 creativeLabs Łukasz Holeczek
* Licensed under MIT (https://coreui.io/license)
-->
<!-- Breadcrumb-->
<html lang="en">

<head>
  <base href="./">
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
  <meta name="description" content="CoreUI - Open Source Bootstrap Admin Template">
  <meta name="author" content="Łukasz Holeczek">
  <meta name="keyword" content="Bootstrap,Admin,Template,Open,Source,jQuery,CSS,HTML,RWD,Dashboard">
  <title>Hotel - 20210120068</title>
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
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.1/css/all.min.css" integrity="sha512-MV7K8+y+gLIBoVD59lQIYicR65iaqukzvf/nwasF0nqhPay5w/9lJmVM2hMDcnK1OnMGCdVK+iQrJ7lzPJQd1w==" crossorigin="anonymous" referrerpolicy="no-referrer" />
  <link href="{{ asset('Assets/css/examples.css') }}" rel="stylesheet">
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
  <link href="{{ asset('Assets/vendors/@coreui/chartjs/css/coreui-chartjs.css') }}" rel="stylesheet">
</head>

<body>
  <div class="sidebar sidebar-dark sidebar-fixed shadow-lg" id="sidebar">
    <div class="sidebar-brand d-none d-md-flex">
      <h3 class="display-6">Hotel</h3>
    </div>
    <ul class="sidebar-nav" data-coreui="navigation" data-simplebar="">
      <li class="nav-item"><a class="nav-link" href="/dashboard">
          <i class="fa-solid fa-gauge ms-3 fa-fw me-2"></i> Dashboard</a></li>
      <li class="nav-title">Informasi</li>
      <li class="nav-item">
        <a class="nav-link" href="/kamar"><i class="fa-solid fa-bed ms-3 fa-fw me-2"></i> Data Kamar</a>
      </li>
      <li class="nav-item"><a class="nav-link" href="/pengunjung">
          <i class="fa-solid fa-person ms-3 fa-fw me-2"></i> Data Pengunjung</a></li>
      <li class="nav-group"><a class="nav-link nav-group-toggle">
          <i class="fa-solid fa-dollar-sign ms-3 fa-fw me-2"></i> Transaksi</a>
        <ul class="nav-group-items">
          <li class="nav-item"><a class="nav-link" href="/reservasi"><span class="nav-icon"></span> Reservasi</a></li>
          <li class="nav-item"><a class="nav-link" href="/penginap"><span class="nav-icon"></span> Penginapan</a></li>
        </ul>
      </li>
      <li class="nav-title">Lainnya</li>
      <li class="nav-item">
        <form action="{{route('logout')}}" method="POST">
          @csrf
          <a class="nav-link"> <button class=" text-light" style="border: none; background:none;" type="submit"><i class="fa-solid fa-right-from-bracket  ms-3 fa-fw me-2 text-light"></i> Logout Sistem</button></a>
        </form>
      </li>
    </ul>
    <!-- <div class="sidebar-toggler" type="button" data-coreui-toggle="unfoldable"></div> -->
  </div>
  <div class="wrapper d-flex flex-column min-vh-100 bg-light">
    <header class="header header-sticky mb-4">
      <div class="container-fluid">
        <button class="header-toggler px-md-0 me-md-3" type="button" onclick="coreui.Sidebar.getInstance(document.querySelector('#sidebar')).toggle()">
          <svg class="icon icon-lg">
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 448 512">
              <!--! Font Awesome Pro 6.2.1 by @fontawesome - https://fontawesome.com License - https://fontawesome.com/license (Commercial License) Copyright 2022 Fonticons, Inc. -->
              <path d="M0 96C0 78.3 14.3 64 32 64H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32C14.3 128 0 113.7 0 96zM0 256c0-17.7 14.3-32 32-32H416c17.7 0 32 14.3 32 32s-14.3 32-32 32H32c-17.7 0-32-14.3-32-32zM448 416c0 17.7-14.3 32-32 32H32c-17.7 0-32-14.3-32-32s14.3-32 32-32H416c17.7 0 32 14.3 32 32z" />
            </svg>
          </svg>
        </button><a class="header-brand d-md-none" href="#">
          <svg width="118" height="46" alt="CoreUI Logo">
            <use xlink:href="assets/brand/coreui.svg#full"></use>
          </svg></a>
        <ul class="header-nav ms-auto">
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-bell"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-list-rich"></use>
              </svg></a></li>
          <li class="nav-item"><a class="nav-link" href="#">
              <svg class="icon icon-lg">
                <use xlink:href="vendors/@coreui/icons/svg/free.svg#cil-envelope-open"></use>
              </svg></a></li>
        </ul>
      </div>
      <div class="header-divider bg-dark"></div>
      <div class="container ">
        <nav aria-label="breadcrumb ">
          <ol class="breadcrumb my-0 ms-2 ">
            <li class="breadcrumb-item active lead"><span>Hotel Pangeran Cirebon</span></li>
          </ol>
        </nav>
      </div>
    </header>
    <div class="body flex-grow-1 px-3">
      <div class="container-lg">
        @yield('content')
      </div>
    </div>
    <footer class="footer">
      <div>
        <p>Hotel Pangeran Cirebon © 2022.</p>
      </div>
      <div class="ms-auto">
        <p>Created by&nbsp; Ega Permana</p>
      </div>
    </footer>
  </div>
  <!-- CoreUI and necessary plugins-->
  <script src="{{ asset('Assets/vendors/@coreui/coreui/js/coreui.bundle.min.js') }}"></script>
  <script src="{{ asset('Assets/vendors/simplebar/js/simplebar.min.js') }}"></script>
  <!-- Plugins and scripts required by this view-->
  <script src="{{ asset('Assets/vendors/chart.js/js/chart.min.js') }}"></script>
  <script src="{{ asset('Assets/vendors/@coreui/chartjs/js/coreui-chartjs.js') }}"></script>
  <script src="{{ asset('Assets/vendors/@coreui/utils/js/coreui-utils.js') }}"></script>
  <script src="{{ asset('Assets/js/main.js') }}"></script>
  <script>
    if (window.history.replaceState) {
      window.history.replaceState(null, null, window.location.href);
    }
  </script>

</body>

</html>