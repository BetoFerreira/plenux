<!DOCTYPE html> 

<html lang="pt-br">	

	<head>

	<meta charset="utf-8">

    <meta http-equiv="X-UA-Compatible" content="IE=edge">

    <meta name="viewport" content="width=device-width, initial-scale=1">

    

    <title>Clientes</title>

    <!-- Bootstrap core CSS -->

    <link href="assets/css/bootstrap/bootstrap.min.css" rel="stylesheet">     			

	</head>

<body>

    <div class="container">

	      <!--<div class="col-md-8 col-md-offset-2">-->

		<center><h1>Cadastro de Clientes</h1></center>



		<form method="POST" action="formulario.php">

			<div class="form-row">

      <div class="col-md-3">

				<label>Titular:</label>

				<input type="text" name="titular" class="form-control" placeholder="Titular"><br />

			</div>

			<div class="col-md-3">

				<label>Cargo:</label>

				<!--<input type="text" name="cargo" class="form-control" placeholder="Siape"><br />-->
              <select name="cargo" class="form-control" placeholder="Escreva seu Cargo/Patente">
                  <option value="SELECIONE">SELECIONE</option>
                  <option value=""></option>
                  <option value="Soldado/2">Soldado/2</option>
                  <option value="Soldado">Soldado</option>
                  <option value="Cabo">Cabo</option>
                  <option value="Terceiro Sargento">Terceiro Sargento</option>
                  <option value="Segundo Sargento">Segundo Sargento</option>
                  <option value="Primeiro Sargento">Primeiro Sargento</option>
                  <option value="Subtenente">Subtenente</option>
                  <option value="Cadete">Cadete</option>
                  <option value="Cadete I ano">Cadete I Ano</option>
                  <option value="Cadete II ano">Cadete II Ano</option>
                  <option value="Cadete III ano">Cadete III Ano</option>
                  <option value="Aspirante">Aspirante</option>
                  <option value="Cadete Complementar">Cadete Complementar</option>
                  <option value="Segundo Tenente">Segundo Tenente</option>
                  <option value="Primeiro Tenente">Primeiro Tenente</option>
                  <option value="Capitao">Capitão</option> I
                  <option value="Major">Major</option>
                  <option value="Tenente Coronel">Tenente Coronel</option>
                  <option value="Coronel">Coronel</option>
                  <option value="Outros">Outros</option>
             </select>        

			</div>
      
 

			<div class="col-md-3">

				<label>Telefone:</label>

				<input type="text" name="telefone" class="form-control" placeholder="Telefone"><br />

			</div>

			<div class="col-md-3">

				<label>Senha:</label>

				<input type="text" name="senha" class="form-control" placeholder="Senha"><br />

			</div>   

      </div>

      

			<!--<div class="form-row"> 

      <div class="col-md-6" style="clear: both;"></div>        

			<div class="col-md-6">-->				

			<center>

      <input type="submit" name="inserir" class="btn btn-success" value="inserir">

      </center>

     <!--</div>-->

       

		</form>

   </div><!--container-->	

    <br>

    

  <div class="container">

  <div class="row">  

	<!--<table class="col-md-12 col-md-offset-2">-->
  <table class="table table-bordered table-hover table-dark">

   <thead>

		<tr align="center">

			<td>ID</td>

			<td>Titular</td>

			<td>Cargo</td>

			<td>Telefone</td>

			<td>Ação</td>

			<td>Ação</td>

      <td>Total</td>

		</tr>

    </thead>    



	<?php

		if(isset($_POST['inserir'])){

			$titular = $_POST['titular'];

			$cargo = $_POST['cargo'];

			$telefone = $_POST['telefone'];

      $senha = md5($_POST['senha']);

      $saldo = 0.0;

      $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", "seulug85_root", "moodle@123");

			$sql = @$pdo->prepare("INSERT INTO  contas (titular, cargo, telefone, senha, saldo)

                            VALUES(:titular, :cargo, :telefone, :senha, :saldo)

                           ");

      $sql->bindValue(":titular", $titular);

      $sql->bindValue(":cargo", $cargo);

      $sql->bindValue(":telefone",   $telefone);

      $sql->bindValue(":senha",   $senha);

      $sql->bindValue(":saldo",   $saldo);                     

      $sql->execute();



			if($sql){

				echo "<h3>Inserido com sucesso!</h3>";

			}

     }

	?>



		<?php

      $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", "seulug85_root", "moodle@123");

			$consulta = $pdo->prepare("SELECT * FROM contas ORDER BY titular ASC");

			$consulta->execute(); 

      $i = 0;   

      

      while ($fila = $consulta->fetch()) {

            $id1      = $fila['id'];

            $titular1 = $fila['titular'];  

            $cargo1 = $fila['cargo'];

            $telefone1   = $fila['telefone'];  

    /*$fila->id. '-'. $fila->senha. '<br />';    

			foreach(@$fila as $result){

				$id = $fila['id'];

				$titular = $fila['titular'];

				$agencia = $fila['agencia'];

				$conta = $fila['conta'];

        $senha = $fila['senha']; */

       $i++;

		?>

    

    <tbody>

		<tr align="center">

			<td><?php echo $id1; ?></td>

			<td><?php echo $titular1; ?></td>

			<td><?php echo $cargo1; ?></td>

			<td><?php echo $telefone1; ?></td>

			<td><a href="formulario.php?editar=<?php echo $id1; ?>"><button class="btn btn-secondary">Editar</button></a></td>

			<td><a href="formulario.php?deletar=<?php echo $id1; ?>"><button class="btn btn-danger">Excluir</button></a></td>

      <td><?php echo $i; ?></td>

		</tr>

    </tbody>

		<?php 

    } 

    ?>
    
	</table>

  </div><!--row-->

  </div><!--container-->

	<?php

		if(isset($_GET['editar'])){

			include("editar.php");

		}

	?>	

	<?php	

	if(isset($_GET['deletar'])){

			$borrar_id = $_GET['deletar'];

			$borrar = $pdo->prepare("DELETE FROM contas WHERE id = '$borrar_id'");

			$borrar->execute();

			if($borrar){

				echo "<script>alert('Cliente foi deletado!')</script>";

				echo "<script>window.open('formulario.php', '_self')</script>";

			}	

		}

?>
  
    		<center> 
           <a class="btn btn-default" href="http://www.seulugarnaweb.com.br/timoeventos" 
           role="button" target="_parent">
           Voltar ao Site</a>
           <a href="index.php"><button class="btn btn-secondary">Menu Principal</button></a>
				</center> 

</body>

</html>







