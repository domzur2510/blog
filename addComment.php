<?php
require_once('.\header.php');
if(isset($_POST['id'])){
	if(isset($_POST['comment'])){
		$query='SELECT * FROM posts WHERE ID='.$_POST['id'].';';
		$post=$pdo->query($query);
		if($post->rowCount()==1){
			if(strlen($_POST['comment'])>0){
				if(isset($_SESSION['name'])) {
					if(strlen($_SESSION['name'])>0) $name=$_SESSION['name'];
					else $name='Anonim';
				}else $name='Anonim';
				$comm=$_POST['comment'];
				$id=$_POST['id'];
				$query='INSERT INTO comments (content, author, PostID) VALUES ("'.$comm.'","'.$name.'",'.$id.');';
				$pdo->query($query);
				header('location: post.php?id='.$_POST['id']);
			}else {
				$_SESSION['commentError']='Brak treści komentarza';
				header('location: post.php?id='.$_POST['id']);
			}
		}else header('location: post.php?id='.$_POST['id']);
	}else header('location: post.php?id='.$_POST['id']);
}else header('location: index.php');
require_once('.\footer.php');
?>