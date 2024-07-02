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
						<div class="d-flex">
                            <div class=" flex-grow-1"><h4 class="font-weight-bold py-3 mb-0">Add product</h4></div>
                            <div class=""><button type="button" class="btn btn-primary btn-glow-primary"><span class="ion ion-md-add"></span>&nbsp; Add product</button></div>
                        </div>
                        <div class="text-muted small mt-0 mb-4 d-block breadcrumb">
                            <ol class="breadcrumb">
                                <li class="breadcrumb-item"><a href="index.asp"><i class="feather icon-home"></i></a></li>
                                <li class="breadcrumb-item">Produto</li>
                                <li class="breadcrumb-item active">Consultar</li>
                            </ol>
                        </div>

                        <!-- Filters -->
                        <div class="card mb-4">
                            <div class="card-body">
                                <div class="form-row align-items-center">
                                    <div class="col-md my-2">
                                        <label class="form-label pb-1">Sales<span id="product-sales-slider-value" class="text-muted font-weight-normal ml-2"></span></label>
                                        <div id="product-sales-slider" class="product-list-slider noUi-info my-3 mx-2"></div>
                                    </div>
                                    <div class="col-md my-2">
                                        <label class="form-label pb-1">Price<span id="product-price-slider-value" class="text-muted font-weight-normal ml-2"></span></label>
                                        <div id="product-price-slider" class="product-list-slider noUi-primary my-3 mx-2"></div>
                                    </div>
                                    <div class="col-md my-2">
                                        <label class="form-label">Status</label>
                                        <select class="custom-select">
                                            <option>Any</option>
                                            <option>Published</option>
                                            <option>Out of stock</option>
                                            <option>Pending</option>
                                            <option>Hidden</option>
                                        </select>
                                    </div>
                                    <div class="col-md col-xl-2 my-2">
                                        <label class="form-label d-none d-md-block">&nbsp;</label>
                                        <button type="button" class="btn btn-primary btn-block">Show</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- / Filters -->

                        <div class="card">
                            <div class="card-datatable table-responsive">
                                <table id="product-list" class="table table-striped table-bordered">
                                    <thead>
                                        <tr>
                                            <th>Product</th>
                                            <th>ID</th>
                                            <th>In stock</th>
                                            <th>Price</th>
                                            <th>Sales</th>
                                            <th>Views</th>
                                            <th>Status</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                </table>
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
    <script src="assets\js\jquery-3.2.1.min.js"></script><!-- tables not work in jquery-3.3.1 js -->
    <script src="assets\libs\popper\popper.js"></script>
    <script src="assets\js\bootstrap.js"></script>
    <script src="assets\js\sidenav.js"></script>
    <script src="assets\js\layout-helpers.js"></script>
    <script src="assets\js\material-ripple.js"></script>

    <!-- Libs -->
    <script src="assets\libs\perfect-scrollbar\perfect-scrollbar.js"></script>

    <script src="assets\libs\datatables\datatables.js"></script>
    <script src="assets\libs\numeral\numeral.js"></script>
    <script src="assets\libs\nouislider\nouislider.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\pages_e-commerce_product-list.js"></script>
</body>

</html>
