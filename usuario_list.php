<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>
	
    <?
    if (isset($_GET['modo'])){
		if ($_GET['modo']=='remover'){
			$query="delete from tbfuncionarios where id=".$_GET['id']." ";
			
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Usuario Removido com Sucesso!');</script>";
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
    <!-- [ Preloader ] Ebd -->

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
                        <h4 class="font-weight-bold py-3 mb-0">Consultar Usuários</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="usuario_list.asp">Usuário</a></li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>

                        <div class="table-responsive">
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Departamento</th>
                                        <th>Registro</th>
                                        <th>Editar</th>
                                        <th>Remover</th>
                                    </tr>
                                </thead>
                                <?
								 
								$SQL="select * from tbfuncionarios order by nome asc";
								$res = mysqli_query($conn,$SQL);
								//$rs = mysqli_fetch_array($res);
								$registros =mysqli_num_rows($res);

								?>
                                <tbody>
                                	<? if ($registros==0){?>
                                
                                    <tr class="odd gradeX">
                                        <td colspan="5">Nenhuma categoria encontrada!</td>
                                    </tr>
                                    <? }else{
										while($rs = mysqli_fetch_array($res)) { ?>
                                   
                                    <tr class="even gradeC">
                                        <td><? echo $rs['NOME'];?></td>
                                        <td><? echo $rs['departamento'];?></td>
                                        <td><? echo $rs['datareg'];?></td>
                                        <td class="center" style="text-align:center" title="Editar usuario">
                                        <a href="usuario_edit.php?id=<? echo $rs['id'];?>"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="center" style="text-align:center" title="Remover usuario">
                                        <a href="usuario_list.php?modo=remover&id=<? echo $rs['id'];?>"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
                                    	<? } 
									}?>
                                    
                                </tbody>
                            </table>
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
	
    <script src="assets\js\jquery-3.3.1.min.js"></script>
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
    <script src="assets\libs\datatables\datatables.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\tables_datatables.js"></script>
</body>

</html>
