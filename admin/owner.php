
<?php
ob_start();
session_start();
 if(isset($_SESSION['admin'])){
     include("connect.php");
     include("functions/function.php");
     $action = isset($_GET['action']) ? $_GET['action'] : 'manage';
      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>Tables | PlainAdmin Demo</title>

    <!-- ========== All CSS files linkup ========= -->
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <!-- ======== sidebar-nav start =========== -->
    <?php
    include("template/sidebar_index1.php");
    ?>
    <div class="overlay"></div>
    <!-- ======== sidebar-nav end =========== -->

    <!-- ======== main-wrapper start =========== -->
    <main class="main-wrapper">
      <!-- ========== header start ========== -->
     <?php
     include('template/header_index1.php');
     ?>
      <!-- ========== header end ========== -->
<?php
if($action == 'manage'){
?>
      <!-- ========== table components start ========== -->
      <section class="table-components">
        <div class="container-fluid">
        
          <!-- ========== title-wrapper end ========== -->

          <!-- ========== tables-wrapper start ========== -->
          <div class="tables-wrapper" style='margin-top: 50px;'>
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Data Users Table</h6>
                  <p class="text-sm mb-20">
                    Users Table
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                      <tr>
                          <th><h6>Owner</h6></th>
                          <th><h6>Email</h6></th>
                          <th><h6>Phone</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                    
                         
                      <?php

                        $users = $conn -> prepare("SELECT * FROM owners WHERE admin != 1");
                        $users -> execute();
                        $rows= $users -> fetchAll();

                        foreach($rows as $row){
                            
      ?>
        <tr>
          <td class="min-width">
            <div class="lead">
              <div class="lead-image">
                <img 
                  src="../img/<?php echo $row['image'] ?>"
                />
              </div>
              <div class="lead-text">
                <p><a href="?action=show&id=<?php echo $row['id'] ?>"><?php echo $row['name'] ?></p></a>
              </div>
            </div>
          </td>
          <td class="min-width">
            <p><?php echo $row['email'] ?></p>
          </td>
          <td class="min-width">
            <p><?php echo $row['phone'] ?></p>
          </td>
          <td>
            <div class="action">
              <button class="text-danger">
                <a href="?action=delete&id=<?php echo $row['id'] ?>" style='color: red;'><i class="lni lni-trash-can"></i></a>
              </button>
            </div>
          </td>
        </tr>
        <?php 
                        }
        ?>
    </table>
    </div>
    </div>
    </div>
    </div>

        <?php
// #######################################################################
}else if($action == 'show'){

    @$id = $_GET['id'];

    $stmt = $conn -> prepare("SELECT * FROM owners WHERE admin != 1 AND id = ?");
            $stmt -> execute(array($id));
            $user = $stmt -> fetch();
?>
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="titlemb-30">
                  <h2>Settings </h2>
                </div>
              </div>
              <!-- end col -->
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                      <li class="breadcrumb-item">
                        <a href="index1.php">Dashboard</a>
                      </li>
                      <li class="breadcrumb-item"><a href="#0">Pages</a></li>
                      <li class="breadcrumb-item active" aria-current="page">
                     <a href="#">Settings</a>   
                      </li>
                    </ol>
                  </nav>
                </div>
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->
          </div>
          <!-- ========== title-wrapper end ========== -->

          <div class="row">
            <div class="col-lg-6">
              <div class="card-style settings-card-1 mb-30">
                <div
                  class="
                    title
                    mb-30
                    d-flex
                    justify-content-between
                    align-items-center
                  "
                >
                  <h6>My Profile</h6>
                  <button class="border-0 bg-transparent">
                    <a href="settings.php"><i class="lni lni-pencil-alt"></i></a>
                  </button>
                </div>
                <div class="profile-info">
                  <div class="d-flex align-items-center mb-30">
                    <div class="profile-image">
                      <img src="assets/images/users/<?php echo $user['image'] ?>" style='width:90px;height: 100px;' />
                      <div class="update-image">
                        <input type="file" />
                        <label for=""
                          ><i class="lni lni-cloud-upload"></i
                        ></label>
                      </div>
                    </div>
                    <div class="profile-meta">
                      <h5 class="text-bold text-dark mb-10"><?php echo $user['name']?></h5>
                      <p class="text-sm text-gray"><?php echo $user['jop']?></p>
                    </div>
                  </div>

     <form action="<?php $_SERVER['PHP_SELF']?>?action=update&id=<?php echo $user['id'] ?>" method='POST'>

                  <div class="input-style-1">
                    <label>First Name</label>
                    <input
                      name='name'
                      type="text"
                      placeholder="user First Name"
                      value="<?php echo $user['name'] ?>"
                    />
                  </div>
                  <div class="input-style-1">
                    <label>Jop</label>
                    <input
                      name='jop'
                      type="text"
                      placeholder="user First Name"
                      value="<?php echo $user['jop'] ?>"
                    />
                  </div>
                  <input type="hidden"
                         name='id' 
                         value='<?php echo $user['id'] ?>'
                    />
                  <div class="input-style-1">
                    <label>Old Password</label>
                    <input name='oldpassword' placeholder='write your old Password' type="password" />
                  </div>
                  <div class="input-style-1">
                    <label>New Password</label>
                    <input name='newpassword' placeholder='write your new Password' type="password"/>
                  </div>
    
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-lg-6">
              <div class="card-style settings-card-2 mb-30">
                <div class="title mb-30">
                  <h6>My Profile</h6>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Phone</label>
                        <input
                      name='phone'
                      type="number"
                      placeholder="www.uideck.com"
                      value="<?php echo $user['phone'] ?>"
                    />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                      <label>Email</label>
                    <input
                      name='email'
                      type="email"
                      placeholder="user@example.com"
                      value="<?php echo $user['email'] ?>"
                    />
                      </div>
                    </div>

                    <div class="col-12">
                    <div class="input-style-1">
                      <label for=""> image </label>
                      <input name="avatar" type="file" required="require" value='<?php echo $user['image']?>'>
                      <img src="../img/<?php echo $user['image']?>" alt="Item Photo" style='width: 100px;margin:10px;'>
                     </div>
                    </div>
                    <div class="col-12">
                      <button class="main-btn primary-btn btn-hover">
                        Update Profile
                      </button>
                    </div>
                  </div>
                </form>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->
          </div>
          <?php
           
//######################################################################           
}elseif($action == 'update'){

    $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $name    = $_POST['name'];
        $email        = $_POST['email'];
        $password1    = $_POST['oldpassword'];
        $password2    = $_POST['newpassword'];
        $phone        = $_POST['phone'];
        $jop         = $_POST['jop'];


        $avatarname = $_FILES['avatar']['name'];
        $avatarsize = $_FILES['avatar']['size'];
        $avatartmp = $_FILES['avatar']['tmp_name'];
        $avatartype = $_FILES['avatar']['type'];

         $avatarAllowedExtensions = array("jpg" , "jpeg" , "png" , "gif");  // allowed files

         @$avatarExtention = strtolower( end ( explode ('.' , $avatarname) ) );


         $formErrors = [];
         if(empty($password1)){    
         $formErrors[] = "Enter Your Password Please";
        }
        if($password1 !== $password2){
         $formErrors[] = "enter Your Password Right";
         }
         if(empty($password1)){
         $formErrors[] = "Sorry Password Field Can’t Be Empty";
         }
         if(empty($password2)){
         $formErrors[] = "Sorry The New Password Field Can’t Be Empty";
         }
        if(strlen($name) < 2 ){
            $formErrors[] = "Sorry Your Name Can’t Be Less Than 2 Characters ";
        }
        if(strlen($name) > 200 ){
            $formErrors[] = "Sorry Your Name Can’t Be Larger Than 200 Characters ";
        }
        if(empty($name)){
            $formErrors[] = "Sorry Your Name Can’t Be Empty";
        }
        if(empty($email)){
            $formErrors[] = "Sorry Your E_mail Can’t Be Empty ";
        }

        foreach($formErrors as $error){
            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
            header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");
        }
        if(empty($formErrors)){

          $avatar = rand(0 , 100000000) . '_' . $avatarname;
          move_uploaded_file($avatartmp , "../img/" . $avatar);

          $stmt2 = $conn -> prepare("SELECT * FROM owners WHERE name= ? AND id != ?");
          $stmt2 -> execute(array($name , $id));
          $count = $stmt2 -> rowCount();

       if($count == 1){
          echo "<div class='alert alert-danger text-center container'>This  Name Is Exist</div>";
          header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");
       }else{
          $stmt = $conn -> prepare ("UPDATE owners SET name = ?,jop = ? , iamge = ? , admin = ? , password = ? ,  email = ?,phone=? WHERE id = ?");
          $stmt -> execute(array($name , $jop , $avatar , 0 ,$password2 , $email , $phone,$id ));
          echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Updated </div>';
          header("refresh:3;url=owners.php");
       }
   }

        }else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index1.php");
        }


}elseif($action == 'add'){
      ?>
   <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>?action=insert" method='POST'>
  
  
   <div class="col-lg-10" style='margin: 50px ;'>
              <div class="card-style settings-card-2 mb-30">
                <div class="title mb-30">
                  <h6>New Profile</h6>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>first Name</label>
                        <input name='firstname' type="text" placeholder="First Name"/>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Last Name</label>
                        <input type="text" placeholder="Last Name" name='lastname'/>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Email</label>
                        <input type="email" placeholder="email" name='email'/>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Password</label>
                        <input type="password" placeholder="Password" name='password'/>
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>City</label>
                        <input name='city' type="text" placeholder="City" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Location</label>
                        <input name='location' type="text" placeholder="location" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Jop</label>
                        <input name='jop' type="text" placeholder="Jop" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Phone</label>
                        <input name='phone' type="text" placeholder="phone" />
                      </div>
                    </div>
                    <div class="col-12">
                      <div class="input-style-1">
                          <label for="">User Avatar :</label>
                          <input  name="avatar" type="file" required="require">
                       </div>
                    </div>
                    <div class="col-12">
                      <button class="main-btn primary-btn btn-hover col-12">
                        Finish
                      </button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
  </form>

<?php

}elseif($action == 'insert'){

              if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $firstname     = $_POST['firstname'];
                $lastname      = $_POST['lastname'];
                $email         = $_POST['email'];
                $pass          = $_POST['password'];
                $city          = $_POST['city'];
                $location      = $_POST['location'];
                $jop           = $_POST['jop'];
                $phone         = $_POST['phone']; 

                $password = sha1($pass);


                $avatarname = $_FILES['avatar']['name'];
                $avatarsize = $_FILES['avatar']['size'];
                $avatartmp = $_FILES['avatar']['tmp_name'];
                $avatartype = $_FILES['avatar']['type'];

                $avatarAllowedExtensions = array("jpg" , "jpeg" , "png" , "gif");  // allowed files

                @$avatarExtention = strtolower( end ( explode ('.' , $avatarname) ) );

      $formErrors = [];
      if(strlen($firstname) < 2 ){
      $formErrors[] = "Sorry Your Name Can’t Be Less Than 2 Characters ";
      }
      if(strlen($firstname) > 20 ){
      $formErrors[] = "Sorry Your Name Can’t Be Larger Than 20 Characters ";
      }
      if(empty($firstname)){
      $formErrors[] = "Sorry Your Name Can’t Be Empty";
      }
      if(empty($password)){
      $formErrors[] = "Sorry Your Password Can’t Be Empty ";
      }
      if(empty($email)){
      $formErrors[] = "Sorry Your E_mail Can’t Be Empty ";
      }
      if(empty($lastname)){
      $formErrors[] = "Sorry Your Full Name Can’t Be Empty ";
      }

     foreach($formErrors as $error){
      echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
      header("refresh:2;url=users.php?action=add");

       }

      if(empty($formErrors)){

        $avatar = rand(0 , 100000000) . '_' . $avatarname;
        move_uploaded_file($avatartmp , "assets\images\users\\" . $avatar);

        $stmt = $conn -> prepare("SELECT * FROM users WHERE firstname = ?");
        $stmt ->execute(array($firstname));
        $count = $stmt -> rowCount();

      if($count == 1){

          echo "<div class='alert alert-danger text-center container'>This User Name Is Exist</div>";
          header("refresh:2;url=users.php?action=add");
          exit();

        }else{

          $stmt = $conn -> prepare("INSERT INTO users
                                (firstname, lastname, email, city, location,jop, phone, image , password , Date, GroupID , approve)
                        VALUES
                                (:firstname , :lastname , :email , :city, :location , :jop , :phone, :avatar, :password , now() , 0, 1)");
            $stmt -> execute(array(
            'firstname'   => $firstname,
            'lastname'    => $lastname,
            'email'       => $email,
            'city'        => $city,
            'location'    => $location,
            'jop'         => $jop,
            'phone'       => $phone,
            'password'    => $password,
            'avatar'      => $avatar
            ));
                  echo "<div class='alert alert-success text-center container'>" . $stmt->rowCount() . " Recored Done</din>";
                  header("refresh:2;url=users.php");
}
}


}else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index.php");
}


