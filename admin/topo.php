<?php 
@session_start();
$painel_atual = "admin"; 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">
<?php require "../config.php"; ?>
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
<!--<link href="css/topo.css" rel="stylesheet" type="text/css" />
<script language="javascript" src="../js/jquery-1.7.2.min.js"></script>
<script src="../js/lightbox.js"></script>
<link href="../css/lightbox.css" rel="stylesheet" />


<link rel="stylesheet" href="../jquery.superbox.css" type="text/css" media="all" />
	<script type="text/javascript" src="http://ajax.googleapis.com/ajax/libs/jquery/1.3.2/jquery.min.js"></script>

	<script type="text/javascript" src="../jquery.superbox-min.js"></script>
	<script type="text/javascript">

		$(function(){
			$.superbox.settings = {
				closeTxt: "Fechar",
				loadTxt: "Carregando...",
				nextTxt: "Next",
				prevTxt: "Previous"
			};
			$.superbox();
		});
	</script>-->
   
</head>

<body>
<!--<div id="box_topo">
 <!--<div class="" id="logo">
  <!--<img src="../img/logo.png" width="250"/>-->
  <!--<img src="../img/brasao.jpeg" class="img-fluid" /><br>
            <label>Corpo de Bombeiros Militar do DF<br>
            Departamento Ensino, Pesquisa, Ciênca e Tecnologia<br>
            Diretoria de Ensino<br>
            </label>  
 </div>--><!-- logo -->
<!--<div id="campo_busca">
  <form name="" method="post" action="" enctype="multipart/form-data">
   <input type="text" name="key" /><input class="input" type="submit" name="search" value="" />
   </form>
</div>--><!-- campo_busca -->
 
 <!--<div id="mostra_login">
  <strong>Bem-Vindo(a) : <?php echo $_SESSION['nome']; ?></strong> 
 </div><!-- mostra_login -->
<!--</div>--><!-- box_topo -->
<!--<div id="box_menu">
 
 <div id="menu_topo">-->
   
 <nav class="navbar navbar-default">
  <div class="container">
    <div class="navbar-header">
      <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" 
              data-target="#barra-navegacao">
        <span class="sr-only">Alternar Menu</span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </button>
      <a class="navbar-brand" href="index.php">
      <img src="../assets/img/plenux-img-logo-sup.png" height="65" width="183"  alt="">
      </a>
    </div>
    <div class="collapse navbar-collapse" id="barra-navegacao" style="margin-top: 30px;">
   <ul class="nav navbar-nav navbar-right">
   <li><a href="index.php"><h5><b>HOME</b></h5></a></li>
       <li class="dropdown">  
          <a href="#" class="dropdown-toggle" data-toggle="dropdown">
          <h5><b>ESTABELECIMENTOS</b></h5><span class="caret"></span>
          </a>
        <ul class="dropdown-menu">
         <li><a href="instituicao_e_estabelecimento.php?pg=instituicao">Instituição</a></li>
         <li><a href="instituicao_e_estabelecimento.php?pg=estabelecimento">Estabelecimentos de Ensino</a></li>
        </ul>   
       </li>
       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <h5><b>CURSOS E DISCIPLINAS</b></h5><span class="caret"></span>
       </a>
        <ul class="dropdown-menu">
         <li><a href="cursos_e_disciplinas.php?pg=curso">Curso</a></li>
         <li><a href="cursos_e_disciplinas.php?pg=disciplina">Disciplina</a></li>
         <li><a href="cursos_e_disciplinas.php?pg=cursoedisciplinas">Cursos & Disciplinas</a></li>
        </ul>
       </li>
   <!--<li><a href="professores.php?pg=professor"><h5><b>INSTRUTORES</b></h5></a></li>   
   <li><a href="estudantes.php?pg=aluno"><h5><b>ALUNOS</b></h5></a></li>-->
       <li><a href="usuarios1.php?pg=usuario"><h5><b>USUÁRIOS</b></h5></a></li>
       <li class="dropdown">
       <a href="#" class="dropdown-toggle" data-toggle="dropdown">
       <h5><b>RELATÓRIOS</b></h5><span class="caret"></span>
       </a>
        <ul class="dropdown-menu">
         <li><a href="">Alunos</a></li>
         <li><a href="">Professores</a></li>
         <li><a href="">Cursos e Especificidades</a></li>
        </ul>
       </li>
   <li>
   <!--<a href="../config.php?pg=sair"><img src="img/exit-30.png"></a>--> 
   <a href="../logout.php?pg=sair"><h5><b>SAIR</b></h5>
   <!--<img src="img/exit-30.png">-->
   </a>
   </li>
   </ul><!--nav navbar-nav navbar-right-->    
    </div>
   </div><!--container-->  
 </nav> 
 
 <div class="container">
  <strong>Bem-Vindo(a) : <?php echo $_SESSION['nome']; ?> <?php echo " - ".$painel_atual; ?></strong> 
 </div>
 
 <!--</div><!-- menu_topo -->
<!--</div><!-- box_menu -->
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="../bootstrap/js/bootstrap.min.js"></script>
</body>
</html>
