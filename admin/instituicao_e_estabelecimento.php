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


<!--CADASTRAR A INSTITUIÇÃO-->

<!--<div id="caixa_preta">
</div>--><!-- caixa_preta -->
<div class="container">

<?php if(@$_GET['pg'] == 'instituicao'){ ?>
<div id="box_curso">
<br /><br />
 <!--<a class="a2" href="instituicao_e_estabelecimento.php?pg=instituicao&cadastra=sim">Cadastrar</a>-->
 <center><button class="btn btn-info"><a href="instituicao_e_estabelecimento.php?pg=instituicao&cadastra=sim">
 Cadastrar</a></button></center>
<?php 
    if(@$_GET['cadastra'] == 'sim') {
?> 
 <br /><br />
 <h4>INSTITUIÇÃO</h4>
<?php if(isset($_POST['cadastra'])) {

$tb_instituicao_cnpj        = $_POST['tb_instituicao_cnpj'];
$tb_instituicao_desc        = $_POST['tb_instituicao_desc'];
$tb_instituicao_cep         = $_POST['tb_instituicao_cep'];
$tb_instituicao_endereco    = $_POST['tb_instituicao_endereco'];
$tb_instituicao_bairro      = $_POST['tb_instituicao_bairro'];
$tb_instituicao_cidade      = $_POST['tb_instituicao_cidade'];
$tb_instituicao_uf          = $_POST['tb_instituicao_uf'];
$tb_instituicao_email       = $_POST['tb_instituicao_email'];
$tb_instituicao_ddd_fixo    = $_POST['tb_instituicao_ddd_fixo'];
$tb_instituicao_fone_fixo   = $_POST['tb_instituicao_fone_fixo'];
$tb_instituicao_ddd_celular = $_POST['tb_instituicao_ddd_celular'];
$tb_instituicao_celular     = $_POST['tb_instituicao_celular'];

$sql = $pdo->prepare("INSERT INTO tb_instituicao (tb_instituicao_cnpj, tb_instituicao_desc, 
tb_instituicao_cep, tb_instituicao_endereco, tb_instituicao_bairro, tb_instituicao_cidade,
tb_instituicao_uf, tb_instituicao_email, tb_instituicao_ddd_fixo, tb_instituicao_fone_fixo,
tb_instituicao_ddd_celular, tb_instituicao_celular) 
VALUES ('$tb_instituicao_cnpj', '$tb_instituicao_desc', '$tb_instituicao_cep', '$tb_instituicao_endereco',
'$tb_instituicao_bairro', '$tb_instituicao_cidade', '$tb_instituicao_uf', '$tb_instituicao_email', 
'$tb_instituicao_ddd_fixo', '$tb_instituicao_fone_fixo', '$tb_instituicao_ddd_celular', 
'$tb_instituicao_celular')");

$sql->bindParam(":tb_instituicao_cnpj", $tb_instituicao_cnpj);
$sql->bindParam(":tb_instituicao_desc", $tb_instituicao_desc);
$sql->bindParam(":tb_instituicao_cep", $tb_instituicao_cep);
$sql->bindParam(":tb_instituicao_endereco", $tb_instituicao_endereco);
$sql->bindParam(":tb_instituicao_bairro", $tb_instituicao_bairro);
$sql->bindParam(":tb_instituicao_cidade", $tb_instituicao_cidade);
$sql->bindParam(":tb_instituicao_uf", $tb_instituicao_uf);
$sql->bindParam(":tb_instituicao_email", $tb_instituicao_email);
$sql->bindParam(":tb_instituicao_ddd_fixo", $tb_instituicao_ddd_fixo);
$sql->bindParam(":tb_instituicao_fone_fixo", $tb_instituicao_fone_fixo);
$sql->bindParam(":tb_instituicao_ddd_celular", $tb_instituicao_ddd_celular);
$sql->bindParam(":tb_instituicao_celular", $tb_instituicao_celular);
$sql->execute();

	if($sql->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, Instituição já Cadastrada!');</script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='instituicao_e_estabelecimento.php?pg=instituicao';</script>";
	}

}?> 

<form name="form-group" method="post" action="">
<div class="table-responsive">
  <table class="table">
    <thead>
    <tr>
      <th>CNPJ</th>
      <th>INSTITUIÇÃO</th>
      <th>CEP</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_instituicao_cnpj" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_desc" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_cep" id="textfield"></td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>Endereço</th>
      <th>Bairro</th>
      <th>Cidade</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="tb_instituicao_endereco" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_bairro" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_cidade" id="textfield"></td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>UF</th>
      <th>Email</th>
      <th>DDD Fixo</th>
    </tr>
    </thead>
    <tbody>    
    <tr>
      <td><input class="form-control" type="text" name="tb_instituicao_uf" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_email" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_ddd_fixo" id="textfield"></td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>Fone Fixo</th>
      <th>DDD Celular</th>
      <th>Celular</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="tb_instituicao_fone_fixo"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_ddd_celular"></td>
      <td><input class="form-control" type="text" name="tb_instituicao_celular"></td>
    </tr> 
    </tbody>       
    <tr>        
      <!--<td><input class="input" type="submit" name="cadastra" id="button" value="Cadastrar"></td>-->
      <td>
           <!--<input type="button" type="submit" name="cadastra" value="Incluir">-->
          <center>
          <button class="btn btn-primary" type="submit" name="cadastra" id="button">Incluir</button>
          </center> 
      </td>
    </tr>
  </table>
  </div>
</form> 
 <br />
<?php } ?> 



<!--VISUALIZAR AS INSTITUIÇÕES CADASTRADAS -->

<?php
$sql_1 = $pdo->prepare("SELECT * FROM tb_instituicao");
$sql_1->execute();
if($sql_1->rowCount() <= 0) { 
	 echo "<br><br>No momento não existe nenhuma instituição cadastrada!<br><br>";
 }else{
?>
<br /><br />
  <div class="table-responsive">
    <table class="table">
    <h4><u><b>Instituições</b></u></h4>
     <thead>
      <tr>
        <th>INSTITUIÇÃO</th>
        <th><strong>CNPJ</strong></th>
        <th><strong>E-MAIL</strong></th>
        <th><strong>AÇÕES</strong></th>
      </tr>
      </thead>
      <?php 
      foreach ($sql_1 as $res_1) {
      ?>
      <tbody>
      <tr>
        <td><?php echo $instituicao = $res_1['tb_instituicao_desc']; ?></td>
        <td><?php echo $res_1['tb_instituicao_cnpj']; ?></td> 
        <td><?php echo $res_1['tb_instituicao_email']; ?></td> 
        <td><a href="instituicao_e_estabelecimento.php?pg=instituicao&deleta=ins&id=<?php echo @$res_1['idtb_instituicao']; ?>">
        <img title="Excluir instituicao" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      </tbody>
      <?php }  ?>
    </table>	 
    </div><!--table-responsive-->
<?php } ?> 
<br />


<!--DELEÇÃO DAS INSTITUIÇÕES-->

<?php if(@$_GET['deleta'] == 'ins'){

$id = $_GET['id'];

$sql_3 = $pdo->prepare("DELETE FROM tb_instituicao WHERE idtb_instituicao = '$id'");
$sql_3->execute();

echo "<script language='javascript'>window.location='instituicao_e_estabelecimento.php?pg=instituicao';</script>";

}?>
</div><!-- box_curso -->
<?php  }?>

