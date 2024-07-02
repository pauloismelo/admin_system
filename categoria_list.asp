<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
	<%if request("modo")="remover" then
	AbreConexao
		conexao.execute("delete from TBCATEGORIA where id="&request("id")&"")
		conexao.execute("delete from TBSUBCATEGORIA where id_categoria="&request("id")&"")
		
		response.Write("<script>alert('Categoria e suas respectivas subcategorias Removidas com Sucesso!');</script>")
		response.Write("<script>window.location='categoria_list.asp';</script>")
	FechaConexao
	end if%>
    
    <%if request("modo")="removersub" then
	AbreConexao
		conexao.execute("delete from TBSUBCATEGORIA where id="&request("id")&"")
		
		response.Write("<script>alert('Subcategoria Removida com Sucesso!');</script>")
		response.Write("<script>window.location='categoria_list.asp';</script>")
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
                        <h4 class="font-weight-bold py-3 mb-0">Consultar Categoria</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Categoria</li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>

                        <div class="table-responsive">
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Nome</th>
                                        <th>Arquivo</th>
                                        <th>Registro</th>
                                        <th>Categoria</th>
                                        <th>Editar</th>
                                        <th>Remover</th>
                                    </tr>
                                </thead>
                                <%AbreConexao
								set rs=conexao.execute("select * from TBCATEGORIA order by categoria asc")
								%>
                                <tbody>
                                	<%if rs.eof then%>
                                    <tr class="odd gradeX">
                                        <td colspan="6">Nenhuma categoria encontrada!</td>
                                    </tr>
                                    <%else
									while not rs.eof%>
                                    <tr class="even gradeC">
                                        <td><%=rs("categoria")%></td>
                                        <td><img src="IMG_CATEGORIA/<%=rs("arquivo")%>" width="200"></td>
                                        <td><%=rs("datareg")%></td>
                                        <td style="text-align:center" title="Adicionar Subcategoria"> 
                                        <a href="subcategoria_adc.asp?id=<%=rs("id")%>"><i class="fa fa-plus"></i></a>
                                        </td>
                                        <td class="center" style="text-align:center" title="Editar categoria">
                                        <a href="categoria_edit.asp?id=<%=rs("id")%>"><i class="fa fa-edit"></i></a>
                                        </td>
                                        <td class="center" style="text-align:center" title="Remover categoria">
                                        <a href="categoria_list.asp?modo=remover&id=<%=rs("id")%>"><i class="fa fa-trash-alt"></i></a>
                                        </td>
                                    </tr>
										<%set su=conexao.execute("select * from TBSUBCATEGORIA where id_categoria="&rs("id")&"")
                                        if not su.eof then%>
                                        <tr>
                                        <td colspan="6" style="padding-left:10%;">
                                            <table width="100%">
                                                <thead>
                                                    <tr class="even gradeC">
                                                        <th colspan="4"><strong>Subcategorias de <%=rs("categoria")%></strong></th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                <%while not su.eof%>
                                                <tr class="even gradeC">
                                                    <td style="padding-left:10%;"><%=su("subcategoria")%></td>
                                                    <td><%=su("datareg")%></td>
                                                    <td class="center" style="text-align:center" title="Editar Subcategoria">
                                                    <a href="subcategoria_edit.asp?id=<%=su("id")%>"><i class="fa fa-edit"></i></a>
                                                    </td>
                                                    <td class="center" style="text-align:center" title="Remover Subcategoria">
                                                    <a href="categoria_list.asp?modo=removersub&id=<%=su("id")%>"><i class="fa fa-trash-alt"></i></a>
                                                    </td>
                                                </tr>
                                                
                                                <%su.movenext
                                                wend%>
                                                </tbody>
                                            </table>
                                        </td>
                                        </tr>
                                        <%end if
                                        set su=nothing%>
                                    
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
