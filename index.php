<?php

$config = array(
  'user' => 'root',
  'pass' => 'root'
);
try {
  $conn = new PDO('mysql:host=localhost;dbname=test',$config['user'],$config['pass']);
  //echo "ok";
} catch (Exception $e) {
  echo "Error:".$e->getMessage;
}

//exit();

  // $conn = mysqli_connect('localhost','root','root') or die('could not connet');
  // mysqli_select_db($conn,'test');
  //
  // $result = mysqli_query($conn,'SELECT * FROM users');

  // while ($row = mysqli_fetch_object($result)) {
  //   echo "<pre>";
  //   print_r($row);
  // }

  if($_SERVER['REQUEST_METHOD'] === 'POST'){

      $target = "img/". basename($_FILES['img']['name']);
      // $folder = "img/";
      // $file = basename( $_FILES['img']['name']);
      // $full_path = $folder.$file;

      if(move_uploaded_file($_FILES['img']['tmp_name'], $target)){
        echo "uploader"."<br>";
        $alt = $_POST['alt'];
        $img = $full_path;

        echo $alt."<br>".$img;

      }else{
        echo "upload failed";
      }
  }

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
     <div class="">
       <img src="img/cat.jpg" alt="" width="180" height="120">
     </div>
   </body>
 </html>
