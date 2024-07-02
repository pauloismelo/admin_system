

<?
if (isset($_POST['modo'])){
	if ($_POST['modo']=='gravar'){
		$query ="insert into tb_planos_itens (id_plano, item, datareg, userreg) values (".$_POST['id_plano'].", '".$_POST['item']."', '".date('Y-m-d')."', '".$nomex."')";
		
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Item adicionado com Sucesso!');</script>";
			echo "<script>window.location='painel.php?go=item_list&id=".$_POST['id_plano']."';</script>";
		} else {
			echo "Erro: " . $query . "<br>" . mysqli_error($conn);
			exit;	
		}
	}
}


    
                

			 
$SQL="select titulo from tb_planos where id=".$_GET['id']."";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);
if ($registros>0){
	$imob=$rs['titulo'];
}
unset($SQL);
unset($res);
unset($rs);
unset($registros);

?>

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
	<h4 class="font-weight-bold py-3 mb-0">Adicionar item do plano <? echo $imob;?></h4>
	<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
			<li class="breadcrumb-item"><a href="painel.php?go=imob_list">Planos</a></li>
			<li class="breadcrumb-item"><a href="painel.php?go=item_list&id=<? echo $_GET['id']?>">itens do plano</a></li>
			<li class="breadcrumb-item active">Adicionar</li>
		</ol>
	</div>

	<div class="card mb-4">
		<h6 class="card-header">&nbsp;</h6>
		<div class="card-body">
			<form method="post" action="painel.php?go=item_adc">
			<input type="hidden" name="modo" value="gravar">
			<input type="hidden" name="id_plano" value="<? echo $_GET['id']?>">
			
				<div class="form-group row">
					<label class="col-form-label col-sm-2 text-sm-right">Item</label>
					<div class="col-sm-10">
						<input type="text" name="item" id="item" class="form-control" required>
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