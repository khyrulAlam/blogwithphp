<?php
/**
 * Database Class
 */
class Database
{
  private $host = 'localhost';
  private $user = 'root';
  private $pass = 'root';
  private $dbname = 'blog';
  private $pdo;
  public function __construct()
  {
    if(!isset($this->pdo)){
      try {
        $link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname,$this->user,$this->pass);
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $link->exec("SET CHARACTER SET utf8");
        $this->pdo = $link;
      } catch (PDOException $e) {
        echo "ERROR:".$e->getMessage();
        die("Fail Database Connection");
      }

    }
  }

//Read Data
  public function select(){}
//Insert Data
  public function insert(){}
//Delete Data
  public function delect(){}
//Edit Data
  public function edit(){}
//Update Data
  public function update(){}

}

 ?>
