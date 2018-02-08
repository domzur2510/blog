<?php
require_once('.\header.php');
	if(isset($_POST['email'])){
		$email=$_POST['email'];
		if(strlen($email)<5){
			$_SESSION['newsletterAlert']="Błędny adres email!";
			header('location: index.php');
		}
		else{
			$email=explode('@',$email);
			if(count($email)!=2){
				$_SESSION['newsletterAlert']="Błędny adres email!";
				header('location: index.php');
			}
			else{
				$name=$email[0];
				$tmpdomain=explode('.',$email[1]);
				if(count($tmpdomain)<2){
					$_SESSION['newsletterAlert']="Błędny adres email!";
					header('location: index.php');
				}
				else{
					$query='SELECT * FROM newsletter WHERE email="'.$_POST['email'].'";';
					$isEmail=$pdo->query($query);
					$isEmail=$isEmail->rowCount();
					if($isEmail>0){
						$_SESSION['newsletterAlert']="Taki adres email jest już wpisany do newslettera!";
						header('location: index.php');
					}
					else{
						$query='INSERT INTO newsletter (email) VALUE ("'.$_POST['email'].'");';
						$pdo->query($query);
						$_SESSION['newsletterInf']='Adres został dodany do newslettera!';
						header('location: index.php');
					}
				}
			}
		}
	}else header('location: index.php');
	require_once('.\footer.php');
?>