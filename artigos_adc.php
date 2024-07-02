<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Conteúdo</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item">Conteúdo</li>
            <li class="breadcrumb-item active">Adicionar</li>
        </ol>
    </div>

    <div class="card mb-4">
        <div class="card-body">
            <? if(isset($_POST['categoria'])){ ?>
            <form action="artigos-db.php" method="post" enctype="multipart/form-data" accept-charset="ISO-8859-1">
            <input type="hidden" name="categoria" value="<? echo $_POST['categoria']?>">
                
                <div class="form-group row">
                    <label class="form-label col-2">Categoria</label>
                    <div class="col-10"><strong><? echo $_POST['categoria']?></strong></div>
                    <div class="clearfix"></div>
                </div>
                <div class="form-group row">
                    <label class="form-label">
                    <? if ($_POST['categoria']=='DEPOIMENTOS' or $_POST['categoria']=='CLIENTES'){  ?>
                        Nome
                    <? } elseif($_POST['categoria']=='FAQ'){?>
                        Pergunta
                    <? }else{ ?>
                        Título
                    <? } ?>
                    
                    </label>
                    <input type="text" name="titulo" class="form-control">
                    <div class="clearfix"></div>
                </div>
                <div class="form-group row">
                        <label class="form-label w-100">Cor do texto do título</label>
                        <input name="cortitulo" type="color" class="form-control col-1" >
                	</div>
                <? if ($_POST['categoria']=='FAQ' or $_POST['categoria']=='BENEFICIOS' or $_POST['categoria']=='CHAMADA CLIENTE' or $_POST['categoria']=='CHAMADA PROFISSIONAL'){  ?>
                
                    <input type="hidden" name="resumo" class="form-control">
                    <input type="hidden" name="arquivo">
                <? }else{ 
                
                    if ($_POST['categoria']=='CLIENTES'){?>
                        <input type="hidden" name="resumo" class="form-control">
                    <? }else{?>
                        <div class="form-group row">
                            <label class="form-label">
                            <? if ($_POST['categoria']=='DEPOIMENTOS' or $_POST['categoria']=='EQUIPE'){  ?>
                                Função/Cargo
                            <? } elseif($_POST['categoria']=='REPRESENTANTE'){?>
                                Cidade/UF
                            <? } elseif($_POST['categoria']=='BANNER'){?>
                                Subtitulo 1
                            <? }else{ ?>
                                Resumo
                            <? } ?>
                            
                            </label>
                            <input type="text" name="resumo" class="form-control">
                            <div class="clearfix"></div>
                        </div>
                    <? }?>
                    	<div class="form-group row">
                            <label class="form-label w-100">Cor do texto do resumo</label>
                            <input name="corresumo" type="color" class="form-control col-1" >
                        </div>
                        <div class="form-group">
                            <label class="form-label w-100">Imagem</label> 
                            <input type="file" name="arquivo">
                            <br /><br />
                            <?
                            if ($_POST['categoria']=='BANNER'){
								echo '*Tamanho da imagem para o banner: 1600x900 ou maior';
							}?>
                            
                        </div>
                <? } 
                if ($_POST['categoria']=='CLIENTES'){?>
                        <input type="hidden" name="texto" class="form-control">
                <? }else{?>
                    <div class="form-group row">
                      <label class="form-label  w-100">
                        <? if ($_POST['categoria']=='REPRESENTANTE'){  ?>
                            Email e celular
                        <? } elseif($_POST['categoria']=='FAQ'){?>
                            Resposta
                        <? } elseif($_POST['categoria']=='BANNER'){?>
                            Subtitulo 2
                        <? }else{ ?>
                            Texto
                        <? } ?>
                      
                      </label>
                        <textarea id="texto" name="texto" rows="3" class="form-control"></textarea>
                        <div class="clearfix"></div>
                    </div>
                    <div class="form-group row">
                        <label class="form-label w-100">Cor do texto do texto</label>
                        <input name="cortexto" type="color" class="form-control col-1" >
                	</div>
                    <? if ($_POST['categoria']=='SOBRE'){  ?>
                        <div class="form-group row">
                          <label class="form-label">
                          Missão
                          </label>
                          <textarea id="bs-markdown" name="missao" rows="3" class="form-control"></textarea>
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label class="form-label">
                          Visão
                          </label>
                          <textarea id="bs-markdown" name="visao" rows="3" class="form-control"></textarea>
                          <div class="clearfix"></div>
                        </div>
                        <div class="form-group">
                          <label class="form-label">
                          Valores
                          </label>
                          <textarea id="bs-markdown" name="valores" rows="3" class="form-control"></textarea>
                          <div class="clearfix"></div>
                        </div>
                    <? }
                }?>
                
                <div class="form-group">
                  <label class="form-label">Status</label>
                    <select name="status" class="form-control" required>
                        <option value="ATIVO">ATIVO</option>
                        <option value="INATIVO">INATIVO</option>
                    </select>
                    <div class="clearfix"></div>
                </div>
                
                <button type="submit" class="btn btn-primary">ADICIONAR</button>
            </form>
            
            
            <? }else{?>
            
            <form action="painel.php?go=artigos_adc" method="post">
                <div class="form-group">
                    <label class="form-label">Categoria</label>
                    <select name="categoria" class="form-control" required>
                        <option value="">Selecione uma categoria...</option>
                        <option value="CLIENTES">CLIENTES</option>
                        <option value="DEPOIMENTOS">DEPOIMENTOS</option>
                        <option value="DIFERENCIAIS">DIFERENCIAIS</option>
                        
                    </select>
                    <div class="clearfix"></div>
                </div>
                <button type="submit" class="btn btn-primary">Proximo</button>
            </form>
            
            <? } ?>
        </div>
    </div>

</div>
<!-- [ content ] End -->

                  
<script>
	CKEDITOR.replace('texto');
</script>
