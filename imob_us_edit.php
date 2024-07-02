<!DOCTYPE html>
<script>
function Mascara(tipo, campo, teclaPress) {
	if (window.event)
	{
		var tecla = teclaPress.keyCode;
	} else {
		tecla = teclaPress.which;
	}
 
	var s = new String(campo.value);
	// Remove todos os caracteres à seguir: ( ) / - . e espaço, para tratar a string denovo.
	s = s.replace(/(\.|\(|\)|\/|\-| )+/g,'');
 
	tam = s.length + 1;
 
	if ( tecla != 9 && tecla != 8 ) {
		switch (tipo)
		{
		case 'CPF' :
			if (tam > 3 && tam < 7)
				campo.value = s.substr(0,3) + '.' + s.substr(3, tam);
			if (tam >= 7 && tam < 10)
				campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,tam-6);
			if (tam >= 10 && tam < 12)
				campo.value = s.substr(0,3) + '.' + s.substr(3,3) + '.' + s.substr(6,3) + '-' + s.substr(9,tam-9);
		break;
 		
		case 'CNPJ' :
 
			if (tam > 2 && tam < 6)
				campo.value = s.substr(0,2) + '.' + s.substr(2, tam);
			if (tam >= 6 && tam < 9)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,tam-5);
			if (tam >= 9 && tam < 13)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,tam-8);
			if (tam >= 13 && tam < 15)
				campo.value = s.substr(0,2) + '.' + s.substr(2,3) + '.' + s.substr(5,3) + '/' + s.substr(8,4)+ '-' + s.substr(12,tam-12);
		break;
 
		case 'TEL' :
			if (tam > 2 && tam < 4)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,tam);
			if (tam >= 7 && tam < 11)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,4) + '-' + s.substr(6,tam-6);
		break;
		
		case 'CEL' :
			if (tam > 2 && tam < 4)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,tam);
			if (tam >= 8 && tam < 12)
				campo.value = '(' + s.substr(0,2) + ') ' + s.substr(2,5) + '-' + s.substr(7,tam-7);
		break;
 
		
		case 'DATA' :
			if (tam > 2 && tam < 4)
				campo.value = s.substr(0,2) + '/' + s.substr(2, tam);
			if (tam > 4 && tam < 11)
				campo.value = s.substr(0,2) + '/' + s.substr(2,2) + '/' + s.substr(4,tam-4);
		break;
		
		case 'CEP' :
			if (tam > 5 && tam < 7)
				campo.value = s.substr(0,5) + '-' + s.substr(5, tam);
			
		break;
		}
	}
}
</script>
<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>
<?
    if (isset($_POST['modo'])){
		if ($_POST['modo']=='editar'){
			$query="update tb_imobiliarias_usuarios set cpf='".$_POST['cpf']."', nome='".$_POST['nome']."', email='".$_POST['email']."', celular='".$_POST['celular']."', tipo='".$_POST['tipo']."' where id=".$_POST['id']." ";
			
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Usuario Atualizado com Sucesso!');</script>";
			echo "<script>window.location='imob_us_list.php?id=".$_POST['id_imob']."';</script>";
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
                	<?
								 
					$SQL="select nome_fantasia from tb_imobiliarias where id=".$_GET['id_imob']."";
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
                        <h4 class="font-weight-bold py-3 mb-0">Editar usuario da Imobiliária <? echo $imob;?></h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="imob_list.php">Imobiliária</a></li>
                                <li class="breadcrumb-item"><a href="imob_us_list.php?id=<? echo $_GET['id_imob']?>">Usuarios da Imobiliária</a></li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
                        
                         <?
								 
						$SQL="select * from tb_imobiliarias_usuarios where id=".$_GET['id']."";
						$res = mysqli_query($conn,$SQL);
						$rs = mysqli_fetch_array($res);
						$registros =mysqli_num_rows($res);

						
						if ($registros>0){?>
						
                       

                        <div class="card mb-4">
                            <h6 class="card-header">&nbsp;</h6>
                            <div class="card-body">
                                <form method="post" action="imob_us_edit.php">
                                <input type="hidden" name="modo" value="editar">
                                <input type="hidden" name="id" value="<? echo $_GET['id']?>">
                                <input type="hidden" name="id_imob" value="<? echo $_GET['id_imob']?>">
                                
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">CPF</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="cpf" id="cpf" class="form-control" onkeypress="Mascara('CPF',this,event);" required value="<? echo $rs['cpf']?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                     <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" id="nome" class="form-control" required value="<? echo $rs['nome']?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Email</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="email" id="email" class="form-control" required value="<? echo $rs['email']?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Celular</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="celular" id="celular" class="form-control"  onkeypress="Mascara('CEL',this,event);" required value="<? echo $rs['celular']?>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Tipo</label>
                                        <div class="col-sm-10">
                                        	<select name="tipo" required class="form-control">
                                            	<option value="">Selecione...</option>
                                                <option value="Atendente" value="<? if($rs['tipo']=='Atendente'){ echo 'selected';}?>">Atendente</option>
                                                <option value="Gerente" <? if($rs['tipo']=='Gerente'){ echo 'selected';}?>>Gerente</option>
                                                <option value="Administrador" <? if($rs['tipo']=='Administrador'){ echo 'selected';}?>>Administrador</option>
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