// ############################################################################


}elseif($action == 'delete'){

  $id = $_GET['id'];

  $stmt_delete = $conn -> prepare("SELECT * FROM users WHERE user_id = ? && GroupID != 1");
  $stmt_delete -> execute(array($id));
  $count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

    $stmt = $conn -> prepare("DELETE FROM users WHERE user_id = ?");
    $stmt -> execute(array($id));

    echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Deleted </div>';
    header("refresh:2;url=users.php");

}else{

    echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
    header("refresh:2;url=index.php");
}
}

// ######################################################################
        ?>
        <!-- end table row -->
     
                    <!-- end table -->
                  </div>
                </div>
                <!-- end card -->
              </div>
              <!-- end col -->
            </div>
            <!-- end row -->

           
            <!-- end row -->

            
            <!-- end row -->
          </div>
          <!-- ========== tables-wrapper end ========== -->
        </div>
        <!-- end container -->
      </section>
      <!-- ========== table components end ========== -->

      <!-- ========== footer start =========== -->
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a
                    href="https://plainadmin.com"
                    rel="nofollow"
                    target="_blank"
                  >
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <!-- end col-->
            <div class="col-md-6">
              <div
                class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                "
              >
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
          <!-- end row -->
        </div>
        <!-- end container -->
      </footer>
      <!-- ========== footer end =========== -->
    </main>
    <!-- ======== main-wrapper end =========== -->

    <!-- ========= All Javascript files linkup ======== -->
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>

          

<?php
}else{
  header("location:index1.php");
  exit();
}

ob_end_flush();
?>