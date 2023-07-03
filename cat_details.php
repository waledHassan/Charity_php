<?php 
ob_start();
include("template/head.php");
include("template/header.php");

$catid = $_GET['catid'];

$stmt = $conn -> prepare("SELECT * FROM categories WHERE id = ? ");
$stmt -> execute(array($catid));
$count = $stmt -> rowCount();
if($count > 0){
?>


        <!-- Single Post Start-->
        <div class="single">
            <div class="container">
                <div class="row">
                    <div class="col-lg-8">
                        <div class="single-content">
                        <?php
                        $stmt = $conn -> prepare("SELECT * FROM categories WHERE id = ?");
                        $stmt -> execute(array($catid));
                        $row = $stmt -> fetch();
                        ?>
                            <img src="img/<?= $row['image'] ?>" />
                            <h2 class='text-center'><?= $row['name'] ?></h2>
                            <p class='text-right' style='font-size:19px;'>
                               <?= $row['information'] ?>
                            </p>

                        </div>

 
                        <div class="single-related">
                            <h2>اقسام اخري</h2>
                            <div class="owl-carousel related-slider">
                            <?php
                        $stmt1 = $conn -> prepare("SELECT * FROM categories WHERE id != ?");
                        $stmt1 -> execute(array($catid));
                        $rows = $stmt1 -> fetchAll();
                        foreach($rows as $row){
                        ?>
                                <div class="post-item">
                                    <div class="post-img">
                                        <img src="img/<?= $row['image'] ?>" />
                                    </div>
                                    <div class="post-text">
                                        <a href="?catid=<?= $row['id'] ?>"><?= $row['name'] ?></a>
                                    </div>
                                </div>
                        <?php
                        }

                        
}else{
    echo "<div class='alert alert-primary text-center container'>لا يوجد شيء لعرضه</div>";
    header("refresh:3;url=index.php");
}
                        ?>
                            </div>
                        </div>

    
                    </div>

                </div>
            </div>
        </div>
        <!-- Single Post End-->   


      
        <?php

include("template/footer.php");
include("template/script.php");

ob_end_flush();
?>