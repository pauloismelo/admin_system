<?
if (isset($_GET['modo'])){
	if ($_GET['modo']=='remover'){
		$query="delete from tb_planos_itens where id=".$_GET['id']." ";
		
		if (mysqli_query($conn, $query)) {
			echo "<script>alert('Item Removido com Sucesso!');</script>";
			echo "<script>window.location='painel.php?go=item_list&id=".$_GET['id_plano']."';</script>";
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
	<h4 class="font-weight-bold py-3 mb-0">Consultar Itens do plano <? echo $imob?></h4>
	<div class="text-muted small mt-0 mb-4 d-block breadcrumb">
		<ol class="breadcrumb">
			<li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
			<li class="breadcrumb-item"><a href="painel.php?go=imob_list">Planos</a></li>
			<li class="breadcrumb-item active">Consultar itens</li>
		</ol>
	</div>
	
	<div class="form-group row">
		<div class="col-sm-12">
			<a href="painel.php?go=item_adc&id=<? echo $_GET['id']?>"><button type="button" class="btn btn-primary"><i class="fa fa-plus"></i> Adicionar Item</button></a>
		</div>
	</div>

	<div class="table-responsive">
		<table class="datatables-demo table table-striped table-bordered">
			<thead>
				<tr>
					<th>Item</th>
					<th>Registro</th>
					<th>Remover</th>
				</tr>
			</thead>
			<?
			 
			$SQL="select * from tb_planos_itens where id_plano=".$_GET['id']." ";
			$res = mysqli_query($conn,$SQL);
			//$rs = mysqli_fetch_array($res);
			$registros=mysqli_num_rows($res);

			?>
			<tbody>
				<? if ($registros==0){?>
			
				<tr class="odd gradeX">
					<td colspan="5" align="center">Nenhum item encontrado!</td>
				</tr>
				<? }else{
					while($rs = mysqli_fetch_array($res)) { ?>
			   
					<tr class="even gradeC">
						<td><? echo $rs['item'];?></td>
						<td>
                        <?
                        $data = new DateTime($rs['datareg']);
                        echo $data->format('d/m/Y');
                        
                        ?>
                        </td>
						<td class="center" style="text-align:center" title="Remover">
						<a href="painel.php?go=item_list&modo=remover&id=<? echo $rs['id'];?>&id_plano=<? echo $rs['id_plano'];?>"><i class="fa fa-trash-alt"></i></a>
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