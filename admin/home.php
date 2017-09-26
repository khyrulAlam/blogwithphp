<?php
  require 'app/controller.php';

  //is_login();
  //$rows=query($conn,'post');
  $author_name = Session::get('author_name');
  if(empty($author_name)){
    header('location:/blog/admin/index.php');
  };
  $db = new Database;
  $rows = $db->select('post');

  view('home',array(
    'rows' => $rows
  ));
?>
