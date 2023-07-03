<?php
ob_start();
session_start();
 if(isset($_SESSION['admin'])){
     include("connect.php");
     include("functions/function.php");
     $action = isset($_GET['action']) ? $_GET['action'] : 'manage';
      ?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <link
      rel="shortcut icon"
      href="assets/images/favicon.svg"
      type="image/x-icon"
    />
    <title>Products</title>

    <link rel="stylesheet" href="assets/css/bootstrap.min.css" />
    <link rel="stylesheet" href="assets/css/lineicons.css" />
    <link rel="stylesheet" href="assets/css/materialdesignicons.min.css" />
    <link rel="stylesheet" href="assets/css/fullcalendar.css" />
    <link rel="stylesheet" href="assets/css/main.css" />
  </head>
  <body>
    <?php
    include("template/sidebar_index1.php");
    ?>
    <div class="overlay"></div>

    <main class="main-wrapper">
     <?php
     include('template/header_index1.php');
     ?>
<?php
if($action == 'manage'){
?>
      <section class="table-components">
        <div class="container-fluid">
          <div class="tables-wrapper" style='margin-top: 50px;'>
            <div class="row">
              <div class="col-lg-12">
                <div class="card-style mb-30">
                  <h6 class="mb-10">Data Products Table</h6>
                  <p class="text-sm mb-20">
                    Products Table
                  </p>
                  <div class="table-wrapper table-responsive">
                    <table class="table">
                      <thead>
                      <tr>
                          <th><h6>Product</h6></th>
                          <th><h6>Price</h6></th>
                          <th><h6>Rate</h6></th>
                          <th><h6>Status</h6></th>
                          <th><h6>Owner</h6></th>
                          <th><h6>Action</h6></th>
                        </tr>
                      </thead>
                    
                         
                      <?php

                        $products = $conn -> prepare("SELECT * FROM products WHERE approve = 1");
                        $products -> execute();
                        $rows= $products -> fetchAll();

                        foreach($rows as $row){
                            
      ?>
        <tr>
          <td class="min-width" style='width: 100px;'>
            <div class="lead">
              <div class="lead-image">
                <img 
                  src="assets/images/products/<?php echo $row['image'] ?>"
                  style='width: 50px;'
                />
              </div>
              <div class="lead-text">
                <p><a href="?action=show&id=<?php echo $row['product_id'] ?>"><?php echo $row['name'] ?></p></a>
              </div>
            </div>
          </td>
          <td class="min-width">
            <p><?php echo $row['price'] ?></p>
          </td>
          <td class="min-width">
            <p><?php echo $row['rate'] ?></p>
          </td>
          <td class="min-width">
            <p><?php echo $row['status'] ?></p>
          </td>
          <td class="min-width">
            <p><?php 
             $user_id = $row['product_user'];
             $users = $conn -> prepare("SELECT * FROM users WHERE user_id = ?");
             $users -> execute(array($user_id));
             $rows= $users -> fetch();
             
             echo $rows['firstname'];

            
            ?></p>
          </td>
          <td>
            <div class="action">
              <button class="text-danger">
                <?php if($row['trending'] != 1){ ?>
                  <a href="?action=trend&id=<?php echo $row['product_id'] ?>" class='btn btn-primary' style='margin-right: 20px;'>Trend</a>
         <?php
                } else{
                  ?>
                  <a href="?action=remove_trend&id=<?php echo $row['product_id'] ?>" class='btn btn-danger' style='margin-right: 20px;'>Remove Trend</a>
                  <?php
                }
                ?>
                <a href="?action=delete&id=<?php echo $row['product_id'] ?>" style='color: red;' style='margin-right: 20px;'><i class="lni lni-trash-can"></i></a>
              </button>
            </div>
          </td>
        </tr>
        <?php 
                        }
        ?>
    </table>
    </div>
    </div>
    </div>
    </div>

        <?php
// #######################################################################
}else if($action == 'show'){

    $id = $_GET['id'];

    $stmt = $conn -> prepare("SELECT * FROM products WHERE approve = 1 AND product_id = ?");
    $stmt -> execute(array($id));
    $products = $stmt -> fetchAll();
   foreach($products as $product){

  ?>
  <div class="title-wrapper pt-30" style='margin-left: 20px;'>
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Settings</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index1.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item"><a href="#0">Pages</a></li>
              <li class="breadcrumb-item active" aria-current="page">
             <a href="#">Settings</a>   
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card-style settings-card-1 mb-30">
        <div
          class="
            title
            mb-30
            d-flex
            justify-content-between
            align-items-center
          "
        >
          <h6><?php echo $product['name'] ?></h6>
          <button class="border-0 bg-transparent">
            <a href="#"><i class="lni lni-pencil-alt"></i></a>
          </button>
        </div>
        <div class="profile-info">
          <div class="d-flex align-items-center mb-30">
            <div class="profile-image">
              <img src="assets/images/products/<?php echo $product['image'] ?>" style='width:90px;height: 100px;' />
              <div class="update-image">
                <input type="file" />
                <label for=""
                  ><i class="lni lni-cloud-upload"></i
                ></label>
              </div>
            </div>
            <div class="profile-meta">
              <h5 class="text-bold text-dark mb-10"><?php echo $product['name']?></h5>
            </div>
          </div>

<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>?action=update" method='POST'>

          <div class="input-style-1">
            <label>Product Name</label>
            <input
              name='name'
              type="text"
              placeholder="Product Name"
              value="<?php echo $product['name'] ?>"
            />
          </div>
          <input type="hidden"
                 name='id' 
                 value='<?php echo $product['product_id'] ?>'
            />
            <div class="input-style-1">
            <label>Price</label>
            <input
              name='price'
              type="number"
              placeholder="Product Price"
              value="<?php echo $product['price'] ?>"
            />
          </div>
          <div class="input-style-1">
            <label>Description</label>
            <input
              name='desc'
              type="text"
              placeholder="Product Description"
              value="<?php echo $product['description'] ?>"
            />
          </div>
          <div class="input-style-1">
            <label>Date</label>
            <input
              name='date'
              type="date"
              placeholder="www.uideck.com"
              value="<?php echo $product['add_date'] ?>"
            />
          </div>
          <div class="input-style-1">
            <label>Contry Made In</label>
            <input
              name='country'
              type="text"
              placeholder="Country Made"
              value="<?php echo $product['country_made'] ?>"
            />
          </div>
          <div class="input-style-1">
          <label for="">Product Main Image :</label>
                <input name="avatar" type="file" required="require" value='<?php echo $product['image']?>'>
                <img src="assets/images/products/<?php echo $product['image']?>" alt="Item Photo" style='width: 100px;margin:10px;'>
          </div>
          <div class="input-style-1">
          <label for="">Product Images :</label>
          <input name="avatars[]" type="file" required="require" value='<?php echo $product['image']?>' multiple>
          <?php    
           $id = $_GET['id'];
          $stmt = $conn -> prepare("SELECT * FROM images WHERE product_id = ?");
          $stmt -> execute(array($id));
          $count = $stmt -> rowCount();
          if($count > 0){
          $images = $stmt -> fetch();
          @$images_ex = explode("," , $images['image']);
            foreach($images_ex as $image){
          ?>
                <img src="assets/images/products/<?php echo $image?>" alt="Item Photo" style='width: 100px;margin:10px;'>
         <?php
            }
          }
         ?>
           </div>
        </div>
      </div>
    </div>
    <div class="col-lg-6">
      <div class="card-style settings-card-2 mb-30">
        <div class="title mb-30">
          <h6></h6>
        </div>
          <div class="row">
            <div class="col-12">
              <div class="input-style-1">
                <label>Product Status</label>
                  <select name="status" class="form-control">
                      <option value="new"<?php if($product['status'] == 'New'){echo "selected" ;}?>>New</option>
                      <option value="lite_new"<?php if($product['status'] == "Lite New"){echo "selected" ;}?>>Lite New</option>
                      <option value="used"<?php if($product['status'] == "Used"){echo "selected" ;}?>>Used</option>
                      <option value="very_old"<?php if($product['status'] == "Very Old"){echo "selected" ;}?>>Very Old</option>
                    </select>
                    </div>
              </div>
            </div>

            <div class="col-12">
              <div class="input-style-1">
                <label for="">Owner</label>
                 <select name="owner" class="form-control">
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM users");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                              echo "<option value='".$cat['user_id']."'";
                                if($product['product_user'] == $cat['user_id'] ){echo "selected";}
                              echo ">".$cat['firstname']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>

            <div class="col-12">
              <div class="input-style-1">
                <label for="">Categories</label>
                 <select name="category" class="form-control">
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM categories");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                              echo "<option value='".$cat['category_id']."'";
                                if($product['product_category'] == $cat['category_id'] ){echo "selected";}
                              echo ">".$cat['name']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>
            <div class="col-12">
              <div class="input-style-1">
                <label for="">Sub Categories</label>
                 <select name="subcategory" class="form-control">
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM child_category");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                              echo "<option value='".$cat['id']."'";
                                if($product['sub_category'] == $cat['id'] ){echo "selected";}
                              echo ">".$cat['name']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>

            <div class="col-12">
              <div class="input-style-1">
                <label for="">brand</label>
                 <select name="brand" class="form-control">
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM brands");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                              echo "<option value='".$cat['id']."'";
                                if($product['product_brand'] == $cat['id'] ){echo "selected";}
                              echo ">".$cat['name']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>
            
            <div class="col-12">
              <div class="input-style-1">
                <label>Taxes</label>
                <input name='taxes' type="number" placeholder="Taxes" value='<?php echo $product['product_taxes'] ?>' />
              </div>
            </div>
            <div class="col-12">
              <div class="input-style-1">
                <label>Tags</label>
                <input name='tags' type="text" placeholder="tags seperate With ( , )" value='<?php echo $product['product_tags'] ?>' />
              </div>
            </div>
            </div>
            <div class="col-12">
              <button class="main-btn primary-btn btn-hover">
                Update
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>
          <?php
   }
//######################################################################           
}elseif($action == 'update'){


    if($_SERVER['REQUEST_METHOD'] == 'POST' ){
        $name         = $_POST['name'];
        $id           = $_POST['id'];
        $price        = $_POST['price'];
        $desc         = $_POST['desc'];
        $date         = $_POST['date'];
        $country      = $_POST['country'];
        $status       = $_POST['status'];
        $category     = $_POST['category'];
        $subcategory  = $_POST['subcategory'];
        $owner        = $_POST['owner'];
        $brand        = $_POST['brand'];
        $taxes        = $_POST['taxes'];
        $tags         = strtolower($_POST['tags']);

        $avatarname = $_FILES['avatar']['name'];
        $avatarsize = $_FILES['avatar']['size'];
        $avatartmp = $_FILES['avatar']['tmp_name'];
        $avatartype = $_FILES['avatar']['type'];

         $avatarAllowedExtensions = array("jpg" , "jpeg" , "png" , "gif");  // allowed files

         @$avatarExtention = strtolower( end ( explode ('.' , $avatarname) ) );


         $error = array();
         $file = [];
         $extension = array("jpeg","jpg","png","gif");
         foreach($_FILES["avatars"]["tmp_name"] as $key=>$tmp_name) {
             $file_name =$_FILES["avatars"]["name"][$key];
             $file_tmp =$_FILES["avatars"]["tmp_name"][$key];
             $ext=pathinfo($file_name,PATHINFO_EXTENSION);



                $filename = basename($file_name , $ext);
                $avatars = $filename.time().".".$ext; 
              //  $avatars1 = rand(0 , 100000000) . '_' . $filename;
               move_uploaded_file($file_tmp=$_FILES['avatars']['tmp_name'][$key] , "assets/images/products/$avatars");
               $file[] = $avatars;

            }
            // echo "<pre>";
            // print_r($file);
            $finalimage = implode(',' , $file);
      //       echo $finalimage . "<br>";
 

      // exit();

         $formErrors = [];
         if(empty($name)){    
         $formErrors[] = "Enter Product Name Please";
        }
         if(empty($desc)){
         $formErrors[] = "Sorry description Field Can’t Be Empty";
         }
        if(empty($country)){
            $formErrors[] = "Sorry Country Made Can’t Be Empty ";
        }
        if(empty($status)){
            $formErrors[] = "Sorry Product Status Can’t Be Empty ";
        }
        if(empty($category)){
            $formErrors[] = "Sorry Product Category Can’t Be Empty ";
        }
        if(empty($subcategory)){
            $formErrors[] = "Sorry Product Sub Category Can’t Be Empty ";
        }
        if(empty($brand)){
            $formErrors[] = "Sorry Product Brand Can’t Be Empty ";
        }
        if(empty($taxes)){
            $formErrors[] = "Sorry Product Taxes Can’t Be Empty ";
        }
        if(empty($tags)){
            $formErrors[] = "Sorry Product Tags Can’t Be Empty ";
        }

        foreach($formErrors as $error){
            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
            header("refresh:2;url=products.php?action=update");
        }
        if(empty($formErrors)){

            $avatar = rand(0 , 100000000) . '_' . $avatarname;
            move_uploaded_file($avatartmp , "assets\images\products\\" . $avatar);

          $stmt = $conn -> prepare ("UPDATE products SET name= ?,image=?,description=?,price=?,add_date=?,country_made=?,status=?,product_category=?,sub_category=?,product_user=?,product_brand=?,approve=?,product_taxes=?,product_tags=? WHERE product_id = ?");
          $stmt -> execute(array($name,$avatar,$desc,$price,$date,$country,$status, $category, $subcategory, $owner, $brand, 1, $taxes, $tags,$id ));
        
          $stmt = $conn -> prepare("SELECT * FROM images WHERE product_id = ?");
          $stmt -> execute(array($id));
          $count = $stmt -> rowCount();
          $rows_images = $stmt -> fetch();
          if($count > 0){
            
            $stmt_image = $conn -> prepare('UPDATE images SET image = ? WHERE product_id = ?');
            $stmt_image -> execute(array($finalimage , $id));
          }else{

            $stmt = $conn -> prepare("INSERT INTO images( product_id, image )
            VALUES (:product_id , :image)");
                      $stmt -> execute(array(
                        'product_id'     => $id,
                        'image'          => $finalimage,
                      ));
          }
        
          echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Updated </div>';
          header("refresh:3;url=products.php");
       
   }

        }else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index1.php");
        }

// ###############################################################################
}elseif($action == 'add'){
      ?>
    <div class="title-wrapper pt-30" style='margin-left: 20px;'>
    <div class="row align-items-center">
      <div class="col-md-6">
        <div class="titlemb-30">
          <h2>Settings</h2>
        </div>
      </div>
      <div class="col-md-6">
        <div class="breadcrumb-wrapper mb-30">
          <nav aria-label="breadcrumb">
            <ol class="breadcrumb">
              <li class="breadcrumb-item">
                <a href="index1.php">Dashboard</a>
              </li>
              <li class="breadcrumb-item"><a href="#0">Pages</a></li>
              <li class="breadcrumb-item active" aria-current="page">
             <a href="#">Settings</a>   
              </li>
            </ol>
          </nav>
        </div>
      </div>
    </div>
  </div>

  <div class="row">
    <div class="col-lg-6">
      <div class="card-style settings-card-1 mb-30">
        <div
          class="
            title
            mb-30
            d-flex
            justify-content-between
            align-items-center
          "
        >
          <h6>Add Product</h6>
          <button class="border-0 bg-transparent">
            <a href="#"><i class="lni lni-pencil-alt"></i></a>
          </button>
        </div>
        <div class="profile-info">
          <div class="d-flex align-items-center mb-30">
            <div class="profile-image">
              
              <div class="update-image">
                <input type="file" />
                <label for=""
                  ><i class="lni lni-cloud-upload"></i
                ></label>
              </div>
            </div>
            <div class="profile-meta">
              <h5 class="text-bold text-dark mb-10">product name</h5>
            </div>
          </div>

<form enctype="multipart/form-data" action="<?php $_SERVER['PHP_SELF']?>?action=insert" method='POST'>

          <div class="input-style-1">
            <label>Product Name</label>
            <input
              name='name'
              type="text"
              placeholder="Product Name"
            />
          </div>
            <div class="input-style-1">
            <label>Price</label>
            <input
              name='price'
              type="number"
              placeholder="Product Price"
            />
          </div>
          <div class="input-style-1">
            <label>Description</label>
            <input
              name='desc'
              type="text"
              placeholder="Product Description"
            />
          </div>
          <div class="input-style-1">
            <label>Date</label>
            <input
              name='date'
              type="date"
              placeholder="www.uideck.com"
            />
          </div>
          <div class="input-style-1">
            <label>Contry Made In</label>
            <input
              name='country'
              type="text"
              placeholder="Country Made"
            />
          </div>
          <div class="input-style-1">
          <label for="">Product Image :</label>
                <input name="avatar" type="file" required="require" value='<?php echo $product['image']?>'>
          </div>
          <div class="input-style-1">
          <label for="">Product Other Images :</label>
                <input name="image[]" type="file" multiple required="require" value='<?php echo $product['image']?>'>
          </div>
        </div>
      </div>
    </div>
    
    <div class="col-lg-6">
      <div class="card-style settings-card-2 mb-30">
        <div class="title mb-30">
          <h6></h6>
        </div>
          <div class="row">
            <div class="col-12">
              <div class="input-style-1">
                <label>Product Status</label>
                  <select name="status" class="form-control">
                        <option value="0">...</option>
                        <option value="New">New</option>
                        <option value="Lite New">Lite New</option>
                        <option value="Used">Used</option>
                        <option value="Very Old">Very Old</option>
                    </select>
                    </div>
              </div>
            </div>

            

            <div class="col-12">
              <div class="input-style-1">
                <label for="">Owner</label>
                <select name="owner" class="form-control">
                        <option value="0">...</option>
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM users");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                        echo "<option value='".$cat['user_id']."'>".$cat['firstname']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>

            <div class="col-12">
              <div class="input-style-1">
                <label for="">Category</label>
                <select name="category" class="form-control">
                        <option value="0">...</option>
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM categories");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                        echo "<option value='".$cat['category_id']."'>".$cat['name']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>
            <div class="col-12">
              <div class="input-style-1">
                <label for="">Sub Categories</label>
                 <select name="subcategory" class="form-control">
                        <option value="0">...</option>
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM child_category");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                         echo "<option value='".$cat['id']."'>".$cat['name']."</option>";

                      }
                      ?>
                  </select>
              </div>
            </div>

            <div class="col-12">
              <div class="input-style-1">
                <label for="">brand</label>
                 <select name="brand" class="form-control">
                     <option value="0">...</option>
                      <?php
                      $stmt = $conn ->prepare("SELECT * FROM brands");
                      $stmt -> execute();
                      $cats = $stmt -> fetchAll();
                      foreach($cats as $cat){
                        echo "<option value='".$cat['id']."'>".$cat['name']."</option>";
                      }
                      ?>
                  </select>
              </div>
            </div>
            <div class="col-12">
              <div class="input-style-1">
                <label>Taxes</label>
                <input name='taxes' type="number" placeholder="Taxes" />
              </div>
            </div>
            <div class="col-12">
              <div class="input-style-1">
                <label>Tags</label>
                <input name='tags' type="text" placeholder="tags seperate With ( , )" />
              </div>
            </div>
            </div>
            <div class="col-12">
              <button class="main-btn primary-btn btn-hover">
                Insert
              </button>
            </div>
          </div>
        </form>
      </div>
    </div>
  </div>

<?php
// ###############################################################################
}elseif($action == 'insert'){

    if($_SERVER['REQUEST_METHOD'] == 'POST' ){



        $name         = $_POST['name'];
        $price        = $_POST['price'];
        $desc         = $_POST['desc'];
        $date         = $_POST['date'];
        $country      = $_POST['country'];
        $status       = $_POST['status'];
        $category     = $_POST['category'];
        $subcategory  = $_POST['subcategory'];
        $owner        = $_POST['owner'];
        $brand        = $_POST['brand'];
        $taxes        = $_POST['taxes'];
        $tags         = strtolower($_POST['tags']);

        $avatarname = $_FILES['avatar']['name'];
        $avatarsize = $_FILES['avatar']['size'];
        $avatartmp = $_FILES['avatar']['tmp_name'];
        $avatartype = $_FILES['avatar']['type'];

         $avatarAllowedExtensions = array("jpg" , "jpeg" , "png" , "gif");  // allowed files

         @$avatarExtention = strtolower( end ( explode ('.' , $avatarname) ) );


         $error = array();
         $file = [];
         $extension = array("jpeg","jpg","png","gif");
         foreach($_FILES["image"]["tmp_name"] as $key=>$tmp_name) {
             $file_name =$_FILES["image"]["name"][$key];
             $file_tmp =$_FILES["image"]["tmp_name"][$key];
             $ext=pathinfo($file_name,PATHINFO_EXTENSION);



                $filename = basename($file_name , $ext);
                $avatars = $filename.time().".".$ext; 
              //  $avatars1 = rand(0 , 100000000) . '_' . $filename;
               move_uploaded_file($file_tmp=$_FILES['image']['tmp_name'][$key] , "assets/images/products/$avatars");
               $file[] = $avatars;

            }
            // echo "<pre>";
            // print_r($file);
            $finalimage = implode(',' , $file);

         $formErrors = [];
         if(empty($name)){    
         $formErrors[] = "Enter Product Name Please";
        }
         if(empty($desc)){
         $formErrors[] = "Sorry description Field Can’t Be Empty";
         }
        if(empty($country)){
            $formErrors[] = "Sorry Country Made Can’t Be Empty ";
        }
        if(empty($status)){
            $formErrors[] = "Sorry Product Status Can’t Be Empty ";
        }
        if(empty($category)){
            $formErrors[] = "Sorry Product Category Can’t Be Empty ";
        }
        if(empty($subcategory)){
            $formErrors[] = "Sorry Product Sub Category Can’t Be Empty ";
        }
        if(empty($brand)){
            $formErrors[] = "Sorry Product Brand Can’t Be Empty ";
        }
        if(empty($taxes)){
            $formErrors[] = "Sorry Product Taxes Can’t Be Empty ";
        }
        if(empty($tags)){
            $formErrors[] = "Sorry Product Tags Can’t Be Empty ";
        }

        foreach($formErrors as $error){

            echo "<div class='alert alert-danger container text-center'>" .$error. "</div>";
            header("refresh:2;url=products.php?action=add");
        }
        if(empty($formErrors)){

            

            $avatar = rand(0 , 100000000) . '_' . $avatarname;
            move_uploaded_file($avatartmp , "assets\images\products\\" . $avatar);

            $stmt = $conn -> prepare("INSERT INTO products(name, image, description, price, add_date, country_made, status, product_category, sub_category, product_user, product_brand, approve, product_taxes, product_tags)
             VALUES (:name , :image , :description , :price , :add_date , :country_made , :status , :product_category , :sub_category , :product_user , :product_brand , 1 , :product_taxes , :product_tags)");
                       $stmt -> execute(array(
                        'name'             => $name,
                        'image'            => $avatar,
                        'description'      => $desc,
                        'price'            => $price,
                        'add_date'         => $date,
                        'country_made'     => $country,
                        'status'           => $status,
                        'product_category' => $category,
                        'sub_category'     => $subcategory,
                        'product_user'     => $owner,
                        'product_brand'    => $brand,
                        'product_taxes'    => $taxes,
                        'product_tags'    => $tags,
                      ));

                      $product_id = $conn -> lastInsertId();

                      $stmt = $conn -> prepare("INSERT INTO images( product_id, image )
                      VALUES (:product_id , :image)");
                                $stmt -> execute(array(
                                  'product_id'     => $product_id,
                                  'image'          => $finalimage,
                                ));

          echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Inserted </div>';
          header("refresh:3;url=products.php");
       
   }

        }else{
        echo "<div class='alert alert-danger text-center container'>Acess Denied</div>";
        header("refresh:2;url=index1.php");
        }

// ####################################################################
}elseif($action == 'delete'){

  $id = $_GET['id'];

  $stmt_delete = $conn -> prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt_delete -> execute(array($id));
  $count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

    $stmt = $conn -> prepare("DELETE FROM products WHERE product_id = ?");
    $stmt -> execute(array($id));

    echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Deleted </div>';
    header("refresh:2;url=products.php");

}else{

    echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
    header("refresh:2;url=index.php");
    }
    // ################################################################
}elseif($action == 'trend'){
  
  $id = $_GET['id'];

  $stmt_delete = $conn -> prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt_delete -> execute(array($id));
  $count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

    $stmt = $conn -> prepare("UPDATE products SET trending =? WHERE product_id = ?");
    $stmt -> execute(array(1, $id));

    echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Done </div>';
    header("refresh:2;url=products.php");

}else{

    echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
    header("refresh:2;url=index.php");
    }
    // ################################################################
}elseif($action == 'remove_trend'){
  $id = $_GET['id'];

  $stmt_delete = $conn -> prepare("SELECT * FROM products WHERE product_id = ?");
  $stmt_delete -> execute(array($id));
  $count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

    $stmt = $conn -> prepare("UPDATE products SET trending =? WHERE product_id = ?");
    $stmt -> execute(array(0, $id));

    echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Removed From Trending Products </div>';
    header("refresh:2;url=products.php");

}else{

    echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
    header("refresh:2;url=index.php");
    }
}

