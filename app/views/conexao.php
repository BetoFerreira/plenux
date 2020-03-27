<?php
	   function conectar() {
	   try {
	   $pdo   =  new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", "seulug85_root", "moodle@123");
	   
	   } catch(PDOException $e) {
	        echo $e->getMessage();
	        //var_dump($e);
	   }
	     return $pdo;
	   }
	 
?>
