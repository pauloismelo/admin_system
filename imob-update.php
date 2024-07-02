<!--#include file="inc_upload.asp"-->
<!--#include file="db.asp"-->
<?php

include('db.php');


if ($_FILES['arquivo']['name']!=''){ //verifica se houve tentativa de subir a imagem
	

	// Pasta onde o arquivo vai ser salvo
	define('DEST_DIR', __DIR__ . '/PLANOS/');
	$_UP['pasta'] = str_replace("SICS","IMG",DEST_DIR); ;
	//echo $_UP['pasta'];
	
	//exit;
	// Tamanho máximo do arquivo (em Bytes)
	$_UP['tamanho'] = 1024 * 1024 * 2; // 2Mb
	 
	// Array com as extensões permitidas
	$_UP['extensoes'] = array('jpg', 'jpeg', 'png', 'gif');
	 
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
	$extensao = strtolower(end(explode('.', $_FILES['arquivo']['name'])));
	if (array_search($extensao, $_UP['extensoes']) === false) {
		echo "Por favor, envie arquivos com as seguintes extensões: jpg, jpeg, png ou gif";
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
			
			
			$query = "update tb_planos set titulo='".utf8_encode($_POST['titulo'])."', descricao='".utf8_encode($_POST['descricao'])."', para='".utf8_encode($_POST['para'])."', foto='".$nome_final."'   where id=".$_POST['id']." ";
			if (mysqli_query($conn, $query)) {
				echo "<script>alert('Plano atualizado com sucesso!');</script>";
				echo "<script>window.location='painel.php?go=imob_edit&id=".$_POST['id']."';</script>";
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
	
	
	$query = "update tb_planos set titulo='".utf8_encode($_POST['titulo'])."', descricao='".utf8_encode($_POST['descricao'])."', para='".utf8_encode($_POST['para'])."' where id=".$_POST['id']." ";
	if (mysqli_query($conn, $query)) {
		echo "<script>alert('Plano atualizado com sucesso!');</script>";
		echo "<script>window.location='painel.php?go=imob_edit&id=".$_POST['id']."';</script>";
	} else {
		echo "Erro: " . $query . "<br>" . mysqli_error($conn);
		exit;
	}
}

?>

