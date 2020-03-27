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
        <title>Caixa Eletrônico - Home</title>
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

        <div class="d-flex">
            <nav class="sidebar">
                <ul class="list-unstyled">

                	<!-- Image of Company -->

                	<div class="image_company">
						<img src="assets/img/timo200.jpg" class="rounded-circle rounded mx-auto d-block">
					</div><br><br>

                    <span class="text-center logo">
                        Caixa Eletrônico
                    </span><hr>
					<!-- End Img -->
					<!-- List of Menu and Icons -->
                    <li><a href=""><i class="fa fa-home"></i> Home</a></li>

                    <li><a href="formulario.php"><i class="fas fa-user"></i> Inclusão Clientes </a></li>
               
                    <li><a href="dia.php"><i class="fas fa-paste"></i> Balancete Diário </a></li>

                    <li><a href="mes.php"><i class="fas fa-dolly"></i> Balancete Mensal </a></li>

                    <li><a href="ano.php"><i class="fas fa-handshake"></i> Balancete Anual </a></li>

                    <li><a href="periodo.php"><i class="fas fa-handshake"></i> Balancete por Período </a></li>
                    
                    <li><a href="nomes.php"><i class="fas fa-handshake"></i> Balancete por Clientes </a></li>
                    
                    <li><a href="inclusao.php"><i class="fas fa-handshake"></i> Financeiro Clientes </a></li>

                    <!-- Button of Logoff -->

                    <li><a href="controller/logout.php"><i class="fas fa-sign-out-alt"></i> Sair</a></li>

                    <!-- End - Button of Logoff -->

                </ul>
            </nav>

            <!-- End of Menu -->


            <div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">
                    
                        <div class="mr-auto p-2">
                            <h2 class="text-center">Timo <i class="far fa-money-bill-alt"> Eventos </i></h2><br><br>
                        </div>

                        <!-- Iniciando a Tabela -->

                        <div class="table-responsive">
							<table class="table table-hover">
								<thead class="thead">
									<tr>
										<th>ID</th>
										<th>TITULAR</th>
										<th>SIAPE</th>
										<th>TELEFONE</th>
										<th>SALDO</th>
										<th>AÇÕES</th>
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
										<td>

						<form method="POST" action="view/add_transacao.php">
							<!-- Botão para Transação -->
              <input type="hidden" name="id" value="<?=$account['id']; ?>">
              
							<button class="btn btn-warning btn-xs">
								<i class="fa fa-dollar-sign"></i>
							</button>
							<!-- Fim - Botão -->

						</form>

										</td>
										<!-- Fim Formulario -->

									</tr>
									  <?php endforeach; ?>
								</tbody>
       <center>  
       <beto>
          <a class="btn btn-dark" href="formulario.php" target="_self">
          Cadastro Clientes</a>
       </beto>              
       <left>
          <a class="btn btn-primary" href="dia.php" target="_self">
          Balancete Diário</a>
       </left>
       <beto>
          <a class="btn btn-secondary" href="mes.php" target="_self">
          Balancete Mensal</a>
       </beto> 
       <left>
          <a class="btn btn-info" href="ano.php" target="_self">
          Balancete Anual</a>
       </left>
       <beto>
          <a class="btn btn-success" href="periodo.php" target="_self">
          Balancete Período</a>
       </beto>        
       <beto>
          <a class="btn btn-secondary" href="nomes.php" target="_self">
          Balancete Clientes</a>
       </beto>
                    
       <right><a class="btn btn-warning" href="http://www.seulugarnaweb.com.br/timoeventos" target="_self">
          Ir para o Site</a>
       </right>
       <beto>
          <a class="btn btn-secondary" href="inclusao.php" target="_self">
          Inclusão Clientes</a>
       </beto>       
           <a class="btn btn-danger" href="index.php" target="_self">
          Ir para o Menu</a>
       </center>
                                  
							</table>
						</div>

						<!-- Fim da Tabela -->
               
                </div>
            </div>


        </div>

        <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.12.9/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>


    </body>
</html>

<?php 

  } else {
  
      header("Location: login.php?access_denied");
  }

?>