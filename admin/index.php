<?php
  require 'app/controller.php';
  //require 'app/Database.php';
  //require 'app/Session.php';
  $db = new Database();
  Session::init();
  $author_name = Session::get('author_name');
  if(!empty($author_name)){
    header('location:/blog/admin/home.php');
  };

  $data = [];
  if($_SERVER['REQUEST_METHOD'] === 'POST'){
    $user = trim($_POST['username']);
    $pass = trim($_POST['password']);
    if(!empty($user) && !empty($pass)){
      $check = array(
        'where' => array('author_name' => $user,'password'=> md5($pass)),
        'return_type' => 'single'
      );
      $result = $db->select('author',$check);
      if (!$result) {
        $data['error'] = "User Or Password doesn't match";
      }else{
        //$_SESSION['author_name'] = $result['author_name'];
        $author_name = $result['author_name'];
        Session::set('author_name',$author_name);
        header('location:/blog/admin/home.php');
      }
    }else{
      $data['error'] = "Please Input Your User Name And Password";
    }
  }
?>


<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/css/bootstrap.min.css" integrity="sha384-/Y6pD6FV/Vv2HJnA6t+vslU6fwYXjCFtcEpHbNJ0lyAFsXTsjBbfaDjzALeQsN6M" crossorigin="anonymous">
    </head>
  <body>

    <section>
      <div class="container">
        <div class="row justify-content-center">
          <div class="col-4">
            <h1 class="text-center text-success">LOG IN</h1>
            <?php if(isset($data['error'])){?>
            <div class="alert alert-danger" role="alert">
              <span style="font-size:13px"><?= $data['error'];?></span>
            </div>
          <?php } ?>
            <div class="card">
              <div class="card-body">
                <form class="" action="" method="post">
                  <div class="form-group">
                    <label for="username">USER NAME</label>
                    <input type="text" name="username" id="username" class="form-control">
                  </div>
                  <div class="form-group">
                    <label for="password">PASSWORD</label>
                    <input type="password" name="password" id="password" class="form-control">
                  </div>
                  <div class="form-group">
                    <button type="submit" class="btn btn-outline-success">SUBMIT</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
    </section>

  <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
  <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.11.0/umd/popper.min.js" integrity="sha384-b/U6ypiBEHpOf/4+1nzFpr53nxSS+GLCkfwBdFNTxtclqqenISfwAzpKaMNFNmj4" crossorigin="anonymous"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta/js/bootstrap.min.js" integrity="sha384-h0AbiXch4ZDo7tp9hKZ4TsHbi047NrKGLO3SEJAg45jXxnGIfYzk4Si90RDIqNm1" crossorigin="anonymous"></script>
  </body>
</html>
