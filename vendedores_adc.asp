<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
<%if request("modo")="gravar" then
AbreConexao
	conexao.execute("insert into TBVENDEDOR (nome, cel) values ('"&request("nome")&"', '"&request("cel")&"' )")
FechaConexao
	response.Write("<script>alert('Vendedor Adicionado com Sucesso!');</script>")
		response.Write("<script>window.location='vendedores_list.asp';</script>")
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
                        <h4 class="font-weight-bold py-3 mb-0">Adicionar Vendedor</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item"><a href="vendedores_list.asp">Vendedor</a></li>
                                <li class="breadcrumb-item active">Adicionar</li>
                            </ol>
                        </div>

                        <div class="card mb-4">
                            <h6 class="card-header">&nbsp;</h6>
                            <div class="card-body">
                                <form method="post" action="vendedores_adc.asp">
                                <input type="hidden" name="modo" value="gravar">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="nome" class="form-control" placeholder="Digite o nome do vendedor">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Celular</label>
                                        <div class="col-sm-2" style="text-align:right;">
                                        	+55 31
                                        </div>
                                        <div class="col-sm-8">
                                            <input type="text" name="cel" class="form-control" placeholder="Digite o celular de atendimento">
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

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    
</body>

</html>
