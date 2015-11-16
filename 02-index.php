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

function deletePost(postID) {
alert(postID);
$.ajax({
		url: '01-deletePost.php',
		dataType: 'html',
		type: 'POST',
		data: { id: postID},
		error: function(xhr) {
			alert(xhr);
			loadAllPosts();
			},
		success: function(response) {
		alert("ok");
			loadAllPosts();
			}
	});
}

function loadEditForm(postID) {
	DIV='mainDiv';
$.ajax({
		url: '02-ajaxEditForm.php',
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

function updateMsg() {
postID=$("#msgID").val();
title=$('#title').val();
msg=$('#content').val();
author=$('#author').val();
$.ajax({
		url: '01-updatePost.php',
		dataType: 'html',
		type: 'POST',
		data: { id: postID, title: title, content: msg, author: author},
		error: function(xhr) {
			alert(xhr);
			loadAllPosts();
			},
		success: function(response) {
//			$('#'+DIV).html(response); //set the html content of the object msg
			loadAllPosts();
			}
	});
}


function loadAllPosts() {
	DIV='div001';
$.ajax({
		url: '02-ajaxSample.php',
		dataType: 'html',
		type: 'POST',
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
Hello world, <input type="button" onclick="loadAllPosts()" value="更新文章列表">
<hr>
<div id='div001'></div>
<div id='mainDiv'></div>
</body>
</html>
