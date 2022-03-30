<!DOCTYPE html>
<html lang="en">

<head>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url(); ?>/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/favicon.png">
    <title>COBIENE</title>

    <!-- page css -->
    <link href="<?= base_url(); ?>/dist/css/pages/login-register-lock.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet">


    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><![endif]-->


</head>

<body class="skin-default card-no-border">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Elite admin</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <section id="wrapper">
        <div class="login-register" style="background-image:url(<?= base_url(); ?>assets/images/cobiene.png);">
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="">
                        <h3 class="text-center m-b-20">Verificación Código COBIENE</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h2 class="text-center">+51 <?= $phone_user ?></h2>
                                <input class="form-control" type="hidden" required="" id="number" value="+51<?= $phone_user ?>" name="phone" disabled><br>
                                <center>
                                    <div id="recaptcha-container"></div>
                                </center>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <div id="recaptcha-container"></div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn w-100 btn-lg btn-cobiene btn-rounded text-white" type="button" onclick="phoneAuth();">Enviar Código</button>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3 class="text-center">Autenticación</h3>
                                <p class="text-muted">¡Ingrese su Codigo de Verificación! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" id="verificationCode" placeholder="Ingresa el Codido de Verificación">
                                <input class="" type="hidden" id="phone" value="<?= $phone_user ?>">
                            </div>
                        </div>
                        <div class=" form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-100 text-uppercase waves-effect waves-light" type="button" onclick="codeverify();">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div>

    </div>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>

    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!--Custom JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/toast-master/js/jquery.toast.js"></script>
    <script src="<?= base_url(); ?>dist/js/firebase.js" type="text/javascript"></script>
    <script src="https://www.gstatic.com/firebasejs/8.3.1/firebase.js"></script>
    <script type="module">
        // Import the functions you need from the SDKs you need


        // TODO: Add SDKs for Firebase products that you want to use
        // https://firebase.google.com/docs/web/setup#available-libraries

        // Your web app's Firebase configuration
        // For Firebase JS SDK v7.20.0 and later, measurementId is optional
        const firebaseConfig = {
            apiKey: "AIzaSyDFyvt24gyvhGXwhI9FNHBnhNPlP8VT0tA",
            authDomain: "bdauthentication-87d9d.firebaseapp.com",
            projectId: "bdauthentication-87d9d",
            storageBucket: "bdauthentication-87d9d.appspot.com",
            messagingSenderId: "1067274615293",
            appId: "1:1067274615293:web:f4844a81a1941af20b8194",
            measurementId: "G-5HNEFD86F9"
        };

        // Initialize Firebase
        firebase.initializeApp(firebaseConfig);
        firebase.analytics();
    </script>

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
    </script>

</body>

</html>