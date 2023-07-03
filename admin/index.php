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

          //  $admin     = $_POST['admin'];
           $password  = $_POST['password'];
          //  $hashdpass = sha1($password) ;

		 $stmt = $conn -> prepare("SELECT * FROM owners WHERE password = ? AND admin = 1 LIMIT 1");
                               $stmt -> execute(array($password));
                               $rows = $stmt -> fetch();
                               $admin = $stmt -> rowCount();

		 if($admin > 0){
             $_SESSION['admin'] = $rows['name'];
             $_SESSION['id'] = $rows['id'];
			       header("location:index1.php");
			       exit();
		     }
	 }
?>






<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <title>Lockscreen</title>
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
  <link rel="stylesheet" href="plugins/fontawesome-free/css/all.min.css">
  <link rel="stylesheet" href="dist/css/adminlte.min.css">
  <link rel="stylesheet" href="css/style.css">
  <link rel="stylesheet" href="css/bootstrap.min.css">
  <link rel="stylesheet" href="css/font-awesome.min.css">
</head>

<body class="hold-transition lockscreen">


<!-- Automatic element centering -->
<div class="lockscreen-wrapper">
  <div class="lockscreen-logo">
    <!-- <a href="index.html"><b>Admin</b>LTE</a> -->
  </div>
  <div class="lockscreen-name"><?php $stmt = $conn -> prepare("SELECT * FROM owners WHERE admin = 1 LIMIT 1");
                                     $stmt -> execute(array());
                                     $rows = $stmt -> fetchAll();
                                      foreach($rows as $row){
                                         echo $row['name'];



  ?></div>

  <!-- START LOCK SCREEN ITEM -->
  <div class="lockscreen-item">
    <!-- lockscreen image -->
    <div class="lockscreen-image">
      <img src="../img/<?php echo $row['image'] ?>" alt="admin Image" >
    </div>
    <!-- /.lockscreen-image -->
 <?php
}
?>
    <!-- lockscreen credentials (contains the form) -->
    <form class="lockscreen-credentials" method="POST" action='<?php echo $_SERVER['PHP_SELF']; ?>'>
      <div class="input-group">
        <input type="password" class="form-control" placeholder="password" name='password'>

        <div class="input-group-append">
          <button type="submit" class="btn">
            <i class="fas fa-arrow-right text-muted"></i>
          </button>
        </div>
      </div>
    </form>
    <!-- /.lockscreen credentials -->

  </div>
  <!-- /.lockscreen-item -->
</div>

<script src="plugins/jquery/jquery.min.js"></script>
<script src="plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
</body>
</html>
