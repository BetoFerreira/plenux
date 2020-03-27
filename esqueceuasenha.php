<?php 
  include("conecta.php"); 
  
  if (isset($_POST['ok'])) {                          
  
     $email = $mysqli->escape_string($_POST['email']);
     
         if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
             $erro[] = "E-mail inválido.";
         }
         
         /*$sql = $pdo->prepare("SELECT * FROM tb_usuario WHERE tb_usuario_email = '$email'");
         $sql->bindParam(":tb_usuario_email", $email);
         $sql->execute();
      	 if($sql->rowCount() > 0) {         
         }*/
         $sql_code  = "SELECT * FROM tb_usuario WHERE tb_usuario_email = '$email'";
         $sql_query = $mysqli->query($sql_code) or die($msqli->error);
         $dado      = $sql_query->fetch_assoc();
         $total     = $sql_query->num_rows;
         
         if ($total == 0)
            $erro[] = "O e-mail informado não existe no banco de dados.";
         
         if (count($erro) == 0 && $total > 0) {
      
           //$novasenha       = substr(md5(time()), 0, 6);
           $novasenha       = "dd8bb5";
           var_dump($novasenha); 
           $nscriptografada = md5(md5($novasenha));
           var_dump($nscriptografada); die;
           
           if (mail($email, "Sua nova senha", "Sua nova senha: ".$novasenha)) { 
           //Email usuario, assunto, e o corpo.
           $sql_code  = "UPDATE tb_usuario SET tb_usuario_senha = '$nscriptografada' WHERE 
           tb_usuario_email = '$email'";
           $sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
           //$sql_query = $mysqli->query($sql_code) or die ($mysqli->error);
           //$sql_query = $pdo->prepare($sql_code) or die ($pdo->error);   
           
           if ($sql_query)
              $erro[] = "Senha alterada com sucesso!.";
           
           }
         }
  }
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Esqueceu a Senha</title>
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css" />
<!--<link rel="stylesheet" type="text/css" href="css/estilo.css"/>
<link rel="shortcut icon" href="img/ico_escola.ico" />-->
<link rel="shortcut icon" href="img/brasao.jpeg" />
</head>
<body>
<?php
  if (count($erro) > 0) 
      foreach ($erro as $msg) {
         echo "<center><span style='color:green;'><b>".$msg."</b></span></center>"; 
      }
?>
<div class="container" style="width:300px;">
<form class="form-group text-center" method="POST" action="" enctype="multipart/form-data"> 
         
            <img src="img/brasao.jpeg" class="img-fluid" /><br>
         
         
            <label>Corpo de Bombeiros Militar do DF<br>
            Departamento Ensino, Pesquisa, Ciência e Tecnologia<br>
            Diretoria de Ensino<br><br>
            </label>
          
           <div class="form-group">
                <label for="code">E-mail</label>
                    <input value="<?php echo $_POST['email']; ?>" placeholder="Seu e-mail" type="email" class="form-control" id="code" name="email">
                    
            </div><!--form-group-->
                 
                  <input type="submit" name="ok" value="ok" class="btn btn-primary"><br><br>
                  
                  <h5 class="text-center text-danger"><b>Digite o seu email para receber sua nova senha.</b>
                  </h5><br><br>
                   
                   <a href="login.php"><input class="btn btn-warning" type="button" value="Voltar"></a>
      </form><!--modal janela-->
</div>      
</body>
</html>