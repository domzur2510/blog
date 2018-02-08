<?php
	require_once('header.php');
	if(isset($_POST['login'])&&isset($_POST['password'])){
		if(strlen($_POST['login'])<5||strlen($_POST['password'])<8){
			$_SESSION['loginError']='Nieprawidłowy login lub hasło';
			header('location: login.php');
		}
		else{
			$login=$_POST['login'];
			$password=md5($_POST['password']);
			$query='SELECT ID FROM users WHERE login="'.$login.'" AND password="'.$password.'";';
			$log=$pdo->query($query);
			if($log->rowCount()!=1){
				$_SESSION['loginError']='Nieprawidłowy login lub hasło';
				header('location: login.php');
			}
			else{
				$log=$log->fetchAll();
				$log=$log[0][0];
				
				$_SESSION['userID']=$log;
				echo $_SESSION['userID'];
				header('location: index.php');
			}
		}
	}
	else{
		if(isset($_SESSION['userID'])){
			header('location:index.php');
		}
		else{
			$_SESSION['loginError']='Nieprawidłowy login lub hasło';
			header('location: login.php');
		}
	}
	require_once('footer.php');
?>