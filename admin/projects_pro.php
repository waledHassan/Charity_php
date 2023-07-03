<?php
ob_start();
session_start();
 if(isset($_SESSION['admin'])){
     include("connect.php");
     include("functions/function.php");
     $action = isset($_GET['action']) ? $_GET['action'] : 'manage';
     $proid = $_GET['proid']
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
    <title>الأقسام</title>

    <!-- ========== All CSS files linkup ========= -->
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
     include('template/header_index1.php');
     ?>

      <section class="card-components">
        <div class="container-fluid">
          <!-- ========== title-wrapper start ========== -->
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6">
                <div class="title mb-30">
                  <h2>projects Page</h2>
                  <a href="?action=add&proid=<?= $_GET['proid']?>" class='btn btn-outline-primary btn-xsm'  style='margin: 20px;font-size: 20px;'>اضافة </a>
                </div>
              </div>
            </div>
          </div>
          <div class="cards-styles">
            <div class="row">
          <?php
if($action == 'manage'){
    $cats = $conn -> prepare("SELECT * FROM projects_properties WHERE project_id = ?");
    $cats -> execute(array($proid));
    $rows= $cats -> fetchAll();

    $count = $cats -> rowCount();
    if($count > 0){
    foreach($rows as $row){
?>
         
              <div class="col-xl-4 col-lg-4 col-md-6 col-sm-6">
                <div class="card-style-1 mb-30">
                  <div class="card-image">
                  </div>
                  <div class="card-content text-center">
                    <h4><a href="#0"> <?php echo $row['property'] ?> </a></h4>
                  </div>
                  <a href="?action=edit&id=<?php echo $row['id'] ?>&proid=<?= $_GET['proid']?>" class='btn btn-outline-primary btn-xsm' style='margin: 20px;'>Change</a>
                  <a href="?action=delete&id=<?php echo $row['id'] ?>&proid=<?= $_GET['proid']?>" class='btn btn-outline-danger btn-xsm' style='margin: 20px;'>Delete</a>
                </div>
              </div>
        

     <?php
    }
    }else{
      echo "<div class='alert alert-primary text-center container'>لا يوجد عناصر</div>";
      echo "<a href='?action=add&proid=".$_GET['proid']."' class='btn btn-outline-primary btn-xsm' style='font-size:20px;'>اضافة</a>";
    }
  }elseif($action == 'add'){
    ?>
 <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>?action=insert&proid=<?= $_GET['proid']?>" method='POST'>


 <div class="col-lg-10" style='margin: 50px ;'>
            <div class="card-style settings-card-2 mb-30">
              <div class="title mb-30">
                <h6>New Category</h6>
              </div>
                <div class="row">
                  </div>
                  <div class="col-12">
                    <div class="input-style-1">
                      <label> Property</label>
                      <input type="text" placeholder="Property" name='info'/>
                    </div>
                  </div>
                  <div class="col-12">
                    <button class="main-btn primary-btn btn-hover col-12"  style='font-size: 20px;'>
                      اضافة
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
</form>

<?php
// #############################################################################
  }elseif($action == 'insert'){

              if($_SERVER['REQUEST_METHOD'] == 'POST'){

                      $info      = $_POST['info'];


                    $formErrors = [];
                    if(empty($info)){
                      $formErrors[] = "الرجاء اضافة معلومات ";
                    }


                  foreach($formErrors as $error){
                        echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
                        header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");

                  }

          if(empty($formErrors)){


                $stmt = $conn -> prepare("SELECT * FROM projects_properties WHERE property = ?");
                $stmt ->execute(array($info));
                $count = $stmt -> rowCount();

              if($count == 1){

                  echo "<div class='alert alert-danger text-center container'>هذا الاسم موجود بالفعل</div>";
                  header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");
                  exit();

       }else{

    $stmt = $conn -> prepare("INSERT INTO projects_properties
                      (property , project_id )
              VALUES
                      (:info , :project_id)");

            $stmt -> execute(array(
            'info'       => $info,
            'project_id'       => $proid,
            ));
                  echo "<div class='alert alert-success text-center container'>" . $stmt->rowCount() . " Recored Done</din>";
                  header("refresh:2;url=projects.php");
          }
          }

          }else{
          echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
          header("refresh:2;url=index.php");
          }


    // ########################################################################     
    
    
  }elseif($action == 'edit'){

    @$id = $_GET['id'];
    @$proid = $_GET['proid'];

    $stmt = $conn -> prepare("SELECT * FROM projects_properties WHERE id =? AND project_id =? ");
            $stmt -> execute(array($id , $proid));
            $row = $stmt -> fetch();
    
    ?>
    <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>?action=update&proid=<?= $_GET['proid'] ?>&id=<?php echo $row['id'] ?>" method='POST'>


    <div class="col-lg-10" style='margin: 50px ;'>
               <div class="card-style settings-card-2 mb-30">
                 <div class="title mb-30">
                   <h6>تعديل  </h6>
                 </div>
                   <div class="row">
                   <div class="col-12">
                    <div class="input-style-1">
                      <label> Property</label>
                      <input type="text" placeholder="Property" name='about' value='<?= $row['property'] ?>'/>
                    </div>
                  </div>
                     <div class="col-12">
                       <button class="main-btn primary-btn btn-hover col-12" style='font-size: 20px;'>
                         انتهاء 
                       </button>
                     </div>
                   </div>
                 </form>
               </div>
             </div>
   </form>

  <?php 
// #########################################################################################  
}elseif($action== 'update'){

            if($_SERVER['REQUEST_METHOD'] == 'POST'){

                   @$id = $_GET['id'];    
                   @$proid = $_GET['proid'];    
                  $about      = $_POST['about'];

                    $formErrors = [];
                        if(empty($about)){
                          $formErrors[] = "الرجاء اضافة معلومات ";
                        }


                foreach($formErrors as $error){
                      echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
                      header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");

                }

                    if(empty($formErrors)){

                   $stmt = $conn -> prepare("SELECT * FROM projects_properties WHERE property= ? AND id != ?");
                    $stmt ->execute(array($about , $id));
                    $count = $stmt -> rowCount();

                  if($count == 1){

                  echo "<div class='alert alert-danger text-center container'>هذا الاسم موجود بالفعل</div>";
                  header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");
                  exit();

              }else{

                  $stmt = $conn -> prepare("UPDATE projects_properties SET property = ? WHERE id = ? AND project_id = ?");

                  $stmt -> execute(array( $about , $id , $proid));

                  echo "<div class='alert alert-success text-center container'>" . $stmt->rowCount() . " Recored Done</din>";
                  header("refresh:2;url=projects.php");
                  }
                  }

      }else{
      echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
      header("refresh:2;url=index.php");
      }

   // #####################################################################################   
  }elseif($action == 'delete'){

    $id    = $_GET['id'];
    $proid = $_GET['proid'];
  
    $stmt_delete = $conn -> prepare("SELECT * FROM projects_properties WHERE id = ? AND project_id = ?");
    $stmt_delete -> execute(array($id , $proid));
    $count_delete = $stmt_delete -> rowCount();
  
  if($count_delete > 0){
  
      $stmt = $conn -> prepare("DELETE FROM projects_properties WHERE id = ? AND project_id = ?");
      $stmt -> execute(array($id , $proid));
  
      echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Deleted </div>';
      header("refresh:2;url=projects.php");
  
  }else{
  
      echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
      header("refresh:2;url=index.php");
  }
  }
  
     ?>     
         </div>
          </div>
        </div>
      </section>

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