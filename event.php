<?php 
ob_start();
include("template/head.php");
include("template/header.php");          

@$libID = $_GET['libID'];

$stmt = $conn -> prepare("SELECT * FROM library_content WHERE library_id  = ?");
$stmt -> execute(array($libID));
$count = $stmt -> rowCount();
if($count > 0){
?>
    
        
        
        <!-- Event Start -->
        <div class="event">
            <div class="container">
                <div class="section-header text-center">
                    <h2><?php
                    $stmt = $conn -> prepare("SELECT * FROM library WHERE id  = ?");
                    $stmt -> execute(array($libID));
                    $row = $stmt -> fetch();
                    echo $row['name']; 
                    
                    ?></h2>
                </div>
                <div class="row">
                    <?php
                       $stmt = $conn -> prepare("SELECT * FROM library_content WHERE library_id  = ?");
                       $stmt -> execute(array($libID));
                        $rows = $stmt -> fetchAll();
                        foreach($rows as $row){
                    ?>
                    <div class="col-lg-6 col-md-12 col-sm-12">
                        <div class="event-item">
                            <?php
                               if($row['video'] != '' ){ ?>
                                  <iframe width="540"
                                          height="315" 
                                          src="<?= $row['video'] ?>" 
                                          title="YouTube video player" 
                                          frameborder="0" 
                                          allow="accelerometer; autoplay; clipboard-write; encrypted-media; gyroscope; picture-in-picture; web-share" allowfullscreen>
                                  </iframe>
                                  <?php
                               }
                               if($row['image'] != '' ){?>
                                   <img style='height: 400px;' src="img/<?= $row['image'] ?>">
                               <?php
                               }
                            ?>
                            <div class="event-content">
                                <div class="event-text text-right">
                                    <h3 class='text-center'><?= $row['name'] ?></h3>

                                    <?php
                                     if($row['text'] != '' ){
                                    ?>
                                    <p style='font-size:19px;'>
                                       <?= $row['text'] ?>
                                    </p>
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
                        header("refresh:3;url=index.php");
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
