<?php
        include("connect.php");

  $name = $_POST['name'];
  $phone = $_POST['phone'];
  $jop = $_POST['jop'];
  $message = $_POST['message'];

  $stmt = $conn -> prepare("INSERT INTO comments( name, comment , phone, jop) VALUES ( :name , :comment , :phone , :jop)");
  $stmt -> execute(array(
    "name" => $name,
    "comment" => $message,
    "phone" => $phone,
    "jop" => $jop,
  ));

  echo "<div class='alert alert-success container text-center mt-3'> تم الارسال بنجاح سيتم التواصل معك في اقرب وقت </div>"

?>