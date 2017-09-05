<?php
  require 'app/db.php';
  require 'app/view.php';

  $conn = connect($config);

  if($conn){
    $rows = query($conn,'category');
    if($_SERVER['REQUEST_METHOD'] === 'POST'){
      $category_name = $_POST['category_name'];
      $result = insert(
        $conn,
        "INSERT INTO category(category_name) values(:category_name)",
        array(
          'category_name' => $category_name
        )
      );
      if($result){
        header('location:/blog/admin/category.php');
      }else{
        echo "Insert problem";
      }
    }
  }else{
    echo "connection fails";
  }
  view('category',array(
    'rows' => $rows
  ));
?>
