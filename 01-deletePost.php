<?php
require_once("dbconnect.php");
$id = (int)$_REQUEST['id'];
$sql="delete from guestbook where id= $id";
mysqli_query($conn,$sql);
//header("Location: 01-listPost.php");
?>