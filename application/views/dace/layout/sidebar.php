<body class="skin-default fixed-layout">
    <!-- ============================================================== -->
    <!-- Preloader - style you can find in spinners.css -->
    <!-- ============================================================== -->
    <div class="preloader">
        <div class="loader">
            <div class="loader__figure"></div>
            <p class="loader__label">Consultas COBIENE</p>
        </div>
    </div>
    <!-- ============================================================== -->
    <!-- Main wrapper - style you can find in pages.scss -->
    <!-- ============================================================== -->
    <div id="main-wrapper">
        <!-- ============================================================== -->
        <!-- Topbar header - style you can find in pages.scss -->
        <!-- ============================================================== -->
        <header class="topbar">
            <nav class="navbar top-navbar navbar-expand-md navbar-dark">
                <!-- ============================================================== -->
                <!-- Logo -->
                <!-- ============================================================== -->
                <div class="navbar-header">
                    <a class="navbar-brand" href="index.html">
                        <!-- Logo icon --><b>
                            <!--You can put here icon as well // <i class="wi wi-sunset"></i> //-->
                            <!-- Dark Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-icon.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo icon -->
                            <img src="<?= base_url(); ?>/assets/images/logo-light-icon.png" alt="homepage" class="light-logo" />
                        </b>
                        <!--End Logo icon -->
                        <!-- Logo text --><span>
                            <!-- dark Logo text -->
                            <img src="<?= base_url(); ?>/assets/images/logo-text.png" alt="homepage" class="dark-logo" />
                            <!-- Light Logo text -->
                            <img src="<?= base_url(); ?>/assets/images/logo-light-text.png" class="light-logo" alt="homepage" />
                        </span>
                    </a>
                </div>
                <!-- ============================================================== -->
                <!-- End Logo -->
                <!-- ============================================================== -->
                <div class="navbar-collapse">
                    <!-- ============================================================== -->
                    <!-- toggle and nav items -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav me-auto">
                        <!-- This is  -->
                        <li class="nav-item"> <a class="nav-link nav-toggler d-block d-md-none waves-effect waves-dark" href="javascript:void(0)"><i class="ti-menu"></i></a> </li>
                        <li class="nav-item"> <a class="nav-link sidebartoggler d-none d-lg-block d-md-block waves-effect waves-dark" href="javascript:void(0)"><i class="icon-menu"></i></a> </li>
                    </ul>
                    <!-- ============================================================== -->
                    <!-- User profile and search -->
                    <!-- ============================================================== -->
                    <ul class="navbar-nav my-lg-0">
                        <!-- ============================================================== -->
                        <!-- Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item dropdown">
                            <a class="nav-link dropdown-toggle waves-effect waves-dark" href="" data-bs-toggle="dropdown"
                                aria-haspopup="true" aria-expanded="false"> <i class="ti-user"></i>
                            </a>
                            <div class="dropdown-menu dropdown-menu-end mailbox animated bounceInDown">
                                <ul>
                                    <li>
                                        <div class="drop-title"><?=$this->session->userdata('user_name') ?></div>
                                    </li>
                                    <li>
                                        <div class="message-center">
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-danger btn-circle text-white"><i class="fa fa-user"></i></div>
                                                <div class="mail-contnet">
                                                    <h5> Mi Perfil</h5> 
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="javascript:void(0)">
                                                <div class="btn btn-success btn-circle text-white"><i class="fas fa-cog"></i>
                                                </div>
                                                <div class="mail-contnet">
                                                    <h5> Configuración</h5> 
                                                </div>
                                            </a>
                                            <!-- Message -->
                                            <a href="<?= base_url('cerrar-session'); ?>">
                                                <div class="btn btn-info btn-circle text-white"><i class="fas fa-power-off"></i></div>
                                                <div class="mail-contnet">
                                                    <h5> Cerrar Sessión</h5>
                                                </div>
                                            </a>
                                        </div>
                                    </li>
                                </ul>
                            </div>
                        </li>
                        <!-- ============================================================== -->
                        <!-- End Comment -->
                        <!-- ============================================================== -->
                        <li class="nav-item right-side-toggle"> <a class="nav-link  waves-effect waves-light"
                                href="javascript:void(0)"><i class="ti-settings"></i></a></li>
                    </ul>
                </div>
            </nav>
        </header>
        <!-- ============================================================== -->
        <!-- End Topbar header -->
        <!-- ============================================================== -->
        <!-- ============================================================== -->
        <!-- Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->
        <aside class="left-sidebar">
            <!-- Sidebar scroll-->
            <div class="scroll-sidebar">
                <!-- User Profile-->
                <div class="user-profile">
                    <div class="user-pro-body">
                        <div>
                            <img src="<?= base_url(); ?>/assets/images/users/2.jpg" alt="user-img">
                        </div>
                    </div>
                </div>
                <!-- Sidebar navigation-->
                <nav class="sidebar-nav">
                    <ul id="sidebarnav">
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url(); ?>" aria-expanded="false">
                                <i class="ti-layout-media-right-alt"></i>
                                <span class="hide-menu">TABLERO</span>
                            </a>
                        </li>

                        <li class="nav-small-cap">--- CONSULTAS DACE</li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url('DACE'); ?>" aria-expanded="false">
                                <i class="ti-layout-media-right-alt"></i>
                                <span class="hide-menu">Registros DACE</span>
                            </a>
                        </li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url(); ?>" aria-expanded="false">
                                <i class="ti-layout-media-right-alt"></i>
                                <span class="hide-menu">Formulario DACE</span>
                            </a>
                        </li>
                        <li class="nav-small-cap">--- CONSULTAS DAS</li>
                        <li>
                            <a class="waves-effect waves-dark" href="<?= base_url('DAS'); ?>" aria-expanded="false">
                                <i class="ti-layout-media-right-alt"></i>
                                <span class="hide-menu">Registros DAS</span>
                            </a>
                        </li>
                        <li>
                            <a class="has-arrow waves-effect waves-dark" href="javascript:void(0)"
                                aria-expanded="false">
                                <i class="ti-files"></i>
                                <span class="hide-menu">Formulario DAS
                                    <span class="badge rounded-pill bg-info">4</span>
                                </span>
                            </a>
                            <ul aria-expanded="false" class="collapse">
                                <li>
                                    <a href="<?= base_url('hola'); ?>">Form 1</a>
                                </li>
                                <li>
                                    <a href="<?= base_url('form1'); ?>">Form 1</a>
                                </li>
                                <li>
                                    <a href="#">Form 1</a>
                                </li>
                                <li>
                                    <a href="#">Form 1</a>
                                </li>
                                
                            </ul>
                        </li>

                    </ul>
                </nav>
                <!-- End Sidebar navigation -->
            </div>
            <!-- End Sidebar scroll-->
        </aside>
        <!-- ============================================================== -->
        <!-- End Left Sidebar - style you can find in sidebar.scss  -->
        <!-- ============================================================== -->