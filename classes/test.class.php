<?php

class Test extends Dbh
{
  // without prepared statement
  public function getUsers()
  {
    $sql = "SELECT u_firstname from tbl_users";
    $stmt = $this->connect()->query($sql);
    while ($row = $stmt->fetch()) {
      echo $row['u_firstname'] . "<br>";
    }
  }

  // with prepared statement
  public function getUsersStmt($firstname, $lastname)
  {
    $sql = "SELECT * FROM tbl_users WHERE u_firstname = ? AND u_lastname = ?";
    // prepare the stmt first before querying it 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $lastname]);
    $names = $stmt->fetchAll();

    foreach ($names as $name) {
      echo $name['u_firstname'] . '<br>';
    }
  }

  public function setUsersStmt($firstname, $lastname, $dob)
  {
    $sql = "INSERT INTO tbl_users(u_firstname, u_lastname, u_dateofbirth) VALUES (?,?,?)";
    // prepare the stmt first before querying it 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $lastname, $dob]);
  }
}
