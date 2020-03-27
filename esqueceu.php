<?php  
require "conexao.php";
$pdo = conectar();
if (isset($_POST['OK'])) {
   //$email           = $mysqli->escape_string($_POST['email']);
   //$email             = $pdo->escape_string($_POST['email']);
   $email           = $_POST['email'];
   //Email é válido?
   if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
      $erro[] = "E-mail inválido!";
   }     
   $sql_code  = "SELECT * FROM login WHERE email = '$email'";
   //$sql_query =  $mysqli->query($sql_code) or die($mysqli->error);
   $sql_query =  $pdo->prepare($sql_code);
   $sql_query->execute();
   $dado = $sql_query->fetch(PDO::FETCH_ASSOC);
   print_r($dado);
   print("\n");
   //var_dump( $sql_query );
   /*object(PDOStatement)#2 (1) { 
   ["queryString"]=> string(76) "SELECT senha, code FROM login WHERE login email = 'beto.ferreirax@gmail.com'" 
   }*/   
   //$result = $sql_query->fetch();
   //print_r($result);  
   /*foreach ($sql_query as $dado) {
				$status = $dado['status'];
				$code = $dado['code'];
				$senha = $dado['senha'];
				$nome = $dado['nome'];
				$email1 = $dado['email'];
        $painel = $dado['painel']; */
        
   //$dado      = $sql_query->fetch_assoc();
   //$total     = $sql_query->num_rows; 
   //$total = $dado->rowCount();                       

   //if ($total = $dado->rowCount() == 0) {
   //if ($dado->rowCount() == 0) {
   if (!isset($dado)) {
   /*if ($total == 0)*/
       echo $msg = "O E-mail informado não existe no banco de dados!";
   }
   //if (count($erro) == 0 && $total > 0) {
  if ($erro == 0 && $dado > 0) {
   $novasenha       = substr(md5 ( time() ), 0, 6);//Enviar pro usuário por email
   //$novasenha = substr(time(), 0, 6);
   $nscriptografada = md5( md5 ($novasenha) ); //bd
   
   //Trata email e impossibilita ataque sql_injection
   //$email           = $pdo->escape_string($_POST['email']); 
       if (mail($email, "Sua nova Senha", "Sua nova senha: ".$novasenha)) {
       //Apenas se o email for enviado vamos alterar a senha no bd.
       //$email usuario, assunto e corpo.
       $sql_code  = "UPDATE login SET senha = '$nscriptografada' WHERE email = '$email'";
       //$sql_query = $mysqli->query($sql_code) or die($mysqli->error);
       $sql_query = $pdo->prepare($sql_code);
       
       } //mail
    } //count
  //} //foreach 
} //ok 
   /*echo substr(md5(time()), 0, 6);
   echo "<br>".$email."<br>".$nscriptografada;
   echo substr(time(), 0, 6);*/ 
   
   
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<title>ESQUECEU</title>
</head>
<body>
<?php 
    $erro[] = ''; 
   // if (count($erro) > 0)
      if ($erro > 0) 
        foreach ($erro as $msg) {
            echo "<p>$msg</p>";
        }
?>                             
<form class="form-group" method="POST" action="#"  enctype="multipart/form-data">
   <!--<input value="<?php echo $_POST['email']; ?>" placeholder="Seu E-mail" name="email" type="email"> -->
   <input placeholder="Seu E-mail" name="email" type="email">
   <input name="OK" value="OK" type="submit">
</form>
</body>
</html>