<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			
			if(isset($_GET['id'])&&isset($_POST['content'])){
				if($_GET['id']!=NULL){
					$id=$_GET['id'];
					
					$query='SELECT author FROM posts WHERE id='.$id.';';
					
					$check=$pdo->query($query);
					if($check->rowCount()==1){
						$check=$check->fetchAll();
						$check=$check[0]['author'];
						$content=$_POST['content'];
						
						$query='UPDATE posts SET content="'.$content.'" WHERE ID='.$id.';'; //UPDATE CONTENT
						$pdo->query($query);
						header('location: cmsPosts.php');
						
					}else header('location:cmsPosts.php');
				}
				else header('location:cmsPosts.php');
			}else header('location:cmsPosts.php');

		}
	}
	require_once('footer.php');
?>