

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
        
        
        <!-- Causes Start -->
        <div class="causes">
            <div class="container">
                <div class="section-header text-center">
                    <h2>اقسام جمعية الدعوة والارشاد</h2>
                </div>
                <div class="owl-carousel causes-carousel text-center">
                <?php
                  $stmt = $conn -> prepare("SELECT * FROM categories");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="img/<?= $row['image'] ?>" alt="Image">
                        </div>
                        <div class="causes-progress">
             
          
                        </div>
                        <div class="causes-text">
                            <h3> <?= $row['name'] ?> </h3>
                            <p><?= $row['about'] ?></p>
                        </div>
                        <div class="causes-btn">
                            <a href='cat_details.php?catid=<?= $row['id'] ?>' class="btn btn-custom">اقرا المزيد</a>
                        </div>
                    </div>
             
                <?php
                  }
                ?>
                </div>
            </div>
        </div>
        <!-- Causes End -->
 
        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <p>المشاريع</p>
                    <h2>مشاريع الجمعية</h2>
                    </div>
                    <div class="row">
                    <?php
                  $stmt = $conn -> prepare("SELECT * FROM projects");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>
                    <div class="col-lg-4 text-center">
                        <div class="event-item">
                            <img src="img/<?= $row['image'] ?>" alt="Image">
                            <div class="event-content">

                                <div class="event-text">
                                    <!-- <h3>Lorem ipsum dolor sit</h3> -->
                                    <p>
                                        <?= $row['about'] ?>
                                    </p>
                                    <a class="btn btn-custom" href="project_detail.php?id=<?= $row['id'] ?>">اقراء المزيد</a>
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
        <!-- Event End -->

   <!-- Causes Start -->
   <div class="causes">
            <div class="container">
                <div class="section-header text-center">
                    <h2>الاخبار</h2>
                </div>
                <div class="owl-carousel causes-carousel text-center">
                <?php
                  $stmt = $conn -> prepare("SELECT * FROM news");
                  $stmt -> execute();
                  $rows = $stmt -> fetchAll();
                  foreach($rows as $row){
                ?>
                    <div class="causes-item">
                        <div class="causes-img">
                            <img src="img/<?= $row['main_image'] ?>" alt="Image">
                        </div>
                        <div class="causes-progress">
             
          
                        </div>
                        <div class="causes-text">
                            <h3> <?= $row['name'] ?> </h3>
                            <p ><?= $row['about'] ?></p>
                        </div>
                        <div class="causes-btn">
                            <a href='news_details.php?id=<?= $row['id'] ?>' class="btn btn-custom">اقرا المزيد</a>
                        </div>
                    </div>
             
                <?php
                  }
                ?>
                </div>
            </div>
        </div>

        
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
                <a href='commentForm.php' class="btn btn-custom" style='font-size:19px;'>اضف تعليقك</a>
            </div>
        </div>


<?php 
include("template/footer.php"); 
include("template/script.php");
?>

