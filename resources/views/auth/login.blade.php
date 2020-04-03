<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <title>Inicia sesion</title>
    <link rel="stylesheet" href="../../assets/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i">
    <link rel="stylesheet" href="../../assets/fonts/fontawesome-all.min.css">
</head>

<body class="background-color" style="background-color: rgb(21,133,53);background-image: url(&quot;assets/img/Login/bg-body.jpg&quot;);background-repeat: no-repeat;background-size: cover;">


    <div class="container">
        <div class="row justify-content-center">
            <div class="col-md-9 col-lg-12 col-xl-10">
                <div class="card shadow-lg o-hidden border-0 my-5" style="padding: 21px;">
                    <div class="card-body p-0">
                        <div class="row">
                            <div class="col-lg-6 d-none d-lg-flex">
                                <div class="flex-grow-1 bg-login-image" style="background-image: url(&quot;assets/img/Login/socrates_login.png&quot;);background-position: center;background-size: contain;background-repeat: space;"></div>
                            </div>
                            <div class="col-lg-6">
                                <div class="p-5">
                                    <div class="text-center">
                                        <h4 class="text-dark mb-4" style="font-family: Roboto, sans-serif;font-size: 33px;font-style: normal;"><strong>¡Bienvenido cazador!</strong></h4>
                                    </div>
                                    <form class="user" action="{{route('login')}}" method="POST">
                                    @csrf
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="email" placeholder="Ingresa tu email" name="email"></div>
                                        
                                        <div class="form-group">
                                            <input class="form-control form-control-user" type="password" placeholder="Contraseña" name="password"></div>
                                        
                                        <div class="form-group">
                                            <div class="custom-control custom-checkbox small">
                                                <div class="form-check"><input class="form-check-input custom-control-input" type="checkbox" id="formCheck-1"><label class="form-check-label custom-control-label" for="formCheck-1">Recordar</label></div>
                                            </div>

                                        </div><button class="btn btn-success btn-block shadow-sm" type="submit" style="background-color: rgb(42,185,83); border-radius:12px;">Acceder</button>
                                    
                                        <div>
                                            @error('password')
                                        <span>
                                            <small class="text-danger">{{ $message }}</small>
                                        </span>
                                    @enderror

                                    @error('email')
                                        <span >
                                            <small class="text-danger">{{ $message }}</strong>
                                                </span>
                                        @enderror
</div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script src="assets/js/jquery.min.js"></script>
    <script src="assets/bootstrap/js/bootstrap.min.js"></script>
    <script src="assets/js/chart.min.js"></script>
    <script src="assets/js/bs-init.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.4.1/jquery.easing.js"></script>
    <script src="assets/js/theme.js"></script>
</body>

