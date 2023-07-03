<?php 
ob_start();
include("template/head.php");
include("template/header.php");          


?>
        

        
        
       
   
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

        


      

<?php

include("template/footer.php");
include("template/script.php");

// }else{
//       header("location:index.php");
// }

ob_end_flush();

?>
