<!DOCTYPE html>

<html lang="en" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
<%if request("modo")="remover" then
AbreConexao
	conexao.execute("delete from TBPRODUTO where id="&request("id")&"")
	conexao.execute("delete from TBTAMANHO where id_produto="&request("id")&"")
	
	set fs=Server.CreateObject("Scripting.FileSystemObject")
	folder=caminho&"\IMG_PRODUTOS\"&request("id")
	'response.Write(folder)
	if fs.FolderExists(folder) then
	  fs.DeleteFolder(folder)
	end if
	set fs=nothing
	
	response.Write("<script>alert('Produto Removido com Sucesso!');</script>")
	response.Write("<script>window.location='produto_list.asp';</script>")
FechaConexao
end if%>
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
                        <h4 class="font-weight-bold py-3 mb-0">Consultar Produtos</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Produtos</li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>
                        
                        <%AbreConexao
						set rs=conexao.execute("select * from TBPRODUTO order by nome asc")
						%>
                        <div class="table-responsive">
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Coleção</th>
                                        <th>Valor</th>
                                        <th>Valor com desconto</th>
                                        <th>Estoque</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                
                                <tbody>
                                	<%if rs.eof then%>
                                    <tr class="odd gradeX">
                                        <td colspan="6" style="text-align:center;">Nenhum produto encontrado!</td>
                                    </tr>
                                    <%else
									while not rs.eof%>
                                    <tr class="even gradeC">
                                        <td><%=rs("nome")%></td>
                                        <td>
										<%set ca=conexao.execute("select * from TBCATEGORIA where id="&rs("id_categoria")&"")
										if not ca.eof then%>
                                        <%=ca("categoria")%>
                                        <%end if
										set ca=nothing%>
                                        </td>
                                        <td><%=rs("valor")%></td>
                                        <td class="center"><%=rs("valorfinal")%></td>
                                        <td class="center">
                                        <%set ta=conexao.execute("select sum(qtd) as total from TBTAMANHO where id_produto="&rs("id")&"")
										if not ta.eof then%>
                                        	<%=ta("total")%>
                                        <%end if
										set ta=nothing%>
                                        </td>
                                        <td class="center">
                                        <a href="produto_edit.asp?id=<%=rs("id")%>"><i class="fa fa-edit" title="Editar Produto"></i></a>
                                        &nbsp;&nbsp;
                                        <a href="produto_list.asp?modo=remover&id=<%=rs("id")%>"><i class="fa fa-trash-alt" title="Remover Produto"></i></a>
                                        </td>
                                    </tr>
                                    <%rs.movenext
									wend
									end if%>
                                    
                                </tbody>
                                
                            </table>
                      </div>
                        <%set rs=nothing
						FechaConexao%>

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
    <script src="assets\js\jquery-3.2.1.min.js"></script><!-- tables not work in jquery-3.3.1 js -->
    <script src="assets\libs\popper\popper.js"></script>
    <script src="assets\js\bootstrap.js"></script>
    <script src="assets\js\sidenav.js"></script>
    <script src="assets\js\layout-helpers.js"></script>
    <script src="assets\js\material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets\libs\perfect-scrollbar\perfect-scrollbar.js"></script>
    <script src="assets\libs\tableexport\tableexport.js"></script>
    <script src="assets\libs\moment\moment.js"></script>
    <script src="assets\libs\bootstrap-datepicker\bootstrap-datepicker.js"></script>
    <script src="assets\libs\bootstrap-table\bootstrap-table.js"></script>
    <script src="assets\libs\bootstrap-table\extensions\export\export.js"></script>
    
    <script src="assets\libs\datatables\datatables.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script>
	<script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\tables_datatables.js"></script>
</body>

</html>
