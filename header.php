<!-- [ Layout navbar ( Header ) ] Start -->
<nav class="layout-navbar navbar navbar-expand-lg align-items-lg-center bg-dark container-p-x" id="layout-navbar">

    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <a href="index.asp" class="navbar-brand app-brand demo d-lg-none py-0 mr-4">
        <span class="app-brand-logo demo">
            <img src="assets\img\logo02.png" style="max-width:50%;" alt="Brand Logo" class="img-fluid">
        </span>
    </a>

    <!-- Sidenav toggle (see assets/css/demo/demo.css) -->
    <div class="layout-sidenav-toggle navbar-nav d-lg-none align-items-lg-center mr-auto">
        <a class="nav-item nav-link px-0 mr-lg-4" href="javascript:">
            <i class="ion ion-md-menu text-large align-middle"></i>
        </a>
    </div>

    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#layout-navbar-collapse">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="navbar-collapse collapse" id="layout-navbar-collapse">
        <!-- Divider -->
        <hr class="d-lg-none w-100 my-2">

        

        <div class="navbar-nav align-items-lg-center ml-auto">
            <!--# include file="header_notificacoes.asp"-->

            <!-- Divider -->
            <div class="nav-item d-none d-lg-block text-big font-weight-light line-height-1 opacity-25 mr-3 ml-1">|</div>
            <div class="demo-navbar-user nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">
                    <span class="d-inline-flex flex-lg-row-reverse align-items-center align-middle">
                        <img src="assets/img/avatars/client.png" alt="" class="d-block ui-w-30 rounded-circle">
                        <span class="px-1 mr-lg-2 ml-2 ml-lg-0"><? echo $nomex ?></span>
                    </span>
                </a>
                <div class="dropdown-menu dropdown-menu-right">
                    <a href="javascript:" class="dropdown-item">
                        <i class="feather icon-user text-muted"></i> &nbsp; Alterar Senha</a>
                    <a href="config.php" class="dropdown-item">
                        <i class="feather icon-settings text-muted"></i> &nbsp; Dados do site</a>
                    <div class="dropdown-divider"></div>
                    <a href="close.php" class="dropdown-item">
                        <i class="feather icon-power text-danger"></i> &nbsp; Sair</a>
                </div>
            </div>
        </div>
    </div>
</nav>
<!-- [ Layout navbar ( Header ) ] End -->