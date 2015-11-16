<?php
require_once("dbconnect.php");
$id=(int)$_REQUEST['id'];
$sql="select * from guestbook where id=" . $id;
if ($results=mysqli_query($conn,$sql) ) {
	$rs=mysqli_fetch_array($results);
?>
<form action="" method="post">
<table border=1>
<tr><td>id</td><td><input type="hidden" name="msgID" id = "msgID" value="<?php echo $rs['id']; ?>"></td></tr>
	<tr><td>title</td><td><input type="text" name="title" id="title" value="<?php echo  $rs['title'];?>"></td></tr>
	<tr><td>author</td><td><input type="text" name="author" id="author" value="<?php echo $rs['name'];?>"></td></tr>
	<tr><td>message</td><td><textarea name="content" id="content"><?php echo $rs['msg'];?></textarea></td></tr>
</table>
<input type="button" onclick="updateMsg()" value="save">
</form>
<?php
}
?>