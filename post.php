<?php
	require_once('.\header.php');
	?>
	<div class="maincontent">
	<?php
	if(isset($_GET['id'])){
		
		$query='SELECT * FROM posts WHERE ID='.$_GET['id'];
		$post=$pdo->query($query);
		if($post->rowCount()==0){
			
			echo '<div class="content" style="border-bottom-style:solid;border-top-style:solid"></br>Taki artykuł nie istnieje.</br></div>';
			
		}
		else{
			$post=$post->fetchAll();
			$post=$post[0];
			echo '<div class="post">';
			echo '<a class="link" href="post.php?id='.$post['ID'].'"><div class="title">'.$post['title'].'</div></a>';
			echo '<div style="clear:both"></div>';
			echo '<div class="addData">'.$post['addDate'].'</div>';
					
			echo '<div class="content">'.$post['content'].'</div>';
			echo '<div class="author">~'.$post['author'].'</div>';
			echo '</div>';
			?>
			<form method="POST" action=".\addComment.php">
			<div class="comment">
			<?php
			if(isset($_SESSION['commentError'])){
				echo '<span class="commentError">'.$_SESSION['commentError'].'</span></br>';
				unset($_SESSION['commentError']);
			}
			?>
			Treść komentarza:
			<div class="commentContent">
			<textarea name="comment" class="addComment" width="250px"></textarea></div>
			<div class="commentAuthor">
			Podpis:
			<input type="text" name="name" value="Anonim"/></div>
			<?php
			echo '<input type="hidden" value="'.$_GET['id'].'" name="id"/>';
			?>
			<input type="submit" value="Wyślij komentarz"/>
			</div>
			</form>
			<?php
			$query='SELECT * FROM comments WHERE PostID='.$_GET['id'].' ORDER BY addData DESC;';
			$comments=$pdo->query($query);
			$comments=$comments->fetchAll();
			foreach($comments as $comm){
				echo '<div class="comment">';
				echo '<div class="commentData">'.$comm['addData'].'</div>';
				echo '<div class="commentContent">'.$comm['content'].'</div>';
				echo '<div class="commentAuthor">~'.$comm['author'].'</div>';
				echo '</div>';
			}
			
		}
			
	}else header('location: index.php');
?>

</div>
<?php
	require_once('.\secmenu.php');
	require_once('.\footer.php');
?>