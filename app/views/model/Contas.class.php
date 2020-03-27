<?php

  class Contas extends Conexao {
  
    // Metodo para efetuar Transacao Financeira durante o Mes e o Ano

    public function setDia($id, $dia, $mes, $ano) {

        $pdo = parent::get_instance();

          /*$sql = "SELECT * FROM historico WHERE id_conta = :id_conta AND dia = :dia AND mes = :mes AND ano = :ano";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(1, $_SESSION['login'], PDO::PARAM_INT);
          $sql->bindValue(2, $dia, PDO::PARAM_STR);
          $sql->bindValue(3, $mes, PDO::PARAM_STR);
          $sql->bindValue(4, $ano, PDO::PARAM_STR);*/

          $sql = "SELECT * FROM historico WHERE id_conta = :id_conta AND dia = '24' AND mes = '06' AND ano = '2019'";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(":id_conta", $_SESSION['login']);
          /*$sql->bindValue(":dia", $dia,);
          $sql->bindValue(":mes", $mes);
          $sql->bindValue(":ano", $ano);*/

        /*$sql = "SELECT * FROM historico WHERE id_conta = :id_conta";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_conta", $_SESSION['login']);*/
        //var_dump($sql); die();

        $sql->execute(); 
        
        if ($sql->rowCount() > 0) {
             return $sql->fetchAll();
        } 
      }
           
    // Metodo para efetuar Transacao
    public function setTransaction($tipo, $valor) {
        $pdo = parent::get_instance();
        $sql = "INSERT INTO historico (id_conta, tipo, valor, data_operacao) 
        VALUES (:id_conta, :tipo, :valor, NOW())";
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_conta", $_SESSION['login']);
        $sql->bindValue(":tipo", $tipo);
        $sql->bindValue(":valor", $valor);
        $sql->execute();
        
        if ($tipo == "Compras") {
             //Compras
             $sql = "UPDATE contas SET saldo = saldo + :valor WHERE id = :id";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":valor", $valor);
             $sql->bindValue(":id", $_SESSION['login']);
             $sql->execute();
             echo "<script type=\"text/javascript\">window.alert('Compra cadastrada com sucesso.');
             window.location.href = '../controller/transactionController.php';</script>"; 
             exit;
        } else {
            // Pagamento
             $sql = "UPDATE contas SET saldo = saldo - :valor WHERE id = :id";
             $sql = $pdo->prepare($sql);
             $sql->bindValue(":valor", $valor);
             $sql->bindValue(":id", $_SESSION['login']);
             $sql->execute();
             echo "<script type=\"text/javascript\">window.alert('Pagamento cadastrado com sucesso.');
             window.location.href = '../controller/transactionController.php';</script>"; 
             exit;              
        }
    }      
  
    //Metodo para listar Contas
          //public function listAccounts() {
          public function listAccounts($id) {
          $pdo = parent::get_instance();
          //$sql = "SELECT * FROM contas ORDER BY id ASC";
          $sql = "SELECT * FROM contas WHERE id = :id";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(":id", $_SESSION['login']);
          $sql->execute();
        
        if ($sql->rowCount() > 0) {
             return $sql->fetchAll();
        } 
    } 
      // Metodo para Listar Historico
    public function listHistoric($id) {
        $pdo = parent::get_instance();
        $sql = "SELECT * FROM historico WHERE  id_conta = :id_conta";  //Seleciona  ID logado
        $sql = $pdo->prepare($sql);
        $sql->bindValue(":id_conta", $id);
        $sql->execute();

        if ($sql->rowCount() > 0) {
             return $sql->fetchAll();
        } 
    }       
    
    // Metodo para pegar informacoes de cada conta
   public function getInfo($id) {
      $pdo = parent::get_instance();
      $sql = "SELECT * FROM contas WHERE id = :id";
      $sql = $pdo->prepare($sql);
      $sql->bindValue(":id", $id);
      $sql->execute();
      
      if ($sql->rowCount() > 0 ) {
            return $sql->fetchAll();
      }
   } 
   // metodo para fazer login
       public function setLogged($titular, $cargo, $senha) {
          $pdo = parent::get_instance();
          $sql = "SELECT * FROM contas WHERE titular = :titular AND cargo = :cargo AND senha = :senha";
          $sql = $pdo->prepare($sql);
          $sql->bindValue(":titular", $titular); 
          $sql->bindValue(":cargo",   $cargo);
          $sql->bindValue(":senha",   $senha);
          $sql->execute();
          //var_dump($sql); die();
          if($sql->rowCount() > 0) {
             $sql = $sql->fetch(); //apenas um dado
             $_SESSION['login'] = $sql['id'];
             header("Location: ../index.php?login_success");
             exit;
          } else {
             header("Location: ../login.php?not_login");     
          }
          
       }
       // Metodo para fazer logout
       public function logout() {
          unset($_SESSION['login']);
       }
  }
?>
