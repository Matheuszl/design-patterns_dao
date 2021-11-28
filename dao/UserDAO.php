<?php

include_once("models/User.php");

  class UserDAO implements UserDAOInterface {
  
    private $conn;

    public function __construct(PDO $conn)
    {
      $this->conn = $conn;
    }

    public function findAll()
    {
      $users = array();
      $stmp = $this->conn->query("SELECT * FROM users");
      $data = $stmp->fetchAll();

      foreach ($data as $atribute) {
        $user = new User();
        $user->setId($atribute["id_user"]);
        $user->setName($atribute["name"]);
        $user->setEmail($atribute["email"]);

        array_push($users, $user);
      }
      return $users;
    }

    public function findId($id)
    {
      $stmp = $this->conn->query("SELECT * FROM users WHERE id_user = $id");
      $stmp->execute();
      $data = $stmp->fetch_row();

      return $data;
    }

    public function create(User $user)
    {
      $stmp = $this->conn->prepare("INSERT INTO users(name, email) VALUES (:name, :email)");

      $stmp->bindValue(":name", $user->getName());
      $stmp->bindValue(":email", $user->getEmail());

      $stmp->execute();
    }
}