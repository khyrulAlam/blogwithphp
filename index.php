<?php
  include 'app/database.php';
  $obj = new Database();
  //var_dump($obj);
  $table = "author";
  $order_by = array(
      // 'select' => 'author_name',
      // 'order_by' => 'id DESC'
      'where' => array('id' => 2)
  );

    $data = $obj->select($table,$order_by);
    if(!empty($data)){
      echo "<pre>";
      print_r($data);
    }else{
      echo "query problem";
    };

 ?>

 <!DOCTYPE html>
 <html>
   <head>
     <meta charset="utf-8">
     <title>Hello world</title>
   </head>
   <body>
     <h1>Hello world</h1>

     <form action="" method="post" enctype="multipart/form-data">
       <input type="text" name="alt">
       <br>
       <input type="file" name="img">
       <br>
       <input type="submit" value="submit">
     </form>
     <br>
   </body>
 </html>
