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

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Consultar Pedidos</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="pedidos_list.asp">Pedidos</a></li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>

                        <div class="table-responsive">
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Cliente</th>
                                        <th>Cod. Pedido</th>
                                        <th>Data</th>
                                        <th>Status</th>
                                        <th>Visualizar</th>
                                    </tr>
                                </thead>
                                <%AbreConexao
								set rs=conexao.execute("select * from TB_PEDIDOS order by id desc")
								%>
                                <tbody>
                                	<%if rs.eof then%>
                                    <tr class="odd gradeX">
                                        <td colspan="5">Nenhum artigo encontrada!</td>
                                    </tr>
                                    <%else
									while not rs.eof%>
                                    <tr class="even gradeC">
                                        <td>
										<%set cli=conexao.execute("select * from TB_CLIENTES where id="&rs("id_cliente")&"")
										if not cli.eof then%>
											<%nome=split(cli("nome")," ")%><%=nome(0)%>&nbsp;<%=nome(1)%>
										<%end if
										set cli=nothing%>
                                        </td>
                                        <td><%=year(rs("datareg"))%><%=month(rs("datareg"))%><%=day(rs("datareg"))%><%=rs("id")%></td>
                                        <td><%=rs("datareg")%></td>
                                        <td>
										<%if ucase(rs("status"))="AGUARDANDO PAGAMENTO" then%>
                                            <button type="button" class="btn btn-warning">AGUARDANDO PAGAMENTO</button>
                                        <%elseif ucase(rs("status"))="PAGA" then%>
                                            <button type="button" class="btn btn-success">PAGO</button>
                                        <%elseif ucase(rs("status"))="ENVIADO" then%>
                                            <button type="button" class="btn btn-primary">ENVIADO</button>
                                        <%end if%>
                                        </td>
                                        <td class="center" style="text-align:center" title="Editar artigo">
                                        <a href="artigos_edit.asp?id=<%=rs("id")%>"><i class="fa fa-search"></i></a>
                                        </td>
                                    </tr>
                                    <%rs.movenext
									wend
									end if%>
                               <%set rs=nothing%>
                                    
                                </tbody>
                            </table>
                        </div>


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
	
    <script src="assets\js\jquery-3.3.1.min.js"></script>
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

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\tables_datatables.js"></script>
</body>

</html>
