<?php
  session_start();
  require 'db.php';
  require 'view.php';
  $conn = connect($config);

  if(!$conn) die('Could\'t connect the database');
