<?php
  require 'app/controller.php';

 $ctg = query($conn,'category');
 $data = [];

   if($_SERVER['REQUEST_METHOD'] === 'POST'){
       $category_id  = $_POST['category_id'];
       $author_id    = $_POST['author_name'];
       $title        = $_POST['title'];
       $body         = htmlspecialchars($_POST['body']);
       $tag          = $_POST['tag'];

       //Image Processing with uniq name
       $imgname = $_FILES['img']['name'];
       $imgtmp = $_FILES['img']['tmp_name'];
       $divi = explode('.',$imgname);
       $startextn = strtolower($divi[0]);
       $endextn = strtolower(end($divi));
       $uniqname = $startextn.substr(md5(time()),0,10).'.'.$endextn;
       $img = "../assets/img/".$uniqname;

       if(move_uploaded_file($imgtmp,$img)){
            $result = insert($conn,
                   "INSERT INTO  post(category_id,author_id,title,body,img,tag)
                   values(:category_id,:author_id,:title,:body,:img,:tag)",
                   array(
                     'category_id' => $category_id,
                     'author_id'  => $author_id,
                     'title'  => $title,
                     'body' => $body,
                     'img'  => $img,
                     'tag'  => $tag
                   )
                 );
          if($result){
            $data['sucs'] = "inset successfully";
          }
       }else{
         $data['error'] = "image insert problem";
       }

   }

  view('addblog',array(
        'ctg' => $ctg,
        'data'=> $data
  ));
?>
