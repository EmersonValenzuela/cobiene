<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <!-- Tell the browser to be responsive to screen width -->
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">
    <!-- Favicon icon -->
    <link rel="icon" type="image/png" sizes="16x16" href="<?= base_url(); ?>/assets/images/favicon.png">
    <title>COBIENE | Registrate </title>
    <!-- page css -->
    <link href="<?= base_url(); ?>/assets/node_modules/register-steps/steps.css" rel="stylesheet">
    <link rel="stylesheet" href="<?= base_url(); ?>/assets/node_modules/dropify/dist/css/dropify.min.css">
    <link href="<?= base_url(); ?>/dist/css/pages/register3.css" rel="stylesheet">
    <!-- Custom CSS -->
    <link href="<?= base_url(); ?>/dist/css/style.min.css" rel="stylesheet">
    <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
    <script src="https://oss.maxcdn.com/libs/respond.js/1.4.2/respond.min.js"></script>
<![endif]-->
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
    <section id="wrapper" class="step-register">
        <div class="register-box">
            <div class="">
                <a href="javascript:void(0)" class="text-center m-b-40"><img src="<?= base_url(); ?>/assets/images/logo-icon.png" alt="Home" /><br /><img src="<?= base_url(); ?>/assets/images/logo-text.png" alt="Home" /></a>
                <!-- multistep form -->
                <form id="msform" action="<?= base_url('registrate'); ?>" method="POST" enctype="multipart/form-data">
                    <!-- progressbar -->
                    <ul id="eliteregister">
                        <li class="active">Datos de Accesso</li>
                        <li>Datos Personales</li>
                        <li>Imagenes Adjuntas</li>
                    </ul>
                    <!-- fieldsets -->
                    <fieldset>
                        <h2 class="fs-title">Datos de Accesso</h2>
                        <h3 class="fs-subtitle">Paso 1</h3>
                        <input type="text" name="cip" placeholder="Ingrese  CIP" required id="cip" />
                        <div id="respuesta"></div>
                        <input type="text" name="password" placeholder="Ingrese Contraseña" required />
                        <input type="button" name="next" class="next action-button" value="Siguiente" id="btnone" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Datos Personales</h2>
                        <h3 class="fs-subtitle">Paso 2</h3>
                        <input type="text" name="name" placeholder="Nombres" required />
                        <input type="text" name="lastname" placeholder="Apellidos" required />
                        <input type="text" name="dni" placeholder="DNI" required id="dni" />
                        <div id="respuestadni"></div>
                        <input type="text" name="email" placeholder="Correo Electrónico" id="mail" />
                        <div id="respuestamail"></div>
                        <input type="text" name="phone" placeholder="N° Celular" required id="phone" />
                        <div id="respuestaphone"></div>
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="button" name="next" class="next action-button" value="Siguiente" id="cip" />
                    </fieldset>
                    <fieldset>
                        <h2 class="fs-title">Imagenes Adjuntas</h2>
                        <h3 class="fs-subtitle">Paso Final</h3>
                        <div class="row">
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Foto CIP</h4>
                                        <input type="file" name="img_cip" id="input-file-now" class="dropify" required />
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-6 col-md-6">
                                <div class="card">
                                    <div class="card-body">
                                        <h4 class="card-title">Foto DNI</h4>
                                        <input type="file" name="img_dni" id="input-file-now1" class="dropify" required />
                                    </div>
                                </div>
                            </div>
                        </div>
                        <input type="button" name="previous" class="previous action-button" value="Anterior" />
                        <input type="submit" name="submit" class="action-button" value="Registrarme" />
                    </fieldset>

                </form>
                <div class="clear"></div>
            </div>
        </div>
    </section>
    <!-- ============================================================== -->
    <!-- End Wrapper -->
    <!-- ============================================================== -->
    <!-- ============================================================== -->
    <!-- All Jquery -->
    <!-- ============================================================== -->
    <script src="<?= base_url(); ?>/assets/node_modules/jquery/dist/jquery.min.js"></script>


    <!-- Bootstrap tether Core JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/bootstrap/dist/js/bootstrap.bundle.min.js"></script>
    <!-- Menu Plugin JavaScript -->
    <script src="<?= base_url(); ?>/assets/node_modules/register-steps/jquery.easing.min.js"></script>
    <script src="<?= base_url(); ?>/assets/node_modules/register-steps/register-init.js"></script>
    <!-- jQuery file upload -->
    <script src="<?= base_url(); ?>/assets/node_modules/dropify/dist/js/dropify.min.js"></script>

    <!-- js pages files -->
    <script src="<?= base_url(); ?>/dist/js/pages/register.js"></script>


    <script>
        $(document).ready(function() {
            // Basic
            $('.dropify').dropify();

            // Translated
            $('.dropify-fr').dropify({
                messages: {
                    default: 'Glissez-déposez un fichier ici ou cliquez',
                    replace: 'Glissez-déposez un fichier ou cliquez pour remplacer',
                    remove: 'Supprimer',
                    error: 'Désolé, le fichier trop volumineux'
                }
            });

            // Used events
            var drEvent = $('#input-file-events').dropify();

            drEvent.on('dropify.beforeClear', function(event, element) {
                return confirm("Do you really want to delete \"" + element.file.name + "\" ?");
            });

            drEvent.on('dropify.afterClear', function(event, element) {
                alert('File deleted');
            });

            drEvent.on('dropify.errors', function(event, element) {
                console.log('Has Errors');
            });

            var drDestroy = $('#input-file-to-destroy').dropify();
            drDestroy = drDestroy.data('dropify')
            $('#toggleDropify').on('click', function(e) {
                e.preventDefault();
                if (drDestroy.isDropified()) {
                    drDestroy.destroy();
                } else {
                    drDestroy.init();
                }
            })
        });
    </script>
    <script type="text/javascript">
        $(function() {
            $(".preloader").fadeOut();
        });
        $(function() {
            $('[data-bs-toggle="tooltip"]').tooltip()
        });
        // ============================================================== 

    </script>
</body>

</html>