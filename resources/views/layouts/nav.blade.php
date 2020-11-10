<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <!-- <script src="{{ asset('js/app.js') }}" defer></script> -->

    <!-- Fonts -->
    <!-- <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet"> -->

    <!-- Styles -->
    <!-- <link href="{{ asset('css/app.css') }}" rel="stylesheet"> -->

    <!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css"> -->

<!-- CSS -->
        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">
<!-- Google Fonts -->
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
<!-- Bootstrap core CSS -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">
<!-- Material Design Bootstrap -->
<link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">

<!-- Javascript -->

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
        <script>
        // jQuery(document).ready(function($){
        //     $("#menu-toggle").click(function(e) {
        //     e.preventDefault();
        //     $("#wrapper").toggleClass("toggled");
        //     });
        // })

        $(document).ready(function () {
  // SideNav Button Initialization
  $(".button-collapse").sideNav();
  // SideNav Scrollbar Initialization
  var sideNavScrollbar = document.querySelector('.custom-scrollbar');
  var ps = new PerfectScrollbar(sideNavScrollbar);
});
        </script>

</head>
<body>
<!-- SideNav slide-out button -->
<a href="#" data-activates="slide-out" class="btn btn-primary p-3 button-collapse"><i class="fas fa-bars"></i></a>

<!-- Sidenav  -->
<div id="slide-out" class="side-nav fixed">
  <ul class="custom-scrollbar">
    <!-- Logo -->
    <li>
      <div class="logo-wrapper waves-light waves-effect waves-light">
        <a class="navbar-brand d-flex justify-content-center align-items-center dark-blue-text" href="#">
          <img id="MDB-logo"
            src="https://z9t4u9f6.stackpathcdn.com/wp-content/uploads/2018/06/logo-mdb-jquery-small.png"
            alt="MDB Logo">
        </a>
      </div>
    </li>
    <!-- Logo -->
    <!-- Search Form -->
    <li>
      <form class="search-form" role="search">
        <div class="form-group md-form mt-0 mb-1 d-block">
          <input type="text" class="form-control w-100" placeholder="Search">
        </div>
      </form>
    </li>
    <!-- Search Form -->
    <!-- Side navigation links -->
    <li>
      <ul class="collapsible collapsible-accordion">
        <!-- Single item -->
        <!-- <li>
          <a class="collapsible-header navbar-link-2 waves-effect arrow-r d-flex align-items-center"><i
              class="fas fa-gem dark-blue-text"></i> Single link
          </a>
        </li> -->
        <!-- Single item -->
        <!-- Single item -->
        <li>
          <a class="collapsible-header navbar-link-2 waves-effect arrow-r d-flex align-items-center">
            <i class="fas fa-user dark-blue-text"></i>
            {{ Auth::user()->name }}
            <i class="fas fa-angle-down rotate-icon"></i>
          </a>
          <div class="collapsible-body">
            <ul class="list-unstyled">
              <li>
                <a href="{{ url('/logout') }}" class="waves-effect">logout</a>
              </li>
            </ul>
          </div>
        </li>

        <li>
          <a class="collapsible-header navbar-link-2 waves-effect arrow-r d-flex align-items-center">
            <i class="fas fa-user dark-blue-text"></i>
            View
            <i class="fas fa-angle-down rotate-icon"></i>
          </a>
          <div class="collapsible-body">
            <ul class="list-unstyled">
              <li>
                <a href="{{ url('/users_list') }}" class="waves-effect">Users</a>
              </li>
              <li>
                <a href="{{ url('/company_list') }}" class="waves-effect">Companies</a>
              </li>
            </ul>
          </div>
        </li>
        <!-- Single item -->
      </ul>
    </li>
    <!-- Side navigation links -->
  </ul>
</div>
<!-- Sidenav -->

<div class="container my-4" style="overflow:auto">
@yield('content')
</div>
</body>
</html> 
