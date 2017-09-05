<?php

function view($path,$data=null){
  if($data){
    extract($data);
  }
  $path = $path.'.view.php';
  include "layout/mainLayout.php";
}
