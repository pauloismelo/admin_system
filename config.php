<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>
<!--#include file="head.asp"-->

<body>

<?
if (isset($_POST['modo'])){
	if ($_POST['modo']=='editar'){
		$query="update dados set titulo='".$_POST['titulo']."', nomedaempresa='".$_POST['nomedaempresa']."', telefonedaempresa='".$_POST['telefonedaempresa']."', celdaempresa='".$_POST['celdaempresa']."', emaildaempresa='".$_POST['emaildaempresa']."', endereco='".$_POST['endereco']."', bairro='".$_POST['bairro']."', cidade='".$_POST['cidade']."', uf='".$_POST['uf']."', telefone1='".$_POST['telefone1']."', celular1='".$_POST['celular1']."', site='".$_POST['site']."', twitter='".$_POST['twitter']."', facebook='".$_POST['facebook']."', instagram='".$_POST['instagram']."', keywords='".$_POST['keywords']."', descriptions='".$_POST['descriptions']."', endereco2='".$_POST['endereco2']."', bairro2='".$_POST['bairro2']."', cidade2='".$_POST['cidade2']."', uf2='".$_POST['uf2']."', telefone2='".$_POST['telefone2']."', celular2='".$_POST['celular2']."', num01='".$_POST['num01']."', num02='".$_POST['num02']."', num03='".$_POST['num03']."' where id=".$_POST['id']." ";
		
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Informações Atualizadas com Sucesso!');</script>";
		echo "<script>window.location='config.php';</script>";
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
                        <h4 class="font-weight-bold py-3 mb-0">Configurações</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Configurações</li>
                                <li class="breadcrumb-item active">Dados</li>
                            </ol>
                        </div>
                        <?
                        $SQL="select * from dados where id=1 ";
						$res = mysqli_query($conn,$SQL);
						$rs = mysqli_fetch_array($res);
						$registros =mysqli_num_rows($res);

						
						if ($registros>0){?>

                        <div class="card mb-4">
                            <h6 class="card-header">Horizontal</h6>
                            <div class="card-body">
                                <form action="config.php" method="post">
                                <input type="hidden" name="modo" value="editar">
                                <input type="hidden" name="id" value="<? echo $rs["id"] ?>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Título</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Título do site" name="titulo" value="<? echo $rs["titulo"] ?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome da empresa</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Nome da empresa" name="nomedaempresa" value="<? echo $rs["nomedaempresa"] ?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Telefone</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Telefone da empresa" name="telefonedaempresa" value="<? echo $rs["telefonedaempresa"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Celular</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Celular da empresa" name="celdaempresa" value="<? echo $rs["celdaempresa"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                        <div class="col-sm-10">
                                            <input type="email" class="form-control" placeholder="Email da empresa" name="emaildaempresa" value="<? echo $rs["emaildaempresa"] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-12 text-sm-left">Unidade 1</label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Endereço</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="endereco" value="<? echo $rs["endereco"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Bairro</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bairro" value="<? echo $rs["bairro"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Cidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cidade" value="<? echo $rs["cidade"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">UF</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="uf" value="<? echo $rs["uf"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Telefone </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Telefone da unidade 1" name="telefone1" value="<? echo $rs["telefone1"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Celular</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Celular da unidade 1" name="celular1" value="<? echo $rs["celular1"] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-12 text-sm-left">Unidade 2</label>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">2º Endereço</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="endereco2" value="<? echo $rs["endereco2"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">2º Bairro</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="bairro2" value="<? echo $rs["bairro2"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">2º Cidade</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="cidade2" value="<? echo $rs["cidade2"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">2º UF</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" name="uf2" value="<? echo $rs["uf2"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Telefone </label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Telefone da unidade 2" name="telefone2" value="<? echo $rs["telefone2"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Celular</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="Celular da unidade 2" name="celular2" value="<? echo $rs["celular2"] ?>">
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Site</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control" placeholder="www.seusite.com.br" name="site" value="<? echo $rs["site"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Twitter</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="twitter" value="<? echo $rs["twitter"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Facebook</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="facebook" value="<? echo $rs["facebook"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Instagram</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="instagram" value="<? echo $rs["instagram"] ?>">
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Keywords</label>
                                        <div class="col-sm-10">
                                          <textarea name="keywords" rows="4" class="form-control"><? echo $rs["keywords"] ?></textarea>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Descriptions</label>
                                        <div class="col-sm-10">
                                          <textarea name="descriptions" rows="4" class="form-control"><? echo $rs["descriptions"] ?></textarea>
                                        </div>
                                    </div>
                                    <hr>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Anos de Experiência</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="num01" value="<? echo $rs["num01"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Cooperados</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="num02" value="<? echo $rs["num02"] ?>">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Clientes</label>
                                        <div class="col-sm-10">
                                            <input type="text" class="form-control"  name="num03" value="<? echo $rs["num03"] ?>">
                                        </div>
                                    </div>
                                    
                                    
                                    

                                    
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button type="submit" class="btn btn-primary">Atualizar configurações</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        
                        <? }
						unset($rs);
						unset($res);
						unset($SQL)?>

                    </div>
                    <!-- [ content ] End -->

                    <!--#include file="footer.asp"-->

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
