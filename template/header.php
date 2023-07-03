      <?php
        include("connect.php");
    
        $stmt_c = $conn -> prepare("SELECT * FROM our_contact");
        $stmt_c -> execute();
        $row_c = $stmt_c -> fetch();

      ?>

      
      <!-- Top Bar Start -->
    
        <div class="top-bar d-none d-md-block" >
            <div class="container-fluid" style='background:#616161;'>
                <div class="row">
                    <div class="col-md-8">
                        <div class="top-bar-left">
                            <div class="text">
                                <?php
                                  if($row_c['phone'] != ''){ ?>
                                    <i class="fa fa-phone-alt"></i>
                                     <p><?=  $row_c['phone'] ?></p>
                                <?php
                                  }
                                  ?>
                            </div>
                            <div class="text">
                                <?php 
                                   if($row_c['email'] != ''){ ?>
                                        <i class="fa fa-envelope"></i>
                                        <p><?= $row_c['email'] ?></p>

                                   <?php
                                   }
                                ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="top-bar-right">
                            <div class="social">
                                  <?php  
                                     if($row_c['twitter']){?>
                                     
                                       <a href="<?php $row_c['twitter'] ?>"><i class="fab fa-twitter"></i></a>
                                     <?php
                                     }
                                  ?>

                                    <?php  
                                     if($row_c['facebook']){?>
                                     
                                     <a href="<?= $row_c['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                                     <?php
                                     }
                                  ?>

                                <?php  
                                     if($row_c['twitter']){?>
                                     
                                     <a href="<?= $row_c['youtube'] ?>"><i class="fab fa-linkedin-in"></i></a>
                                     <?php
                                     }
                                  ?>

                                    <?php  
                                     if($row_c['twitter']){?>
                                     <a href="<?= $row_c['instgram'] ?>"><i class="fab fa-instagram"></i></a>
                                     
                                     <?php
                                     }
                                  ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- Top Bar End -->

        <!-- Nav Bar Start -->
        <div class="navbar navbar-expand-lg bg-dark navbar-dark" style='background:#cdcdcd;'>
            <div class="container-fluid" style='background:#cdcdcd;border-radius:20px;'>
                <a href="index.php" ><img src="img/<?= $row_c['logo'] ?>" style='width:130px;'></a>
                <button type="button" class="navbar-toggler" data-toggle="collapse" data-target="#navbarCollapse">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse justify-content-between" id="navbarCollapse">
                    <div class="navbar-nav ml-auto">
                             <a href="contact.php" class="nav-item nav-link"  style='font-size: 20px;color:black;'>اتصل بنا</a>

                             <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"  style='font-size: 20px;color:black;'>الحكومة</a>
                        <div class="dropdown-menu text-right">

                            <?php
                                $stmt = $conn -> prepare("SELECT * FROM governate");
                                $stmt -> execute();
                                $rows = $stmt -> fetchAll();
                                foreach($rows as $row){
                             ?>
                                <a style="font-size:19px;color:black;" href="governate.php?govID=<?= $row['id'] ?>" class="dropdown-item"><?= $row['name'] ?></a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        
                    
                        <!-- <a href="event.php" class="nav-item nav-link"  style='font-size: 20px;'>الحكومة</a> -->


                        <a href="news.php" class="nav-item nav-link"  style='font-size: 20px;color:black;'>اخر الأخبار</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle" data-toggle="dropdown"  style='font-size: 20px;color:black;'>المكتبة</a>
                        <div class="dropdown-menu text-right">

                            <?php
                                $stmt = $conn -> prepare("SELECT * FROM library");
                                $stmt -> execute();
                                $rows = $stmt -> fetchAll();
                                foreach($rows as $row){
                             ?>
                                <a style="font-size:19px;color:black;" href="event.php?libID=<?= $row['id'] ?>" class="dropdown-item"><?= $row['name'] ?></a>
                                <?php
                                }
                                ?>

                            </div>
                        </div>
                        
                        
                        <a href="causes.php" class="nav-item nav-link" style='font-size: 20px;color:black;'> اقسام الجمعية</a>
                        <a href="about.php" class="nav-item nav-link"  style='font-size: 20px;color:black;'>من نحن</a>
                        <a href="index.php" class="nav-item nav-link"  style='font-size: 20px;color:black;'>الرئيسية</a>
                    </div>
                </div>
            </div>
        </div>
        <!-- Nav Bar End -->
                 
   <!-- Carousel Start -->
   <div class="carousel">
            <div class="container-fluid">
                <div class="owl-carousel">
                  <?php
                  $stmt = $conn -> prepare("SELECT * FROM index_slider");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>
                    <div class="carousel-item">
                        <div class="carousel-img">
                            <img style='width: 100%;height: 600px' src="img/<?= $row['image'] ?>" alt="Image">
                        </div>
                        <div class="carousel-text">
                            <h1><?= $row['title'] ?></h1>
                            <p>
                               <?= $row['description'] ?>
                            </p>
                            <div class="carousel-btn">
                                <!-- <a class="btn btn-custom btn-play" data-toggle="modal" data-src="https://www.youtube.com/embed/DWRcNpR6Kdc" data-target="#videoModal">Watch Video</a> -->
                            </div>
                        </div>
                    </div>
                <?php
                  }
                ?>
                </div>
            </div>
        </div>
        <!-- Carousel End -->