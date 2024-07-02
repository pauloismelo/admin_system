<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
	
    <%if request("modo")="gravar" then
	AbreConexao
		conexao.execute("insert into TBPRODUTO (nome, id_categoria, id_subcategoria, fabricante, descricao, valor, valorfinal, home, lancamento, oferta, status, datareg, userreg) values ('"&request("nome")&"', "&request("categoria")&", "&request("subcategoria")&", '"&request("fabricante")&"', '"&request("descricao")&"', '"&request("valor")&"', '"&request("valorfinal")&"', '"&request("home")&"', '"&request("lancamento")&"', 'n', '"&request("status")&"', '"&formataData(date)&"', '"&nomex&"' )")
	set rs=conexao.execute("select * from TBPRODUTO order by id desc")
		if not rs.eof then
			ultimoid=rs("id")
		end if
	set rs=nothing
	FechaConexao
	response.Write("<script>alert('Produto Adicionado com Sucesso!');</script>")
	response.Write("<script>window.location='produto_edit.asp?id="&ultimoid&"';</script>")
	end if%>
    
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <!--#include file="sidebar.asp"-->
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <!--#include file="header.asp"-->

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Adicionar produto</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Produto</li>
                                <li class="breadcrumb-item active">Adicionar</li>
                            </ol>
                        </div>
						
                        <form action="produto_adc.asp" method="post">
                        <input type="hidden" name="modo" value="gravar">
                        <div class="nav-tabs-top nav-responsive-sm">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#item-info">Informações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#item-description">Descrição</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                            
                                <!-- Basic info -->
                                <div class="tab-pane fade show active" id="item-info">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="">Selecione...</option>
                                                <option value="ATIVO">ATIVO</option>
                                                <option value="ARQUIVADO">ARQUIVADO</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nome do Produto</label>
                                            <input type="text" name="nome" class="form-control" required>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group row">
                                        	<div class="col-sm-6">
                                                <label class="form-label">Valor</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" name="valor" class="form-control" required >
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            	<label class="form-label">Valor com desconto</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" name="valorfinal" class="form-control">
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Fabricante</label>
                                            <input type="text" name="fabricante" class="form-control">
                                            <div class="clearfix"></div>
                                        </div>
                                        <script>
										function getHTTPObject() { 
										  var xmlhttp; 
										  /*@cc_on 
										  @if (@_jscript_version >= 5) 
											try { 
											  xmlhttp = new ActiveXObject("Msxml2.XMLHTTP"); 
											} catch (e) { 
											  try { 
												xmlhttp = new ActiveXObject("Microsoft.XMLHTTP"); 
											  } catch (e) { 
												xmlhttp = false; 
											  } 
											} 
										  @else 
										  xmlhttp = false; 
										  @end @*/ 
										  if (!xmlhttp && typeof XMLHttpRequest != 'undefined') { 
											try { 
											  xmlhttp = new XMLHttpRequest(); 
											} catch (e) { 
											  xmlhttp = false; 
											} 
										  } 
										  return xmlhttp; 
										} 
										var http = getHTTPObject();
										
										function AbreSubCategoria(x){
											
											http.open("GET", 'subcategoria.asp?idcategoria='+x, true);
											
											http.onreadystatechange = handleHttpResponse;
											http.send(null);
										
											var arr; //array com os dados retornados
											function handleHttpResponse() {
												if (http.readyState == 4) 	{
													var response = http.responseText;
													document.getElementById("subcat").innerHTML = response;
															
												}
											}
										}
										</script>
                                        <div class="form-group">
                                            <label class="form-label">Categoria</label>
                                            <%AbreConexao
											set cat=conexao.execute("select * from TBCATEGORIA order by categoria asc")
											if not cat.eof then%>
                                                <select name="categoria" class="form-control" onChange="AbreSubCategoria(this.value);" required>
                                                    <option value="">Selecione...</option>
                                                    <%while not cat.eof%>
                                                    <option value="<%=cat("id")%>"><%=ucase(TrocaAssento2(cat("categoria")))%></option>
                                                    <%cat.movenext
													wend%>
                                                </select>
                                            <%end if
											set cat=nothing
											FechaConexao%>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group" id="subcat">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" name="home" value="s" type="checkbox">
                                            <span class="form-check-label">Esse produto aparecerá na pagina inicial do site?</span>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" name="lancamento" value="s" type="checkbox">
                                            <span class="form-check-label">Esse produto é um lançamento?</span>
                                        </div>

                                    </div>
                                    <hr class="m-0">

                                    
                                    <hr class="m-0">

                                    

                                </div>
                                <!-- / Basic info -->

                                <!-- Description -->
                                <div class="tab-pane fade" id="item-description">
                                    <div class="card-body">
                                        <div id="product-editor-toolbar">
                                            <span class="ql-formats">
                                                <select class="ql-font"></select>
                                                <select class="ql-size"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-bold"></button>
                                                <button class="ql-italic"></button>
                                                <button class="ql-underline"></button>
                                                <button class="ql-strike"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <select class="ql-color"></select>
                                                <select class="ql-background"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-script" value="sub"></button>
                                                <button class="ql-script" value="super"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-header" value="1"></button>
                                                <button class="ql-header" value="2"></button>
                                                <button class="ql-blockquote"></button>
                                                <button class="ql-code-block"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-list" value="ordered"></button>
                                                <button class="ql-list" value="bullet"></button>
                                                <button class="ql-indent" value="-1"></button>
                                                <button class="ql-indent" value="+1"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-direction" value="rtl"></button>
                                                <select class="ql-align"></select>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-link"></button>
                                                <button class="ql-image"></button>
                                                <button class="ql-video"></button>
                                            </span>
                                            <span class="ql-formats">
                                                <button class="ql-clean"></button>
                                            </span>
                                        </div>
                                        <div id="product-editor" style="height: 90%"></div>
                                        <textarea name="descricao" rows="4" class="form-control d-none" id="product-editor-fallback" style="height: 90%" placeholder="Se estiver cadastrando um look, não é necessário inserir os valores individuais de cada produto"></textarea>
                                    </div>
                                </div>
                                <!-- / Description -->
							
                            
                            </div>
                        </div>
                        <div class="text-right mt-3">
                            <input type="reset" class="btn btn-default" value="Limpar Campos"> &nbsp;
                            <input type="submit" class="btn btn-primary" value="Adicionar Produto">
                        </div>
                        </form>
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

    <script src="assets\libs\datatables\datatables.js"></script>
    <script src="assets\libs\select2\select2.js"></script>
    <script>
        // Quill does not support IE 10 and below so don't load it to prevent console errors
        if (typeof document.documentMode !== 'number' || document.documentMode > 10) {
            document.write('\x3Cscript src="assets/libs/quill/quill.js">\x3C/script>');
        }
    </script>
    <script src="assets\libs\moment\moment.js"></script>
    <script src="assets\libs\bootstrap-daterangepicker\bootstrap-daterangepicker.js"></script>
    <script src="assets\libs\dragula\dragula.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\pages_e-commerce_product-edit.js"></script>
</body>

</html>
