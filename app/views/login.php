<!DOCTYPE html>
<html>
<head>
	<title>Caixa Eletrônico - Login</title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1" />
	<!-- Favicon -->
    <link rel="shortcut icon" href="assets/img/icon.jpg"> 
	<!-- Bootstrap 4 -->
	<link rel="stylesheet" type="text/css" href="assets/css/bootstrap/bootstrap.min.css">
	<!-- CSS -->
	<link rel="stylesheet" type="text/css" href="assets/css/style.css">
	<!-- GoogleFonts - OpenSans -->
	<link href="https://fonts.googleapis.com/css?family=Open+Sans" rel="stylesheet">
	<!-- Fontawesome 5.0-->
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.1.0/css/all.css" integrity="sha384-lKuwvrZot6UHsBSfcMvOkWwlCMgc0TaWr+30HWe3a4ltaBwTZhyTEggF5tJv8tbt" crossorigin="anonymous">
</head>
<body>

<!-- Init of Bootstrap -->

<div class="container">
	
	<div class="col-md-8 col-md-offset-2">
		<h1> Sistemas de Comandas - Login</h1>

		<!-- Form for Login -->
			<form method="POST" class="log" action="app/views/controller/loginController.php">

				<br><br><p>Entre no seu Login:</p><br>

				<!-- Agência -->
				<input type="text" name="titular" class="form-control field" 
        placeholder="titular" value="titular" autofocus required><br>

				<!-- Conta -->
				<input type="text" name="cargo" class="form-control field" 
        placeholder="cargo" value="cargo" required><br>

				<!-- Senha -->
				<input type="password" name="senha" class="form-control field" 
        placeholder="Senha" value="Senha" required><br>

				<!-- Botão para fazer Login -->
				<center><button class="btn btn-default" type="submit">
					 <i class="fa fa-lock"></i> Entrar
				</button></center><br><br>
        
				<center>
           <a  href="http://www.seulugarnaweb.com.br/timoeventos" target="_self">Voltar ao Site</a>
				</center><br><br>        
        
			</form>


			<!--<center><p id="credits">&copy; TIMO EVENTOS <?php echo date("Y"); ?> - Todos os direitos Reservados</p>
      </center>-->
		

	</div>

</div>

</body>
</html>