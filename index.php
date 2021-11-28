<?php

include_once("db.php");
include_once("dao/UserDAO.php");

$UserDAO = new UserDAO($conn);

$users = $UserDAO->findAll();
?>

<!-- Bootstrap CSS -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
  integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">


<div class="container">
  <div class="col-8">
    <form action="UserController.php" method="post">


      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Name User</label>
        <input class="form-control" type="text" name="name" placeholder="Insert name user" required>

      </div>

      <div class="col-md-4">
        <label for="validationDefault01" class="form-label">Email User:</label>
        <input type="email" class="form-control" name="email" placeholder="name@example.com" required>

      </div>

      <div class="col-12">
        <button class="btn btn-primary" type="submit" value="Subit">Save</button>
      </div>
    </form>
  </div>
</div>

<div class="container">
  <div class="col-8">
    <ul>
      <?php
    foreach ($users as $user) {
      ?>
      <div class="card text-center" style="width: 18rem;">
        <div class="card-body">
          <h6 class="card-title"><?= $user->getName() ?></h6>
          <p class="card-text"><?= $user->getEmail() ?></p>
        </div>
      </div>
      <?php
    }
  ?>
    </ul>
  </div>
</div>