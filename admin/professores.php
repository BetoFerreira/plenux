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
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Adminstração</title>
<!--<link href="css/instituicao_e_estabelecimento.css" rel="stylesheet" type="text/css" /> -->
<link href="../bootstrap/css/bootstrap.min.css" rel="stylesheet">
</head>
<body>
<?php require "topo.php"; ?>

<!--CADASTRAR PROFESSORES-->
<div class="container">

<?php if(@$_GET['pg'] == 'professor'){ ?>
 <br><center>
 <button class="btn btn-warning">
     <a href="professores.php?pg=professor&cadastra=sim">Cadastrar</a>
 </button><br><h5>INSTRUTOR / PROFESSOR</h5></center>
<?php 
    if(@$_GET['cadastra'] == 'sim') {
?> 
 
<?php if(isset($_POST['cadastra'])) {

$tb_professor_id_funcional        = $_POST['tb_professor_id_funcional'];
$tb_professor_nome       = $_POST['tb_professor_nome'];
$tb_professor_graduacao        = $_POST['tb_professor_graduacao'];
$tb_professor_cep        = $_POST['tb_professor_cep'];
$tb_professor_endereco        = $_POST['tb_professor_endereco'];
$tb_professor_nr        = $_POST['tb_professor_nr'];
$tb_professor_complemento        = $_POST['tb_professor_complemento'];
$tb_professor_bairro        = $_POST['tb_professor_bairro'];
$tb_professor_cidade        = $_POST['tb_professor_cidade'];
$tb_professor_uf        = $_POST['tb_professor_uf'];
$tb_professor_email        = $_POST['tb_professor_email'];
$tb_professor_ddd_fixo        = $_POST['tb_professor_ddd_fixo'];
$tb_professor_tel_fixo        = $_POST['tb_professor_tel_fixo'];
$tb_professor_ddd_cel        = $_POST['tb_professor_ddd_cel'];
$tb_professor_fone_cel        = $_POST['tb_professor_fone_cel'];
$tb_professor_obs        = $_POST['tb_professor_obs'];
$tb_curso_idtb_cursos       = $_POST['tb_curso_idtb_cursos'];
$tb_curso_tb_ee_idtb_ee        = $_POST['tb_curso_tb_ee_idtb_ee'];
$tb_turma_idtb_turma        = $_POST['tb_turma_idtb_turma'];
$tb_turma_tb_curso_idtb_cursos        = $_POST['tb_turma_tb_curso_idtb_cursos'];
$tb_turma_tb_curso_tb_ee_idtb_ee        = $_POST['tb_turma_tb_curso_tb_ee_idtb_ee'];

$sql = $pdo->prepare("INSERT INTO tb_professor (tb_professor_id_funcional, tb_professor_nome, 
tb_professor_graduacao, tb_professor_cep, tb_professor_endereco, tb_professor_nr, tb_professor_complemento, 
tb_professor_bairro, tb_professor_cidade, tb_professor_uf, tb_professor_email, tb_professor_ddd_fixo, 
tb_professor_tel_fixo, tb_professor_ddd_cel, tb_professor_fone_cel, tb_professor_obs, tb_curso_idtb_cursos, tb_curso_tb_ee_idtb_ee, tb_turma_idtb_turma,
tb_turma_tb_curso_idtb_cursos, tb_turma_tb_curso_tb_ee_idtb_ee) 
VALUES ('$tb_professor_id_funcional', '$tb_professor_nome', '$tb_professor_graduacao', '$tb_professor_cep', 
'$tb_professor_endereco', '$tb_professor_nr', '$tb_professor_complemento', '$tb_professor_bairro', 
'$tb_professor_cidade', '$tb_professor_uf', '$tb_professor_email', '$tb_professor_ddd_fixo', 
'$tb_professor_tel_fixo', '$tb_professor_ddd_cel', '$tb_professor_fone_cel', '$tb_professor_obs', 
'$tb_curso_idtb_cursos', '$tb_curso_tb_ee_idtb_ee', '$tb_turma_idtb_turma', '$tb_turma_tb_curso_idtb_cursos', 
'$tb_turma_tb_curso_tb_ee_idtb_ee')
 ");

$sql->bindParam(":tb_professor_id_funcional", $tb_professor_id_funcional);
$sql->bindParam(":tb_professor_nome", $tb_professor_nome);
$sql->bindParam(":tb_professor_graduacao", $tb_professor_graduacao);
$sql->bindParam(":tb_professor_cep", $tb_professor_cep);
$sql->bindParam(":tb_professor_endereco", $tb_professor_endereco);
$sql->bindParam(":tb_professor_nr", $tb_professor_nr);
$sql->bindParam(":tb_professor_complemento", $tb_professor_complemento);
$sql->bindParam(":tb_professor_bairro", $tb_professor_bairro);
$sql->bindParam(":tb_professor_cidade", $tb_professor_cidade);
$sql->bindParam(":tb_professor_uf", $tb_professor_uf);
$sql->bindParam(":tb_professor_email", $tb_professor_email);
$sql->bindParam(":tb_professor_ddd_fixo", $tb_professor_ddd_fixo);
$sql->bindParam(":tb_professor_tel_fixo", $tb_professor_tel_fixo);
$sql->bindParam(":tb_professor_ddd_cel", $tb_professor_ddd_cel);
$sql->bindParam(":tb_professor_fone_cel", $tb_professor_fone_cel);
$sql->bindParam(":tb_professor_obs", $tb_professor_obs);
$sql->bindParam(":tb_curso_idtb_cursos", $tb_curso_idtb_cursos);
$sql->bindParam(":tb_curso_tb_ee_idtb_ee", $tb_curso_tb_ee_idtb_ee);
$sql->bindParam(":tb_turma_idtb_turma", $tb_turma_idtb_turma);
$sql->bindParam(":tb_turma_tb_curso_idtb_cursos", $tb_turma_tb_curso_idtb_cursos);
$sql->bindParam(":tb_turma_tb_curso_tb_ee_idtb_ee", $tb_turma_tb_curso_tb_ee_idtb_ee);

$sql->execute();

	if($sql->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, PROFESSOR já Cadastrado!');</script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='estudantes.php?pg=aluno';</script>";
	}

}?> 

<form name="form-group" method="post" action="">
<div class="table-responsive">
  <table class="table">
    <thead>
    <tr>
      <th>CPF</th>
      <th>NOME</th>
      <th>GRADUAÇÃO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_professor_id_funcional"></td>
      <td><input class="form-control" type="text" name="tb_professor_nome"></td>
      <td>
         <!--<input class="form-control" type="text" name="tb_aluno_graduacao">-->
          <select class="selectpicker form-control" name="tb_professor_graduacao">
              <option>SELECIONE</option>
              <option> </option>          
            <optgroup label="OFICIAIS">
              <option>CORONEL</option>
              <option>TENENTE CORONEL</option>
              <option>MAJOR</option>
              <option>CAPITÃO</option>
              <option>1º TENENTE</option>
              <option>2º TENENTE</option>
              <option>ASPIRANTE</option>
              <option>CADETE 2º ANO</option>
              <option>CADETE 1º ANO</option>                            
            </optgroup>
            <optgroup label="PRAÇAS">
              <option>SUBTENENTE</option>
              <option>1º SARGENTO</option>
              <option>2º SARGENTO</option>
              <option>3º SARGENTO</option>
              <option>CABO</option>
              <option>SOLDADO</option>
              <option>SOLDADO/2</option>              
            </optgroup>
          </select>
      </td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>CEP</th>
      <th>Endereço</th>
      <th>NR</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="tb_professor_cep"></td>
      <td><input class="form-control" type="text" name="tb_professor_endereco"></td>
      <td><input class="form-control" type="text" name="tb_professor_nr"></td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>Complemento</th>
      <th>Bairro</th>
      <th>Cidade</th>
    </tr>
    </thead>
    <tbody>    
    <tr>
      <td><input class="form-control" type="text" name="tb_professor_complemento"></td>
      <td><input class="form-control" type="text" name="tb_professor_bairro"></td>
      <td>
         <!--<input class="form-control" type="text" name="tb_aluno_cidade">-->
          <select class="selectpicker form-control" name="tb_professor_cidade">
            <option>SELECIONE</option>
            <option> </option>          
            <option>PLANO PILOTO</option>
            <option>GAMA</option>
            <option>TAGUATINGA</option>
            <option>BRAZLÂNDIA</option>
            <option>SOBRADINHO</option>
            <option>PLANALTINA</option>
            <option>PARANOÁ</option>
            <option>NÚCLEO BANDEIRANTE</option>
            <option>CEILÂNDIA</option>
            <option>GUARÁ</option>
            <option>CRUZEIRO</option>
            <option>SAMAMBAIA</option>
            <option>SANTA MARIA</option>
            <option>SÃO SEBASTIÃO</option>
            <option>RECANTO DAS EMAS</option>
            <option>LAGO SUL</option>
            <option>RIACHO FUNDO</option>
            <option>LAGO NORTE</option>
            <option>CANDANGOLÂNDIA</option>
            <option>ÁGUAS CLARAS</option>
            <option>RIACHO FUNDO II</option>
            <option>SUDOESTE/OCTOGONAL</option>
            <option>VARJÃO</option>
            <option>PARK WAY</option>
            <option>SCIA</option>
            <option>VICENTE PIRES</option>
            <option>FERCAL</option>
            <option>SOL NASCENTE/PÔR DO SOL</option>  
            <option>ARNIQUEIRA</option>                                  
          </select>         
      </td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>UF</th>
      <th>E-mail</th>
      <th>DDD Fixo</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td>
         <!--<input class="form-control" type="text" name="tb_aluno_uf">-->
          <select class="selectpicker form-control" name="tb_professor_uf">
            <option>SELECIONE</option>
            <option> </option>          
            <option>AL</option>
            <option>AC</option>
            <option>AM</option>
            <option>AP</option>
            <option>BA</option>
            <option>DF</option>
            <option>SP</option>
            <option>RJ</option>
            <option>SC</option>
            <option>ES</option>
            <option>PB</option>
            <option>PE</option>
            <option>PR</option>
            <option>RO</option>
            <option>RR</option>
            <option>RS</option>
            <option>RN</option>
            <option>AL</option>
            <option>DF</option>
            <option>SP</option>
            <option>RJ</option>
            <option>MG</option>
            <option>MS</option>
            <option>MT</option>
            <option>PA</option>
            <option>PI</option>
            <option>MA</option>
            <option>CE</option>                                    
          </select>
      </td>
      <td><input class="form-control" type="email" name="tb_professor_email"></td>
      <td><input class="form-control" type="text" name="tb_professor_ddd_fixo"></td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>Tel Fixo</th>
      <th>DDD Cel</th>
      <th>Fone Cel</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="tb_professor_tel_fixo"></td>
      <td><input class="form-control" type="text" name="tb_professor_ddd_cel"></td>
      <td><input class="form-control" type="text" name="tb_professor_fone_cel"></td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>Observação</th>
      <th>Professor - Curso</th>
      <th>Professor - Estabelecimento</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td>
       <textarea class="form-control" name="tb_professor_obs" placeholder="Digite sua observação" required>
      </textarea>
      </td>
      <td><input class="form-control" type="text" name="tb_curso_idtb_cursos"></td>
      <td><input class="form-control" type="text" name="tb_curso_tb_ee_idtb_ee"></td>
    </tbody>
    <thead>
       <tr>
         <th>Professor - Turma</th>
         <th>Turma - Curso</th>
         <th>turma - Curso - Estab</th>
    </thead> 
    <tbody> 
    <tr>
      <td><input class="form-control" type="text" name="tb_turma_idtb_turma"></td>
      <td><input class="form-control" type="text" name="tb_turma_tb_curso_idtb_cursos"></td>
      <td><input class="form-control" type="text" name="tb_turma_tb_curso_tb_ee_idtb_ee"></td>     
    </tr> 
    </tbody> 
    <tbody>    
    <tr>
          <td></td>
          <td><button class="btn btn-primary" type="submit" name="cadastra" id="button">Incluir</button></td>
          <td></td>
     </tr>     
     <tbody>      
  </table>
  </div>
</form> 
 <br />
<?php } ?> 

<!--VISUALIZAR OS PROFESSORES CADASTRADOS -->

<?php
$sql_1 = $pdo->prepare("SELECT * FROM tb_professor");
$sql_1->execute();
if($sql_1->rowCount() <= 0) { 
	 echo "<br><br>No momento não existe nenhum Professor cadastrado!<br><br>";
 }else{
?>
<br /><br />
  <div class="table-responsive">
    <table class="table">
    <h4><u><b>PROFESSORES</b></u></h4>
     <thead>
      <tr>
        <th>Id_Funcional</th>
        <th><strong>Nome</strong></th>
        <th><strong>Graduação</strong></th>
        <th><strong>AÇÕES</strong></th>
      </tr>
      </thead>
      <?php 
      foreach ($sql_1 as $res_1) {
      ?>
      <tbody>
      <tr>
        <td><?php echo $instituicao = $res_1['tb_professor_id_funcional']; ?></td>
        <td><?php echo $res_1['tb_professor_nome']; ?></td> 
        <td><?php echo $res_1['tb_professor_graduacao']; ?></td> 
        <td><a href="professores.php?pg=professor&deleta=pro&id=<?php echo @$res_1['idtb_professor']; ?>">
        <img title="Excluir instituicao" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      </tbody>
      <?php }  ?>
    </table>	 
    </div><!--table-responsive-->
<?php } ?> 
<br />


<!--DELEÇÃO DAS PROFESSORES-->  

<?php if(@$_GET['deleta'] == 'pro'){

$id = $_GET['id'];

$sql_3 = $pdo->prepare("DELETE FROM tb_professor WHERE idtb_professor = '$id'");
$sql_3->execute();

echo "<script language='javascript'>window.location='professores.php?pg=professor';</script>";

}?>
</div><!-- container -->
<?php  }?>
