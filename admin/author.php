<?php
  require 'app/controller.php';

  if($conn){
    //featch all data;
    $row = query($conn,'author');

    //insert into database;
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $author = $_POST['author_name'];
      $result = insert(
                  $conn,
                  "INSERT INTO author(author_name) values(:author_name)",
                  array(
                      'author_name' => $author
                  ));
      if($result){
        header('location:/blog/admin/author.php');
      }
    }
  }else{
    echo "Could't connect database";
  }

  view('author',array(
    'row' =>$row
  ));
?>
