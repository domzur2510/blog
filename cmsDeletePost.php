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
					$query='SELECT author FROM posts WHERE ID='.$id.';';
					echo $query;
					$check=$pdo->query($query);
					if($check->rowCount()==1){
						$query='DELETE FROM posts WHERE ID='.$id.';';
						$pdo->query($query);
						$query='DELETE FROM comments WHERE PostID='.$id.';';
						$pdo->query($query);
						header('Location: cmsPosts.php');
					}else header('Location: cmsPosts.php');
				}else header('Location: cmsPosts.php');
			}else header('Location: cmsPosts.php');
		}
	}
	require_once('footer.php');
?>