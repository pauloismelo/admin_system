<!DOCTYPE html>

<html lang="pt-BR" class="default-style layout-fixed layout-navbar-fixed">

<?php
include ('head.php');
?>

<body>
    <!-- [ Preloader ] Start -->
    <div class="page-loader">
        <div class="bg-primary"></div>
    </div>
    <!-- [ Preloader ] End -->

    <!-- [ Layout wrapper ] Start -->
    <div class="layout-wrapper layout-2">
        <div class="layout-inner">
            <? include ('sidebar.php');?>
            <!-- [ Layout container ] Start -->
            <div class="layout-container">
               <? include ('header.php');?>

                <!-- [ Layout content ] Start -->
                <div class="layout-content">

                    <!-- [ content ] Start -->
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <h4 class="font-weight-bold py-3 mb-0">Painel Administrativo</h4>
                        

                        <div class="row">
                            
                            <div class="col-sm-6 col-xl-6">
                                <div class="card mb-4 bg-success text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-md-folder-open display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white small">Artigos</div>
                                                <?
												$SQL="select count(id) as total from tb_artigos ";
												$res = mysqli_query($conn,$SQL);
												$rs = mysqli_fetch_array($res);

												echo '<div class="text-large">'.$rs['total'].'</div>';

												unset($SQL);
												unset ($res);
												unset ($rs);
												?>
                                                
                                               
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-sm-6 col-xl-6">
                                <div class="card mb-4 bg-danger text-white">
                                    <div class="card-body">
                                        <div class="d-flex align-items-center">
                                            <div class="ion ion-ios-business display-4"></div>
                                            <div class="ml-4">
                                                <div class="text-white small">Planos</div>
                                                <?
												$SQL="select count(id) as total from tb_planos ";
												$res = mysqli_query($conn,$SQL);
												$rs = mysqli_fetch_array($res);

												echo '<div class="text-large">'.$rs['total'].'</div>';

												unset($SQL);
												unset ($res);
												unset ($rs);
												?>
                                                
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            

                            <!-- chart cards start -->
                            <? //include ('index_quadromeio.php');?>
                            <!-- chart cards end -->

                            <!-- Data card 8 Start -->
                            
                            <div class="col-xl-12 col-md-12">
                                <div class="card mb-4">
                                    <h5 class="card-header">Últimos Artigos</h5>
                                    <div class="table-responsive">
                                        
                                        
                                        <?
										$SQL="select * from tb_artigos order by id desc";
										$res = mysqli_query($conn,$SQL);
										//$rs = mysqli_fetch_array($res);
										$registros =mysqli_num_rows($res);

										
										if ($registros>0){
										?>
                                        
                                        
                                        <table class="table table-hover table-borderless">
                                            <thead>
                                                <tr>
                                                    <th>Titulo</th>
                                                    <th>Categoria</th>
                                                    <th class="text-right">Edição</th>
                                                </tr>
                                            </thead>
                                            <tbody>
                                            <? while($rs = mysqli_fetch_array($res)) { ?>
                                                <tr>
                                                    <td><? echo $rs['titulo'] ?></td>
                                                    <td><? echo $rs['categoria'] ?></td>
                                                    <td class="text-right"><a href="painel.php?go=artigos_edit&id=<? echo $rs['id'] ?>"><i class="fas fa-search"></i></a></td>
                                                </tr>
                                             <?
											}
											 ?>
                                               
                                            </tbody>
                                        </table>
                                        <? 
										}
										unset($SQL);
										unset ($res);
										unset ($rs);
										?>
                                    </div>
                                </div>
                            </div>
                            <!-- Data card 8 End -->
                            
                            
                            
                            
                           

                        </div>
                    </div>
                    <!-- [ content ] End -->

                    <? include ('footer.php');?>

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
	<script>
'use strict';
$(document).ready(function() {
    buildchart()
    $(window).on('resize', function() {
        buildchart();
    });
    $('#mobile-collapse').on('click', function() {
        setTimeout(function() {
            buildchart();
        }, 700);
    });
});
function buildchart() {
    $(function() {
        var graph = Morris.Donut({
            element: 'chart-pie-moris',
            data: [{
                    <%=aguardandopagamento%>
                },
                {
                    <%=pago%>
                },
                {
                    <%=enviado%>
                }
            ],
            colors: ['#ff4a00', '#62d493', '#0177BC'],
            resize: true,
            formatter: function(x) {
                return x + " %"
            }
        });
        //Flot Base Build Option for bottom join
        var options_bt = {
            legend: {
                show: false
            },
            series: {
                label: "",
                shadowSize: 0,
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 0,
                margin: {
                    top: 5,
                    left: 0,
                    bottom: 0,
                    right: 0,
                }
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };

        //Flot Base Build Option for Center card
        var options_ct = {
            legend: {
                show: false
            },
            series: {
                label: "",
                shadowSize: 0,
                curvedLines: {
                    active: true,
                    nrSplinePoints: 20
                },
            },
            tooltip: {
                show: true,
                content: "x : %x | y : %y"
            },
            grid: {
                hoverable: true,
                borderWidth: 0,
                labelMargin: 0,
                axisMargin: 0,
                minBorderMargin: 5,
                margin: {
                    top: 8,
                    left: 8,
                    bottom: 8,
                    right: 8,
                }
            },
            yaxis: {
                min: 0,
                max: 30,
                color: 'transparent',
                font: {
                    size: 0,
                }
            },
            xaxis: {
                color: 'transparent',
                font: {
                    size: 0,
                }
            }
        };
        //Flot Ecommerce Chart Start
        $.plot($("#ecom-chart-1"), [{
            data: [
                [0, 30],
                [1, 5],
                [2, 26],
                [3, 10],
                [4, 22],
                [5, 30],
                [6, 5],
                [7, 26],
                [8, 10],
            ],
            color: "#ff4a00",
            lines: {
                show: true,
                fill: false,
                lineWidth: 3
            },
            points: {
                show: true,
                radius: 4,
                fillColor: "#fff",
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options_ct);

        $.plot($("#ecom-chart-3"), [{
            data: [
                [0, 30],
                [1, 5],
                [2, 26],
                [3, 10],
                [4, 22],
                [5, 30],
                [6, 5],
                [7, 26],
                [8, 10],
            ],
            color: "#FF4961",
            lines: {
                show: true,
                fill: false,
                lineWidth: 3
            },
            points: {
                show: true,
                radius: 4,
                fillColor: "#fff",
                fill: true,
            },
            curvedLines: {
                apply: false,
            }
        }], options_ct);
    });
}


$(function() {
  var gridBorder = '#eeeeee';

  

  new Morris.Bar({
    element: 'morrisjs-bars',
    data: [
      <%=data%>
    ],
    xkey: 'device',
    ykeys: ['geekbench'],
    labels: ['Vendas'],
    barRatio: 0.4,
    xLabelAngle: 35,
    hideHover: 'auto',
    barColors: ['#0177BC'],
    gridLineColor: gridBorder,
    resize: true
  });

  
});


</script>
</body>

</html>
