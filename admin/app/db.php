<?php

require 'config.php';

function connect($config){

  try {
    $conn = new PDO('mysql:host=localhost;dbname=blog',$config['user'],$config['pass']);
    $conn->setAttribute(PDO::ATTR_ERRMODE,PDO::ERRMODE_EXCEPTION);
    return $conn;
  } catch (Exception $e) {
    echo "ERROR: ".$e->getMessage();
  }

}

function query($conn,$table){
  try {
    $str = $conn->query("SELECT * FROM $table ORDER BY id DESC");
    return ($str->rowCount() >0)
          ? $str
          : false;
    //$result = $str->fetchAll(PDO::FETCH_ASSOC);
    //return $result ? $result : false;
  } catch (Exception $e) {
    return false;
  }

}

function insert($conn,$query,$binding){
  $strm = $conn->prepare($query);
  return $strm->execute($binding);
}

function login($conn,$user,$pass){

    $strt = $conn->prepare("SELECT * FROM author WHERE BINARY author_name=:author_name");
    $res = $strt->execute(array(
      'author_name' => $user
    ));
    $result = $strt->fetchAll(PDO::FETCH_ASSOC);
    return ($result) ? $result[0] : false;
    //echo $result['author_name'];
    //exit;
}


function is_login(){
  if(!isset($_SESSION['author_name'])){
    header('location:/blog/admin');
  }else{
    return false;
  }
}
