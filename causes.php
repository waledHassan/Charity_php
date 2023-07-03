<?php 
include("template/head.php");
include("template/header.php");
?>
     
        
   
        
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
        


        <?php 
include("template/footer.php");
include("template/script.php");
?>