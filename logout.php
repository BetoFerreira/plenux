<?php 
if($_GET['pg'] == "sair") {
	@session_destroy(); 
	$_SESSION['code'];
	$_SESSION['nome'];
	$_SESSION['senha'];
	$_SESSION['painel']; 
	 /*unset(
        $_SESSION['code'],
				$_SESSION['nome'],
				$_SESSION['senha'],
				$_SESSION['painel']
				); */
	
	echo "<script language='javascript'>window.location='index.php';</script>";
}
?>