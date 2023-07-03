<?php
        include("connect.php");

  $name = $_POST['name'];
  $email = $_POST['email'];
  $subject = $_POST['subject'];
  $message = $_POST['message'];

  $stmt = $conn -> prepare("INSERT INTO messages( name, email , subject, message) VALUES ( :name , :email , :subject , :message)");
  $stmt -> execute(array(
    "name" => $name,
    "email" => $email,
    "subject" => $subject,
    "message" => $message,
  ));

  echo "<div class='alert alert-success container text-center mt-3'> تم الارسال بنجاح سيتم التواصل معك في اقرب وقت </div>"

?>