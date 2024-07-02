<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<? include('head.php');?>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <? include('sidebar.php');?>
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
                <? include('header.php');?>

                <!-- [ Layout content ] Start -->
                <div class="layout-content">
                <script src="https://cdn.ckeditor.com/4.18.0/standard/ckeditor.js"></script>

                    <? if ($_GET['go']=='imob_adc'){
						include('imob_adc.php');	
					}elseif($_GET['go']=='imob_list'){
						include('imob_list.php');	
					}elseif($_GET['go']=='imob_edit'){
						include('imob_edit.php');	
					}elseif($_GET['go']=='artigos_adc'){
						include('artigos_adc.php');	
					}elseif($_GET['go']=='artigos_list'){
						include('artigos_list.php');	
					}elseif($_GET['go']=='artigos_edit'){
						include('artigos_edit.php');	
					}elseif($_GET['go']=='item_list'){
						include('item_list.php');	
					}elseif($_GET['go']=='item_adc'){
						include('item_adc.php');	
					}
					?>
                    

                    <? include('footer.php');?>

                </div>
                <!-- [ Layout content ] Start -->

            </div>
            <!-- [ Layout container ] End -->
        </div>
        <!-- Overlay -->
        <div class="layout-overlay layout-sidenav-toggle"></div>
    </div>
    <!-- [ Layout wrapper] End -->

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
	<script src="assets\libs\eve\eve.js"></script>
    <script src="assets\libs\flot\flot.js"></script>
    <script src="assets\libs\flot\curvedLines.js"></script>
    <script src="assets\libs\chart-am4\core.js"></script>
    <script src="assets\libs\chart-am4\charts.js"></script>
    <script src="assets\libs\chart-am4\animated.js"></script>
    <script src="assets\libs\raphael\raphael.js"></script>
    <script src="assets\libs\morris\morris.js"></script>

    <!-- Demo -->
    <script src="assets\js\demo.js"></script><script src="assets\js\analytics.js"></script>
    <script src="assets\js\pages\dashboards_ecommerce.js"></script>
</body>

</html>
