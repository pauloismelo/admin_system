<?
	if (isset($_GET['modo'])){
		if ($_GET['modo']=='remover'){
			$query = "delete from tb_artigos where id=".$_GET['id']." ";
			if (mysqli_query($conn, $query)) {
				echo "<script>alert('Removido com sucesso!');</script>";
				echo "<script>window.location='painel.php?go=artigos_list';</script>";
			} else {
				echo "Erro: " . $query . "<br>" . mysqli_error($conn);
				exit;
			}	
		}
	}
?>
    
    
    

<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Consultar Artigos</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="artigos_list.php">Artigos</a></li>
            <li class="breadcrumb-item active">Consultar</li>
        </ol>
    </div>

    <div class="table-responsive">
        <table class="datatables-demo table table-striped table-bordered">
            <thead>
                <tr>
                    <th>Titulo</th>
                    <th>Categoria</th>
                    <th>Registrado em</th>
                    <th>Registrado por</th>
                    <th>Editar</th>
                    <th>Remover</th>
                </tr>
            </thead>
            <?
             
            $SQL="select * from tb_artigos order by id desc";
            $res = mysqli_query($conn,$SQL);
            //$rs = mysqli_fetch_array($res);
            $registros =mysqli_num_rows($res);

            ?>
            <tbody>
                <? if ($registros==0){?>
                <tr class="odd gradeX">
                    <td colspan="5">Nenhum artigo encontrada!</td>
                </tr>
                
                <?
                }else{
                    while($rs = mysqli_fetch_array($res)) { ?>
                    <tr class="even gradeC">
                        <td><? echo $rs['titulo'] ?></td>
                        <td><? echo $rs['categoria'] ?></td>
                        <td><? echo $rs['registro_em'] ?></td>
                        <td><? echo $rs['registro_por'] ?></td>
                        <td class="center" style="text-align:center" title="Editar artigo">
                        <a href="painel.php?go=artigos_edit&id=<? echo $rs['id'] ?>"><i class="fa fa-edit"></i></a>
                        </td>
                        <td class="center" style="text-align:center" title="Remover artigo">
                        <a href="painel.php?go=artigos_list&modo=remover&id=<? echo $rs['id'] ?>"><i class="fa fa-trash-alt"></i></a>
                        </td>
                    </tr>
                <?
                    }
                }
                ?>
                
            </tbody>
        </table>
    </div>


</div>
<!-- [ content ] End -->

                    
