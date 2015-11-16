<?php
require_once("dbconnect.php");
?>
<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.01 Transitional//EN" "http://www.w3.org/TR/html4/loose.dtd">
<!-- DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd" -->
<html xmlns="http://www.w3.org/1999/xhtml"  style="height: 100%;">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<script src="jquery.js" type="text/javascript"></script>
<script type="text/javascript">
function loadMsg(postID) {
	DIV='mainDiv';
$.ajax({
		url: '01-viewPost.php',
		dataType: 'html',
		type: 'POST',
		data: { id: postID},
		error: function(xhr) {
			$('#'+DIV).html(xhr);
			},
		success: function(response) {
			$('#'+DIV).html(response); //set the html content of the object msg
			}
	});
}
</script>
</head>
    <body>
<?php
$sql="select * from guestbook";
if ($results=mysqli_query($conn,$sql) ) {
	echo "<table border=1>";
	while (	$rs=mysqli_fetch_array($results)) {
	echo "<tr><td>" , $rs['id'] ,
		"</td><td>" , $rs['title'],
		"</td><td>", "<input type='button' value='查' onclick='loadMsg(" , $rs['id'] ,")'>",
		"</td><td>", "<input type='button' value='改' onclick='loadEditForm(" , $rs['id'] ,")'>",
		"</td><td>", "<input type='button' value='刪' onclick='deletePost(" , $rs['id'] ,")'>",
		"</td></tr>";
	}
	echo "</table>";
}
?>
<div id='mainDiv'></div>
</body>
</html>
