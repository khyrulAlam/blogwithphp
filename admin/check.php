<?php

require 'app/Database.php';
$obj = new Database();
$table = "post";
$sel = array(
  'where' => array('id' => 7),
  'return_type' => 'single'
);
  $data = $obj->select($table,$sel);
  if(!empty($data)){
    echo "<pre>";
    print_r($data);
  }else{
    echo "query problem";
  };

?>

<h1>Hello world</h1>

<form class="" action="" method="post">
  <input type="text" name="" value="">
</form>
