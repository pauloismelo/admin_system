<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<head>
    <title>Atualizar Tecnologia | Manager Sales</title>
	<!--#include file="db.asp"-->
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0">
    <meta name="description" content="Sales Manager é o gerenciador administrativo para lojas virtuais">
    <meta name="keywords" content="ecommerce, loja online, loja virtual, dashboard">
    <meta name="author" content="Atualizartecnologia">
    <link rel="icon" type="image/x-icon" href="assets\img\favicon.ico">

    <!-- Google fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:300,400,500,700" rel="stylesheet">

    <!-- Icon fonts -->
    <link rel="stylesheet" href="assets\fonts\fontawesome.css">
    <link rel="stylesheet" href="assets\fonts\ionicons.css">
    <link rel="stylesheet" href="assets\fonts\linearicons.css">
    <link rel="stylesheet" href="assets\fonts\open-iconic.css">
    <link rel="stylesheet" href="assets\fonts\pe-icon-7-stroke.css">
    <link rel="stylesheet" href="assets\fonts\feather.css">

    <!-- Core stylesheets -->
    <link rel="stylesheet" href="assets\css\bootstrap-material.css">
    <link rel="stylesheet" href="assets\css\shreerang-material.css">
    <link rel="stylesheet" href="assets\css\uikit.css">

    <!-- Libs -->
    <link rel="stylesheet" href="assets\libs\perfect-scrollbar\perfect-scrollbar.css">
    <!-- Page -->
    <link rel="stylesheet" href="assets\css\pages\authentication.css">
</head>

<body>
	
   
    
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ content ] Start -->
    <div class="authentication-wrapper authentication-1 px-4">
        <div class="authentication-inner py-5">

            <!-- [ Logo ] Start -->
            <div class="d-flex justify-content-center align-items-center">
                <div>
                    <div class="w-100 position-relative">
                        <img src="assets\img\logo01.png" alt="Brand Logo" class="img-fluid">
                    </div>
                </div>
            </div>
            <!-- [ Logo ] End -->

            <!-- [ Form ] Start -->
            <form class="my-5" method="post" action="auth.php">
                <div class="form-group">
                    <label class="form-label">Login</label>
                    <input type="text" name="login" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group">
                    <label class="form-label d-flex justify-content-between align-items-end">
                        Password
                    </label>
                    <input type="password" name="senha" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="d-flex justify-content-between align-items-center m-0">
                    <label class="custom-control custom-checkbox m-0">
                        
                    </label>
                    <input type="submit" class="btn btn-primary" value="Entrar">
                </div>
            </form>
            <!-- [ Form ] End -->

            <div class="text-center text-muted">
                &nbsp;
            </div>

        </div>
    </div>
    <!-- [ content ] End -->

    <!-- Core scripts -->
    <script src="assets\js\pace.js"></script>
    <script src="assets\js\jquery-3.3.1.min.js"></script>
    <script src="assets\libs\popper\popper.js"></script>
    <script src="assets\js\bootstrap.js"></script>
    <script src="assets\js\sidenav.js"></script>
    <script src="assets\js\layout-helpers.js"></script>
    <script src="assets\js\material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets\libs\perfect-scrollbar\perfect-scrollbar.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script>
	<script src="assets\js\analytics.js"></script>
</body>

</html>
