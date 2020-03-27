<?php session_start(); 
require "../conexao.php";
$pdo = conectar();
if ($_SESSION['painel'] != 'admin') {  
   echo "<script language='javascript'>window.location='../index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
<meta charset="utf-8">

<title>Cursos_e_Disciplinas</title>
<!--<link href="css/cursos_e_disciplinas.css" rel="stylesheet" type="text/css" />-->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>

<body>
<?php require "topo.php"; ?>


<!--CADASTRAR O CURSO-->

<div class="container">
<?php if(@$_GET['pg'] == 'curso') { ?>
 <button class="btn btn-info">
 <a href="cursos_e_disciplinas.php?pg=curso&cadastra=sim">Cadastrar Curso
 </a>
 </button>
<?php 
    if(@$_GET['cadastra'] == 'sim') {
?> 

 <h4>Cadastrar Curso</h4>
<?php if(isset($_POST['cadastra'])) {

$tb_curso_sigla                = $_POST['tb_curso_sigla'];
$tb_curso_desc                 = $_POST['tb_curso_desc'];
$tb_curso_data_i               = $_POST['tb_curso_data_i'];
$tb_curso_f                    = $_POST['tb_curso_f'];
$tb_curso_coordenador          = $_POST['tb_curso_coordenador'];
$tb_curso_pg                   = $_POST['tb_curso_pg'];
$tb_curso_idtb_estabelecimento = $_POST['tb_curso_idtb_estabelecimento'];

$sql = $pdo->prepare("INSERT INTO tb_curso (tb_curso_sigla, tb_curso_desc, tb_curso_data_i, 
tb_curso_f, tb_curso_coordenador, tb_curso_pg, tb_curso_idtb_estabelecimento) 
VALUES ('$tb_curso_sigla', '$tb_curso_desc', '$tb_curso_data_i', '$tb_curso_f', 
        '$tb_curso_coordenador', '$tb_curso_pg', '$tb_curso_idtb_estabelecimento')
        ");
$sql->bindParam(":tb_curso_sigla", $tb_curso_sigla); 
$sql->bindParam(":tb_curso_desc", $tb_curso_desc);
$sql->bindParam(":tb_curso_data_i", $tb_curso_data_i);
$sql->bindParam(":tb_curso_f", $tb_curso_f);
$sql->bindParam(":tb_curso_coordenador", $tb_curso_coordenador); 
$sql->bindParam(":tb_curso_pg", $tb_curso_pg);      
$sql->bindParam(":tb_curso_idtb_estabelecimento", $tb_curso_idtb_estabelecimento);
$sql->execute();

	/*if ($sql == ''){*/
	if($sql->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, Curso já Cadastrado!');</script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=curso';</script>";
	}

}?> 

<form name="form-group" method="post" action="">
  <div class="table-responsive">
  <table class="table">
  <thead>
    <tr>
      <th>Sigla</th>
      <th>Curso</th>
      <th>Início</th>
      <th>Término</th>
    </tr> 
    </thead>
    </tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_curso_sigla"></td>
      <td><input class="form-control" type="text" name="tb_curso_desc"></td>
      <td><input class="form-control" type="date" name="tb_curso_data_i"></td>
      <td><input class="form-control" type="date" name="tb_curso_f"></td>
    </tr>
   </tbody>     
    <thead>       
      <th>Coordenador</th>
      <th>PG</th>
      <th>Curso/Estabelecimento de Ensino</th>
      <th></th>
    </tr>
    </thead>
    </tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_curso_coordenador"></td>
      <td><input class="form-control" type="text" name="tb_curso_pg"></td>
      <td><!--<input class="form-control" type="date" name="tb_curso_idtb_estabelecimento">-->
      <select class="form-control" name="tb_curso_idtb_estabelecimento" required autofocus>
      <option>Selecione</option>
      <?php
           $buscaestabelecimento = $pdo->query("SELECT idtb_ee, tb_ee_desc FROM tb_ee ORDER BY tb_ee_desc ASC");
           $busca = $buscaestabelecimento->fetchAll();
           foreach($busca as $in) {
      ?>
           <option value="<?php echo $in['tb_ee_desc']; ?>"><?php echo $in['tb_ee_desc']; ?>
           </option>
      <?php } ?>
      </select>      
      </td>
      <td><button class="btn btn-success" type="submit" name="cadastra">Cadastrar</button></td>      
    </tr>
   </tbody>

  </table>
  </div>
</form> 
 <br />
<?php } ?> 



<!--VISUALIZAR OS CURSOS CADASTRADOS-->

<?php
$sql_1 = $pdo->prepare("SELECT * FROM tb_curso");
$sql_1->execute();
if($sql_1->rowCount() == 0) { 
	 echo "<br><br>No momento não existe nenhum curso cadastrado!<br><br>";
 } else {
?>
 <h4>Cursos</h4>
   <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>Sigla</th>
        <th>Início</th>
        <th>Término</th>
        <th>Comandante</th>
        <th>Estab/Ensino</th>
      </tr>
    </thead>
      <?php 
      foreach ($sql_1 as $res_1) {
      ?>
      <tbody>
      <tr>
        <td><?php echo $curso = $res_1['tb_curso_sigla']; ?></td>
        <td><?php echo $res_1['tb_curso_data_i']; ?></td>
        <td><?php echo $res_1['tb_curso_f']; ?></td>
        <td><?php echo $res_1['tb_curso_coordenador']; ?></td>
        <td><?php echo $res_1['tb_curso_idtb_estabelecimento']; ?></td>
        <td>
        <a href="cursos_e_disciplinas.php?pg=curso&deleta=cur&id=<?php echo @$res_1['idtb_curso']; ?>">
        <img title="Excluir curso" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      </tbody>
      <?php } ?>
    </table>	 
    </div><!--table-responsive-->
<?php } ?>

<!--DELEÇÃO DOS CURSOS-->

<?php if(@$_GET['deleta'] == 'cur'){

$id = $_GET['id'];

$sql_3 = $pdo->prepare("DELETE FROM tb_curso WHERE idtb_curso = '$id'");
$sql_3->execute();

echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=curso';</script>";

}?>
</div><!-- box_curso -->
<?php  }?>

<!--CADASTRAR DISCIPLINAS-->

<?php if(@$_GET['pg'] == 'disciplina'){ ?>

<div id="box_disciplinas">
<center><button class="btn btn-warning"><a href="cursos_e_disciplinas.php?pg=disciplina&cadastra=sim">
Cadastrar Disciplina</a></button></center>
<?php if(@$_GET['cadastra'] == 'sim'){ ?>
<h5>Cadastrar Disciplina</h5>

<?php if(isset($_POST['cadastra'])){
	
$tb_disciplina_sigla = $_POST['tb_disciplina_sigla'];	
$tb_disciplina_desc = $_POST['tb_disciplina_desc'];	
$tb_disciplina_carga_horaria = $_POST['tb_disciplina_carga_horaria'];	
$tb_disciplina_tb_professor = $_POST['tb_disciplina_tb_professor'];	
$tb_disciplina_tb_curso = $_POST['tb_disciplina_tb_curso'];	

if($tb_disciplina_desc == ''){
	echo "<script language='javascript'>window.alert('Digite o nome da disciplina');</script>";
}else if($tb_disciplina_carga_horaria == ''){
	echo "<script language='javascript'>window.alert('Digite a carga horária');</script>";
}else{

$sql_cad_disc = $pdo->prepare("INSERT INTO tb_disciplina (tb_disciplina_sigla, tb_disciplina_desc, 
tb_disciplina_carga_horaria, tb_disciplina_tb_professor, tb_disciplina_tb_curso) 
VALUES ('$tb_disciplina_sigla', '$tb_disciplina_desc', '$tb_disciplina_carga_horaria', 
'$tb_disciplina_tb_professor', '$tb_disciplina_tb_curso')");
$sql_cad_disc->execute();

if($sql_cad_disc->rowCount() == 0) {
	echo "<script language='javascript'>window.alert('Ocorreu um erro!');</script>";
}else{
	echo "<script language='javascript'>window.alert('Disciplina cadastrada com sucesso!');window.location='cursos_e_disciplinas.php?pg=disciplina';</script>";
	echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=disciplina';</script>";
  }
 }
}?>

<form name="form-group" method="post" action="">
 <div class="table-responsive"> 
  <table class="table">
   <thead>
    <tr>
      <th>Sigla</th>
      <th>Nome</th>
      <th>Carga-Horária</th>
    </tr> 
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_disciplina_sigla"></td>
      <td><input class="form-control" type="text" name="tb_disciplina_desc"></td>
      <td><input class="form-control" type="text" name="tb_disciplina_carga_horaria"></td>
    </tr>  
    </tbody>     
    <thead> 
    <tr>
      <td>Professor</td>
      <td>Curso</td>
      <td></td>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td>
      <select class="form-control" name="tb_disciplina_tb_professor" required autofocus>
      <option>Selecione</option>
      <?php
           $buscaprofessor = $pdo->query("SELECT idtb_professor, tb_professor_nome FROM tb_professor ORDER BY tb_professor_nome ASC");
           $busca = $buscaprofessor->fetchAll();
           foreach($busca as $pr) {
      ?>
           <option value="<?php echo $pr['tb_professor_nome']; ?>">
           <?php echo $pr['tb_professor_nome']; ?>
           </option>
      <?php } ?>
      </select>
      </td>       
      <td>
      <select class="form-control" name="tb_disciplina_tb_curso" required autofocus>
      <option>Selecione</option>
      <?php
           $buscacurso = $pdo->query("SELECT idtb_curso, tb_curso_desc FROM tb_curso ORDER BY tb_curso_desc ASC");
           $busca = $buscacurso->fetchAll();
           foreach($busca as $cu) {
      ?>
           <option value="<?php echo $cu['tb_curso_desc']; ?>"><?php echo $cu['tb_curso_desc']; ?>
           </option>
      <?php } ?>
      </select>
      </td>
      <td><button class="btn btn-success" type="submit" name="cadastra" />Incluir</button></td>
    </tr>    
  </table>
  </div><!--table-responsive-->
</form>

<?php 
//die; 
       } 
?>


<!--MOSTRAR AS DISCIPLINAS NA TABELA-->

 <h4>Disciplinas</h4>
<?php

$sql_buscar_disc = $pdo->prepare("SELECT * FROM tb_disciplina");
$sql_buscar_disc->execute();
if($sql_buscar_disc->rowCount() == 0) {

	echo "<h5>No momento não existe nenhuma DISCIPLINA cadastrada!</h5><br><br>";
}else{
?> 
   <div class="table-responsive">
    <table class="table">
      <tr>
        <td><strong>Sigla:</strong></td>
        <td><strong>Disciplina:</strong></td>
        <td><strong>Carga-Horária:</strong></td>
        <td><strong>Professor:</strong></td>
        <td><strong>Curso:</strong></td>
      </tr>
      <?php 
      //while($res_busca = mysqli_fetch_assoc($result_buscar_disc)){
      foreach ($sql_buscar_disc as $res_busca) { 
      ?>
      <tr>
        <td><?php echo $res_busca['tb_disciplina_sigla']; ?></td>
        <td><?php echo $res_busca['tb_disciplina_desc']; ?></td>
        <td><?php echo $res_busca['tb_disciplina_carga_horaria']; ?></td>
        <td><?php echo $res_busca['tb_disciplina_tb_professor']; ?></td>
        <td><?php echo $res_busca['tb_disciplina_tb_curso']; ?></td>
        <td><a class="a" href="cursos_e_disciplinas.php?pg=disciplina&deleta=sim&id=<?php echo $res_busca['idtb_disciplina']; ?>">
        <img title="Excluir Disciplina" src="img/deleta.jpg" width="18" height="18" border="0">
        </a>
        </td>
      </tr>
      <?php } ?>
    </table> 
   </div><!--table-responsive--> 
<?php } ?>


<!--EXCLUSÃO DAS DISCIPLINAS-->

<?php if(@$_GET['deleta'] == 'sim'){

$id = $_GET['id'];

      $sql_delete_disc = $pdo->prepare("DELETE FROM tb_disciplina WHERE idtb_disciplina = '$id'");
      $sql_delete_disc->execute();

echo "<script language='javascript'>window.location='cursos_e_disciplinas.php?pg=disciplina';</script>";

}?> 
<!--</div>--><!-- box_disciplinas -->
<?php } ?>


<!--------------------------------------------MOSTRAR OS CURSOS E AS DISCIPLINAS-------------->


<?php if(@$_GET['pg'] == 'cursoedisciplinas'){ ?>
<!--<div id="box_curso_e_disciplinas">-->
<center><h5><b>Corpo de Bombeiros Militar do DF</b><br><b>Cursos e Disciplinas</b></h5></center>
<?php
$sql_cur = $pdo->prepare("SELECT * FROM tb_curso ORDER BY tb_curso_desc ASC");
$sql_cur->execute();
if($sql_cur->rowCount() == 0) {
	echo "Não existe nenhum CURSO cadastrado no momento!";
} else {
?>
<div class="table-responsive">
<table class="table">
<?php /*while($rs_ced = mysqli_fetch_assoc($result_ced)){*/ 
        foreach ($sql_cur as $rs_cu) {
?>
  <tr>
    <td>Identificador_Curso : <?php echo $Id = $rs_cu['idtb_curso']; ?><br>Estabelecimento de Ensino : <?php echo $curso = $rs_cu['tb_curso_idtb_estabelecimento']; ?>
    <br>Curso: <?php echo $curso = $rs_cu['tb_curso_desc']; ?></td>
  </tr>
  <tr>
    <td>
    <textarea disabled="disabled" name="textarea" class="md-textarea form-control" rows="4">
    <?php
     /*$sql_ced_prof = "SELECT * FROM disciplinas WHERE curso = '$curso'";
	   $result_ced_prof = mysqli_query($conexao,  $sql_ced_prof);*/
     $sql_dis = $pdo->prepare("SELECT * FROM tb_disciplina WHERE tb_disciplina_tb_curso = '$curso'");
     $sql_dis->execute();
	 	 
     foreach ($sql_dis as $rs_di) {
			$professor = $rs_di['tb_disciplina_tb_professor'];
      echo 'Instrutor: '.$rs_di['tb_disciplina_tb_professor']
      .' --- Disciplina: '.$rs_di['tb_disciplina_desc'].' --- Carga-Horária: '.
      $rs_di['tb_disciplina_carga_horaria'];
      
	/*$sql_ced_cod = "SELECT * FROM professores WHERE code = '$professor'";
	$result_ced_cod = mysqli_query($conexao,  $sql_ced_cod);*/
    /*$sql_ced_cod = $pdo->prepare("SELECT * FROM tb_professor WHERE tb_professor_nome = '$professor'
    AND tb_disciplina_tb_curso = '$curso'");
    $sql_ced_cod->execute();*/
		//while($rs_ced3 = mysqli_fetch_assoc($result_ced_cod)){
      //foreach ($sql_ced_cod as $rs_ced3) {
			/*echo $rs_ced3['tb_professor_nome'];
			echo " - ";
			echo $rs_ced3['idtb_professor']; */
			//}  ?>
		
		<?php }
		
	?>
    </textarea>
    </td>
  </tr>
<?php } ?>
</table>
</div><!--table-responsive-->	
<?php } ?>

<!--</div>--><!-- box_curso_e_disciplinas -->
<?php } ?>
</div>
<?php require "rodape.php"; ?>
</body>
</html>