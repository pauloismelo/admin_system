<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->



<body>
	<%if request("edit")="tamanho" then
	AbreConexao
		conexao.execute("update TBTAMANHO set comprimento='"&request("comprimento")&"', largura='"&request("largura")&"' where id="&request("idtamanho")&"")
		
	   
		response.Write("<script>alert('Medida atualizada com sucesso!');</script>")
		response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
	FechaConexao
	end if%>
    
	<%if request("rename")="ok" then
	AbreConexao
		Set fso = CreateObject("Scripting.FileSystemObject")
		folder=caminho&"\IMG_PRODUTOS\"&request("id")
		
		fso.MoveFile folder&"\"&request("filex"), folder&"\"&request("filenew")
		
	   
		response.Write("<script>alert('Imagem ["&request("filex")&"] renomeada para ["&request("filenew")&"] com Sucesso!');</script>")
		response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
	FechaConexao
	end if%>
	
	<%if request("modo2")="addtamanho" then
	AbreConexao
		SQL="insert into TBTAMANHO (id_produto, tamanho, comprimento, largura, datareg, userreg) values ("&request("id")&", '"&request("tamanho")&"', '"&request("comprimento")&"', '"&request("largura")&"', '"&formataData(date)&"', '"&nomex&"')"
		'response.Write(SQL)
		conexao.execute(SQL)
	FechaConexao
	
	response.Write("<script>alert('Tamanho Adicionado com Sucesso!');</script>")
	response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"&';</script>")
	end if%>
    
    <%if request("modo2")="deltamanho" then
	AbreConexao
		SQL="delete from TBTAMANHO where id="&request("id_tamanho")&""
		response.Write(SQL)
		conexao.execute(SQL)
	FechaConexao
	
	response.Write("<script>alert('Tamanho Adicionado com Sucesso!');</script>")
	response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"&';</script>")
	end if%>
    
    <%if request("deletefileMan")="ok" then 
		umV=replace(request("filex"),"@","%20")
		folder=caminho&"\IMG_PRODUTOS\"&request("id")
		'RESPONSE.Write(FOLDER)
		'response.End()
		Set fs = CreateObject("Scripting.FileSystemObject") 
				If fs.FileExists(folder&"\"&umV) = True then  
				   fs.DeleteFile(folder&"\"&umV)
				end if
		set fs=nothing
		response.Write("<script>alert('Arquivo removido com sucesso!')</script>")
		response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
	end if
	%>
    
    <%
	if request("modo2")="addprod" then
		AbreConexao
				conexao.execute("update TBPRODUTO set pro1='"&request("pro1")&"', pro2='"&request("pro2")&"', pro3='"&request("pro3")&"', pro4='"&request("pro4")&"', pro5='"&request("pro5")&"', pro6='"&request("pro6")&"' where id="&request("id")&"")
			FechaConexao
			response.Write("<script>alert('Composiçao do look Atualizada!')</script>")
			response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
	end if
	
	
	if request("modo")="editar" then
	
		if request("area")="info" then
			AbreConexao
				conexao.execute("update TBPRODUTO set nome='"&request("nome")&"', valor='"&request("valor")&"', valorfinal='"&request("valorfinal")&"', fabricante='"&request("fabricante")&"', id_categoria='"&request("categoria")&"', id_subcategoria='"&request("subcategoria")&"', home='"&request("home")&"', lancamento='"&request("lancamento")&"', status='"&request("status")&"' where id="&request("id")&"")
			FechaConexao
			response.Write("<script>alert('Descrição Atualizada!')</script>")
			response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
		end if
		
		if request("area")="descr" then
			AbreConexao
				conexao.execute("update TBPRODUTO set descricao='"&request("descricao")&"' where id="&request("id")&"")
			FechaConexao
			response.Write("<script>alert('Descrição Atualizada!')</script>")
			response.Write("<script>window.location='produto_edit.asp?id="&request("id")&"';</script>")
		end if
		
	
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
                <%AbreConexao
				response.Write(request("modo"))
				set rs=conexao.execute("select * from TBPRODUTO where id="&request("id")&"")
				if not rs.eof then%>

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Editar produto</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Produto</li>
                                <li class="breadcrumb-item active">Adicionar</li>
                            </ol>
                        </div>
						
                        <div class="nav-tabs-top nav-responsive-sm">
                            <ul class="nav nav-tabs">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="tab" href="#item-info">Informações</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#item-description">Descrição</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#item-discounts">Medidas</a>
                                </li>
                                <%if rs("id_categoria")="12" then 'looks%>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#item-produtos">Produtos do look</a>
                                </li>
                                <%end if%>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="tab" href="#item-images">Imagens</a>
                                </li>
                            </ul>
                            <div class="tab-content">
                                <!-- Basic info -->
                                <div class="tab-pane fade show active" id="item-info">
                                <form action="produto_edit.asp" method="post">
                                <input type="hidden" name="modo" value="editar">
                                <input type="hidden" name="id" value="<%=request("id")%>">
                                <input type="hidden" name="area" value="info">

                                    <div class="card-body">
                                        <div class="form-group">
                                            <label class="form-label">Status</label>
                                            <select name="status" class="form-control" required>
                                                <option value="">Selecione...</option>
                                                <option value="ATIVO"<%if rs("status")="ATIVO" then response.Write("selected") end if%>>ATIVO</option>
                                                <option value="ARQUIVADO" <%if rs("status")="ARQUIVADO" then response.Write("selected") end if%>>ARQUIVADO</option>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Nome do Produto</label>
                                            <input type="text" name="nome" class="form-control" required value="<%=rs("nome")%>">
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group row">
                                        	<div class="col-sm-6">
                                                <label class="form-label">Valor de ancoragem</label>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" name="valor" class="form-control" required value="<%=rs("valor")%>">
                                                    <div class="clearfix"></div>
                                                </div>
                                            </div>
                                            <div class="col-sm-6">
                                            	<label class="form-label">Valor com desconto </label>
                                                <%if rs("id_categoria")="12" then%>
                                                <div class="input-group">
                                                <small>*Se for um look, esse valor será calculado de acordo com o total de produtos que compoem esse look<br>				<%for x=1 to 6 
													if rs("pro"&x)<>"" then
															set pro=conexao.execute("select valorfinal from TBPRODUTO where id="&rs("pro"&x)&"")
															if not pro.eof then
																if vlrfinal<>"" then
																	vlrfinal=vlrfinal+cdbl(pro("valorfinal"))
																else
																	vlrfinal=cdbl(pro("valorfinal"))
																end if
															end if
															set pro=nothing
													end if	
												next
												response.Write("Valor total: R$ "&formatnumber(vlrfinal,2))%>
                                                </small>
                                                </div>
                                                <%else%>
                                                <div class="input-group">
                                                    <div class="input-group-prepend">
                                                        <div class="input-group-text">$</div>
                                                    </div>
                                                    <input type="text" name="valorfinal" class="form-control" value="<%=rs("valorfinal")%>">
                                                    <div class="clearfix"></div>
                                                </div>
                                                <%end if%>
                                            </div>
                                        </div>
                                        <div class="form-group">
                                            <label class="form-label">Fabricante</label>
                                            <input type="text" name="fabricante" class="form-control" value="<%=rs("fabricante")%>">
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
                                                    <option value="<%=cat("id")%>" <%if rs("id_categoria")=cat("id") then response.Write("selected") end if%>><%=ucase(TrocaAssento2(cat("categoria")))%></option>
                                                    <%cat.movenext
													wend%>
                                                </select>
                                            <%end if
											set cat=nothing%>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group" id="subcat">
                                            <%SQL="select * from TBSUBCATEGORIA where id_categoria="&rs("id_categoria")&" order by subcategoria asc"
											'response.Write(SQL)
											set con=conexao.execute(SQL)%>
                                            <label class="form-label">Categoria</label>
                                            <select name="subcategoria" class="form-control">
                                            <%while not con.eof%>
                                                <option value="<%=con("id")%>" <%if trim(rs("id_subcategoria"))=trim(con("id")) then response.Write("selected") end if%>> <%=ucase(con("subcategoria"))%> </option>
                                            <%con.movenext
                                            wend%>
                                            </select>
                                            <div class="clearfix"></div>
                                        </div>
                                        <div class="form-group">
                                            <input class="form-check-input" name="home" value="s" type="checkbox" <%if trim(rs("home"))="s" then response.Write("checked") end if%>>
                                            <span class="form-check-label">Esse produto aparecerá na pagina inicial do site?</span>
                                        </div>
                                        
                                        <div class="form-group">
                                            <input class="form-check-input" name="lancamento" value="s" type="checkbox" <%if trim(rs("lancamento"))="s" then response.Write("checked") end if%>>
                                            <span class="form-check-label">Esse produto é um lançamento?</span>
                                        </div>
                                        
                                        
                                    </div>
                                    
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-primary" value="Editar Informações">
                                    </div>
                                    <hr class="m-0">
                                </form>
                                </div>
                                <!-- / Basic info -->

                                <!-- Description -->
                                <div class="tab-pane fade" id="item-description">
                                <form action="produto_edit.asp" method="post">
                                <input type="hidden" name="modo" value="editar">
                                <input type="hidden" name="id" value="<%=request("id")%>">
                                <input type="hidden" name="area" value="descr">
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
                                        <div id="product-editor" style="height: 90%;"></div>
                                        <textarea name="descricao" rows="4" class="form-control d-none" id="product-editor-fallback" style="height:90%"><%=rs("descricao")%></textarea>
                                    </div>
                                    <div class="card-body">
                                        <input type="submit" class="btn btn-primary" value="Editar Descrição">
                                    </div>
                                    <hr class="m-0">
                                </form>
                                </div>
                                <!-- / Description -->

                                <!-- Discounts -->
                                <div class="tab-pane fade" id="item-discounts">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        
                                            <table class="table product-discounts-edit">
                                                	<form action="produto_edit.asp" method="post" id="form2">
                                                    <input type="hidden" name="modo2" value="addtamanho">
                                                    <input type="hidden" name="id" value="<%=request("id")%>">
                                                    <tr>
                                                        <td>
                                                            <input type="text" name="tamanho" class="form-control" placeholder="Digite o tamanho" required >
                                                        </td>
                                                        <td>
                                                            <input type="text" name="comprimento" class="form-control" placeholder="Informe o comprimento" required>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="largura" class="form-control" placeholder="Informe a largura" required>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td colspan="2">
                                                        
                                                        <button type="submit" class="btn btn-outline-primary"><i class="ion ion-md-add"></i>&nbsp; Adicionar Medida</button></td>
                                                    </tr>
                                                    </form>
                                            </table>
                                        </div>
                                        <div class="table-responsive">
                                            <table class="table product-discounts-edit">
                                                <thead>
                                                    <tr>
                                                        <th>Tamanho</th>
                                                        <th>Comprimento</th>
                                                        <th>Largura</th>
                                                        <th>&nbsp;</th>
                                                        <th>&nbsp;</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <%set ta=conexao.execute("select * from TBTAMANHO where id_produto="&request("id")&" order by tamanho asc")
												if not ta.eof then
													while not ta.eof%>
                                                    <form action="produto_edit.asp?id=<%=request("id")%>&edit=tamanho" method="post">
                                                    	<input type="hidden" name="idtamanho" value="<%=ta("id")%>">
                                                    <tr>
                                                        <td>
                                                            <%=ta("tamanho")%>
                                                        </td>
                                                        <td>
                                                            <input type="text" name="comprimento" value="<%=ta("comprimento")%>" class="form-control">
                                                        </td>
                                                        <td>
                                                            <input type="text" name="largura" value="<%=ta("largura")%>" class="form-control">
                                                        </td>
                                                        <td>
                                                        	<button type="submit" class="btn btn-default md-btn-flat icon-btn btn-sm">
                                                                <i class="ion ion-md-save" title="Editar Quantidade"></i>
                                                            </button>
                                                        </td>
                                                        <td>
                                                            <a href="produto_edit.asp?modo2=deltamanho&id_tamanho=<%=ta("id")%>&id=<%=request("id")%>" class="btn btn-default md-btn-flat icon-btn btn-sm">
                                                                <i class="ion ion-md-close"></i>
                                                            </a>
                                                        </td>
                                                    </tr>
                                                    </form>
                                                	<%ta.movenext
													wend
												end if
												set ta=nothing%>

                                                   

                                                </tbody>
                                            </table>
                                        </div>
                                        
                                    </div>
                                </div>
                                <!-- / Discounts -->
                                
                                
                               
                                <%if rs("id_categoria")="12" then 'looks%>
                                <!-- produtos -->
                                <div class="tab-pane fade" id="item-produtos">
                                    <div class="card-body">
                                        <div class="table-responsive">
                                        
                                            <table class="table product-discounts-edit">
                                                	<form action="produto_edit.asp" method="post" id="form2">
                                                    <input type="hidden" name="modo2" value="addprod">
                                                    <input type="hidden" name="id" value="<%=request("id")%>">
                                                    <tr>
                                                    	<td colspan="3">Informe abaixo os produtos que compõem esse look:</td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>Produto 1</td>
                                                        <td>
                                                            <select name="pro1" id="pro1" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro1")=pr("id") then response.Write("selected") end if%>><%=pr("nome")%> [ R$ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produto 2</td>
                                                        <td>
                                                            <select name="pro2" id="pro2" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro2")=pr("id") then response.Write("selected") end if%>><%=ucase(pr("nome"))%> [ R$ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    
                                                    <tr>
                                                        <td>Produto 3</td>
                                                        <td>
                                                            <select name="pro3" id="pro3" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro3")=pr("id") then response.Write("selected") end if%>><%=ucase(pr("nome"))%> [ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produto 4</td>
                                                        <td>
                                                            <select name="pro4" id="pro4" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro4")=pr("id") then response.Write("selected") end if%>><%=ucase(pr("nome"))%> [ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produto 5</td>
                                                        <td>
                                                            <select name="pro5" id="pro5" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro5")=pr("id") then response.Write("selected") end if%>><%=ucase(pr("nome"))%> [ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                        <td>Produto 6</td>
                                                        <td>
                                                            <select name="pro6" id="pro6" class="form-control">
                                                            	
                                                                <option value="">Selecione o primeiro produto</option>
                                                                <%set pr=conexao.execute("select * from TBPRODUTO where id_categoria<>12 order by nome asc")
																if not pr.eof then
																while not pr.eof%>
                                                                <option value="<%=pr("id")%>" <%if rs("pro6")=pr("id") then response.Write("selected") end if%>><%=ucase(pr("nome"))%> [ <%=pr("valorfinal")%> ]</option>
                                                                <%pr.movenext
																wend
																end if
																set pr=nothing%>
                                                            </select>
                                                        </td>
                                                    </tr>
                                                    <tr>
                                                    	<td colspan="2">
                                                        
                                                        <input type="submit" class="btn btn-primary" value="Editar Composição do look"></td>
                                                    </tr>
                                                    </form>
                                            </table>
                                        </div>
                                        
                                        
                                    </div>
                                </div>
                                <!-- / produtos -->
                                <%end if%>

                                <!-- Images -->
                                <div class="tab-pane fade" id="item-images">
                                    <div class="card-body">
                                        <div id="product-images">
                                            <%
											Set objFS = Server.CreateObject("Scripting.FileSystemObject")
											folder=caminho&"\IMG_PRODUTOS\"&rs("ID")
											'response.Write(folder)
											'response.End()
											nfiles=0
											if objFS.FolderExists(folder)=true then
											else
												objFS.CreateFolder(folder)
											end if
											%>         
											<%if objFS.FolderExists(folder) then
											
												Set fs = server.CreateObject("Scripting.FileSystemObject") 
												Set pasta = fs.GetFolder(folder) %>
                                                   <ul>
                                                    <%FOR EACH file IN pasta.Files %>
                                                    <%nfiles=nfiles+1%>
                                                   		<div class="media align-items-center bg-white ui-bordered py-3 mb-2">
                                                            <a href="javascript:void(0)" class="d-block ui-w-100 mr-4">
                                                                <img src="IMG_PRODUTOS/<%=rs("id")%>/<%=file.Name%>"  class="img-fluid" alt="">
                                                            </a>
                                                            <div class="media-body">
                                                                <form action="produto_edit.asp?id=<%=rs("id")%>&rename=ok" method="post">
                                                                <strong>Nome atual: </strong><input type="hidden" name="filex" value="<%=file.name%>"> <%=file.name%>
                                                                <br>
                                                                <strong>Novo nome:</strong> <input type="text" name="filenew"  class="form-control form-control-sm bg-transparent border-light mb-2" >
                                                                <button type="submit" class="btn btn-outline-warning borderless icon-btn d-block mx-4">Renomear</button>
                                                                </form>
                                                                
                                                            </div>
                                                            
                                                                <a href="produto_edit.asp?id=<%=rs("id")%>&filex=<%=replace(file.Name,"%20","@")%>&deletefileMan=ok" class="btn btn-outline-danger borderless icon-btn d-block mx-4">
                                                                <i class="ion ion-md-close "></i>
                                                                </a>
                                                            
                                                        </div>
                                                    <% NEXT%>
                                                   </ul>
                                                  <%if nfiles=0 then
                                                  response.Write("Nenhum arquivo encontrado!")
                                                  end if%>
											
											<%end if%>
                                            
                                           
                                        </div>
                                        
                                    </div>
                                    
                                    <link rel="stylesheet" href="assets\dropzone.css">
                                    <script src="assets\dropzone.js"></script>
                                    <!--uPLOAD -->
                                    <div class="card-body">
                                        <form action="uploadproduto.php" class="dropzone" id="my-awesome-dropzone" method="post">
                                            <input type="hidden" name="id" value="<%=request("id")%>">
                                            <div class="fallback">
                                                <input name="arquivos" type="file" multiple="">
                                                <div class="clearfix"></div>
                                            </div>
                                            <br>
                                            <div>
                                            
                                            </div>
                                        </form>
                                    </div>
                                </div>
                                <!-- / Images -->

                            </div>
                        </div>
                        
                        
                    </div>
                    <!-- [ content ] End -->

                    <!--#include file="footer.asp"-->
				<%end if
				set rs=nothing
				FechaConexao%>
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

    <script src="assets\libs\dragula\dragula.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\pages_e-commerce_product-edit.js"></script>
</body>

</html>
