<?php	

	if(isset($_GET['editar'])) {

			$editar_id = $_GET['editar'];

      $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", 
      "seulug85_root", "moodle@123");

			$sql1 = $pdo->prepare("SELECT * FROM contas WHERE id = :id ");

      $sql1->bindValue(":id", $editar_id);

      $sql1->execute();

      

      //var_dump($sql1);

     

      $consulta1 = $sql1->fetchAll();

      

        //$i = 0;



      foreach ($consulta1 as $fila1) { 



?>

<br>

<!DOCTYPE html> 

<html lang="pt-br">

	

	<head>

	<meta charset="utf-8">

    <!--<meta http-equiv="X-UA-Compatible" content="IE=edge"> -->

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>Editar</title>

   </head>    

<body>

    

<div class="col-md-8 col-md-offset-2">

		<form method="POST" action="">

			<div class="form-row">

      <div class="col-md-3">

				<label>Titular:</label>

				<input type="text" name="titular" class="form-control" 
        value="<?php echo $fila1['titular']; ?>">
        <br />

			</div>

			<div class="col-md-3">

				<label>Cargo:</label>

				<input type="text" name="cargo" class="form-control" 
        value="<?php echo $fila1['cargo']; ?>">
        <br />

			</div>

			<div class="col-md-3">

				<label>Telefone:</label>

				<input type="text" name="telefone" class="form-control" 
        value="<?php echo $fila1['telefone']; ?>">
        <br />

			</div>

			<div class="col-md-3">

				<label>Senha:</label>

				<input type="text" name="senha" class="form-control" value="<?php echo $fila1['senha']; ?>">
        <br />

			</div>   

      </div>

			

			<center>

      <input type="submit" name="atualizar" class="btn btn-success" value="atualizar">

      </center>

       

		</form>

   </div><!--col-md-8 col-md-offset-2-->	

    <br>



<?php



	if (isset($_POST['atualizar'])) {

      $_titular = $_POST['titular'];

      $_cargo = $_POST['cargo'];

      $_telefone   = $_POST['telefone'];

      $_senha   = md5($_POST['senha']); 

          

      $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", 
      "seulug85_root", "moodle@123");

			$consulta = $pdo->prepare("UPDATE contas SET 

      titular       = :titular,

      cargo       = :cargo, 

      telefone     = :telefone, 

      senha         = :senha 

      WHERE     id  = '$editar_id' ");

      $consulta->bindValue(":titular", $_titular);

      $consulta->bindValue(":cargo", $_cargo);

      $consulta->bindValue(":telefone", $_telefone);

      $consulta->bindValue(":senha", $_senha);



      $consulta->execute();

      

      //var_dump($consulta);



			if($consulta) {

        echo "<script>alert('Cliente foi Atualizado!')</script>";

				echo "<script>window.open('formulario.php', '_self')</script>";

      } else {

        echo "<script>alert('Cliente não foi Atualizado!')</script>";

				echo "<script>window.open('formulario.php', '_self')</script>";

      }

   }

}

} 

?>

 

</body>

</html>



