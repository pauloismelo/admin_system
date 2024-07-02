<div class="col-xl-6">
    <div class="card mb-4">
        <div class="card-header with-elements">
            <h6 class="card-header-title mb-0">Intenções de vendas</h6>
            <div class="card-header-elements ml-auto">
                <label class="text m-0">
                    <span class="text-light text-tiny font-weight-semibold align-middle">VERIFICAR STATUS</span>
                    <span class="switcher switcher-sm d-inline-block align-middle mr-0 ml-2">
                        <input type="checkbox" class="switcher-input" checked="">
                        <span class="switcher-indicator">
                            <span class="switcher-yes"></span>
                            <span class="switcher-no"></span>
                        </span>
                    </span>
                </label>
            </div>
        </div>
        <?
		$SQL="select count(id) as total from tb_pedidos ";
		$res = mysqli_query($conn,$SQL);
		$rs = mysqli_fetch_array($res);

			$totalpedidos = intval($rs['total']);

		unset($SQL);
		unset ($res);
		unset ($rs);
		?>
		
        
        <div class="row no-gutters row-bordered">
            <div class="col-md-5 col-lg-12 col-xl-5">
                <div class="card-body">
                	
                    <?
					$SQL="select count(id) as total from tb_pedidos where status='AGUARDANDO PAGAMENTO' ";
					$res = mysqli_query($conn,$SQL);
					$rs = mysqli_fetch_array($res);
			
						$calculo=(intval($rs['total'])*100/$totalpedidos);
						$aguardandopagamento="Value: ".$calculo." , label: 'Aguar. Pgto'";
			
					unset($SQL);
					unset ($res);
					unset ($rs);
					?>
                    <div class="pb-4">
                        Aguardando Pagamento
                        <div class="progress mt-1" style="height:6px;">
                            <div class="progress-bar bg-warning" style="width: <? echo $calculo?>%;"></div>
                        </div>
                    </div>
                    <?
                    unset ($calculo);
					?>
                    
                    
                    
                    <?
					$SQL="select count(id) as total from tb_pedidos where status='Paga' ";
					$res = mysqli_query($conn,$SQL);
					$rs = mysqli_fetch_array($res);
			
						$calculo=(intval($rs['total'])*100/$totalpedidos);
						$pago="Value: ".$calculo." , label: 'Pago'";
			
					unset($SQL);
					unset ($res);
					unset ($rs);
					?>
                    
                    <div class="pb-4">
                        Pago
                        <div class="progress mt-1" style="height:6px;">
                            <div class="progress-bar bg-success" style="width: <? echo $calculo?>%;"></div>
                        </div>
                    </div>
                    <?
                    unset ($calculo);
					?>
                    
                    
                    <?
					$SQL="select count(id) as total from tb_pedidos where status='Enviado' ";
					$res = mysqli_query($conn,$SQL);
					$rs = mysqli_fetch_array($res);
			
						$calculo=(intval($rs['total'])*100/$totalpedidos);
						$enviado="Value: ".$calculo." , label: 'Enviado'";
			
					unset($SQL);
					unset ($res);
					unset ($rs);
					?>
                   
                    <div class="pb-4">
                        Enviado
                        <div class="progress mt-1" style="height:6px;">
                            <div class="progress-bar bg-primary" style="width: <? echo $calculo?>%;"></div>
                        </div>
                    </div>
                    <?
                    unset ($calculo);
					?>
                    
                </div>
            </div>
            <div class="col-md-7 col-lg-12 col-xl-7">
                <div class="card-body">
                    <div id="chart-pie-moris" style="height:200px"></div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="col-xl-6">
	<?

	for ($i=0;$i<=11;$i++){
		$mesatual= strtotime('+ '.$i.' month');
		$mes=date('m', $mesatual);
		$ano=date('Y', $mesatual);
		//echo date('d/m/Y', $mesatual).'<br>';
		
		setlocale(LC_ALL, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
		date_default_timezone_set('America/Sao_Paulo');
		
		$mes_extenso = strftime('%B', $mesatual);
		//echo $data_extenso.'<br>';

		
		$SQL="select count(id) as total from tb_pedidos where month(datareg)=".$mes." and year(datareg)=".$ano." ";
		$res = mysqli_query($conn,$SQL);
		$rs = mysqli_fetch_array($res);

			if (isset($data)){
				$data=$data." ,{ device: '".$mes_extenso."', geekbench: ".$rs['total']." }";
				
			}else{
				$data="{ device: '".$mes_extenso."',  geekbench: ".$rs['total']." }";
			}

		unset($SQL);
		unset ($res);
		unset ($rs);
		
	}
	//echo $data;
	?>
    
	<div class="card mb-4">
        <div class="card-header with-elements">
            <h6 class="card-header-title mb-0">Intenções de vendas (ultimos 12 meses)</h6>
        </div>
        <div class="card-body">
            <div id="morrisjs-bars" style="height: 300px"></div>
        </div>
     </div>
</div>

