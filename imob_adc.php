


<!-- [ content ] Start -->
<div class="container-fluid flex-grow-1 container-p-y">
    <h4 class="font-weight-bold py-3 mb-0">Adicionar Planos</h4>
    <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
        <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.php"><i class="feather icon-home"></i></a></li>
            <li class="breadcrumb-item"><a href="imob_list.asp">Planos</a></li>
            <li class="breadcrumb-item active">Adicionar</li>
        </ol>
    </div>

    <div class="card mb-4">
        <h6 class="card-header">&nbsp;</h6>
        <div class="card-body">
            <form method="post" action="imob_db.php" enctype="multipart/form-data">
                
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Titulo</label>
                    <div class="col-sm-10">
                        <input type="text" name="titulo" id="titulo" class="form-control" required>
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
                        <textarea name="descricao" rows="4" required="required" class="form-control" id="descricao"></textarea>
                        <div class="clearfix"></div>
                    </div>
                </div>
                <div class="form-group row">
                    <label class="col-form-label col-sm-2 text-sm-right">Para qual tipo de veículo?</label>
                    <div class="col-sm-10">
                        <select name="para" class="form-control" required>
                            <option value="">Selecione</option>
                            <option value="TODOS">TODOS</option>
                            <option value="CARRO">CARRO</option>
                            <option value="MOTO">MOTO</option>
                            <option value="CAMINHAO">CAMINHAO</option>
                        </select>
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

    <script>
		CKEDITOR.replace('descricao');
	</script>
    
