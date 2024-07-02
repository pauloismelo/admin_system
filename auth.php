<?
include('db.php');


$SQL="select * from tbfuncionarios where login='".$_POST['login']."' and senha='".$_POST['senha']."' ";
$res = mysqli_query($conn,$SQL);
$rs = mysqli_fetch_array($res);
$registros =mysqli_num_rows($res);
	
if ($registros>0){
	
	session_cache_expire(5);
	// Iniciando uma sessão
	session_start();
	 
	// Guardando dados na sessão
	$_SESSION['nomex'] = $rs['NOME'];
	$_SESSION['idx'] = $rs['id'];
	$_SESSION['loginx'] = $rs['login'];
	$_SESSION['departamentox'] = $rs['departamento'];
	
	echo "<script>window.location='index.php';</script>";
	//header('Location: index.php');	
	
	
}else{
	echo "<script>alert('Login ou Senha incorreto!');</script>";
	echo "<script>window.location='login.php';</script>";

}
?>