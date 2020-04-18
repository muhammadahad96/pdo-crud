<?php

// Model

class Users extends Dbh
{
  protected function getUser($name)
  {
    $sql = "SELECT * FROM tbl_users WHERE u_firstname = ?";
    // prepare the stmt first before querying it 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$name]);

    $results = $stmt->fetchAll();
    return $results;
  }

  protected function setUser($firstname, $lastname, $dob)
  {
    $sql = "INSERT INTO tbl_users(u_firstname, u_lastname, u_dateofbirth) VALUES (?,?,?)";
    // prepare the stmt first before querying it 
    $stmt = $this->connect()->prepare($sql);
    $stmt->execute([$firstname, $lastname, $dob]);
  }
}
