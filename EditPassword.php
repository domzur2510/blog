<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_POST['pass1'])&&isset($_POST['pass2'])){
				if(strlen($_POST['pass1'])==strlen($_POST['pass2'])){
					if(strlen($_POST['pass1'])>7){
						$pass=$_POST['pass1'];
						$query='UPDATE users SET password="'.md5($pass).'";';
						$pdo->query($query);
					}else{
						$_SESSION['passerr']='Hasło jest za krótkie.';
					}
				}else{
					$_SESSION['passerr']='Hasła nie są takie same.';
				}
			}else{
				$_SESSION['passerr']='Błąd zmiany hasla.';
			}
			header ('location:cmsEditPassword.php');
		}
	}
	header ('location:cmsEditPassword.php');
	require_once('footer.php');
?>