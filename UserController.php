<?php

include_once("db.php");
include_once("dao/UserDAO.php");

$user = new UserDAO($conn);

$name = $_POST["name"];
$email = $_POST["email"];

$newUser = new User();

$newUser->setName($name);
$newUser->setEmail($email);

$user->create($newUser);

header("Location: index.php");