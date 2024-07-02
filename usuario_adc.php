<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>

<?
if (isset($_POST['modo'])){
	if ($_POST['modo']=='gravar'){
		$query ="insert into tbfuncionarios (nome, login, senha, departamento, status, datareg) values ('".$_POST['nome']."', '".$_POST['login']."', '".$_POST['senha']."', '".$_POST['departamento']."', '".$_POST['status']."', '".date('Y-m-d')."')";
		
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Usuario adicionado com Sucesso!');</script>";
			echo "<script>window.location='usuario_list.php';</script>";
		} else {
			echo "Erro: " . $query . "<br>" . mysqli_error($conn);
			exit;	
		}
	}
}
?>

    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <? include('sidebar.php');?>
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <? include('header.php');?>
                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Adicionar Usuario</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="usuario_list.asp">Usuário</a></li>
                                <li class="breadcrumb-item active">Adicionar</li>
                            </ol>
                        </div>

                        <div class="card mb-4">
                            <h6 class="card-header">&nbsp;</h6>
                            <div class="card-body">
                                <form method="post" action="usuario_adc.php">
                                <input type="hidden" name="modo" value="gravar">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do usuario">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Departamento</label>
                                        <div class="col-sm-10">
                                            <select name="departamento" class="form-control">
                                            	<option value="">Selecione</option>
                                                <option value="DIRETORIA">DIRETORIA</option>
                                                <option value="SECRETARIA">SECRETARIA</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Login</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="login" class="form-control" placeholder="Digite o login do usuario">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Senha</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="senha" class="form-control" placeholder="Digite a senha do usuario">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                            	<option value="">Selecione</option>
                                                <option value="ATIVO">ATIVO</option>
                                                <option value="DEMITIDO">DEMITIDO</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button type="submit" class="btn btn-primary">Gravar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>

                        

                    </div>
                    <!-- [ content ] End -->

                    <? include('footer.php');?>

                </div>
                <!-- [ Layout content ] Start -->

            </div>
            <!-- [ Layout container ] End -->

        </div>

        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper ] end -->

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
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    
</body>

</html>
