<!-- [ Layout sidenav ] Start -->

<div id="layout-sidenav" class="layout-sidenav sidenav sidenav-vertical bg-white logo-dark">
    <!-- Brand demo (see assets/css/demo/demo.css) -->
    <div class="app-brand demo">
        <span class="app-brand-logo demo">
            <img src="assets\img\logo02.png" style="max-width:50%;" alt="Brand Logo" >
        </span>
    </div>
    <div class="sidenav-divider mt-0"></div>

    <!-- Links -->
    <ul class="sidenav-inner py-1">

        <!-- Dashboards -->
        <li class="sidenav-item active">
            <a href="index.php" class="sidenav-link">
                <i class="sidenav-icon feather icon-home"></i>
                <div>Home</div>
                <div class="pl-1 ml-auto"></div>
            </a>
        </li>
        
		<? if ($loja=='s'){?>
        <!-- Layouts -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Gerenciador</li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-layout"></i>
                <div>Categorias</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item"><a href="categoria_adc.php" class="sidenav-link"><div>Adicionar</div></a></li>
                <li class="sidenav-item"><a href="categoria_list.php" class="sidenav-link"><div>Consultar</div></a></li>
            </ul>
        </li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-box"></i>
                <div>Produtos</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item"><a href="produto_adc.php" class="sidenav-link"><div>Adicionar</div></a></li>
                <li class="sidenav-item"><a href="produto_list.php" class="sidenav-link"><div>Consultar</div></a></li>
            </ul>
        </li>
        <? }?>
        <!-- Conteudo -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Conteudo</li>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-folder"></i>
                <div>Conteúdo</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item"><a href="painel.php?go=artigos_adc" class="sidenav-link"><div>Adicionar</div></a></li>
                <li class="sidenav-item"><a href="painel.php?go=artigos_list" class="sidenav-link"><div>Consultar</div></a></li>
            </ul>
        </li>
        <? if ($loja=='s'){?>
        <li class="sidenav-item">
            <a href="#" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Vendedores</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item"><a href="vendedores_adc.php" class="sidenav-link"><div>Adicionar</div></a></li>
                <li class="sidenav-item"><a href="vendedores_list.php" class="sidenav-link"><div>Consultar</div></a></li>
            </ul>
        </li>
        <? }?>
        
        
         <!-- Configuracoes -->
        <li class="sidenav-divider mb-1"></li>
        <li class="sidenav-header small font-weight-semibold">Configurações</li>
        <li class="sidenav-item">
            <a href="config.php" class="sidenav-link">
                <i class="sidenav-icon feather icon-settings"></i>
                <div>Dados do site</div>
            </a>
        </li>
        
        <li class="sidenav-item">
            <a href="#" class="sidenav-link sidenav-toggle">
                <i class="sidenav-icon feather icon-user"></i>
                <div>Usuários do painel</div>
            </a>
            <ul class="sidenav-menu">
                <li class="sidenav-item"><a href="usuario_adc.php" class="sidenav-link"><div>Adicionar</div></a></li>
                <li class="sidenav-item"><a href="usuario_list.php" class="sidenav-link"><div>Consultar</div></a></li>
            </ul>
        </li>
        
    </ul>
</div>
<!-- [ Layout sidenav ] End -->