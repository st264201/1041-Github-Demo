<?php
require_once("dbconnect.php");
$id=(int)$_REQUEST['id'];
$sql="select * from guestbook where id=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
?>
<form action="01-updatePost.php" method="post">
<table border=1>
<tr><td>id</td><td><input type="hidden" name="id" value="<?php echo $rs['id']; ?>"></td></tr>
	<tr><td>ttttttttttttttttttitle</td><td><input type="text" name="title" value="<?php echo  $rs['title'];?>"></td></tr>
	<tr><td>aaaaaaaaaaaaaaaaauthor</td><td><input type="text" name="author" value="<?php echo $rs['name'];?>"></td></tr>
	<tr><td>mmmmmmmmmmmmmmmmessage</td><td><textarea name="content"><?php echo $rs['msg'];?></textarea></td></tr>
</table>
<input type="submit">
</form>
<?php
}
?>
