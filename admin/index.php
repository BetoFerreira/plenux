<?php 
@session_start();
$painel_atual = "admin"; 
//echo "Painel Atual: ".$painel_atual." Nome: ".$_SESSION['nome']." Painel: ".$_SESSION['painel']; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>admin/index.php</title>
<?php require "../config.php"; ?>
</head>

<body>
<?php require "topo.php"; ?>

<?php  require "rodape.php";  ?>
</body>
</html>