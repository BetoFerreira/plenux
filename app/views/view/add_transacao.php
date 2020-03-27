<?php 
session_start();
if(isset($_SESSION['login'])) {
include_once('../model/Conexao.class.php');
include_once('../model/Contas.class.php');
$contas = new Contas();
$id = $_POST['id']; //id invisível do index hidden.
?>
		<!DOCTYPE html>
    <html lang="pt-br">
    <head>
		<meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
        <!-- Favicon -->
    <link rel="shortcut icon" href="../assets/img/icon.jpg">        
        <title>Caixa Eletrônico - Informações/Transações</title>
        
		<link rel="stylesheet" type="text/css" href="../assets/css/bootstrap/bootstrap.min.css">
		<!-- CSS da INDEX -->    
    <link rel="stylesheet" href="../assets/css/index.css">
        
		<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
		
		<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous"> 
<!-- Fim - Arquivos -->
     </head>
     <body>
<!-- Iniciando Tabela -->
<div class="content p-1">
                <div class="list-group-item" style="background-color: #eaeef3">
                    
                   <div class="mr-auto p-2">
                   <h2 class="text-center"> TIMO EVENTOS 
                        <i class="fa fa-money-check-alt"></i>
                   </h2><br>
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
										<th style="text-align: center;">
										    SALDO
										</th>
										<th colspan="2" style="text-align: center;">
										    AÇÕES
										</th>
									</tr>
								</thead>
								<tbody>
									  <?php foreach($contas->getInfo($id) as $account_info): ?>
									<tr class="tr">
										<td><?php echo $account_info['id']; ?></td>
										<td><?php echo $account_info['titular']; ?></td>
										<td><?php echo $account_info['cargo']; ?></td>
										<td><?php echo $account_info['telefone']; ?></td>
										<td style="text-align: center;">
											  <?php echo $account_info['saldo']; ?>
										</td>
										<!-- Botões de Ações -->
										<td style="text-align: center;">
							<button class="btn btn-primary btn-lg" onclick="window.print()">
								<i class="fa fa-print"></i>
							</button>
							<button class="btn btn-warning btn-lg form_jquery">
								<i class="fa fa-dollar-sign"></i>
							</button>
										</td>
										<!-- Fim - Form de Transacao -->
									</tr>
                  <?php endforeach; ?>
								</tbody>
							</table><hr><br><br>
							<!-- Fim - Tabela -->
							<!-- Formulario JQuery -->
		<form method="POST" action="../controller/transactionController.php" style="font-weight: bold; font-style: italic;" class="formulario">
								<h4 class="text-center">
									<strong>
										Efetue a Transação <i class="fa fa-handshake"></i>
									</strong>
								</h4><br>

								<div class="container">
									<div class="form-row">
										
										<div class="col-md-4" style="clear: both;"></div>

										<div class="col-md-4">
											Tipo de Transação: <br>
											<select name="tipo" class="form-control"required>
												<option value="Compras">Compras</option>
												<option value="Pagamentos">Pagamentos</option>
											</select>
										</div>

										<div class="col-md-4" style="clear: both;"></div>


										<div class="col-md-4" style="clear: both;"></div>

										<div class="col-md-4">
											<br>Valor:
											<input type="text" name="valor" class="form-control" pattern="[0-9.,]{1,}" value="0,0" required>
										</div>

										<div class="col-md-4" style="clear: both;"></div>

										<div class="col-md-4" style="clear: both;"></div>

										<div class="col-md-4">
											<br><button class="btn btn-primary btn-block">
												Efetuar Transação <i class="fa fa-handshake"></i>
											</button>
										</div>

										<div class="col-md-4" style="clear: both;"></div>

									</div>
								</div>

							</form><br><hr>

							<!-- Fim - Formulario JQuery -->

							<!-- Tabela de Historico -->
							
							<h3 class="text-center">
								Movimentação/Extrato <i class="fa fa-folder-open"></i>
							</h3><br>

							<div class="table-responsive">
								<table class="table table-hover">
									<thead class="thead" style="text-align: center;">
										<tr>
											<th>Data da Transação</th>
											<th>Valor da Transação</th>
											<th>Tipo da Transação</th>
										</tr>
									</thead>
									<tbody style="text-align: center;">
                  <?php foreach($contas->listHistoric($id) as $historic): ?>
										<tr>
											<td>
                      <?php echo date("d/m/Y h:m:s", strtotime($historic['data_operacao'])); ?>
                      </td>
                      <?php if ($historic['tipo'] == "Compras"): ?>
											<td style="color: green;">
                      R$ <?php echo $historic['valor']; ?>
											</td>
                      <?php else: ?>
											<td style="color: red;">
                      - R$ <?php echo $historic['valor']; ?>
											</td> 
                      <?php endif; ?>                     
											<td>
                      <?php echo $historic['tipo']; ?>
                      </td>
										</tr>
                    <?php endforeach; ?>
									</tbody>
								</table>
							</div><!--table-responsive-->

						</div><!--table-responsive-->
      <center><a href="../index.php"><button class="btn btn-success">Voltar</button></a></center>
						<!-- Fim da Tabela -->
  
            </div><!--list-group-item-->
            </div><!--content p-1 -->
            
        <?php } else {
              header("Location: ../index.php?transaction_denied"); 
              }
        ?> 

      </body>
      
      <script type="text/javascript" src="../assets/js/jquery-3.3.1.min.js"></script>
			<script type="text/javascript" src="../assets/js/script.js"></script>      
      
      </html>