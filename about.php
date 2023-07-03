<?php 
include("template/head.php");
include("template/header.php");
?>
     
 
        

         <!-- About Start -->
         <div class="about mb-5 text-center">
            <div class="container">
                <div class="row align-items-center">
                    <!-- <div class="col-lg-6">
                        <div class="about-img" data-parallax="scroll" data-image-src="img/"></div>
                    </div> -->
                    <div class="col-lg-12">
                        <div class="about-tab">
                            <ul class="nav nav-pills nav-justified">
                                <li class="nav-item">
                                    <a class="nav-link active" data-toggle="pill" href="#tab-content-1"><h4>رؤيتنا</h4></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#tab-content-2"><h4>رسالتنا</h4></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#tab-content-3"><h4>اهدافنا</h4></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" data-toggle="pill" href="#tab-content-4"><h4>قيمنا</h4></a>
                                </li>
                            </ul>

                            <div class="tab-content">
                                <div id="tab-content-1" class="container tab-pane active">
                                      <?php
                                        
                                        $stmt = $conn -> prepare("SELECT * FROM charity_vision");
                                        $stmt -> execute();
                                        $rows = $stmt -> fetchAll();
                                     
                                        foreach($rows as $row){
                                                 ?>

                                              <h4  class='mt-3'><?= $row['name'] ?></h4>   
                                        <?php
                                         }
                                        ?>
                                </div>
                                <div id="tab-content-2" class="container tab-pane fade">
                                <?php
                                        
                                        $stmt = $conn -> prepare("SELECT * FROM charity_message");
                                        $stmt -> execute();
                                        $rows = $stmt -> fetchAll();
                                     
                                        foreach($rows as $row){
                                                 ?>

                                              <h4  class='mt-3'><?= $row['name'] ?></h4>   
                                        <?php
                                         }
                                        ?>
                                </div>
                                <div id="tab-content-3" class="container tab-pane fade">
                                <?php
                                        
                                        $stmt = $conn -> prepare("SELECT * FROM charity_goals");
                                        $stmt -> execute();
                                        $rows = $stmt -> fetchAll();
                                     
                                        foreach($rows as $row){
                                                 ?>

                                              <h4  class='mt-3'><?= $row['name'] ?></h4>   
                                        <?php
                                         }
                                        ?>                                </div>
                                <div id="tab-content-4" class="container tab-pane fade">
                                <?php
                                        
                                        $stmt = $conn -> prepare("SELECT * FROM charity_values");
                                        $stmt -> execute();
                                        $rows = $stmt -> fetchAll();
                                     
                                        foreach($rows as $row){
                                                 ?>

                                              <h4 class='mt-3'><?= $row['name'] ?></h4>   
                                        <?php
                                         }
                                        ?>                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- About End -->
        <hr style='width:60%;border: #FDBE33 1px solid;'>
        
        
        <!-- Facts Start -->
        <div class="facts" data-parallax="scroll" data-image-src="img/colors.jpg">
            <div class="container">
                <div class="row">
                <?php
                  $stmt = $conn -> prepare("SELECT * FROM charity_numbers");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>
                    <div class="col-lg-3 col-md-6">
                        <div class="facts-item">
                            <i class="flaticon-home"></i>
                            <div class="facts-text">
                                <h3 class="facts-plus" data-toggle="counter-up"><?= $row['number'] ?></h3>
                                <p><?= $row['name'] ?></p>
                            </div>
                        </div>
                    </div>

                    <?php
                  }
                    ?>
                </div>
            </div>
        </div>
        <!-- Facts End -->


        <!-- Team Start -->
        <div class="team">
            <div class="container">
                <div class="section-header text-center">
                    <p>اعضاء مجلس الادارة</p>
                </div>
                <div class="row">

                <?php
                  $stmt = $conn -> prepare("SELECT * FROM owners");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>

                    <div class="col-lg-3 col-md-6">
                        <div class="team-item">
                            <div class="team-img">
                                <img src="img/<?= $row['image'] ?>" alt="Team Image">
                            </div>
                            <div class="team-text">
                                <h2><?= $row['name'] ?></h2>
                                <p><?= $row['jop'] ?></p>
                                <div class="team-social">
                                    <a href=""><i class="fab fa-twitter"></i></a>
                                    <a href=""><i class="fab fa-facebook-f"></i></a>
                                    <a href=""><i class="fab fa-linkedin-in"></i></a>
                                    <a href=""><i class="fab fa-instagram"></i></a>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php
                  }
                ?>
                </div>
            </div>
        </div>
        <!-- Team End -->
        
        
     <!-- Blog Start -->
     <div class="blog">
            <div class="container">
                <div class="section-header text-center">
                    <p>قالوا عنا</p>
                    <h2> الاراء</h2>
                </div>
                <div class="row text-right">

                <?php
                  $stmt = $conn -> prepare("SELECT * FROM comments WHERE allow = 1");
                  $stmt -> execute(array());
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>

                    <div class="col-lg-4">
                        <div class="blog-item">
                            <div class="blog-img">
                                <img src="img/<?= $row['image'] ?>" alt="Image">
                            </div>
                            <div class="blog-text">
                                <p><?= $row['jop'] ?></p>
                                <h3><a href="#"><?= $row['name'] ?></a></h3>
                                <p>
                                <?= $row['comment'] ?>
                                </p>
                            </div>
                        </div>
                    </div>
                    <?php
                  }
                  ?>
              
                </div>
            </div>
        </div>
        <!-- Blog End -->


        <?php 
include("template/footer.php");
include("template/script.php");
?>