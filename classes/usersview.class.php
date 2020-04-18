<?php

// View 

class UsersView extends Users
{
  public function showUser($name)
  {
    $results = $this->getUser($name);
    echo "Full Name: " . $results['u_firstname'];
  }
}
