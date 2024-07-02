<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Editar Plano</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="imob_list.asp">Plano</a></li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>
    
     <?
             
    $SQL="select * from tb_planos where id=".$_GET['id']."";
    $res = mysqli_query($conn,$SQL);
    $rs = mysqli_fetch_array($res);
    $registros =mysqli_num_rows($res);

    
    if ($registros>0){?>
    
   

    <div class="card mb-4">
        <h6 class="card-header">&nbsp;</h6>
        <div class="card-body">
            <form method="post" action="imob_update.php" enctype="multipart/form-data">
            <input type="hidden" name="id" value="<? echo $rs['id'];?>"> 
                
                
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Titulo</label>
                    <div class="col-sm-10">
                        <input type="text" name="titulo" id="titulo" class="form-control" value="<? echo $rs['titulo']?>" required>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-label col-sm-2 text-sm-right">Imagem Atual</label>
                    <div class="col-sm-10">
						<? if($rs['foto']=='nenhum' or $rs['foto']=='' ){ ?>
                            <span style="color:#F00;">&nbsp;sem foto</span>
                        <? }else{?>
                        <img src="PLANOS/<? echo $rs['foto']; ?>" width="200">
                        <? }?>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="form-label col-sm-2 text-sm-right">Imagem</label> 
                    <div class="col-sm-10">
                        <input type="file" name="arquivo">
                        <div class="clearfix"></div>
                    </div>
                </div>
                 <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Descrição</label>
                    <div class="col-sm-10">
                        <textarea name="descricao" rows="3" required="required" class="form-control" id="descricao"><? echo $rs['descricao']?></textarea>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Para qual tipo de veículo?</label>
                    <div class="col-sm-10">
                        <select name="para" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="TODOS" <? if ($rs['para']=='TODOS'){ echo 'selected'; }?>>TODOS</option>
                            <option value="CARRO" <? if ($rs['para']=='CARRO'){ echo 'selected'; }?>>CARRO</option>
                            <option value="MOTO" <? if ($rs['para']=='MOTO'){ echo 'selected'; }?>>MOTO</option>
                            <option value="CAMINHAO" <? if ($rs['para']=='CAMINHAO'){ echo 'selected'; }?>>CAMINHAO</option>
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

<script>
	CKEDITOR.replace('descricao');
</script>
                   
