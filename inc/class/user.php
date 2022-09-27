<?php


class user{
     private $id;
     private $username;
     private $password;

     public function setId($id){
          $this->id = $id;
     }

     public function getId(){
          return $this->id;
     }

     public function setUsername($username){
          $this->username = $username;
     }

     public function getUsername(){
          return $this->username;
     }

     public function setPassword($password){
          $this->password = $password;
     }

     public function getPassword(){
          return $this->password;
     }

     public function imprime(){
          echo "id=" . $this->id . "<br>";
          echo "username=" . $this->username . "<br>";
          echo "senha=" . $this->password . "<br>";
     }

     public function inserir(){
          $pdo = new conexao();
          $st = $pdo->conn->prepare("INSERT INTO login (username, password) VALUES (:u, :p)");
          $st->bindValue(":u", $this->getUsername());
          $st->bindValue(":p", $this->getPassword());
          return $st->execute();
     }

     public function alterar(){
          $pdo = new conexao();
          $st = $pdo->conn->prepare("UPDATE username SET username=:u, password=:p WHERE id=:id");
          $st->bindValue(":id", $this->getId());
          $st->bindValue(":username", $this->getUsername());
          $st->bindValue(":password", $this->getPassword());
          return $st->execute();
     }

     public function deletar(){
          $pdo = new conexao();
          $st = $pdo->conn->prepare("DELETE FROM login WHERE id=:id");
          $st->bindValue(":id", $this->getId());
          return $st->execute();
     }

     public function getUserByUsername(){
          $pdo = new conexao();
          $st = $pdo->conn->prepare("SELECT * FROM login WHERE username=:username");
          $st->bindValue(":username", $this->getUsername());
          $st->execute();
          return $st;
     }
}
