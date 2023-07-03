
<?php
ob_start();
session_start();
 if(isset($_SESSION['admin'])){
     include("connect.php");
     include("functions/function.php");
     $action = isset($_GET['action']) ? $_GET['action'] : 'manage';
     @$table = $_GET['table'];
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
    <title>Admins Page</title>
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
<?php
if($action == 'manage'){
?>
      <section class="table-components">
        <div class="container-fluid">
          <div class="tables-wrapper" style='margin-top: 50px;'>
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                      <tr>
                          <th><h6>id</h6></th>
                          <th class='text-center'><h6>الاسم</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                      </thead>
                    
                         
                      <?php

                        $users = $conn -> prepare("SELECT * FROM ".$table."");
                        $users -> execute();
                        $rows= $users -> fetchAll();

                        foreach($rows as $row){
                            
      ?>
        <tr>
          <td class="min-width">
            <p><?php echo $row['id'] ?></p>
          </td>
          <td class="min-width text-center">
           <a href="?action=show&id=<?= $row['id'] ?>&table=<?= $_GET['table']?>"><p><?php echo $row['name'] ?></p></a>  
          </td>

          <td>
            <div class="action">
              <button class="text-danger">
                <a href="?action=delete&id=<?= $row['id'] ?>&table=<?= $_GET['table']?>" style='color: red;'><i class="lni lni-trash-can"></i></a>
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
    @$table = $_GET['table'];


        $stmt = $conn -> prepare("SELECT * FROM ".$table." WHERE id = ?");
            $stmt -> execute(array($id));
            $user = $stmt -> fetch();
?>
          <div class="title-wrapper pt-30">
            <div class="row align-items-center">
              <div class="col-md-6 ml-200">
                <div class="titlemb-30 text-center">
                  <h2>تعديل</h2>
                </div>
              </div>
              <div class="col-md-6">
                <div class="breadcrumb-wrapper mb-30">
                  <nav aria-label="breadcrumb">
                  </nav>
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-lg-6 ml-200">
              <div class="card-style settings-card-1 mb-30">

                <div class="profile-info">
          

     <form action="<?php $_SERVER['PHP_SELF']?>?action=update&table=<?= $_GET['table']?>" method='POST'>

                  <div class="input-style-1">
                    <label></label>
                    <input
                      name='name'
                      type="text"
                      placeholder="user First Name"
                      value="<?= $user['name'] ?>"
                    />
                  </div>
                  <input type="hidden"
                         name='id' 
                         value='<?php echo $user['id'] ?>'
                    />
                </div>
              </div>
              <button class="main-btn primary-btn btn-hover" style="font-size:20px;margin-left:250px;">
                 تعديل
              </button>
            </div>

                </form>
              </div>
            </div>
          </div>
          <?php
           
//######################################################################           
}elseif($action == 'update'){

    // $id = $_GET['id'];

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){

        $name    = $_POST['name'];
        $id      = $_POST['id'];
        $table      = $_GET['table'];


         $formErrors = [];
        if(empty($name) ){
            $formErrors[] = "الرجاء ملئ الاسم";
        }

        foreach($formErrors as $error){
            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
            header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");
        }

        $stmt = $conn -> prepare ("UPDATE ".$table." SET name = ?  WHERE id = ?");
        $stmt -> execute(array($name , $id ));
        echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Updated </div>';
        header("refresh:3;url=".$_SERVER['HTTP_REFERER']."");

        }else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index1.php");
        }

// ###############################################################################
}elseif($action == 'add'){

      ?>
   <form enctype="multipart/form-data" action="<?php echo $_SERVER['PHP_SELF']?>?action=insert&table=<?= $_GET['table'] ?>" method='POST'>
  
  
   <div class="col-lg-10" style='margin: 50px ;'>
              <div class="card-style settings-card-2 mb-30">
                  <div class="row">
                    <div class="col-12">
                      <div class="input-style-1">
                        <label>الاسم</label>
                        <input name='name' type="text" placeholder="الاسم"/>
                      </div>
                    </div>
 
                    <div class="col-12">
                      <button class="main-btn primary-btn btn-hover col-12" style='font-size:20px;'>
                        اضافة
                      </button>
                    </div>
                  </div>
                </form>
           
           
              </div>
            </div>
  </form>

<?php
//  ##################################################################################
}elseif($action == 'insert'){

              if($_SERVER['REQUEST_METHOD'] == 'POST'){

                $name     = $_POST['name'];
                $table    = $_GET['table'];


      $formErrors = [];
      if(strlen($name) < 2 ){
      $formErrors[] = "الرجاء ملئ خانة الاسم";
      }

     foreach($formErrors as $error){
      echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
      header("refresh:2;url=".$_SERVER['HTTP_REFERER']."");

       }

      if(empty($formErrors)){


        $stmt = $conn -> prepare("INSERT INTO ".$table."
        (name)
          VALUES
         (:name)");
          $stmt -> execute(array(
          'name'   => $name,
          ));
          echo "<div class='alert alert-success text-center container'>" . $stmt->rowCount() . " Recored Done</din>";
          header("refresh:2;url=goals.php?table=".$_GET['table']."");
          }


}else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index.php");
}




//#####################################################################################
}elseif($action == 'delete'){

  $id = $_GET['id'];
  $table = $_GET['table'];

  $stmt_delete = $conn -> prepare("SELECT * FROM ".$table." WHERE id = ?");
  $stmt_delete -> execute(array($id));
  $count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

    $stmt = $conn -> prepare("DELETE FROM ".$table." WHERE id = ?");
    $stmt -> execute(array($id));

    echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Deleted </div>';
    header("refresh:2;url=goals.php?table=".$_GET['table']."");

}else{

    echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
    header("refresh:2;url=index.php");
}
}

// ###############################      end Delete    #######################################
        ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
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
      </footer>
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
}else{
  header("location:index1.php");
  exit();
}

ob_end_flush();
?>