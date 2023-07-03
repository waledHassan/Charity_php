        <!-- Footer Start -->
        <div class="footer" style='background:#cdcdcd;'>
            <div class="container">
                <div class="row">
                    <div class="col-lg-3 col-md-6">
                        <div class="footer-contact">
                            <h2 style='color:black;'> تواصلكم معنا يدخل السرور الي قلوبنا </h2>
                            <?php
                                $stmt_c = $conn -> prepare("SELECT * FROM our_contact");
                                $stmt_c -> execute();
                                $row_c = $stmt_c -> fetch();
                            ?>
                                     <?php  
                                     if($row_c['address']){?>
                                        <p style='color:black;'><i class="fa fa-map-marker-alt"></i><?= $row_c['address'] ?></p>
                                     <?php
                                     }
                                  ?>

                                 <?php  
                                     if($row_c['phone']){?>      
                                        <p style='color:black;'><i class="fa fa-phone-alt"></i><?= $row_c['phone'] ?></p>
                                     <?php
                                     }
                                  ?>

                                 <?php  
                                     if($row_c['whatsapp']){?>
                                     
                                     <p style='color:black;'><i class="fa fa-phone-alt"></i><?= $row_c['whatsapp'] ?></p>
                                     <?php
                                     }
                                  ?>

                                  <?php  
                                     if($row_c['email']){?>
                                     
                                     <p style='color:black;'><i class="fa fa-envelope"></i><?= $row_c['email'] ?></p>
                                     <?php
                                     }
                                  ?>
                            <div class="footer-social">

                               <?php  
                                     if($row_c['twitter']){?>
                                     
                                     <a class="btn btn-custom" href="<?= $row_c['twitter'] ?>"><i class="fab fa-twitter"></i></a>
                                     <?php
                                     }
                                  ?>

                               <?php  
                                     if($row_c['facebook']){?>
                                     
                                        <a class="btn btn-custom" href="<?= $row_c['facebook'] ?>"><i class="fab fa-facebook-f"></i></a>
                                     <?php
                                     }
                                  ?>

                               <?php  
                                     if($row_c['youtube']){?>
                                     
                                       <a class="btn btn-custom" href="<?= $row_c['youtube'] ?>"><i class="fab fa-youtube"></i></a>
                                     <?php
                                     }
                                  ?>

                                    <?php  
                                     if($row_c['instgram']){?>
                                     
                                       <a class="btn btn-custom" href="<?= $row_c['instgram'] ?>"><i class="fab fa-instagram"></i></a>
                                     <?php
                                     }
                                  ?>
                            </div>
                        </div>
                   
                    </div>
                    <div class="col-lg-3 col-md-6">
                        
                        <div class="footer-link">
                            <!-- <h2>Popular Links</h2> -->
                            <a href="about.php" style='color:black;'>من نحن</a>
                            <a href="contact.php" style='color:black;'>تواصل معنا</a>
                            <a href="causes.php" style='color:black;'>اقسام الجمعية</a>
                            <a href="news.php" style='color:black;'>الاخبار</a>
                            <a href="commentForm.php" style='color:black;'>رأيك</a>
                        </div>
                    </div>
                    <a href="index.php" ><img src="img/<?= $row_c['logo'] ?>" style='width:300px;height:300;margin: 0 0 70px 50px;'></a>

                </div>
            </div>
        
        </div>
        <!-- Footer End -->
        <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>
        
        <!-- Pre Loader -->
        <div id="loader" class="show">
            <div class="loader"></div>
        </div>