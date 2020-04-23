<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Dashboard - Brand</title>
    <link rel="stylesheet" href="/../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto+Condensed">
    <link rel="stylesheet" href="/../../assets/fonts/fontawesome-all.min.css">
    <link rel="stylesheet" href="/../../assets/css/untitled.css">
    <link rel="stylesheet" href="/../../css/estilos.css">
    @yield('estilos')
</head>

    <div id="wrapper">
    <nav class="navbar navbar-dark align-items-start sidebar sidebar-dark accordion bg-gradient-primary p-0" style="background-color: rgb(42,185,83);background-image: url(&quot;/assets/img/Dashboard/bg-navbar.png&quot;);">
            <div class="container-fluid d-flex flex-column p-0">
                <a class="navbar-brand d-flex justify-content-center align-items-center sidebar-brand m-0" href="#">
                    <div class="sidebar-brand-icon rotate-n-15"><img class="img-fluid" src="/assets/img/Dashboard/icon.png" style="width: 49px;"></div>
                </a>
                <hr class="sidebar-divider my-0">
                <ul class="nav navbar-nav text-light" id="accordionSidebar">
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('insectos.index')}}"><i class="fas fa-university"></i><span>Ver insectos</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('insectos.create')}}"><i class="fab fa-dropbox"></i><span>Capturar</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admin.index')}}"><i class="fas fa-table"></i><span>Tabla de usuario</span></a></li>
                    <li class="nav-item" role="presentation"><a class="nav-link" href="{{route('admin.create')}}"><i class="far fa-user-circle"></i><span>Agregar usuario</span></a></li>
                </ul>
                <div class="text-center d-none d-md-inline"><button class="btn rounded-circle border-0" id="sidebarToggle" type="button"></button></div>
            </div>
        </nav>
        <div class="d-flex flex-column" id="content-wrapper">
            <div id="content" style="background-image: url(&quot;assets/img/Login/NH-Background.png&quot;);">
                <nav class="navbar navbar-light navbar-expand bg-white shadow mb-4 topbar static-top">
                    <div class="container-fluid"><button class="btn btn-link d-md-none rounded-circle mr-3" id="sidebarToggleTop" type="button"><i class="fas fa-bars"></i></button>
                        <ul class="nav navbar-nav flex-nowrap ml-auto">
                            </li>
                            <li class="nav-item dropdown no-arrow mx-1" role="presentation"></li>
                            <li class="nav-item dropdown no-arrow" role="presentation">
                                <div class="nav-item dropdown show no-arrow"><a class="dropdown-toggle nav-link" data-toggle="dropdown" aria-expanded="false" href="#"><span class="d-none d-lg-inline mr-2 text-gray-600 small">{{Auth::user()->name}}</span><img class="border rounded-circle img-profile" src="/assets/img/avatars/avatar1.jpeg"></a>
                                    <div class="dropdown-menu shadow dropdown-menu-right animated--grow-in" role="menu"><a class="dropdown-item" role="presentation" href="#">
                                        <a class="dropdown-item" id="linkLogout" role="presentation" href="{{ route('logout') }}"><i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>&nbsp;Logout</a></div>         
                                              <form id="formLogout" action="{{ route('logout') }}" method="POST">
                                                @csrf
                                            </form>
                    </li>
                    </ul>
            </div>
            </nav>
            @yield('navbar')

    <script src="/assets/js/jquery.min.js"></script>
    <script src="/assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="/assets/js/theme.js"></script>


    
    <script>
              function doClickLinkLogout(e){
                e.preventDefault();
                $("#formLogout").submit();
              }
              $(function(){
                $("#linkLogout").click(doClickLinkLogout);
              });

    </script>

    
@yield('scripts')
</body>