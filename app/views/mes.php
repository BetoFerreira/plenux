<?php 

  session_start();
  
  if (isset($_SESSION['login'])) {
  //echo "id: ".$_SESSION['login'];
  $id = $_SESSION['login'];
  include_once('model/Conexao.class.php');
  include_once('model/Contas.class.php');
   
  $contas = new Contas();
?>

<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">        
        <!-- Favicon -->
    	<link rel="shortcut icon" href="assets/img/icon.jpg"> 
        <title>Caixa Eletrônico - Mês</title>
        <!-- Bootstrap 4 -->
		<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
		<!-- CSS da INDEX -->
        <link rel="stylesheet" href="assets/css/index.css">
        <!-- GoogleFonts - OpenSans -->
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		<!-- Fontawesome 5.0-->
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
    </head>
    <body>
    <div class="container">
      <div class="row">
       <div class="col-md-12 col-md-offset-2">
        <div class="d-flex">
            <div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">
                        <div class="mr-auto p-2">
                            <h2 class="text-center">Timo <i class="far fa-money-bill-alt"> Eventos </i></h2><br><br>
                        </div>
            <div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead">
									<tr>
										<th>ID</th>
										<th>TITULAR</th>
										<th>AGÊNCIA</th>
										<th>CONTA</th>
										<th>SALDO</th>
									</tr>
								</thead>
								<tbody>
									 <?php foreach($contas->listAccounts($id) as $account):  ?>
									<tr class="tr">
										<td><?php echo $account['id']; ?></td>
										<td><?php echo $account['titular']; ?></td>
										<td><?php echo $account['cargo']; ?></td>
										<td><?php echo $account['telefone']; ?></td>
										<td><?php echo $account['saldo']; ?></td>

										<!-- Formulario para Transação -->

										<!-- Fim Formulario -->

									</tr>
									  <?php endforeach; ?>
								</tbody>
							</table>
						</div><!--table-responsive-->

						<!-- Fim da Tabela -->
               
                </div><!--list-group-item-->
            </div><!--content p-1-->
        </div><!--d-flex-->
		<form method="POST" action="">
			<div class="form-row">
			<div class="col-md-6">
				<label>Mês:</label>
				<input type="text" name="mes" class="form-control" placeholder="Mês"><br />
			</div>
			<div class="col-md-6">
				<label>Ano:</label>
				<input type="text" name="ano" class="form-control" placeholder="Ano"><br />
			</div>   
      </div>
			<center>
      <input type="submit" name="pesquisar" class="btn btn-success" value="pesquisar">
      </center>
		</form> 
           
        </div><!-- col-md-12 col-md-offset-2 -->
      </div><!--row-->
  </div><!--container-->         
       <br>
        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>

<?php 
  } else {
      header("Location: login.php?access_denied");
  }
?>

  <div class="container">
  <div class="row">     
  <table class="table table-bordered table-hover table-dark">
   <thead>
		<tr align="center">
			<td>Cliente</td>
			<td>Tipo</td>
			<td>Valor</td>
      <td>Dt_Operação</td>
      <td>Tot-C</td>
      <td>Tot-P</td>
		</tr>
    </thead>  

      <?php 
      if (isset($_POST['pesquisar'])) {
        $mes = $_POST['mes'];
        $ano = $_POST['ano'];
        $data_operacao = $ano."-".$mes;
        echo "<h5 class='p-3 mb-2 bg-light text-dark text-center'>Pesquisando por Ano-Mês : <u>"
        .$data_operacao."</u> </h5><br>";
        //$busca = '%' . $busca . '%'; 
      ?>
 
    <?php     
       $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", "seulug85_root", "moodle@123");         
       $select = @$pdo->prepare("SELECT c.titular titular, c.cargo cargo, h.tipo tipo, h.valor valor, 
       h.data_operacao, h.id_conta id_conta FROM historico h INNER JOIN contas c ON c.id = h.id_conta
       WHERE data_operacao like '%$data_operacao%'");
       //$select->bindValue(":data_operacao", $data_operacao);
       $select->execute(); 

       while  ($row = $select->fetch()) {
       @$tipo               = $row['tipo'];       
       if (@$tipo == "Compras") {
       //@$id_conta           = $row['id_conta'];
       @$titular           = $row['titular'];
       @$data_operacao      = $row['data_operacao'];
       @$valor              = $row['valor'];
       @$valor = str_replace(",", ".", $valor);
       @$valor = floatval($valor); 
       @$valor1 = $valor1 + $valor;  
       ?>
                        <tbody>
                          <tr align="center">
                            <!--<td><?php echo @$id_conta; ?></td>-->
                            <td><?php echo @$titular; ?></td>
                            <td style="color: green;"><?php echo @$tipo; ?></td>
                            <td><?php echo @$valor; ?></td>
                            <td><?php echo @$data_operacao; ?></td>
                            <td style="color: green;"><?php echo @$valor1; ?></td>
                            <td></td> 
                          </tr>
                        </tbody>        
       <?php     
       } else {
       //@$id_conta           = $row['id_conta'];
       @$titular           = $row['titular'];
       @$data_operacao     = $row['data_operacao'];       
       @$valor             = $row['valor'];
       @$valor = str_replace(",", ".", $valor);
       @$valor = floatval($valor); 
       @$valor2 += $valor;          
       ?> 
                        <tbody>
                          <tr align="center">
                            <!--<td><?php echo @$id_conta; ?></td>-->
                            <td><?php echo @$titular; ?></td>
                            <td style="color: red;"><?php echo @$tipo; ?></td>
                            <td><?php echo @$valor; ?></td>
                            <td><?php echo @$data_operacao; ?></td>
                            <td></td>
                            <td style="color: red;"><?php echo @$valor2; ?></td>
                          </tr>
                        </tbody> 
                          <?php 
                          } } 
                          ?>
                          <left>
                          <a class="btn btn-primary" href="javascript:window.history.go(-1)" target="_self">
                          Voltar</a>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
                          </left><right><a class="btn btn-warning" href="http://www.seulugarnaweb.com.br/timoeventos" target="_self">
                          Ir para o Site</a></right><center></left>&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;<right><a class="btn btn-info" href="index.php" target="_self">
                          Ir para o Menu</a></center>
                     </table>
<?php
     } else { //pesquisar   
       echo "Não houve pesquisa!";
     } 
  ?>
                   </div>
              </div>
    </body>
</html>
