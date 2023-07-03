
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
                  <h6 class="mb-10">Messages Table</h6>
                  <p class="text-sm mb-20">
                    Messages
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table" id='MyTable'>
                      <thead>
                      <tr>
                          <th><h6>name</h6></th>
                          <th><h6>Email</h6></th>
                          <th><h6>message</h6></th>
                          <th><h6>Show</h6></th>
                          <th><h6>Controls</h6></th>
                        </tr>
                        <!-- end table row-->
                      </thead>
                    
                         
                      <?php

                        $users = $conn -> prepare("SELECT * FROM messages");
                        $users -> execute();
                        $rows= $users -> fetchAll();

                        foreach($rows as $row){
                            
      ?>
        <tr id='tr'>
          <td class="min-width">
            <div class="lead">
              <div class="lead-text">
                <p><a href="#"><?php echo $row['name'] ?></p></a>
              </div>
            </div>
          </td>
          <td class="min-width">
            <p><?php echo $row['email'] ?></p>
          </td>
          <td class="min-width">
            <p><?php echo $row['message'] ?></p>
          </td>
         
          <td class="view">
            <?= $row['view'] == 0 ? "unread" : 'Read' ?>
          </td>

          <?php
            if($row['view'] == 0 ){?>
            <td>
              <button type="button" class="btn btn-primary showMessage" data-id="<?= $row['id'] ?>">show</button>                                        
            </td>
                <?php
            }
          
          ?>


          <td>
          <div  class="btn btn-primary"  data-id='<?= $row['id']?>' id='deletemessage'>
               Delete
         </div>
        <!-- <button type="button" class="btn openModal" data-toggle="modal" data-target="#myModal" data-id="<?php echo $articleid;?>">Read More....</button> -->
          <!-- <button type="button" class="btn btn-delete deleteMessage" data-id="" style='color: red;'><i class="lni lni-trash-can"></i></button>                                                     -->
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
<!-- Button trigger modal -->


        <?php

// ############################################################################

}elseif($action == 'update'){
  $id = $_POST['id'];

  $stmt = $conn -> prepare("UPDATE messages SET view = 1 WHERE id= ?");
  $stmt -> execute(array($id));

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
	  <script src="assets/js/jquery-1.11.1.min.js"></script>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
	  <script src="assets/js/ajax.js"></script>
      <script>
          
$('#deletemessage').on('click' ,function(){

	var id = $(this).attr('data-id');
		
		url ='delete_message.php';
		$.post(url, {id} , function(data){
		})
		
	$(this).closest("tr").remove();

});
      </script>
  </body>
</html>

          

<?php
}else{
  header("location:index1.php");
  exit();
}

ob_end_flush();
?>