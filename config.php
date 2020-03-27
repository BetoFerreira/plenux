<!DOCTYPE html>
<html lang="pt-br">
<head><meta charset="utf-8">
<title>config.php</title>
</head>
<body>
<?php 
/*require "conexao.php";
$pdo = conectar();*/
@session_start();
$code   = $_SESSION['code'];
$senha  = $_SESSION['senha'];
$nome   = $_SESSION['nome'];
$painel = $_SESSION['painel'];
//echo "Codigo: ".$code." Senha: ".$senha." Nome: ".$nome." Painel: ".$painel;  
if ($code == '' || $nome == '' || $senha == '') {
   echo "<script language='javascript'>window.location='../index.php';</script>";
}
/*if($code == ''){
	echo "<script language='javascript'>window.location='../index.php';</script>";	}
	elseif($nome == '') {
	echo "<script language='javascript'>window.location='../index.php';</script>"; } 
  elseif($senha == '') {
	echo "<script language='javascript'>window.location='../index.php';</script>";  } */
  /*else {
		if ($painel_atual != $painel) {  
		echo "<script language='javascript'>window.location='../index.php';</script>";
	  } 
  } */
?>

<?php 
if($_GET['pg'] == "sair") {
	@session_destroy(); 
	$_SESSION['code'];
	$_SESSION['nome'];
	$_SESSION['senha'];
	$_SESSION['painel'];
	
	echo "<script language='javascript'>window.location='index.php';</script>";
}
?>

</body>
</html>