<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Editar Conteúdo</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Conteúdo</li>
            <li class="breadcrumb-item active">Editar</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <?
            $SQL="select * from tb_artigos where id=".$_GET['id']." order by id desc";
            $res = mysqli_query($conn,$SQL);
            $rs = mysqli_fetch_array($res);
            $registros =mysqli_num_rows($res);

                    
            if ($registros>0){
            ?>
            
            <form action="artigos-update.php" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1 UTF-8">
            <input type="hidden" name="categoria" value="<? echo $rs['categoria'] ?>">
            <input type="hidden" name="id" value="<? echo $rs['id'] ?>">
                
                <div class="form-group row">
                    <label class="form-label col-2">Categoria</label>
                    <div class="col-10"><strong><? echo $rs['categoria']; ?></strong></div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group row">
                    <label class="form-label">
                    <? if ($rs['categoria']=='DEPOIMENTOS' or $rs['categoria']=='EQUIPE' or $rs['categoria']=='CLIENTES'){  ?>
                        Nome
                    <? }else{ ?>
                        Título
                    <? } ?>
                    
                    </label>
                    <input type="text" name="titulo" class="form-control" value="<? echo $rs['titulo']; ?>">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group row">
                        <label class="form-label w-100">Cor do texto do titulo</label>
                        <input name="cortitulo" type="color" class="form-control col-1" value="<? echo $rs['cortitulo']; ?>" >
                	</div>
                <? if ($rs['categoria']=='FAQ' or $rs['categoria']=='BENEFICIOS'  or $rs['categoria']=='CHAMADA PROFISSIONAL'){  ?>
                
                    <input type="hidden" name="resumo" class="form-control">
                    <input type="hidden" name="arquivo">
                <? }else{ ?>
                    <? if ($rs['categoria']=='CLIENTES' or $rs['categoria']=='CHAMADA CLIENTE'){  ?>
                        <input type="hidden" name="resumo" class="form-control">
                        <input name="corresumo" type="hidden" class="form-control" >
                    <? }else{?>
                        <div class="form-group">
                            <label class="form-label">
                            <? if ($rs['categoria']=='DEPOIMENTOS' or $rs['categoria']=='EQUIPE'){  ?>
                                Função/Cargo
                            <? } elseif($rs['categoria']=='REPRESENTANTE'){?>
                                Cidade/UF
                            <? }else{ ?>
                                Resumo
                            <? } ?>
                            
                            </label>
                            <input type="text" name="resumo" class="form-control" value="<? echo $rs['resumo']; ?>">
                            <div class="clearfix"></div>
                        </div>
                        <div class="form-group row">
                            <label class="form-label w-100">Cor do texto do resumo</label>
                            <input name="corresumo" type="color" class="form-control col-1" value="<? echo $rs['corresumo']; ?>" >
                        </div>
                    <? }?>
                    
                    
                    <div class="form-group row">
                        <label class="form-label">Imagem Atual</label>
                        <? if($rs['foto']=='nenhum' or $rs['foto']=='' ){ ?>
                            <span style="color:#F00;">&nbsp;sem foto</span>
                        <? }else{?>
                        <img src="ARTIGOS/<? echo $rs['foto']; ?>" width="200">
                        <? }?>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label w-100">Alterar Imagem</label>
                        <input type="file" name="arquivo">
                	</div>
                    
					<?
                    if ($rs['categoria']=='BANNER'){
                        echo '*Tamanho da imagem para o banner: 1600x900 ou maior';
                    }?>
                    <br /><br />
                    
                    
                <? }?>
                <? if ($rs['categoria']=='CLIENTES'){  ?>
                        <input type="hidden" name="texto" class="form-control">
                <? }else{?>
                    <div class="form-group row">
                     <label class="form-label w-100">
                      <? if ($rs['categoria']=='REPRESENTANTE'){  ?>
                      Email e celular
                      <? } else{?>
                      Texto
                      <? } ?>
                      </label>
                      <textarea id="texto" name="texto" rows="3" class="form-control"><? echo $rs['texto']; ?></textarea>
                      
                    </div>
                    <div class="form-group row">
                        <label class="form-label w-100">Cor do texto do texto</label>
                        <input name="cortexto" type="color" class="form-control col-1" value="<? echo $rs['cortexto']; ?>" >
                	</div>
                    <? if ($rs['categoria']=='SOBRE'){  ?>
                        <div class="form-group">
                          <label class="form-label">
                          Missão
                          </label>
                          <textarea id="bs-markdown" name="missao" rows="3" class="form-control"><? echo $rs['missao']?></textarea>
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label class="form-label">
                          Visão
                          </label>
                          <textarea id="bs-markdown" name="visao" rows="3" class="form-control"><? echo $rs['visao']?></textarea>
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label class="form-label">
                          Valores
                          </label>
                          <textarea id="bs-markdown" name="valores" rows="3" class="form-control"><? echo $rs['valores']?></textarea>
                          <div class="clearfix"></div>
                        </div>
                    <? }
                }?>
                
                <div class="form-group">
                  <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="ATIVO" <? if ($rs['status']=='ATIVO'){ echo'selected';} ?>>ATIVO</option>
                        <option value="INATIVO" <? if ($rs['status']=='INATIVO'){ echo'selected';} ?>>INATIVO</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                
                <button type="submit" class="btn btn-primary">EDITAR</button>
            </form>
            <? }
            unset($SQL);
            unset($registros);
            unset($res);
            unset($rs);
             ?>
            
        </div>
    </div>

</div>
<!-- [ content ] End -->

                   
<script>
	CKEDITOR.replace('texto');
    CKEDITOR.replace('missao');
    CKEDITOR.replace('visao');
    CKEDITOR.replace('valores');
</script>
