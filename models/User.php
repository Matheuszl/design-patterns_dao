<?php

class User {

  private $id_user;
  private $name;
  private $email;

  public function getId()
  {
    return $this->id_user;
  }

  public function setId($id_user)
  {
    $this->id_user = $id_user;
  }


  public function getName()
  {
    return $this->name;
  }

  public function setName($name)
  {
    $this->name = $name;
  }

  public function getEmail()
  {
    return $this->email;
  }

  public function setEmail($email)
  {
    $this->email = $email;
  }
}

interface UserDAOInterface {
    
  public function create(User $user);
  public function findId($id);
  public function findAll();
}