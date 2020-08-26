<?php

ob_start();

/*
get categories
*/
function getCat(){

      global $con;

      $getCat = $con->prepare("SELECT * FROM categories ORDER BY ID ASC");

      $getCat->execute();

      $cats = $getCat->fetchAll();

      return $cats;

}

/*
get all books
*/

function getAllbook($tableName, $orderby, $limitbook){

      global $con;

      $getAll = $con->prepare("SELECT * FROM $tableName ORDER BY $orderby DESC LIMIT $limitbook");

      $getAll->execute();

      $All = $getAll->fetchAll();

      return $All;

}

/*
get books
*/
function getBook($where, $value){

      global $con;

      $getBook = $con->prepare("SELECT * FROM book WHERE $where = ? ORDER BY book_id DESC");

      $getBook->execute(array($value));

      $books = $getBook->fetchAll();

      return $books;

}


function CheckUserStatus($user){

global $con;

$stmtx = $con->prepare("SELECT
                            username, password
                       FROM
                              users
                       WHERE
                              username =?
                       AND
                              StatusReg = 0
                     ");

$stmtx->execute(array($user));

$status = $stmtx->rowCount();

return $status;

}

/*
Title
*/
function keywords()
{
  global $keywords;
if (isset($keywords)) {
echo $keywords ;
}else {
echo 'Default';
}
}
function description()
{
  global $description;
if (isset($description)) {
echo $description ;
}else {
echo 'Default';
}
}

function gettitle()
{
  global $pagetitle;
if (isset($pagetitle)) {
echo $pagetitle ;
}else {
echo 'Default';
}
}



function redirectHome($theMsg, $url = null, $seconds = 3) {

  if ($url === null) {
    $url = 'index.php';
    $link = 'Home Page';
  }elseif ($url = 'add') {
    $url = 'index';
    $link = 'Profile';
  }
   else {
    if (isset($_SERVER['HTTP_REFERER']) && $_SERVER['HTTP_REFERER'] !== '') {
    $url = $_SERVER['HTTP_REFERER'];
    $link = 'previoys Page';
  } else {
    $url = 'index.php';
    $link = 'Home Page';
  }
}
  echo $theMsg;
  echo " <div class='alert alert-info'>You Will Be Redirected To $link After $seconds Seconds.</div>";
  header("refresh:$seconds;url=$url");
  exit();
}


function checkItem($select, $from, $value) {

  global $con;

  $statment = $con->prepare("SELECT $select FROM $from WHERE $select = ?");

  $statment->execute(array($value));

  $count = $statment->rowCount();

  return $count;

}

function countItems($item, $table) {

    global $con;

    $stmt2 = $con->prepare("SELECT COUNT($item) FROM $table");

    $stmt2->execute();

    return $stmt2->fetchColumn();

}

function getLatest($select, $table, $order, $limit = 5){

      global $con;

      $getStmt = $con->prepare("SELECT $select FROM $table ORDER BY $order DESC LIMIT $limit");

      $getStmt->execute();

      $row = $getStmt->fetchAll();

      return $row;

}
















 ?>
