<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] Ebd -->

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
				set rs=conexao.execute("select * from TB_PEDIDOS where id="&request("id")&"")
				if not rs.eof then%>

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">&nbsp;</h4>
                        
                        <div class="card">
                            <div class="card-body p-5">
                                <div class="row">
                                    <div class="col-sm-6 pb-4">
                                        <div class="media align-items-center mb-4">
                                            &nbsp;
                                    </div>
                                        <%set cli=conexao.execute("select * from TB_CLIENTES where id="&rs("id_cliente")&"")
										if not cli.eof then%>
                                        <div class="mb-1"><i class="fa fa-user"></i>&nbsp;<%=cli("nome")%></div>
                                        <div class="mb-1"><i class="fa fa-id-card"></i>&nbsp;<%=cli("cpf")%></div>
                                        <div><i class="fa fa-envelope"></i>&nbsp;<%=cli("email")%></div>
                                        <div><i class="fa fa-mobile-alt"></i>&nbsp;<%=cli("celular")%></div>
                                      <%end if
										'set cli=nothing%>
                                    </div>
                                    <div class="col-sm-6 text-right pb-4">
                                        <h6 class="text-big text-large font-weight-bold mb-3">
                                        	Cod. Pedido #<%=year(rs("datareg"))%><%=month(rs("datareg"))%><%=day(rs("datareg"))%><%=rs("id")%>
                                    	</h6>
                                        <div class="mb-1">Data:
                                          <strong class="font-weight-semibold"><%=databrx3(rs("datareg"))%></strong>
                                        </div>
                                        <div>Horário:
                                          <strong class="font-weight-semibold"><%=hour(rs("datareg"))%>:<%=minute(rs("datareg"))%></strong>
                                        </div>
                                        <h6 class="text-big">
										<%if ucase(rs("status"))="AGUARDANDO PAGAMENTO" then%>
                                            <button type="button" class="btn btn-warning">AGUARDANDO PAGAMENTO</button>
                                        <%elseif ucase(rs("status"))="PAGA" then%>
                                            <button type="button" class="btn btn-success">PAGO</button>
                                            <br>
                                            <form action="" method="post">
                                            Cod. rastreamento: <input type="text" name="rastreamento">
                                            <button type="submit" class="btn btn-primary"><span class="far fa-paper-plane"></span>ENVIAR</button>
                                            </form>
                                        <%elseif ucase(rs("status"))="ENVIADO" then%>
                                            <button type="button" class="btn btn-primary">ENVIADO</button>
                                        <%end if%>
                                        </h6>
                                    </div>
                                </div>
                                <hr class="mb-4">
                                <div class="row">
                               	  <%if not cli.eof then%>
                                    <div class="col-sm-6 mb-4">
                                        <div class="font-weight-bold mb-2">Local de Entrega:</div>
                                        <div><%=cli("cep")%></div>
                                        <div><%=cli("endereco")%>, <%=cli("numero")%></div>
                                        <div><%=cli("complemento")%></div>
                                        <div><%=cli("bairro")%></div>
                                        <div><%=cli("cidade")%>/<%=cli("estado")%></div>
                                    </div>
                                    <%end if%>
                              <div class="col-sm-6 mb-4">
                                        <div class="font-weight-bold mb-2">Detalhes do Pagamento:</div>
                                        <table>
                                            <tbody>
                                                <tr>
                                                    <td class="pr-3">Valor dos produtos:</td>
                                                    <td>R$ <%=rs("subtotal")%></td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-3">Valor do Frete:</td>
                                                    <td>R$ <%=rs("frete")%></td>
                                                </tr>
                                          <tr>
                                                    <td class="pr-3">Valor Total:</td>
                                                    <td>
                                                        <strong>R$ <%=rs("total")%></strong>
                                                    </td>
                                                </tr>
                                                <tr>
                                                    <td class="pr-3">Pago em:</td>
                                                    <td><%=rs("qtd_parcelas")%> x R$ <%=rs("vlr_parcelas")%></td>
                                                </tr>
                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <div class="table-responsive mb-4">
                                <%produto=split(rs("carrinho"),",")
								%>
                                    <table class="table m-0">
                                        <thead>
                                            <tr>
                                                <th class="py-3">
                                                    Produto
                                                </th>
                                                <th class="py-3">Vlr. unitário</th>
                                                <th class="py-3">
                                                    Quantidade
                                                </th>
                                                <th class="py-3">
                                                    Tamanho
                                                </th>
                                                <th class="py-3">
                                                    Vlr. Total
                                                </th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                        	<%for i= 0 to ubound(produto)
											
											dados=split(produto(i),"|")
											idproduto=dados(0)
											qtd=dados(1)
											tamanho=dados(2)
											
											set pr=conexao.execute("select * from TBPRODUTO where id="&idproduto&"")
											if not pr.eof then%>
                                            <tr>
                                                <td class="py-3">
                                                    <div class="font-weight-semibold"><%=pr("nome")%></div>
                                                </td>
                                                <td class="py-3">
                                                <%if pr("oferta")="s" then%>
                                                <strong>R$ <%=pr("valorfinal")%></strong>
                                                <%valor=pr("valorfinal")%>
                                                <%else%>
                                                <strong>R$ <%=pr("valor")%></strong>
                                                <%valor=pr("valor")%>
                                                <%end if%>
                                                </td>
                                                <td class="py-3">
                                                    <strong><%=qtd%></strong>
                                                </td>
                                                <td class="py-3">
                                                    <strong>
													<%set ta=conexao.execute("select * from tbtamanho where id="&tamanho&"")
													if not ta.eof then%>
                                                    	<%=ta("tamanho")%>
                                                    <%end if
													set ta=nothing%>
                                                    </strong>
                                                </td>
                                                <td class="py-3">
                                                    <strong>R$ <%=qtd*valor%></strong>
                                                    <%total=total+(qtd*valor)%>
                                                </td>
                                            </tr>
                                            <%end if
											set pr=nothing
											
											next%>
                                            
                                            <tr>
                                                <td colspan="4" class="text-right py-3">
                                                    Subtotal:
                                                    <br> Frete:
                                                    <br>
                                                    <span class="d-block text-big mt-2">Total:</span>
                                                </td>
                                                <td class="py-3">
                                                    <strong>R$ <%=rs("subtotal")%></strong>
                                                    <br>
                                                    <strong>R$ <%=rs("frete")%></strong>
                                                    <br>
                                                    <strong class="d-block text-big mt-2">R$ <%=rs("total")%></strong>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                              </div>
                                
                            </div>
                            <div class="card-footer text-right">
                                <a href="pages_invoice-print.html" target="_blank" class="btn btn-default"><i class="ion ion-md-print"></i>&nbsp; Print</a>
                                <button type="button" class="btn btn-primary ml-2"><i class="ion ion-ios-paper-plane"></i>&nbsp; Send</button>
                            </div>
                        </div>

                    </div>
                    <!-- [ content ] End -->

                    <!--#include file="footer.asp"-->
                    
				<%end if
				set rs=nothing%>
                </div>
                <!-- [ Layout content ] Start -->

            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- / Layout wrapper -->

    <!-- Core scripts -->
    <script src="assets\libs\popper\popper.js"></script>
    <script src="assets\js\bootstrap.js"></script>
    <script src="assets\js\sidenav.js"></script>

    <!-- Libs -->
    <script src="assets\libs\perfect-scrollbar\perfect-scrollbar.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
</body>

</html>
