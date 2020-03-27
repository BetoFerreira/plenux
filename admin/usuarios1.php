<?php session_start(); 

require "../conexao.php";
$pdo = conectar();

if ($_SESSION['painel'] != 'admin') {  
   echo "<script language='javascript'>window.location='../index.php';</script>";
}
?>

<html>
  <head>
    <title>Usuários 1</title>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <script type="text/javascript" src="funcoes_cpf.js"></script>
</script>

    <script type="text/javascript" >
    
    function limpa_formulário_cep() {
            //Limpa valores do formulário de cep.
            document.getElementById('rua').value=("");
            document.getElementById('bairro').value=("");
            document.getElementById('cidade').value=("");
            document.getElementById('uf').value=("");
            document.getElementById('ibge').value=("");
    }

    function meu_callback(conteudo) {
        if (!("erro" in conteudo)) {
            //Atualiza os campos com os valores.
            document.getElementById('rua').value=(conteudo.logradouro);
            document.getElementById('bairro').value=(conteudo.bairro);
            document.getElementById('cidade').value=(conteudo.localidade);
            document.getElementById('uf').value=(conteudo.uf);
            document.getElementById('ibge').value=(conteudo.ibge);
        } //end if.
        else {
            //CEP não Encontrado.
            limpa_formulário_cep();
            alert("CEP não encontrado.");
        }
    }
        
    function pesquisacep(valor) {

        //Nova variável "cep" somente com dígitos.
        var cep = valor.replace(/\D/g, '');

        //Verifica se campo cep possui valor informado.
        if (cep != "") {

            //Expressão regular para validar o CEP.
            var validacep = /^[0-9]{8}$/;

            //Valida o formato do CEP.
            if(validacep.test(cep)) {

                //Preenche os campos com "..." enquanto consulta webservice.
                document.getElementById('rua').value="...";
                document.getElementById('bairro').value="...";
                document.getElementById('cidade').value="...";
                document.getElementById('uf').value="...";
                document.getElementById('ibge').value="...";

                //Cria um elemento javascript.
                var script = document.createElement('script');

                //Sincroniza com o callback.
                script.src = 'https://viacep.com.br/ws/'+ cep + '/json/?callback=meu_callback';

                //Insere script no documento e carrega o conteúdo.
                document.body.appendChild(script);

            } //end if.
            else {
                //cep é inválido.
                limpa_formulário_cep();
                alert("Formato de CEP inválido.");
            }
        } //end if.
        else {
            //cep sem valor, limpa formulário.
            limpa_formulário_cep();
        }
    };

    </script>

    </head>
  <body>

<?php require "topo.php"; ?>

<!--CADASTRAR USUÁRIOS-->
<div class="container">

