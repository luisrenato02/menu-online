<?php
class User
{
     private $id;
     private $username;
     private $password;

     public function setId($id)
     {
          $this->id = $id;
     }

     public function getId()
     {
          return $this->id;
     }

     public function setUsername($username)
     {
          $this->username = $username;
     }

     public function getUsername()
     {
          return $this->username;
     }

     public function setPassword($password)
     {
          $this->password = $password;
     }

     public function getPassword()
     {
          return $this->password;
     }

     public function read()
     {
          echo "id=" . $this->id . "<br>";
          echo "username=" . $this->username . "<br>";
          echo "password=" . $this->password . "<br>";
     }

     public function create()
     {
          $pdo = new Connection();

          $st = $pdo->conn->prepare("INSERT INTO users (username, password) VALUES (:username, :password)");
          $st->bindValue(":username", $this->getUsername());
          $st->bindValue(":password", $this->getPassword());

          return $st->execute();
     }

     public function update()
     {
          $pdo = new Connection();

          $st = $pdo->conn->prepare("UPDATE users SET username =: username, password = :password WHERE id = :id");
          $st->bindValue(":id", $this->getId());
          $st->bindValue(":username", $this->getUsername());
          $st->bindValue(":password", $this->getPassword());

          return $st->execute();
     }

     public function delete()
     {
          $pdo = new Connection();

          $st = $pdo->conn->prepare("DELETE FROM users WHERE id = :id");
          $st->bindValue(":id", $this->getId());

          return $st->execute();
     }

     public function getUserByUsername()
     {
          $pdo = new Connection();

          $st = $pdo->conn->prepare("SELECT * FROM users WHERE username=:username");
          $st->bindValue(":username", $this->getUsername());
          $st->execute();

          return $st;
     }
}
