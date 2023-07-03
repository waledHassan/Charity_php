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
    <title>لوحة تحكم الجمعية</title>
    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>

   <?php
      include("template/sidebar_index1.php");
   ?>

    <div class="overlay"></div>
    <main class="main-wrapper">

     <?php
       include("template/header_index1.php");
     
     ?>

      <section class="section">
        <div class="container-fluid">
          <?php 
             if($action == 'manage'){

                $stmt = $conn -> prepare("SELECT * FROM owners WHERE admin = 1 LIMIT 1");
                $stmt -> execute(array());
                $admins = $stmt -> fetchAll();
                foreach($admins as $admin){
          ?>
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="titlemb-30">
                  <h2>Settings</h2>
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
                      <img src="../img/<?php echo $admin['image'] ?>" style='width:90px;height: 100px;' />
                      <div class="update-image">
                        <input type="file" />
                        <label for=""
                          ><i class="lni lni-cloud-upload"></i
                        ></label>
                      </div>
                    </div>
                    <div class="profile-meta">
                      <h5 class="text-bold text-dark mb-10"><?php echo $admin['name']?></h5>
                      <p class="text-sm text-gray"><?php echo $admin['jop']?></p>
                    </div>
                  </div>

     <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>?action=update" method='POST'>

                  <div class="input-style-1">
                    <label>First Name</label>
                    <input
                      name='name'
                      type="text"
                      placeholder="Admin First Name"
                      value="<?php echo $admin['name'] ?>"
                    />
                  </div>
                  <input type="hidden"
                         name='id' 
                         value='<?php echo $admin['id'] ?>'
                    />
                  <div class="input-style-1">
                    <label>Email</label>
                    <input
                      name='email'
                      type="email"
                      placeholder="admin@example.com"
                      value="<?php echo $admin['email'] ?>"
                    />
                  </div>
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
                      <div class="input-style-1">
                    <label>Phone</label>
                    <input
                      name='phone'
                      type="number"
                      placeholder="www.uideck.com"
                      value="<?php echo $admin['phone'] ?>"
                    />
                  </div>
                      </div>
                    </div>
                  
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Jop</label>
                        <input name='jop' type="text" placeholder="Jop" value='<?php echo $admin['jop'] ?>' />
                      </div>
                    </div>
                    <div class="col-12">
                    <div class="input-style-1">
                      <label for=""> Image :</label>
                      <input name="avatar" type="file" required="require" value='<?php echo $product['image']?>'>
                      <img src="../img/<?php echo $admin['image']?>" alt="Item Photo" style='width: 100px;margin:10px;'>
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
           }
              }elseif($action == 'update'){

                  if($_SERVER['REQUEST_METHOD'] == 'POST' ){
                        $name    = $_POST['name'];
                        $id           = $_POST['id'];
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
                        if(strlen($name) > 200 ){
                            $formErrors[] = "Sorry Your Name Can’t Be Larger Than 20 Characters ";
                        }
                        if(empty($name)){
                            $formErrors[] = "Sorry Your Name Can’t Be Empty";
                        }
                        if(empty($email)){
                            $formErrors[] = "Sorry Your E_mail Can’t Be Empty ";
                        }
         
                        foreach($formErrors as $error){
                            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
                            header("refresh:2;url=settings.php");
                        }
                        if(empty($formErrors)){

                          $avatar = rand(0 , 100000000) . '_' . $avatarname;
                          move_uploaded_file($avatartmp , "../img/" . $avatar);

                          $stmt2 = $conn -> prepare("SELECT * FROM owners WHERE name= ? AND id != ?");
                          $stmt2 -> execute(array($name , $id));
                          $count = $stmt2 -> rowCount();
   
                       if($count == 1){
                          echo "<div class='alert alert-danger text-center container'>This Admin Name Is Exist</div>";
                          header("refresh:2;url=settings.php");
                       }else{
                          $stmt = $conn -> prepare ("UPDATE owners SET name = ? , jop = ? , email = ? , password = ? , image = ? ,phone=? WHERE id = ?");
                          $stmt -> execute(array($name , $jop , $email , $password2 , $avatar ,$phone,$id ));
                          echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Updated </div>';
                          header("refresh:3;url=settings.php");
                       }
                  }
   
             }else{
               echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
               header("refresh:2;url=index1.php");
             }


                  }
                   
              
          ?>
          <!-- end row -->
        </div>
        <!-- end container -->
      </section>
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
        </div>
    </main>
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
  }

?>