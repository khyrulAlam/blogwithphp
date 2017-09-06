<?php
  require 'app/controller.php';

  if($conn){
    $ctg = query($conn,'category');

    view('blog',array(
        'ctg' => $ctg,
    ));

  }else{
    echo "Database connection failed";
  }
?>
