<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>
<?
    if (isset($_POST['modo'])){
		if ($_POST['modo']=='editar'){
			$query="update tbfuncionarios set nome='".$_POST['nome']."', login='".$_POST['login']."', senha='".$_POST['senha']."', departamento='".$_POST['departamento']."', status='".$_POST['status']."' where id=".$_POST['id']." ";
			
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Usuario Atualizado com Sucesso!');</script>";
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
                        <h4 class="font-weight-bold py-3 mb-0">Editar Usuario</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="usuario_list.asp">Usuário</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                        
                         <?
								 
						$SQL="select * from tbfuncionarios where id=".$_GET['id']."";
						$res = mysqli_query($conn,$SQL);
						$rs = mysqli_fetch_array($res);
						$registros =mysqli_num_rows($res);

						
						if ($registros>0){?>
						
                       

                        <div class="card mb-4">
                            <h6 class="card-header">&nbsp;</h6>
                            <div class="card-body">
                                <form method="post" action="usuario_edit.php">
                                <input type="hidden" name="modo" value="editar">
                                <input type="hidden" name="id" value="<? echo $rs['id'];?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" value="<? echo $rs['NOME'];?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Departamento</label>
                                        <div class="col-sm-10">
                                            <select name="departamento" class="form-control">
                                            	<option value="">Selecione</option>
                                                <option value="DIRETORIA" <? if($rs['departamento']=='DIRETORIA'){echo 'selected';}?>>DIRETORIA</option>
                                                <option value="SECRETARIA" <? if($rs['departamento']=='SECRETARIA'){echo 'selected';}?> >SECRETARIA</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Login</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="login" class="form-control" value="<? echo $rs['login'];?>" >
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Senha</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="senha" class="form-control" value="<? echo $rs['senha'];?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Status</label>
                                        <div class="col-sm-10">
                                            <select name="status" class="form-control">
                                            	<option value="">Selecione</option>
                                                <option value="ATIVO" <? if($rs['status']=='ATIVO'){echo 'selected';}?> >ATIVO</option>
                                                <option value="DEMITIDO" <? if($rs['status']=='DEMITIDO'){echo 'selected';}?>>DEMITIDO</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
					<? }
					
					unset($res);
					unset($rs);
					unset($SQL)?>
                        

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
