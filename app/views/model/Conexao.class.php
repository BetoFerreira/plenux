<?php

	   /*function conectar() {

	   try {

     $pdo = new PDO("mysql:host=localhost;port=3306;dbname=seulug85_caixa_eletronico", "seulug85_root", "moodle@123");

	   } catch(PDOException $e) {

	        echo $e->getMessage();

	        var_dump($e);

	   } 

	     return @$pdo;

	   }*/

     class Conexao {

         public static $instance;

         

         public static function get_instance() {

         

              if (!isset(self::$instance)) {
                 self::$instance = new PDO("mysql:host=localhost;dbname=seulug85_caixa_eletronico", 
                 "seulug85_root", "moodle@123", array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));  

                 self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

              }

              return self::$instance; 

         } 

     }

?>