<!-- CADASTRAR ESTABELECIMENTOS DE ENSINO -->

<?php if(@$_GET['pg'] == 'estabelecimento'){ ?>
<!--<div id="box_disciplinas">-->

 <!--<a class="a2" href="instituicao_e_estabelecimento.php?pg=estabelecimento&cadastra=sim">Cadastrar</a>-->
 <button class="btn btn-info"><a href="instituicao_e_estabelecimento.php?pg=estabelecimento&cadastra=sim">Cadastrar</a></button>
<?php 
    if(@$_GET['cadastra'] == 'sim') {
?> 
 <br /><br />
 <center><h4><b>ESTABELECIMENTOS DE ENSINO</b></h4></center>
<?php if(isset($_POST['cadastra'])) {

$tb_ee_desc = $_POST['tb_ee_desc'];
$tb_ee_cep = $_POST['tb_ee_cep'];
$tb_ee_endereco = $_POST['tb_ee_endereco'];
$tb_ee_bairro = $_POST['tb_ee_bairro'];
$tb_ee_cidade = $_POST['tb_ee_cidade'];
$tb_ee_uf = $_POST['tb_ee_uf'];
$tb_ee_email = $_POST['tb_ee_email'];
$tb_ee_ddd_fixo = $_POST['tb_ee_ddd_fixo'];
$tb_ee_fone_fixo = $_POST['tb_ee_fone_fixo'];
$tb_ee_ddd_celular = $_POST['tb_ee_ddd_celular'];
$tb_ee_celular = $_POST['tb_ee_celular'];
$tb_ee_cmt = $_POST['tb_ee_cmt'];
$tb_ee_posto_cmt = $_POST['tb_ee_posto_cmt'];
$tb_ee_email_cmt = $_POST['tb_ee_email_cmt'];
$tb_ee_ddd_cmt = $_POST['tb_ee_ddd_cmt'];
$tb_ee_celular_cmt = $_POST['tb_ee_celular_cmt'];
$tb_ee_obs = $_POST['tb_ee_obs'];
$tb_instituicao_idtb_instituicao = $_POST['tb_instituicao_idtb_instituicao'];

$sql2 = $pdo->prepare("INSERT INTO tb_ee (tb_ee_desc, tb_ee_cep, tb_ee_endereco, 
        tb_ee_bairro, tb_ee_cidade, tb_ee_uf, tb_ee_email, tb_ee_ddd_fixo, tb_ee_fone_fixo, 
        tb_ee_ddd_celular, tb_ee_celular, tb_ee_cmt, tb_ee_posto_cmt, tb_ee_email_cmt, tb_ee_ddd_cmt, 
        tb_ee_celular_cmt, tb_ee_obs, tb_instituicao_idtb_instituicao) 
VALUES ('$tb_ee_desc', '$tb_ee_cep', '$tb_ee_endereco', '$tb_ee_bairro', '$tb_ee_cidade', '$tb_ee_uf',
        '$tb_ee_email', '$tb_ee_ddd_fixo', '$tb_ee_fone_fixo', '$tb_ee_ddd_celular', '$tb_ee_celular', 
        '$tb_ee_cmt', '$tb_ee_posto_cmt', '$tb_ee_email_cmt', '$tb_ee_ddd_cmt', '$tb_ee_celular_cmt', 
        '$tb_ee_obs', '$tb_instituicao_idtb_instituicao')
        ");
$sql2->bindParam(":tb_ee_desc", $tb_ee_desc);
$sql2->bindParam(":tb_ee_cep", $tb_ee_cep);
$sql2->bindParam(":tb_ee_endereco", $tb_ee_endereco);
$sql2->bindParam(":tb_ee_bairro", $tb_ee_bairro);
$sql2->bindParam(":tb_ee_cidade", $tb_ee_cidade);
$sql2->bindParam(":tb_ee_uf", $tb_ee_uf);
$sql2->bindParam(":tb_ee_email", $tb_ee_email);
$sql2->bindParam(":tb_ee_ddd_fixo", $tb_ee_ddd_fixo);
$sql2->bindParam(":tb_ee_fone_fixo", $tb_ee_fone_fixo);
$sql2->bindParam(":tb_ee_ddd_celular", $tb_ee_ddd_celular);
$sql2->bindParam(":tb_ee_celular", $tb_ee_celular);
$sql2->bindParam(":tb_ee_cmt", $tb_ee_cmt);
$sql2->bindParam(":tb_ee_posto_cmt", $tb_ee_posto_cmt);
$sql2->bindParam(":tb_ee_email_cmt", $tb_ee_email_cmt);
$sql2->bindParam(":tb_ee_ddd_cmt", $tb_ee_ddd_cmt);
$sql2->bindParam(":tb_ee_celular_cmt", $tb_ee_celular_cmt);
$sql2->bindParam(":tb_ee_obs", $tb_ee_obs);
$sql2->bindParam(":tb_instituicao_idtb_instituicao", $tb_instituicao_idtb_instituicao);
$sql2->execute();
//echo var_dump($sql2);  die();

	if($sql2->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, Estabelecimento já Cadastrado!');
    </script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='instituicao_e_estabelecimento.php?pg=estabelecimento';
  </script>";
	}

}?> 
<form name="form-group" method="post" action="">
  <div class="table-responsive">
  <table class="table">
   <thead>
    <tr>
      <th>ESTABELECIMENTO</th>
      <th>CEP</th>
      <th>ENDEREÇO</th>
      <th>BAIRRO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_ee_desc" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_cep" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_endereco" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_bairro" id="textfield"></td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>CIDADE</th>
      <th>UF</th>
      <th>E-MAIL</th>
      <th>DDD FIXO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="tb_ee_cidade" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_uf" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_email" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_ddd_fixo" id="textfield"></td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>FONE FIXO</th>
      <th>DDD CELULAR</th>
      <th>CELULAR</th>
      <th>COMANDANTE</th>
    </tr>
    </thead> 
    <tbody>    
    <tr>
      <td><input class="form-control" type="text" name="tb_ee_fone_fixo" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_ddd_celular" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_celular" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_cmt" id="textfield"></td>
    </tr> 
    </tbody>
    <thead> 
    <tr>
      <th>POSTO CMT</th>
      <th>E-MAIL CMT</th>
      <th>DDD CMT</th>
      <th>CELULAR CMT</th>
    </tr>
    </thead>
    <tbody>     
    <tr>
      <td><input class="form-control" type="text" name="tb_ee_posto_cmt" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_email_cmt" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_ddd_cmt" id="textfield"></td>
      <td><input class="form-control" type="text" name="tb_ee_celular_cmt" id="textfield"></td>
    </tr>
    </tbody>
    <thead> 
    <tr>
      <th>OBSERVAÇÃO</th>
      <th>INSTITUIÇÃO</th>
      <!--<td></td>
      <td></td> -->
    </tr> 
    </thead>
    <tbody>             
    <tr> 
      <td><input class="form-control" type="text" name="tb_ee_obs" id="textfield"></td>
      <td>
      <!--<input type="text" name="tb_ee_idtb_instituicao" id="textfield">-->
      <select class="form-control" name="tb_instituicao_idtb_instituicao" required autofocus>
      <option>Selecione</option>
      <?php
           $buscainstituicao = $pdo->query("SELECT * FROM tb_instituicao ORDER BY tb_instituicao_desc ASC");
           $busca = $buscainstituicao->fetchAll();
           foreach($busca as $in) {
      ?>
           <option value="<?php echo $in['idtb_instituicao']; ?>"><?php echo $in['tb_instituicao_desc']; ?>
           </option>
      <?php } ?>
      </select>
      </td>     
      <td><button class="btn btn-primary" type="submit" name="cadastra" id="button">Cadastrar</button></td>
      <!--<td></td>-->
    </tr>
    </tbody>
  </table>
  </div>
</form> 
 <br />
<?php } ?> 



<!--VISUALIZAR AS INSTITUIÇÕES CADASTRADAS -->

<?php
$sql_1 = $pdo->prepare("SELECT * FROM tb_ee");
$sql_1->execute();
if($sql_1->rowCount() <= 0) { 
	 echo "<br><br>No momento não existe nenhum estabelecimento cadastrado!<br><br>";
 }else {
?>
<br /><br />
  <div class="table-responsive">
    <table class="table">
    <thead>
      <tr>
        <th>ESTABELECIMENTO: </th>
        <th>INST.: </th>
        <th>CMT.: </th>
        <th>ENDEREÇO: </th>
        <th>E-MAIL: </th>
        <th>AÇÕES</th>
      </tr>
      </thead>
      <?php 
      foreach ($sql_1 as $res_1) {
      ?>
      <tbody>
      <tr>
        <td><?php echo $res_1['tb_ee_desc']; ?></td>
        <td><?php echo $res_1['tb_instituicao_idtb_instituicao']; ?></td>
        <td><?php echo $res_1['tb_ee_cmt']; ?></td>
        <td><?php echo $res_1['tb_ee_endereco']; ?></td>
        <td><?php echo $res_1['tb_ee_email'];  ?></td>
        <td><a class="a" href="instituicao_e_estabelecimento.php?pg=estabelecimento&deleta=est&id=<?php echo @$res_1['idtb_ee']; ?>">
        <img title="Excluir instituicao" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      </tbody>
      <?php } } ?>
    </table>	 
    </div>
<?php } ?> 
<br />


<!--DELEÇÃO DOS ESTABELECIMENTOS-->

<?php if(@$_GET['deleta'] == 'est'){

$id = $_GET['id'];

$sql_3 = $pdo->prepare("DELETE FROM tb_ee WHERE idtb_ee = '$id'");
$sql_3->execute();

echo "<script language='javascript'>window.location='instituicao_e_estabelecimento.php?pg=estabelecimento';</script>";

}?>

<!--</div>--><!--box_disciplinas-->
</div>
<?php require "rodape.php"; ?>
</body>
</html>