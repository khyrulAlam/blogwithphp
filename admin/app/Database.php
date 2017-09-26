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
        $link = new PDO("mysql:host=".$this->host.";dbname=".$this->dbname.";charset=utf8",$this->user,$this->pass);
        $link->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
        $link->exec("set names utf8");
        $this->pdo = $link;
      } catch (PDOException $e) {
        echo "ERROR:".$e->getMessage();
        die("Fail Database Connection");
      }

    }
  }

//Read Data
  public function select($table,$data = array()){
    // echo $table;
    // print_r($data);
    // exit();
    $sql = "SELECT ";
    $sql .= array_key_exists('select',$data)? $data['select'] : '*';
    $sql .=" FROM ".$table;
    if(array_key_exists("where",$data)){
      $sql .= " WHERE ";
      $i=0;
      foreach ($data['where'] as $key => $value) {
        $add = '';
        $add .= ($i > 0)?" AND ":"";
        $sql .= "$add"."$key= :$key";
        $i++;
      }
    }
    if(array_key_exists("order_by",$data)){
      $sql .= " ORDER BY ".$data['order_by'];
    }
    if(array_key_exists("start",$data) && array_key_exists("limit",$data)){
      $sql .= " LIMIT ".$data['start'].",".$data['limit'];
    }elseif (array_key_exists("limit",$data)) {
      $sql .= " LIMIT ".$data['limit'];
    }

    $query = $this->pdo->prepare($sql);

    if(array_key_exists("where",$data)){
      foreach ($data['where'] as $key => $add) {
        $query->bindValue(":$key",$add);
      }
    }
    $query->execute();

    if(array_key_exists("return_type", $data)){
      switch ($data['return_type']) {
        case 'count':
          $value = $query->rowCount();
          break;
        case 'single':
          $value = $query->fetch(PDO::FETCH_ASSOC);
          break;

        default:
          $value = '';
          break;
      }
    }else{
      if($query->rowCount() > 0){
        $value = $query->fetchAll(PDO::FETCH_ASSOC);
      }
    }

    return !empty($value)? $value:false;

  }
//Insert Data
  public function insert($table,$data){
    if(!empty($data) && is_array($data)){
      $keys   = '';
      $values = '';
      $i = 0;
      $keys   =  implode(',',array_keys($data));
      $values =  ':'.implode(', :',array_keys($data));
      $sql = "INSERT INTO ".$table." (".$keys.") VALUES (".$values.")";
      $query = $this->pdo->prepare($sql);



      foreach ($data as $key => $value) {
        $query->bindValue(":$key", $value);
      }
      $result = $query->execute();
      if ($result) {
        $lastid = $this->pdo->lastInsertId();
        return $lastid;
      }else{
        return false;
      }
    }

  }
  //Update Data
  public function update($table,$data,$condition){
    if(!empty($data) && is_array($data)){
      $keys   = '';
      $values = '';
      $i = 0;
      foreach ($data as $key => $value) {
        $add = '';
        $add = ($i > 0)?" , ":"";
        $keys .= "$add"."$key= :$key";
        $i++;
      }

      if(!empty($condition) && is_array($condition)){
        $values .= " WHERE ";
        $i = 0;
        foreach ($condition as $key => $value) {
          $add = '';
          $add = ($i > 0)?" AND ":"";
          $values .= "$add"."$key= :$key";
          $i++;
        }
      }

      $sql = "UPDATE ".$table." SET ".$keys.$values;
      $query = $this->pdo->prepare($sql);
      foreach ($data as $key => $value) {
        $query->bindValue(":$key", $value);
      }
      $result = $query->execute();
      return $result ? $query->rowCount(): false;
    }else{
      return false;
    }
  }
//Delete Data
  public function delect($table,$data){
    if(!empty($data) && is_array($data)){
      $values .= " WHERE ";
      $i = 0;
      foreach ($data as $key => $value) {
        $add = '';
        $add = ($i > 0)?" AND ":"";
        $values .= "$add"."$key= :$key";
        $i++;
      }
    $sql = "DELETE FROM".$table.$values;
    $query = $this->pdo->prepare($sql);
    foreach ($data as $key => $value) {
      $query->bindValue(":$key", $value);
    }
    $delete = $query->execute();
    return $delete ? true:false;

    }

  }

}
