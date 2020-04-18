<?php

class Dbh
{
  private $host = 'localhost';
  private $user = 'root';
  private $pwd = '';
  private $dbName = 'oop_pdo';

  protected function connect()
  {
    $dsn = "mysql:host=$this->host;dbName=$this->dbName";
    $pdo = new PDO($dsn, $this->user, $this->pwd);
    // optional parameter that allows for fetch() to execute since we set a default fetch mode
    $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
    return $pdo;
  }
}
