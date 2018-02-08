<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_POST['email'])){
				$email=$_POST['email'];
				$check1=explode('@',$email);
				if(count($check1)==2){
					$check2=explode('.',$check1[1]);
					if(count($check2)>1){
						
					$query='UPDATE about SET email="'.$email.'";';
					$pdo->query($query);
					}
				}
			}header ('location:cmsEditEmail.php');
		}
	}
	require_once('footer.php');
?>