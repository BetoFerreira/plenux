<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Gestão Escolar</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<!--<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<link rel="shortcut icon" href="img/ico_escola.ico" />-->
<link rel="shortcut icon" href="img/brasao.jpeg" />
</head>

<body>
<?php require "conexao.php"; $pdo = conectar();
   unset(
        $_SESSION['code'],
				$_SESSION['nome'],
				$_SESSION['senha'],
				$_SESSION['painel']
				); 
?>
<!--<div id="logo">
<img src="img/logo.png" />
<img src="img/brasao.jpeg" />
</div>-->

<!--<div id="caixa_login">-->
<div class="container" style="width:300px;">
  
<?php
if(isset($_POST['Entrar'])){
	$code = $_POST['code'];
	$password = $_POST['password'];
  //echo "Código: ".$code." Senha: ".$password;
	/*if($code == ''){
		echo "<h2> Por favor, digite o número do cartão ou código de acesso! </h2>";
		} elseif($password == ''){
			echo "<h2> Por favor, digite sua senha! </h2>";		
	  } else {*/
    $sql = $pdo->prepare("SELECT * FROM login WHERE code = '$code' AND senha = '$password'");
    $sql->bindParam(":code", $code);
    $sql->bindParam(":password", $password);
    $sql->execute();
    
		if($sql->rowCount() > 0) {
    //var_dump($sql); die();
    //print_r($sql); die(); 
		//$sql   = $res_1->fetch(PDO::FETCH_ASSOC);
			//while($res_1 = mysqli_fetch_assoc($sql)){
      foreach ($sql as $row) {
				$status = $row['status'];
				$code = $row['code'];
				$senha = $row['senha'];
				$nome = $row['nome'];
				$painel = $row['painel'];
				@session_start(); 
				$_SESSION['code'] = $code;
				$_SESSION['nome'] = $nome;
				$_SESSION['senha'] = $senha;
				$_SESSION['painel'] = $painel;        
				
				if($status == 'inativo'){
					echo "<h2> Você está inativo, procure a administração!! </h2>";	
				} elseif($painel == 'admin'){
            //echo "Status: ".$status." / ".$nome." / ".$painel;  
						echo "<script language='javascript'> window.location='admin';</script>";
  			} elseif($painel == 'aluno'){
            //echo "Status: ".$status." / ".$nome." / ".$painel; 
						echo "<script language='javascript'> window.location='aluno';</script>";	
				} elseif($painel == 'professor'){
						echo "<script language='javascript'> window.location='professor';</script>";	
				} else {
			       echo "<h2> Dados incorretos! </h2>";	
	        }
        }
   } //rowCount() > 0
 } //if existir Entrar  
?>

      <form class="form-group text-center" method="post" action="" enctype="multipart/form-data"> 
         
            <img src="img/brasao.jpeg" class="img-fluid" /><br>
         
         
            <label>Corpo de Bombeiros Militar do DF<br>
            Departamento Ensino, Pesquisa, Ciência e Tecnologia<br>
            Diretoria de Ensino<br><br>
            </label>
          
           <div class="form-group">
                <label for="code">Código</label>
                    <input type="text" class="form-control" id="code" name="code">
                    
            </div><!--form-group-->
            <div class="form-group">
                <label for="password">Senha</label>
                    <input type="password" class="form-control" id="password" name="password"> 
            </div><!--form-group-->                  
                  <input type="submit" name="Entrar" value="Entrar" class="btn btn-primary"><br><br>
                  <a href="esqueceuasenha.php" target="_blank"><b>Esqueceu a Senha</b></a>
      </form><!--modal janela-->
      

</div><!--container-->

</body>
</html>
