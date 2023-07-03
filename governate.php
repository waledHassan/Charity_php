<?php 
ob_start();
include("template/head.php");
include("template/header.php");          

@$govID = $_GET['govID'];

$stmt = $conn -> prepare("SELECT * FROM governate_content WHERE governate_id  = ?");
$stmt -> execute(array($govID));
$count = $stmt -> rowCount();
if($count > 0){
?>
        

        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php
                    $stmt = $conn -> prepare("SELECT * FROM governate WHERE id  = ?");
                    $stmt -> execute(array($govID));
                    $row = $stmt -> fetch();
                    echo $row['name']; 
                    
                    ?></h2>
                </div>
                <div class="row">
                    <?php
                       $stmt = $conn -> prepare("SELECT * FROM governate_content WHERE governate_id   = ?");
                       $stmt -> execute(array($govID));
                        $rows = $stmt -> fetchAll();
                        foreach($rows as $row){
                    ?>
                    <div class="col-lg-6">
                        <div class="event-item">
                         <?php
                           if($row['image'] != '' ){?>
                                   <img style='height: 400px;' src="img/<?= $row['image'] ?>" alt="Image">
                               <?php
                               }

                            ?>
                            <div class="event-content text-right">
                                <div class="event-text text-right">
                                    <h3><?= $row['name'] ?></h3>

                                    <?php
                                     if($row['jop'] != '' ){
                                    ?>
                                    <p style='font-size:19px;'>
                                       <?= $row['jop'] ?>
                                    </p>
                                    <?php
                                         }
                                         
                                 if($row['file'] != '' ){ ?>
                                        <div class='text-center mt-4'>
                                            <a href="img/<?= $row['file'] ?>"> <div class='btn btn-primary' style='color:#fff;font-size:19px;'>عرض</div> </a>
                                    </div>
                                  <?php
                                     }
                                    ?>
                                </div>
                            </div>
                        </div>
                    </div>
               <?php
                        }

                    }else{
                        echo "<div class='alert alert-primary text-center container'>لا يوجد شيء لعرضه</div>";
                        header("refresh:2;url=index.php");
                    }
               ?>
                </div>
            </div>
        </div>
        <!-- Event End -->


      

<?php

include("template/footer.php");
include("template/script.php");

ob_end_flush();

?>
