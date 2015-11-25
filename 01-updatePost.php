<?php
require_once("dbconnect.php");

$name = mysqli_real_escape_string($conn,$_POST['author']);
$title = mysqli_real_escape_string($conn,$_POST['title']);
$msg = mysqli_real_escape_string($conn,$_POST['content']);
$id=(int)$_POST['id'];

$sql="update guestbook set name='$name',title='$title',msg='$msg' where id=$id";
mysqli_query($conn,$sql);
//header("Location: 01-listPost.php");
//我是林承翰
?>
