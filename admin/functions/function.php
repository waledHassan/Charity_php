<?php

function admin(){
      global $conn;

  $getadmin = $conn -> prepare("SELECT username , password , GroupID where username =? , password =? , GroupID = 1 ");
  $getadmin -> execute();
  $admin = $getadmin -> fetchAll();
  return $admin;
}


function getallFrom($field ,$table , $where, $and, $orderfield ,$ordering = "DESC"){
     global $conn;

     $getall = $conn -> prepare("SELECT $field FROM $table $where $and ORDER BY $orderfield  $ordering");
     $getall -> execute();
     $all = $getall -> fetchAll();
     return $all;
}



function getcats(){
     global $conn;

     $getcat = $conn -> prepare("SELECT * FROM categories ORDER BY ID ASC");
     $getcat -> execute();
     $cats = $getcat -> fetchAll();
     return $cats;
}



function getitems($value , $where = 'Cat_ID' , $approve = NULL ){
     global $conn;
     if($approve == NULL){
          $sql = 'AND Approve = 1';
     }else{
          $sql = NULL;
     }

     $gatitem = $conn -> prepare("SELECT * FROM items WHERE $where = ? $sql ORDER BY item_ID DESC");
     $gatitem -> execute(array($value));
     $items = $gatitem -> fetchAll();
     return $items;
}


// Check If User Is Not Active
// Check The Regstatus Of The Users
function checkuserstatus($user){

           global $conn;

          $stmtx = $conn -> prepare("SELECT
                                         username , RegStatus
                                    FROM
                                         users
                                    WHERE
                                         username = ?
                                    AND
                                         RegStatus = 0");

          $stmtx -> execute(array($user));
          $status = $stmtx -> rowCount();
          return $status;
}









function getTitle() {
     global $pagetitle;

     if(isset($pagetitle)){
          echo $pagetitle;
     }else{
         echo "Default";
     }
}


// Redirect Function

function redirecthome($themassage , $link = 'HomePage' , $seconds =3 , $url = null) {
      if($url === null){
          $url =  $_SERVER['HTTP_REFERER'];
          $link = "Refere Page";
      } else{
          if(isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== ''){

               $url = $_SERVER['HTTP_REFERER'];
               $link = "Previous Page";
          }else{
               $url = $_SERVER['HTTP_REFERER'] ;
               $link = "HomePage";
          }
      }

      echo "<div class='container text-center alert alert-info'>You Will Be Redirect To $link After $seconds seconds.</div>";
      echo $themassage;

     header("refresh:$seconds;url=$url");
     exit();
}


// function To Check Item In Database

function checkitem($select , $from ,$value){
      global $conn;
      $stmt2 = $conn -> prepare("SELECT $select FROM $from WHERE $select = ?");

      $stmt2 ->execute(array($value));

      $count = $stmt2 -> rowCount();

      return $count;
}



function countitems($item , $table , $where = ""){
     global $conn;

     $stmt3 = $conn -> prepare("SELECT COUNT($item ) FROM $table $where") ;
     $stmt3 -> execute();
      return $stmt3 -> fetchColumn();
}



function getlatest($select , $table , $order , $limit = 3 ){
     global $conn;

     $getstmt = $conn -> prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");
     $getstmt -> execute();
     $rows = $getstmt -> fetchAll();
     return $rows;
}
