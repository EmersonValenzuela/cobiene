<!DOCTYPE html>
<html lang="es">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!--Toaster Popup message CSS -->
    <link href="<?= base_url(); ?>/assets/node_modules/toast-master/css/jquery.toast.css" rel="stylesheet">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/favicon.png">
    <title>COBIENE | Login</title>

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
        <div class="login-register" >
            <div class="login-box card">
                <div class="card-body">
                    <form class="form-horizontal form-material" id="loginform" action="<?= base_url('iniciar-sesion'); ?>" method="post">
                        <img src="" alt="">
                        <h3 class="text-center m-b-20">Inicie Sesi??n COBIENE</h3>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="CIP" name="cip">
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" placeholder="Contrase??a" name="password">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <div class="d-flex no-block align-items-center">
                                    <div class="form-check">
                                        <input type="checkbox" class="form-check-input" id="customCheck1">
                                        <label class="form-check-label" for="customCheck1">Recordarme</label>
                                    </div>
                                    <div class="ms-auto">
                                        <a href="javascript:void(0)" id="to-recover" class="text-muted"><i class="fas fa-lock m-r-5"></i> ??Olvidadaste tu contrase??a?</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group text-center">
                            <div class="col-xs-12 p-b-20">
                                <button class="btn w-100 btn-lg btn-info btn-rounded text-white" type="submit">Ingresar</button>
                            </div>
                        </div>
                        <div class="form-group m-b-0">
                            <div class="col-sm-12 text-center">
                                ??No tienes una cuenta? <a href="<?= base_url('registrate') ?>" title="Registrate" class="text-info m-l-5"><b>Registrate</b></a>
                            </div>
                        </div>
                    </form>
                    <form class="form-horizontal" id="recoverform" action="index.html">
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <h3>Recuperar Contrase??a</h3>
                                <p class="text-muted">??Ingrese su correo electr??nico y se le enviar??n las instrucciones! </p>
                            </div>
                        </div>
                        <div class="form-group ">
                            <div class="col-xs-12">
                                <input class="form-control" type="text" required="" placeholder="Correo electr??nico" id="mail">
                                <div id="response"></div>
                            </div>
                        </div>
                        <div class="form-group text-center m-t-20">
                            <div class="col-xs-12">
                                <button class="btn btn-primary btn-lg w-100 text-uppercase waves-effect waves-light" type="submit">Enviar</button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </section>
    <div>
        <input type="hidden" value="<?= $title ?>" id="title">
        <input type="hidden" value="<?= $text ?>" id="text">
        <input type="hidden" value="<?= $LoaderBg ?>" id="LoaderBg">
        <input type="hidden" value="<?= $hideAfter ?>" id="hideAfter">
        <input type="hidden" value="<?= $icon ?>" id="icon">
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

    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 
        // Login and Recover Password 
        // ============================================================== 
        $('#to-recover').on("click", function() {
            $("#loginform").slideUp();
            $("#recoverform").fadeIn();
        });
        $("#mail").on("keyup", function() {
            var mail = $("#mail").val();
            var lengthMail = $("#mail").val().length;
            var dataMail = 'mail=' + mail;
            if (lengthMail >= 10) {
                $.ajax({
                    url: 'site/existsMail',
                    type: "GET",
                    data: dataMail,
                    dataType: "JSON",
                    success: function(data) {
                        if (data.success == 1) {
                            $("#response").html(data.message);
                            $("button").attr('disabled', false);

                        } else {
                            $("#response").html(data.message);
                            $("button").attr('disabled', true);
                        }
                    },
                    error: function(data) {
                        console.log(data['responseText']);
                    }
                });
            }
        });
    </script>

    <?php
    if ($title != "") {

    ?>
        <script>
            $(function() {

                "use strict";
                //This is for the Notification top right
                var title = document.getElementById('title').value;
                var text = document.getElementById('text').value;
                var LoaderBg = document.getElementById('LoaderBg').value;
                var hideAfter = document.getElementById('hideAfter').value;
                var icon = document.getElementById('icon').value;
                $.toast({
                    heading: title,
                    text: text,
                    position: 'top-right',
                    loaderBg: LoaderBg,
                    icon: icon,
                    hideAfter: hideAfter,
                    stack: 6,
                    showHideTransition: 'slide',
                    allowToastClose: false
                })
            });
        </script>
    <?php
    }
    ?>
</body>

</html>