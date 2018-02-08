<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_GET['id'])){
				if($_GET['id']!=NULL){
					$id=$_GET['id'];
					$query='SELECT * FROM comments WHERE ID='.$id.';';
					$check=$pdo->query($query);
					if($check->rowCount()==1){
						$query='DELETE FROM comments WHERE ID='.$id.';';
						$pdo->query($query);
						header('location:cmsPosts.php');
					}
					else{
						header('location:cmsPosts.php');
					}
				}else{
					header('location:cmsPosts.php');
				}
			}else {
				header('location:cmsPosts.php');
			}
		}
	}
	require_once('footer.php');
?>