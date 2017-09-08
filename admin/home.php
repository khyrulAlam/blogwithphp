<?php
  require 'app/controller.php';

  is_login();
  $rows=query($conn,'post');


  view('home',array(
    'rows' => $rows
  ));
?>
