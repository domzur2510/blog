<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_POST['about'])){
				$about=$_POST['about'];
				$query='UPDATE about SET about="'.$about.'";';
				$pdo->query($query);
			}
		}
	}
	header ('location:cmsEditAbout.php');
	require_once('footer.php');
?>