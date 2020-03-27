<?php
   session_start();
   
   include_once('../model/Conexao.class.php');
   include_once('../model/Contas.class.php');
   
   $contas = new Contas();
   
   $titular = addslashes($_POST['titular']);
   $cargo   = addslashes($_POST['cargo']);
   $senha   = md5($_POST['senha']);
   //$senha   = addslashes($_POST['senha']);
   
   //echo "Titular: ".$titular." Cargo: ".$cargo." Senha: ".$senha." <br>"; die();   
   
   if (isset($_POST['titular']) && !empty($_POST['cargo'])) {
   
       $contas->setLogged($titular, $cargo, $senha);
   
   }
?>