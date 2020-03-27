<?php 
  include_once("app/views/conexao.php"); 
  $pdo = conectar();
?>
<!doctype html>
<html>
<head>
	<title>TIMO EVENTOS - Blast</title>
	<meta charset="utf-8">
	<link rel="stylesheet" href="app/css/bootstrap.min.css">
	<link rel="stylesheet" href="app/css/bootstrap-theme.min.css">
	<link rel="stylesheet" href="app/css/style.css">
	<link rel="shortcut icon" href="app/img/favicon.png" sizes="32x32" type="image/png">
	<meta name="viewport" content="width=device-width, initial-scale=1">

</head>

<body>
<div id="main">
	<div class="container">
		<div class="row">
			<!--<div class="col-md-5 col-xs-12"></div>-->
			<!--<div class="col-md-7 col-xs-12">-->
				<h1 class="text-center">Casamentos!</h1>
				<!--<p>Em desenvolvimento!</p>-->
<?php 
       $select = @$pdo->prepare("SELECT id, titulo, conteudo, data, autor, foto FROM uh46v_postagens");
       $select->execute(); 
       //var_dump($select)." <br>";  //die();
       while  ($row = $select->fetch()) {
       @$ids           = $row['id'];
       @$titulo        = $row['titulo'];
       @$conteudo      = $row['conteudo'];
       @$data          = $row['data'];
       @$autor         = $row['autor'];
       @$foto          = $row['foto'];
?> 
  <div class="container">
    <div class="row">
      <div class="col-md-3 col-sm-6">
        <div class="card-deck text-white bg-red text-align">
          <div class="card">      
            <h5 class="card-title text-dark text-center"><?php echo @$data; ?></h5>
            <a href="#"><img class="img-fluid img-thumbnail" src="app/img/<?php echo $foto; ?>" 
            alt="Imagem acervo" title="Clique aqui para saber mais"></a>
            <p class="card-text text-center"><?php echo @$titulo; ?>&nbsp;/ Autor: &nbsp;<?php echo @$autor; ?></p>
            <!--<center><a href="#" class="btn btn-primary">Clique e veja</a></center>-->
          </div><!--card-->  
       </div><!--card-deck text-white bg-red text-align-->
      </div><!--col-md-3 col-sm-6-->
  <?php 
     }  
  ?>              

			</div><!--row-->
		</div><!--container-->
	<!--</div>--><!--col-md-7 col-xs-12-->
  <br><center><p><a class="btn btn-primary btn-lg" href="javascript:history.back();" role="button">
      Voltar</a></p></center>
</div><!--row-->
</div><!--container-->
</div><!--main-->
<!--<div id="middle">
	<div class="container">

		<div class="row"> 
			<div class="col-sm-6 col-md-4"> 
 
			</div> 

			<div class="col-sm-6 col-md-4"> 

			</div> 
			
			<div class="col-sm-6 col-md-4"> 

			</div> 
		</div>
	</div>
</div>-->

</body>
</html>