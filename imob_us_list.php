<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>
	
    <?
    if (isset($_GET['modo'])){
		if ($_GET['modo']=='remover'){
			$query="delete from tb_imobiliarias_usuarios where id=".$_GET['id']." ";
			
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Usuario Removido com Sucesso!');</script>";
			echo "<script>window.location='imob_us_list.php?id=".$_GET['id_imob']."';</script>";
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
					<?
								 
					$SQL="select nome_fantasia from tb_imobiliarias where id=".$_GET['id']."";
					$res = mysqli_query($conn,$SQL);
					$rs = mysqli_fetch_array($res);
					$registros =mysqli_num_rows($res);
					if ($registros>0){
						$imob=$rs['nome_fantasia'];
;					}
					unset($SQL);
					unset($res);
					unset($rs);
					unset($registros);

					?>
                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Consultar Usuarios da Imobiliária <? echo $imob?></h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="imob_list.asp">Usuarios da Imobiliaria</a></li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>
                        
                        <div class="form-group row">
                            <div class="col-sm-12">
                                <a href="imob_us_adc.php?id=<? echo $_GET['id']?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Usuário</button></a>
                            </div>
                        </div>

                        <div class="table-responsive">
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Imobiliaria</th>
                                        <th>Registro</th>
                                        <th>Email/login</th>
                                        <th>Editar</th>
                                        <th>Remover</th>
                                    </tr>
                                </thead>
                                <?
								 
								$SQL="select * from tb_imobiliarias_usuarios where id_imob=".$_GET['id']." order by nome asc";
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
                                            <td><? echo $rs['nome'];?></td>
                                            <td><? echo $rs['cpf'];?></td>
                                            <td><? echo $rs['email'];?></td>
                                            <td class="center" style="text-align:center" title="Editar">
                                            <a href="imob_us_edit.php?id=<? echo $rs['id'];?>&id_imob=<? echo $_GET['id'];?>"><i class="fa fa-edit"></i></a>
                                            </td>
                                            <td class="center" style="text-align:center" title="Remover">
                                            <a href="imob_us_list.php?modo=remover&id=<? echo $rs['id'];?>&id_imob=<? echo $rs['id_imob'];?>"><i class="fa fa-trash-alt"></i></a>
                                            </td>
                                        </tr>
                                    	<?
										} // while imobiliarioa
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
