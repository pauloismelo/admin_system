<?php
include('verifica.php');

if ($_FILES['arquivo']['name']!=''){ //verifica se houve tentativa de subir a imagem
	

	// Pasta onde o arquivo vai ser salvo
	define('DEST_DIR', __DIR__ . '/ARTIGOS/');
	$_UP['pasta'] = str_replace("SICS","IMG",DEST_DIR); ;
	//echo $_UP['pasta'];
	
	//exit;
	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
	 
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif', 'psd');
	 
	// Renomeia o arquivo? (Se true, o arquivo será salvo como .jpg e um nome único)
	$_UP['renomeia'] = false;
	 
	// Array com os tipos de erros de upload do PHP
	$_UP['erros'][0] = 'Não houve erro';
	$_UP['erros'][1] = 'O arquivo no upload é maior do que o limite do PHP';
	$_UP['erros'][2] = 'O arquivo ultrapassa o limite de tamanho especifiado no HTML';
	$_UP['erros'][3] = 'O upload do arquivo foi feito parcialmente';
	$_UP['erros'][4] = 'Não foi feito o upload do arquivo';
	$_UP['erros'][5] = 'Erro desconhecido';
	$_UP['erros'][6] = 'Missing a temporary folder';
	$_UP['erros'][7] = 'Falha ao escrever o arquivo no disco';
	$_UP['erros'][8] = 'A PHP extension stopped the file upload.';
	 
	// Verifica se houve algum erro com o upload. Se sim, exibe a mensagem do erro
	if ($_FILES['arquivo']['error'] != 0) {
	die("Não foi possível fazer o upload, erro:<br />" . $_UP['erros'][$_FILES['arquivo']['error']]);
	exit; // Para a execução do script
	}
	 
	// Caso script chegue a esse ponto, não houve erro com o upload e o PHP pode continuar
	 
	// Faz a verificação da extensão do arquivo
	echo $_FILES['arquivo']['name'].'<br>';
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	echo $extensao.'<br>';
	
	if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png, psd ou gif";
	}else if ($_UP['tamanho'] < $_FILES['arquivo']['size']) { // Faz a verificação do tamanho do arquivo
		echo "O arquivo enviado é muito grande, envie arquivos de até 2Mb.";
	}else {// O arquivo passou em todas as verificações, hora de tentar movê-lo para a pasta
	// Primeiro verifica se deve trocar o nome do arquivo
		if ($_UP['renomeia'] == true) {
		// Cria um nome baseado no UNIX TIMESTAMP atual e com extensão .jpg
		$nome_final = time().'.jpg';
		} else {
		// Mantém o nome original do arquivo
		$nome_final = $_FILES['arquivo']['name'];
		}
	 
	
		// Depois verifica se é possível mover o arquivo para a pasta escolhida
		if (move_uploaded_file($_FILES['arquivo']['tmp_name'], $_UP['pasta'] . $nome_final)) {
			// Upload efetuado com sucesso, exibe uma mensagem e um link para o arquivo
			if ($_POST['categoria']=='SOBRE'){
				$sql1=', missao, visao, valores';	
				$sql2=", '".utf8_encode($_POST['missao'])."', '".utf8_encode($_POST['visao'])."', '".utf8_encode($_POST['valores'])."'";
			}
			
			$query ="insert into tb_artigos (titulo, cortitulo, texto, cortexto, resumo, corresumo, foto, categoria, registro_em, registro_por, status ".$sql1.") values ('".utf8_encode($_POST['titulo'])."', '".utf8_encode($_POST['cortitulo'])."', '".utf8_encode($_POST['texto'])."', '".utf8_encode($_POST['cortexto'])."', '".utf8_encode($_POST['resumo'])."', '".utf8_encode($_POST['corresumo'])."', '".$nome_final."', '".$_POST['categoria']."', '".date('Y-m-d H:i:s')."', '".$nomex."', '".$_POST['status']."'  ".$sql2.")";
			
			
			if (mysqli_query($conn, $query)) {
				echo "<script>alert('Artigo inserido com sucesso!');</script>";
				echo "<script>window.location='painel.php?go=artigos_list';</script>";
			} else {
				echo "Erro: " . $query . "<br>" . mysqli_error($conn);
				exit;
			}
			
		}else {
		// Não foi possível fazer o upload, provavelmente a pasta está incorreta
			echo "Não foi possível enviar o arquivo, tente novamente";
		}
	 
	}
}else{
	//echo "Sem arquivo!";
	if ($_POST['categoria']=='SOBRE'){
		$sql1=', missao, visao, valores';	
		$sql2=", '".utf8_encode($_POST['missao'])."', '".utf8_encode($_POST['visao'])."', '".utf8_encode($_POST['valores'])."'";
	}
	
	$query ="insert into tb_artigos (titulo, cortitulo, texto, cortexto, resumo, corresumo, categoria, registro_em, registro_por, status ".$sql1.") values ('".utf8_encode($_POST['titulo'])."', '".utf8_encode($_POST['cortitulo'])."', '".utf8_encode($_POST['texto'])."', '".utf8_encode($_POST['cortexto'])."', '".utf8_encode($_POST['resumo'])."', '".utf8_encode($_POST['corresumo'])."', '".$_POST['categoria']."', '".date('Y-m-d H:i:s')."', '".$nomex."', '".$_POST['status']."' ".$sql2.")";
	
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Artigo inserido com sucesso!');</script>";
		echo "<script>window.location='painel.php?go=artigos_list';</script>";
	} else {
		echo "Erro: " . $query . "<br>" . mysqli_error($conn);
		exit;
	}
}

?>

