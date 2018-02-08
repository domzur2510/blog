<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_POST['firstname'])&&isset($_POST['lastname'])){
				$fname=$_POST['firstname'];
				$lname=$_POST['lastname'];
				$query='UPDATE about SET firstname="'.$fname.'", lastname="'.$lname.'";';
				$pdo->query($query);
			}header ('location:cmsEditNames.php');
		}
	}
	require_once('footer.php');
?>