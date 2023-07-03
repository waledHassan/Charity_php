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

                $stmt = $conn -> prepare("SELECT * FROM our_contact LIMIT 1");
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
                  <h6>Contact</h6>
                  <button class="border-0 bg-transparent">
                    <a href="#"><i class="lni lni-pencil-alt"></i></a>
                  </button>
                </div>
                <div class="profile-info">

     <form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>?action=update" method='POST'>

                  <div class="input-style-1">
                    <label>Phone</label>
                    <input
                      name='phone'
                      type="text"
                      placeholder="Phone Number"
                      value="<?php echo $admin['phone'] ?>"
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
                    <label>Whatsapp</label>
                    <input
                      name='whatsapp'
                      type="text"
                      placeholder="WhatsApp Number"
                      value="<?php echo $admin['whatsapp'] ?>"
                    />
                  </div>
                  <div class="input-style-1">
                    <label>Adress</label>
                    <input
                      name='adress'
                      type="text"
                      placeholder="Our Adress"
                      value="<?php echo $admin['address'] ?>"
                    />
                  </div>
                </div>
              </div>
              <!-- end card -->
            </div>
            <!-- end col -->

            <div class="col-lg-6">
              <div class="card-style settings-card-2 mb-30">
                <div class="title mb-30">
                  <h6>Links</h6>
                </div>
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                      <div class="input-style-1">
                    <label>Facebook</label>
                    <input
                      name='facebook'
                      type="text"
                      placeholder="Our limk Facebook"
                      value="<?php echo $admin['facebook'] ?>"
                    />
                  </div>
                      </div>
                    </div>
                  
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Twitter</label>
                        <input name='twitter' type="text" placeholder="Twitter Link" value='<?php echo $admin['twitter'] ?>' />
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Twitter</label>
                        <input name='twitter' type="text" placeholder="Twitter Link" value='<?php echo $admin['twitter'] ?>' />
                      </div>
                    </div>
                    
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Youtube</label>
                        <input name='youtube' type="text" placeholder="youtube Link" value='<?php echo $admin['youtube'] ?>' />
                      </div>
                    </div>

                    <div class="col-12">
                      <div class="input-style-1">
                        <label>Instgram</label>
                        <input name='instgram' type="text" placeholder="instgram Link" value='<?php echo $admin['instgram'] ?>' />
                      </div>
                    </div>

                    <div class="col-12">
                    <div class="input-style-1">
                      <label for=""> logo </label>
                      <input name="avatar" type="file" required="require" value='<?php echo $admin['logo']?>'>
                      <img src="../img/<?php echo $admin['logo']?>" alt="Item Photo" style='width: 100px;margin:10px;'>
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
                        $phone        = $_POST['phone'];
                        $email        = $_POST['email'];
                        $whatsapp     = $_POST['whatsapp'];
                        $id           = $_POST['id'];
                        $adress       = $_POST['adress'];
                        $facebook     = $_POST['facebook'];
                        $twitter      = $_POST['twitter'];
                        $youtube      = $_POST['youtube'];
                        $instgram      = $_POST['instgram'];


                        $avatarname = $_FILES['avatar']['name'];
                        $avatarsize = $_FILES['avatar']['size'];
                        $avatartmp = $_FILES['avatar']['tmp_name'];
                        $avatartype = $_FILES['avatar']['type'];
                
                         $avatarAllowedExtensions = array("jpg" , "jpeg" , "png" , "gif");  // allowed files
                
                         @$avatarExtention = strtolower( end ( explode ('.' , $avatarname) ) );
                         

                         $formErrors = [];
                         if(empty($phone)){    
                         $formErrors[] = "Enter Your phone Please";
                        }
                         if(empty($email)){
                         $formErrors[] = "Sorry email Field Can’t Be Empty";
                         }
                         if(empty($whatsapp)){
                         $formErrors[] = "Sorry WhatsApp Field Can’t Be Empty";
                         }
         
                        foreach($formErrors as $error){
                            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
                            header("refresh:2;url=settings.php");
                        }

                        if(empty($formErrors)){

                          $avatar = rand(0 , 100000000) . '_' . $avatarname;
                          move_uploaded_file($avatartmp , "../img/" . $avatar);
               
                          $stmt = $conn -> prepare ("UPDATE our_contact SET phone = ? , email = ? , whatsapp = ? , address = ? , logo = ? ,facebook=? , twitter = ? , youtube = ? , instgram =? WHERE id = ?");
                          $stmt -> execute(array($phone , $email , $whatsapp , $adress , $avatar ,$facebook , $twitter , $youtube , $instgram , $id ));
                          echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Updated </div>';
                          header("refresh:3;url=our_contact.php");
                       
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
\
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