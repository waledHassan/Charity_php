<?php
include('functions/function.php');
include('connect.php');

   session_start();
	 $nonavbar = '';
   $action = isset($_GET['action']) ? $_GET['action'] : 'manage';

	 if(isset($_SESSION['admin'])){
		 header("location:index1.php");
		 exit();
	 }

	if($_SERVER['REQUEST_METHOD'] == 'POST') {

           $admin_name  = $_POST['name'];

		 $stmt = $conn -> prepare("SELECT * FROM users WHERE firstname = ? AND  GroupID = 1 AND admin = 1 LIMIT 1");
                               $stmt -> execute(array($admin_name));
                               $rows = $stmt -> fetch();
                               $admin = $stmt -> rowCount();

		 if($admin > 0){
             $_SESSION['admin'] = $rows['firstname'];
             $_SESSION['id'] = $rows['user_id'];
			       header("location:index1.php");
			       exit();
		     }else{
             header("location:forget_Password.php");
         }
	 }
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>AdminLTE 3 | Forgot Password</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="plugins/icheck-bootstrap/icheck-bootstrap.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
</head>
<body class="hold-transition login-page">
<div class="login-box">
  <div class="login-logo">
    <b>Forget</b>Password
  </div>
  <!-- /.login-logo -->
  <div class="card">
    <div class="card-body login-card-body">
      <p class="login-box-msg">You forgot your password? Here you can easily retrieve a new password Enter Your Name Correct To Check.</p>

      <form action='<?php echo $_SERVER['PHP_SELF']; ?>' method="post">
        <div class="input-group mb-3">
          <input type="text" class="form-control" placeholder="Enter Your Name" name='name'>
          <div class="input-group-append">
            <div class="input-group-text">
              <span class="fas fa-eye"></span>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-12">
            <button type="submit" class="btn btn-primary btn-block">Go</button>
          </div>
        </div>
      </form>



<!-- jQuery -->
<script src="../../plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="../../plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- AdminLTE App -->
<script src="../../dist/js/adminlte.min.js"></script>
</body>
</html>
