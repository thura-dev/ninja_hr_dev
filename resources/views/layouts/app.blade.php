<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>
   {{-- MDB Bootstrap cdn css  --}}
   <!-- Font Awesome -->

   <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

   <!-- Google Fonts -->
   <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700&display=swap">
   <!-- Bootstrap core CSS -->

   <link href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/css/bootstrap.min.css" rel="stylesheet">

   <!-- Material Design Bootstrap -->
   <link href="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/css/mdb.min.css" rel="stylesheet">
   {{-- Datatable css --}}
    <link href="https://cdn.datatables.net/1.11.5/css/dataTables.bootstrap4.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.2.9/css/responsive.dataTables.min.css">
{{-- Daterangepicker csss --}}
<link rel="stylesheet" type="text/css" href="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.css" />
   <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <div class="page-wrapper chiller-theme">

        <nav id="sidebar" class="sidebar-wrapper">
          <div class="sidebar-content">
            <div class="sidebar-brand">
              <a href="#">Ninja HR</a>
              <div id="close-sidebar">
                <i class="fas fa-times"></i>
              </div>
            </div>
            <div class="sidebar-header">
              <div class="user-pic">
                <img class="img-responsive img-rounded" src="https://raw.githubusercontent.com/azouaoui-med/pro-sidebar-template/gh-pages/src/img/user.jpg"
                  alt="User picture">
              </div>
              <div class="user-info">
                <span class="user-name">Jhon
                  <strong>Smith</strong>
                </span>
                <span class="user-role">Administrator</span>
                <span class="user-status">
                  <i class="fa fa-circle"></i>
                  <span>Online</span>
                </span>
              </div>
            </div>
            <!-- sidebar-header  -->

            <!-- sidebar-search  -->
            <div class="sidebar-menu">
              <ul>
                <li class="header-menu">
                  <span>Menu</span>
                </li>
                <li>
                    <a href="#">
                      <i class="fa fa-home"></i>
                      <span>Home</span>
                    </a>
                  </li>
                  <li>
                    <a href="{{ route('employee.index') }}">
                      <i class="fa fa-users"></i>
                      <span>Employees</span>
                    </a>
                  </li>
                {{-- <li class="sidebar-dropdown">
                  <a href="#">
                    <i class="fa fa-globe"></i>
                    <span>Maps</span>
                  </a>
                  <div class="sidebar-submenu">
                    <ul>
                      <li>
                        <a href="#">Google maps</a>
                      </li>
                      <li>
                        <a href="#">Open street map</a>
                      </li>
                    </ul>
                  </div>
                </li> --}}

              </ul>
            </div>
            <!-- sidebar-menu  -->
          </div>
          <!-- sidebar-content  -->

        </nav>

        <div class="app-bar">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                   <div class="d-flex justify-content-between algin-content-center">
                       <a href="" id="show-sidebar">
                           <i class="fas fa-bars"></i>
                       </a>
                       <h5 class="mb-0">@yield('title')</h5>
                       <a href=""></a>
                   </div>
                </div>
            </div>
        </div>
        <div class="py-4 content">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    @yield('content')
                </div>
            </div>

        </div>
        <div class="bottom-bar">
            <div class="d-flex justify-content-center">
                <div class="col-md-8">
                    <div class="d-flex justify-content-between">
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>
                        <a href="">
                            <i class="fas fa-home"></i>
                            <p class="mb-0">Home</p>
                        </a>

                    </div>
                </div>
            </div>
        </div>

      </div>

<!-- JQuery -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Bootstrap tooltips -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.4/umd/popper.min.js"></script>
<!-- Bootstrap core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/4.5.0/js/bootstrap.min.js"></script>
<!-- MDB core JavaScript -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/mdbootstrap/4.19.1/js/mdb.min.js"></script>
{{-- Datatable script  --}}
<script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/responsive/2.2.9/js/dataTables.responsive.min.js" type="text/javascript"></script>
<script src="https://cdn.datatables.net/1.11.5/js/dataTables.bootstrap4.min.js" type="text/javascript"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/momentjs/latest/moment.min.js"></script>
<script type="text/javascript" src="https://cdn.jsdelivr.net/npm/daterangepicker/daterangepicker.min.js"></script>
<!-- Laravel Javascript Validation -->
<script type="text/javascript" src="{{ url('vendor/jsvalidation/js/jsvalidation.js')}}"></script>
{{-- Sweet alert 2 --}}
<script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<script>
  $(function ($) {
    $(".sidebar-dropdown > a").click(function() {
        $(".sidebar-submenu").slideUp(200);
        if (
        $(this).parent().hasClass("active")
            ) {
                $(".sidebar-dropdown").removeClass("active");
                    $(this).parent().removeClass("active");
            } else {
                        $(".sidebar-dropdown").removeClass("active");
                        $(this).next(".sidebar-submenu").slideDown(200);
                        $(this).parent().addClass("active");
                    }
    });
        $("#close-sidebar").click(function() {
            $(".page-wrapper").removeClass("toggled");
        });
        $("#show-sidebar").click(function(e) {
            e.preventDefault();
            $(".page-wrapper").addClass("toggled");
        });
        document.addEventListener('click',function(event) {
            if(document.getElementById('show-sidebar').contains(event.target)){
                $(".page-wrapper").addClass("toggled");
            }else if(!document.getElementById('sidebar').contains(event.target)){
                $(".page-wrapper").removeClass("toggled");
            }

        })
        @if(session('create'))
        Swal.fire({
            title: 'Successfully created!',
            text: "{{ session('create') }}",
            icon: 'success',

        })

        @endif
});
</script>
 @yield('scripts')
</body>
</html>



