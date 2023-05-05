<?php

    include_once("classes.php");
    

    class UserDAO implements UserDAOInterface {
        private $conn;
        

        public function __construct(PDO $conn) {
            $this->conn = $conn;
            
        }

        public function buildUser($data) {
            $user = new Usuario();

            $user->id = $data['id'];
            $user->username = $data['username'];
            $user->nome = $data['nome'];
            $user->email = $data['email'];
            $user->senha = $data['senha'];
            $user->cnpj = $data['cnpj'];

            return $user;

        }

        public function create(Usuario $user, $auth= false) {

            $stmt = $this->conn->prepare("INSERT INTO usuario
            (username, nome, email, senha, cnpj)
            VALUES (:username, :nome, :email, :senha, :cnpj)");

            $stmt->bindParam(":username", $user->username);
            $stmt->bindParam(":nome", $user->nome);
            $stmt->bindParam(":email", $user->email);
            $stmt->bindParam(":senha", password_hash($user->senha, PASSWORD_DEFAULT) );
            $stmt->bindParam(":cnpj", $user->cnpj);

            $stmt->execute();

            if ($auth) {
              $this->authenticateUser($user->email, $user->senha);
            }

            
        }

        public function authenticateUser($email, $senha) {

          $user = $this->findByEmail($email);

          if ($user) {
            if(password_verify($senha, $user->senha)) {
              session_start();
              $_SESSION['username'] = $user->username;
              $_SESSION['id'] = $user->id;

              
              header("Location: ../index.php");
            }
          }
          
          
        }

        public function findByEmail($email) {
          
          if($email != "") {

            $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE email = :email");

            $stmt->bindParam(":email", $email);

            $stmt->execute();

            if($stmt->rowCount() > 0) {

              $data = $stmt->fetch();
              
              $user = $this->buildUser($data);

              return $user;
            } else {
              return false;
            }
          } else {
            return false;
          }

        }

        public function findUserLogin($id, $username) {
          $stmt = $this->conn->prepare("SELECT * FROM usuario WHERE id = :id AND username = :username LIMIT 1");

          $stmt->bindParam(":id", $id);
          $stmt->bindParam(":username", $username);

          $stmt->execute();

          if($stmt->rowCount() == 1) {
            
            $data = $stmt->fetch();
            $user = $this->buildUser($data);

            return $user;
          }

        }
    }