<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<!--#include file="head.asp"-->

<body>
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
                        <h4 class="font-weight-bold py-3 mb-0">Editar Categoria</h4>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="#"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Categoria</li>
                                <li class="breadcrumb-item active">Editar</li>
                            </ol>
                        </div>
						<%AbreConexao
						set rs=conexao.execute("select * from TBCATEGORIA where id="&request("id")&"")
						if not rs.eof then%>
                        <div class="card mb-4">
                            <h6 class="card-header">&nbsp;</h6>
                            <div class="card-body">
                                <form method="post" action="categoria_update.asp" enctype="multipart/form-data">
                                	<input type="hidden" name="id" value="<%=request("id")%>">
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Nome</label>
                                        <div class="col-sm-10">
                                            <input type="text" name="categoria" class="form-control" value="<%=rs("categoria")%>">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Aparecer na pág. principal?</label>
                                        <div class="col-sm-10">
                                            <input type="checkbox" name="home" value="s" class="form-check-input" <%if rs("home")="s" then response.Write("checked") end if%>>
                                           
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                    	<label class="col-form-label col-sm-2 text-sm-right">Imagem atual</label>
                                        <div class="col-sm-10">
                                        	<img src="IMG_CATEGORIA/<%=rs("arquivo")%>" width="350" itemprop="thumbnail" alt="Imagem da Categoria">
                                        </div>
                                    </div>
                                    <div class="form-group row">
                                        <label class="col-form-label col-sm-2 text-sm-right">Atualizar Imagem</label>
                                        <div class="col-sm-10">
                                            <input type="file" name="foto" class="form-control">
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                    
                                    <div class="form-group row">
                                        <div class="col-sm-10 ml-sm-auto">
                                            <button type="submit" class="btn btn-primary">Editar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                        <%end if
						set rs=nothing
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
