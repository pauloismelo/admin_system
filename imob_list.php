<?
if (isset($_GET['modo'])){
	if ($_GET['modo']=='remover'){
		$query="delete from tb_planos where id=".$_GET['id']." ";
		
	if (mysqli_query($conn, $query)) {
		
		$query2="delete from tb_planos_itens where id_plano=".$_GET['id']." ";
		if (mysqli_query($conn, $query2)) {
		
			echo "<script>alert('Plano Removido com Sucesso!');</script>";
			echo "<script>window.location='painel.php?go=imob_list';</script>";
		}else{
			echo "Erro: " . $query2 . "<br>" . mysqli_error($conn);
			exit;	
		}
	} else {
		echo "Erro: " . $query . "<br>" . mysqli_error($conn);
		exit;
	}
	}
}
?>
   
    
    

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Consultar Planos</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="imob_list.asp">Planos</a></li>
            <li class="breadcrumb-item active">Consultar</li>
        </ol>
    </div>

    <div class="table-responsive">
        <table class="datatables-demo table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Tipo de veiculo</th>
                    <th>Registro</th>
                    <th class="center" style="text-align:center">Itens</th>
                    <th class="center" style="text-align:center">Editar</th>
                    <th class="center" style="text-align:center">Remover</th>
                </tr>
            </thead>
            <?
             
            $SQL="select * from tb_planos order by titulo asc";
            $res = mysqli_query($conn,$SQL);
            //$rs = mysqli_fetch_array($res);
            $registros =mysqli_num_rows($res);

            ?>
            <tbody>
                <? if ($registros==0){?>
            
                <tr class="odd gradeX">
                    <td colspan="5">Nenhum plano encontrado!</td>
                </tr>
                <? }else{
                    while($rs = mysqli_fetch_array($res)) { ?>
               
                    <tr class="even gradeC">
                        <td><? echo $rs['titulo'];?></td>
                        <td><? echo $rs['para'];?></td>
                        <td>
                        <?
                        $data = new DateTime($rs['datareg']);
                         echo $data->format('d/m/Y');
                        
                        ?>
                        </td>
                        <td class="center" style="text-align:center" title="Adicionar item">
                        <a href="painel.php?go=item_list&id=<? echo $rs['id'];?>"><i class="fa fa-align-justify"></i></a>
                        </td>
                        <td class="center" style="text-align:center" title="Editar">
                        <a href="painel.php?go=imob_edit&id=<? echo $rs['id'];?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="center" style="text-align:center" title="Remover">
                        <a href="painel.php?go=imob_list&modo=remover&id=<? echo $rs['id'];?>"><i class="fa fa-trash-alt"></i></a>
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


