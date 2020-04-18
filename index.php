<?php
include('includes/class-autoload.inc.php');
?>

<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>

<body>
  <?php
  $testObj = new Test();
  // $testObj->getUsersStmt("Muhammad", "Ahad");
  // $testObj->setUsersStmt("Abdul", "Sami", "2020-04-15");

  // $usersObj = new UsersView();
  // $usersObj->showUser("Muhammad");

  $usersObj2 = new UsersContr();
  $usersObj2->createUser("Abdul", "Sami", "2020-04-15");

  ?>
</body>

</html>