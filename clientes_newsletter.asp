<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
	<%if request("modo")="remover" then
	AbreConexao
		conexao.execute("delete from TB_NEWSLETTER where id="&request("id")&"")
		
		response.Write("<script>alert('Mailling Removido com Sucesso!');</script>")
		response.Write("<script>window.location='clientes_newsletter.asp';</script>")
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
                        <h4 class="font-weight-bold py-3 mb-0">Mailling cadastrado</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">clientes</li>
                                <li class="breadcrumb-item active">Mailling cadastrado</li>
                            </ol>
                        </div>
						
                        <a href="clientes_newsletter_excel.asp" target="_blank">
                        <button type="button" class="btn btn-glow-sucess btn-success">
                                   <span class="oi oi-cloud-download"></span>&nbsp;&nbsp;Excel
                        </button>
                        </a>
                        
                        <div class="table-responsive">
                        
                            <table class="datatables-demo table table-striped table-bordered">
                                <thead>
                                    <tr>
                                        <th>Email</th>
                                        <th>Registrado em</th>
                                        <th>Remover</th>
                                    </tr>
                                </thead>
                                <%AbreConexao
								set rs=conexao.execute("select * from TB_NEWSLETTER order by email asc")
								%>
                                <tbody>
                                	<%if rs.eof then%>
                                    <tr class="odd gradeX">
                                        <td colspan="5">Nenhum mailling encontrada!</td>
                                    </tr>
                                    <%else
									while not rs.eof%>
                                    <tr class="even gradeC">
                                        <td><%=rs("email")%></td>
                                        <td><%=rs("datareg")%></td>
                                        
                                        <td class="center" style="text-align:center" title="Remover artigo">
                                        <a href="clientes_newsletter.asp?modo=remover&id=<%=rs("id")%>"><i class="fa fa-trash-alt"></i></a>
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
