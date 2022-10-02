<?php
    class Connection {
         private $host = "localhost";
         private $database = "malbec";
         private $username = "root";
         private $password = "";
         public $conn;

         public function __construct(){
               try{
                    $this->conn = new PDO( "mysql:host=".$this->host.";dbname=".$this->database,$this->username,$this->password);
	               $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                }catch(PDOException $e){
                     echo "ERRO: ".$e->getMessage();
                }			
         }		 
    }
?>