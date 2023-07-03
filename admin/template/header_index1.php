<header class="header">
        <div class="container-fluid">
          <div class="row">
            <div class="col-lg-5 col-md-5 col-6">
              <div class="header-left d-flex align-items-center">
                <div class="menu-toggle-btn mr-20">
                  <button
                    id="menu-toggle"
                    class="main-btn primary-btn btn-hover"
                  >
                    <i class="lni lni-chevron-left me-2"></i> Menu
                  </button>
                </div>
              </div>
            </div>
            <div class="col-lg-7 col-md-7 col-6">
              <div class="header-right">
                <!-- notification start -->
                <div class="notification-box ml-15 d-none d-md-flex">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="notification"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="lni lni-alarm"></i>
                    <span><?php
                      $stmt = $conn -> prepare("SELECT count(*) as counter FROM comments ");
                      $stmt -> execute();
                      $message = $stmt -> fetch();
                      echo $message['counter'];
                    
                    ?></span>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="notification"
                  >
                  <?php
                            $stmt = $conn -> prepare("SELECT * FROM comments LIMIT 5");
                            $stmt -> execute();
                            $comments = $stmt -> fetchAll();
                            foreach($comments as $comment){

                           
                          
                          ?>
                    <li>
                      <a href="#0">
                        <div class="image">
                            <?php
                                if($comment['image'] != ''){ ?>
                                   <img src="../img/<?= $comment['image'] ?>"/>
                                <?php
                                   }
                                ?>
                        </div>
                        <div class="content text-center ">
                          <h6>
      
                            <?= $comment['name'] ?>
                          </h6>
                          <p>
                            <?php echo $comment['jop']; ?>
                          </p>
                            <span class="text-regular">
                              <?php echo $comment['comment']; ?>
                            </span>
                          <!-- <span>10 mins ago</span> -->
                        </div>
                      </a>
                    </li>
                    <?php
                            }
                    ?>
                  
                  </ul>
                </div>
                <!-- notification end -->
                <!-- message start -->
                <div class="header-message-box ml-15 d-none d-md-flex">
                  <button
                    class="dropdown-toggle"
                    type="button"
                    id="message"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                    <i class="lni lni-envelope"></i>
                    <span><?php
                      $stmt = $conn -> prepare("SELECT count(*) as counter FROM messages WHERE view = 0 ");
                      $stmt -> execute();
                      $message = $stmt -> fetch();
                      echo $message['counter'];
                    
                    ?></span>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="message"
                  >
                  <?php
                            $stmt = $conn -> prepare("SELECT * FROM messages WHERE view = 0 LIMIT 5 ");
                            $stmt -> execute();
                            $messages = $stmt -> fetchAll();
                            foreach($messages as $message){

                           
                          
                          ?>
                    <li>
                      <a href="#0">
                        <div class="content text-center">
                          <h6><?php echo $message['name']; ?></h6>
                          <p><?php echo $message['message']; ?></p>
                        </div>
                      </a>
                    </li>
                    <?php }
                    ?>
                  </ul>
                </div>
        
                <div class="profile-box ml-15">
                  <button
                    class="dropdown-toggle bg-transparent border-0"
                    type="button"
                    id="profile"
                    data-bs-toggle="dropdown"
                    aria-expanded="false"
                  >
                  <?php $owner = $conn -> prepare("SELECT * FROM owners WHERE admin = 1 LIMIT 1");
                                     $owner -> execute(array());
                                     $row = $owner -> fetch();
                                         ?>
                    <div class="profile-info">
                      <div class="info">
                        <h6><?= $row['name'];?></h6>
                        <div class="image">
                          <img
                            src="../img/<?= $row['image'] ?>"
                            alt=""
                          />
                          <span class="status"></span>
                        </div>
                      </div>
                    </div>
                    <i class="lni lni-chevron-down"></i>
                  </button>
                  <ul
                    class="dropdown-menu dropdown-menu-end"
                    aria-labelledby="profile"
                  >
                    <li>
                      <a href="settings.php">
                        <i class="lni lni-user"></i> الحساب
                      </a>
                    </li>
                    <li>
                      <a href="comments.php">
                        <i class="lni lni-alarm"></i> التعليقات
                      </a>
                    </li>
                    <li>
                      <a href="messages.php"> <i class="lni lni-inbox"></i> الرسائل </a>
                    </li>
                    <li>
                      <a href="settings.php"> <i class="lni lni-cog"></i> الاعدادات </a>
                    </li>
                    <li>
                      <a href="logout.php"> <i class="lni lni-exit"></i> تسجيل خروج </a>
                    </li>
                  </ul>
                </div>
                <!-- profile end -->
              </div>
            </div>
          </div>
        </div>
      </header>