// ######################################################################
        ?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </section>
      <footer class="footer">
        <div class="container-fluid">
          <div class="row">
            <div class="col-md-6 order-last order-md-first">
              <div class="copyright text-center text-md-start">
                <p class="text-sm">
                  Designed and Developed by
                  <a
                    href="https://plainadmin.com"
                    rel="nofollow"
                    target="_blank"
                  >
                    PlainAdmin
                  </a>
                </p>
              </div>
            </div>
            <div class="col-md-6">
              <div
                class="
                  terms
                  d-flex
                  justify-content-center justify-content-md-end
                "
              >
                <a href="#0" class="text-sm">Term & Conditions</a>
                <a href="#0" class="text-sm ml-15">Privacy & Policy</a>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </main>
    <script src="assets/js/bootstrap.bundle.min.js"></script>
    <script src="assets/js/Chart.min.js"></script>
    <script src="assets/js/dynamic-pie-chart.js"></script>
    <script src="assets/js/moment.min.js"></script>
    <script src="assets/js/fullcalendar.js"></script>
    <script src="assets/js/jvectormap.min.js"></script>
    <script src="assets/js/world-merc.js"></script>
    <script src="assets/js/polyfill.js"></script>
    <script src="assets/js/main.js"></script>
  </body>
</html>
<?php
}else{
  header("location:index1.php");
  exit();
}

ob_end_flush();
?>