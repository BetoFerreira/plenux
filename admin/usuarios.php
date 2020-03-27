<?php session_start(); 

require "../conexao.php";
$pdo = conectar();

if ($_SESSION['painel'] != 'admin') {  
   echo "<script language='javascript'>window.location='../index.php';</script>";
}

    function get_cep($cep){
      // formatar o cep removendo caracteres não numéricos
      $cep = preg_replace("/[^0-9]/", "", $cep);
      $url = "http://viacep.com.br/ws/$cep/xml/";
      $xml = simplexml_load_file($url);  //puxar as informações e fazer um array
      /*echo "<pre>"; var_dump($xml); echo "</pre>"; 
      echo "<br> CEP: ".$cep."<br> Logradouro: ".$cep->logradouro; */
      return $xml;
    }
  
function get_cpf($cpf) {
$cpf = preg_replace("/[^0-9]/", "", $cpf);//qualquer valor não numerico ele exclui.
    $digitoUm   = 0;
    $digitoDois = 0;
    
    for($i = 0, $x = 10; $i <= 8; $i++, $x--) {
       $digitoUm   += $cpf[$i] * $x;
    }
    for($i = 0, $x = 11; $i <= 9; $i++, $x--) {
       if (str_repeat($i, 11) == $cpf) {
           return false;
       }
       $digitoDois += $cpf[$i] * $x;
    }

    $calculoUm   = (($digitoUm%11)   < 2) ? 0 : 11-($digitoUm%11);
    $calculoDois = (($digitoDois%11) < 2) ? 0 : 11-($digitoDois%11);

    if ($calculoUm <> $cpf[9] || $calculoDois <> $cpf[10]) { 
       return false;
    } 
    return true;
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

<!--CADASTRAR ALUNOS-->
<div class="container">

<?php if(@$_GET['pg'] == 'usuario'){  //Início do $_GET['pg'] == 'usuario'
?>
 <br><center>
 <button class="btn btn-warning">
     <a href="usuarios.php?pg=usuario&cadastra=sim">Cadastrar</a>
 </button><br><h4>USUÁRIOS</h4>
 <h5><span style="color:red;">*  Campos Obrigatórios</span></h5>
 </center>
 
 
<?php if(isset($_POST['cadastra'])) { // Início - $_POST['cadastra']
$cpf                       = $_POST['cpf'];
//$cpf                       = isCpf($cpf);
	if (get_cpf($cpf)) {
	  echo "<center><script language='javascript'> window.alert('CPF Válido!!');</script></center>";
	} else {
    echo "<center><script language='javascript'> window.alert('CPF Inválido!!');</script></center>";
    echo "<script language='javascript'>window.location='usuarios.php?pg=usuario';</script>";
	}
//$cpff                      = $cpf;
$cpff                        = $_POST['cpf'];
$nome                        = $_POST['nome'];
$graduacao                   = $_POST['graduacao'];
//$cep                       = get_cep($_POST['cep']);
$cepf                        = $_POST['cep'];
//$endereco                  = $_POST['endereco'];
$endereco                    = $_POST['endereco'];
//$bairro                    = $_POST['bairro'];
$bairro                      = $_POST['bairro'];
$complemento                 = $_POST['complemento'];
//$cidade                    = $_POST['cidade'];
$cidade                      = $_POST['cidade'];
//$uf                        = $_POST['uf'];
$uf                          = $_POST['uf'];
$email                       = $_POST['email'];
$ddd_fixo        	           = $_POST['ddd_fixo'];
$tel_fixo                    = $_POST['tel_fixo'];
$ddd_celular                 = $_POST['ddd_celular'];
$celular                     = $_POST['celular'];
$obs                         = $_POST['obs'];
$tipodeusuario               = $_POST['tipodeusuario'];
$senha                       = md5($_POST['senha']);

$sql = $pdo->prepare("INSERT INTO tb_usuario (tb_usuario_cpf,         
                                              tb_usuario_nome, 
                                              tb_usuario_graduacao,   
                                              tb_usuario_cep, 
                                              tb_usuario_endereco,    
                                              tb_usuario_bairro, 
                                              tb_usuario_complemento, 
                                              tb_usuario_cidade, 
                                              tb_usuario_uf,          
                                              tb_usuario_email, 
                                              tb_usuario_ddd_fixo,    
                                              tb_usuario_tel_fixo, 
                                              tb_usuario_ddd_celular, 
                                              tb_usuario_celular, 
                                              tb_usuario_obs,         
                                              tb_tipodeusuario_idtb_tipodeusuario, 
                                              tb_usuario_senha) 
                      VALUES ('$cpff',         
                              '$nome',     
                              '$graduacao', 
                              '$cepf',         
                              '$endereco', 
                              '$bairro', 
                              '$complemento', 
                              '$cidade',   
                              '$uf', 
                              '$email',       
                              '$ddd_fixo', 
                              '$tel_fixo', 
                              '$ddd_celular', 
                              '$celular',  
                              '$obs', 
                              '$tipodeusuario',            
                              '$senha')");

$sql->bindParam(":tb_usuario_cpf",                      $cpff);
$sql->bindParam(":tb_usuario_nome",                     $nome);
$sql->bindParam(":tb_usuario_graduacao",                $graduacao);
$sql->bindParam(":tb_usuario_cep",                      $cepf);
$sql->bindParam(":tb_usuario_endereco",                 $endereco);
$sql->bindParam(":tb_usuario_bairro",                   $bairro);
$sql->bindParam(":tb_usuario_complemento",              $complemento);
$sql->bindParam(":tb_usuario_cidade",                   $cidade);
$sql->bindParam(":tb_usuario_uf",                       $uf);
$sql->bindParam(":tb_usuario_email",                    $email);
$sql->bindParam(":tb_usuario_ddd_fixo",                 $ddd_fixo);
$sql->bindParam(":tb_usuario_tel_fixo",                 $tel_fixo);
$sql->bindParam(":tb_usuario_ddd_celular",              $ddd_celular);
$sql->bindParam(":tb_usuario_celular",                  $celular);
$sql->bindParam(":tb_usuario_obs",                      $obs);
$sql->bindParam(":tb_tipodeusuario_idtb_tipodeusuario", $tipodeusuario);
$sql->bindParam(":tb_usuario_senha",                    $senha);
//var_dump($sql); die();
$sql->execute();

	if($sql->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, USUÁRIO já Cadastrado!');</script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='usuarios.php?pg=usuario';</script>";
	}

} // Fim - $_POST['cadastra']
//}
?> 
<?php 
    if(@$_GET['cadastra'] == 'sim') {  //Início - cadastra == sim
?>
<div class="container">
<form name="form-group" method="POST" action="">
<div class="col-md-4">
<label>CPF <span style="color:red;">*</span></label><input class="form-control" type="text" name="cpf">
</div>
<div class="col-md-4">
<label>CEP <span style="color:red;">*</span></label><input class="form-control" type="text" name="cep">
</div>
<div class="col-md-4">
<label>Consultar </label> <button class="btn btn-primary" type="submit" name="enviar">Enviar</button>
</div>
</form>
</div>
<hr>
    <?php if(isset($_POST['enviar']) && isset($_POST['cpf']) && isset($_POST['cep'])) { //Início - enviar
      if (empty($_POST['cpf'])) { 
      echo "<center><script language='javascript'>window.alert('Digite os campos obrigatórios!!');
            </script></center>"; 
      header('Location: index.php'); }
      if (empty($_POST['cep'])) { 
      echo "<center><script language='javascript'>window.alert('Digite os campos obrigatórios!!');
            </script></center>"; 
      header('Location: index.php'); }      
      $cpf = $_POST['cpf'];
      //echo $_SESSION['cpf']      = $cpf;      
      //$cpf = isCpf($_POST['cpf']);
      if (get_cpf($cpf)) {
	  echo '<br><center><span style="color:green;"><b>--------------- CPF Válido! ---------------</b>
    </span></center>';
	} else {
	  echo '<br><center><span style="color:red;"><b>-------------- CPF Inválido! --------------</b>
         </span></center>';
	  }
      $cep = get_cep($_POST['cep']); 
    ?>
    <!--<center><!--<h3>Resultado da Pesquisa</h3>-->
    
    <!--<p><b>CPF: </b><?php echo "<b><i style='color:green'>" . $cpf . "</b></i>"; ?>
       <b>  CEP: </b> <?php echo "<b><i style='color:blue'>" . $cep->cep . "</b></i>"; ?><br>
       <b>Logradouro: </b><?php echo "<b>&nbsp;&nbsp;<i style='color:blue'>" . $cep->logradouro . "</b></i>"; ?><br>
       <b>Bairro: </b> <?php echo "<b><i style='color:blue'>" . $cep->bairro . "</b></i>"; ?><br>
       <b>Localidade: </b> <?php echo "<b><i style='color:blue'>" . $cep->localidade . "</b></i>"; ?>
       &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
       <b> UF: </b><?php echo "<b><i style='color:blue'>" . $cep->uf . "</b></i>"; ?><br>
        -----------------------------------------------------
    </p></center>-->

<form name="form-group" method="POST" action="">
<div class="table-responsive">
  <table class="table">
    <thead>
    <tr>
      <th>CPF / <?php echo "<b><i style='color:green'>" . $cpf . "</b></i>"; ?></th>
      <th>NOME</th>
      <th>GRADUAÇÃO</th>
    </tr>
    </thead>
    <tbody>
    <tr>
      <td><input class="form-control" type="text" name="cpf">
      
      </td>
      <td><input class="form-control" type="text" name="nome" style="text-transform:uppercase"></td>
      <td>
         <!--<input class="form-control" type="text" name="tb_usuario_graduacao">-->
          <select class="selectpicker form-control" name="graduacao">
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
      <th>CEP - <?php echo "<b><i style='color:blue'>" . $cep->cep . "</b></i>"; ?></th>
      <th>Endereço - <?php echo "<b><i style='color:blue'>" . $cep->logradouro . "</b></i>"; ?></th>
      <th>Bairro - <?php echo "<b><i style='color:blue'>" . $cep->bairro . "</b></i>"; ?></th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="cep">
      </td>
      <td><input class="form-control" type="text" name="endereco"></td>
      <td><input class="form-control" type="text" name="bairro"></td>
    </tr>
    </tbody>
    <thead>
    <tr>
      <th>Complemento</th>
      <th>Cidade - <?php echo "<b><i style='color:blue'>" . $cep->localidade . "</b></i>"; ?></th>
      <th>UF - <?php echo "<b><i style='color:blue'>" . $cep->uf . "</b></i>"; ?></th>
    </tr>
    </thead>
    <tbody>    
    <tr>
      <td><input class="form-control" type="text" name="complemento"></td>
      <td><!--<input class="form-control" type="text" name="cidade">-->
         <!--<input class="form-control" type="text" name="tb_usuario_cidade">-->
          <select class="selectpicker form-control" name="cidade">
            <option>SELECIONE</option>
            <option> </option>          
            <option>BRASÍLIA - PLANO PILOTO</option>
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
      <td><!--<input class="form-control" type="text" name="uf">-->
         <!--<input class="form-control" type="text" name="tb_usuario_uf">-->
          <select class="selectpicker form-control" name="uf">
            <option>SELECIONE</option>
            <option> </option>  
            <option>AC</option>        
            <option>AL</option>
            <option>AM</option>
            <option>AP</option>
            <option>BA</option>
            <option>CE</option>            
            <option>DF</option>
            <option>ES</option>
            <option>MA</option>
            <option>MG</option>
            <option>MS</option>
            <option>MT</option>
            <option>PA</option>
            <option>PB</option>
            <option>PE</option>
            <option>PI</option>
            <option>PR</option>
            <option>RJ</option>
            <option>RN</option>
            <option>RO</option>
            <option>RR</option>
            <option>RS</option>
            <option>SC</option>
            <option>SP</option>
          </select>
      </td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>E-mail</th>
      <th>DDD-Fixo</th>
      <th>TEL Fixo</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="email" name="email" style='text-transform:lowercase'></td>
      <td><input class="form-control" type="text"  name="ddd_fixo"></td>
      <td><input class="form-control" type="text"  name="tel_fixo"></td>
    </tr> 
    </tbody>
    <thead>
    <tr>
      <th>DDD Celular</th>
      <th>Celular</th>
      <th>OBS</th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
      <td><input class="form-control" type="text" name="ddd_celular"></td>
      <td><input class="form-control" type="text" name="celular"></td>
      <td>
       <textarea class="form-control" name="obs" placeholder="Digite sua observação" required style='text-transform:uppercase'>
      </textarea>
      </td>
    </tr> 
    </tbody>
    
    <thead>
    <tr>
      <th>Tipo de Usuário</th>
      <th>Senha</th>
      <th></th>
    </tr> 
    </thead>
    <tbody>   
    <tr>
    <td>
      <select class="form-control" name="tipodeusuario" required autofocus>
      <option>Selecione</option>
      <?php
           $buscacurso = $pdo->query("SELECT idtb_tipodeusuario, tb_tipodeusuario_desc FROM tb_tipodeusuario 
           ORDER BY tb_tipodeusuario_desc ASC");
           $busca = $buscacurso->fetchAll();
           foreach($busca as $cu) {
      ?>
           <option value="<?php echo $cu['idtb_tipodeusuario']; ?>"><?php echo $cu['tb_tipodeusuario_desc']; ?>
           </option>
      <?php } ?>
      </select>
      </td>
      <td><input class="form-control" type="password" name="senha"></td>
      <td>
          <button class="btn btn-primary" type="submit" name="cadastra">Incluir</button> 
      </td>
    </tr> 
    </tbody>               
  </table>
  </div>
</form> 
 <br />
<?php //Fim - enviar
      } /*else { echo "<center><script language='javascript'>window.alert('Digite os campos obrigatórios!!');
                     </script></center>";
               echo "<script language='javascript'>window.location='index.php';</script>"; }*/ 

      } //Fim - cadastra == sim
 ?> 

<!--VISUALIZAR AS INSTITUIÇÕES CADASTRADAS -->

<?php
$sql_1 = $pdo->prepare("SELECT * FROM tb_usuario");
$sql_1->execute();
if($sql_1->rowCount() <= 0) { 
	 echo "<br><br>No momento não existe nenhum USUÁRIO cadastrado!<br><br>";
 }else{ //Início da tabela de consulta de usuários cadastrados 
?>
<br /><br />
  <div class="table-responsive">
    <table class="table">
    <!--<h4><u><b>Usuários</b></u></h4>-->
     <thead>
      <tr>
        <th>CPF</th>
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
        <td><?php echo $res_1['tb_usuario_cpf']; ?></td>
        <td><?php echo $res_1['tb_usuario_nome']; ?></td> 
        <td><?php echo $res_1['tb_usuario_graduacao']; ?></td> 
        <td><a href="usuarios.php?pg=usuario&deleta=usu&id=<?php echo @$res_1['idtb_usuario']; ?>">
        <img title="Excluir instituicao" src="img/deleta.jpg" width="18" height="18" border="0"></a></td>
      </tr>
      </tbody>
      <?php }  ?>
    </table>	 
    </div><!--table-responsive-->
<?php } //Fim da tabela de consulta de usuários cadastrados
?> 
<br />


<!--DELEÇÃO DAS INSTITUIÇÕES-->

<?php if(@$_GET['deleta'] == 'usu'){

$id = $_GET['id'];

$sql_3 = $pdo->prepare("DELETE FROM tb_usuario WHERE idtb_usuario = '$id'");
$sql_3->execute();

echo "<script language='javascript'>window.location='usuarios.php?pg=usuario';</script>";

} ?>
</div><!-- container -->
<?php  } //Fim do $_GET['pg'] == 'usuario'
?>
