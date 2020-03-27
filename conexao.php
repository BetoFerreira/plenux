<?php
	   function conectar() {
	   try {
	   //$pdo      = new PDO("mysql:host=$host;port=3306;dbname=$dbn", $user,$pass);
	   //$con->exec("SET CHARACTER SET utf8");
	   $pdo   =  new PDO("mysql:host=localhost;port=3306;dbname=acheiemc_plenux", 
     "acheiemc_root", "moodle@123");
	   
	   } catch(PDOException $e) {
	        echo $e->getMessage();
	        var_dump($e);
	   }
	     return $pdo;
	   }
?>

