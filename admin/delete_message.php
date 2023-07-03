<?php

include("connect.php");
include("functions/function.php");

$id = $_POST['id'];

$stmt_delete = $conn -> prepare("SELECT * FROM messages WHERE id = ?");
$stmt_delete -> execute(array($id));
$count_delete = $stmt_delete -> rowCount();

if($count_delete > 0){

  $stmt = $conn -> prepare("DELETE FROM messages WHERE id = ?");
  $stmt -> execute(array($id));

  echo "<div class='alert alert-success text-center container'>" .  $stmt -> rowCount() . 'Record Deleted </div>';
  // header("refresh:2;url=messages.php");

}else{

  echo "<div class='alert alert-danger text-center container'>This Id Doesn’t Exist</div>";
  header("refresh:2;url=index.php");
}