<?php if(@$_GET['pg'] == 'usuario') {  //Início do $_GET['pg'] == 'usuario'
?>
 <br><center>
 <button class="btn btn-warning">
     <a href="usuarios1.php?pg=usuario&cadastra=sim">Cadastrar</a>
 </button><br><h4>USUÁRIOS </h4>
 <h6><span style="color:red;">*  Campos Obrigatórios</span></h6>
 </center>

<?php 
    if(@$_GET['cadastra'] == 'sim') {  //Início - cadastra == sim
?> 
 
<?php if(isset($_POST['cadastra'])) { // Início - $_POST['cadastra']
$cpf                       = $_POST['cpf'];
//$cpf                       = isCpf($cpf);
/*	if (get_cpf($cpf)) {
	  echo "<center><script language='javascript'> window.alert('CPF Válido!!');</script></center>";
	} else {
    echo "<center><script language='javascript'> window.alert('CPF Inválido!!');</script></center>";
    echo "<script language='javascript'>window.location='usuarios.php?pg=usuario';</script>";
	} */
//$cpff                      = $cpf;
$cpff                        = $_POST['cpf'];
$nome                        = strtoupper($_POST['nome']);
$graduacao                   = $_POST['graduacao'];
//$cep                       = get_cep($_POST['cep']);
$cepf                        = $_POST['cep'];
//$endereco                  = $_POST['endereco'];
$endereco                    = $_POST['rua'];
//$bairro                    = $_POST['bairro'];
$bairro                      = strtoupper($_POST['bairro']);
$complemento                 = strtoupper($_POST['complemento']);
//$cidade                    = $_POST['cidade'];
$cidade                      = $_POST['cidade'];
//$uf                        = $_POST['uf'];
$uf                          = $_POST['uf'];
$email                       = strtolower($_POST['email']);
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
$sql->execute();
	if($sql->rowCount() == 0) {
		echo "<script language='javascript'> window.alert('Erro ao Cadastrar, USUÁRIO já Cadastrado!');</script>";
	}else{
	echo "<script language='javascript'> window.alert('Cadastro Realizado com sucesso!!');</script>";
	echo "<script language='javascript'>window.location='usuarios1.php?pg=usuario';</script>";
	}

} // Fim - $_POST['cadastra']
//}
?> 

<div class="table-responsive">
  <table class="table">
   <div class="container">
    <form name="form3" method="POST" action="">   
    <thead>
       <tr>
       <th><b>CPF <span style="color:red;">*</span></b></th>
       <th><b>NOME <span style="color:red;"> * </span></b></th>
       <th><b>GRADUAÇÃO </b></th>
       </tr>
    </thead>   
    <tbody>
       <tr>
       <td><input placeholder="Digite e click em TAB" type="text" name="cpf" maxlength="11" 
        onblur="return verificarCPF(this.value)"/></td>
       <td><input type="text" name="nome" size="25" style="text-transform:uppercase"></td>
       <td><select class="selectpicker" name="graduacao">
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
          </select></td>
       </tr>
    </tbody>   
    <thead>
       <tr>
         <th><b>CEP <span style="color:red;"> * </span></b></th>
         <th><b>Endereço: </th>
         <th><b>Bairro:  </th> 
      </tr>
     </thead> 
      <tbody>
        <tr> 
          <td>
          <input placeholder="Digite e click em TAB" name="cep" type="text" id="cep" value="" 
          size="18" maxlength="9" onblur="pesquisacep(this.value);" /></td>
          <td><input name="rua" type="text" id="rua" size="25" /></label></td>
          <td><input name="bairro" type="text" id="bairro" size="15" /></td>
        </tr>  
      </tbody>  
    <thead>
       <tr>
         <th><b>COMPLEMENTO <span style="color:red;"> * </span></b></th>
         <th><b>CIDADE </b></th>
         <th><b>ESTADO  </b></th>
      </tr>
     </thead>       
     <tbody>
        <tr>
          <td><input type="text" name="complemento"></td>
          <td><input name="cidade" type="text" id="cidade" size="25" /></td>
          <td><input name="uf" type="text" id="uf" size="2" /></td>
        </tr>     
     </tbody> 
    <thead>
       <tr>
         <th><b>IBGE  </b></th>
         <th><b>E-MAIL <span style="color:red;"> * </span></b></th>
         <th><b>DDD-FIXO </b></th>
 
      </tr>
     </thead>     
     <tbody>
        <tr>
          <td><input disabled name="ibge" type="text" id="ibge" size="8" /></td>        
          <td><input type="email" size="25" name="email" style='text-transform:lowercase'></td>
          <td><input type="text" size="2"  name="ddd_fixo"></td>
        </tr>
     </tbody>
      <thead> 
         <tr> 
         <th><b>TEL-FIXO  </b></th>
         <th><b>DDD-CELULAR <span style="color:red;"> * </span></b></th> 
         <th><b>CELULAR <span style="color:red;"> * </span></b></th> 
         </tr>    
      </thead>
      <tbody>
         <tr>         
          <td><input type="text" size="15" name="tel_fixo"></td>
          <td><input type="text" size="2" name="ddd_celular"></td>
          <td><input type="text" name="celular"></td>
        </tr>
      </tbody>     
      <thead> 
         <tr> 
         <th><b>OBS</b></th>
         <th><b>TIPO DE USUÁRIO<span style="color:red;"> * </span></b></th> 
         <th><b>SENHA<span style="color:red;"> * </span></b></th> 
         </tr>    
      </thead>
      <tbody>
         <tr>
           <td><textarea name="obs" placeholder="Digite sua observação" 
          required /></textarea></td>
           <td><select name="tipodeusuario" required autofocus>
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
           <td><input type="password" name="senha"></td>
         </tr>
      </tbody>
     
  </div><!--container-->  
        <tbody>
           <tr>
           <td></td>    
            <td>
            <button class="btn btn-primary" type="submit" name="cadastra">Incluir</button>
            </td>
            <td></td>
            </tr>
        </tbody></center>   
</form> 
 </table>
 </div><!--table-responsive-->  
 
     

<?php //Fim - enviar
      } // Fim - cadastra == sim
      /*else { echo "<center><script language='javascript'>window.alert('Digite os campos obrigatórios!!');
                     </script></center>";
               echo "<script language='javascript'>window.location='index.php';</script>"; }*/ 

     // } //Fim - cadastra == sim
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
        <td><a href="usuarios1.php?pg=usuario&deleta=usu&id=<?php echo @$res_1['idtb_usuario']; ?>">
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

echo "<script language='javascript'>window.location='usuarios1.php?pg=usuario';</script>";

} ?>
</div><!-- container -->
<?php  } //Fim do $_GET['pg'] == 'usuario'
?>

    </body>

    </html>

  </body>
</html>
