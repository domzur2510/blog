<?php
	require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			if(isset($_GET['id'])) {
				if($_GET['id']!=NULL){
					$id=$_GET['id'];
					require_once('cmsmenu.php');
					$query='SELECT title, content FROM posts WHERE ID='.$id.';';
					$post=$pdo->query($query);
					if($post->rowCount()==0){
						?>
						<div class="maincontent">
						<div class="cmsContent">
						<br/>
						Taki post nie istenieje.
						</div>
						</div>
						<?php
					}else{
						$post=$post->fetchAll();
						$post=$post[0];
						
						?>
						
						<div class="maincontent">
						<div class="cmsContent">
						<br/>
						<?php
						
						echo '<form method="POST" action="editPost.php?id='.$id.'">';

							echo '<div><textarea name="content" class="editPost">';
							echo $post['content'];
							echo '</textarea></div>';
						?>
							
							<input type="submit" value="Edytuj"/>
						</form>
						<br/>
						</div>
						</div>
						<?php
					
					}
				}else
					header('location:cmsPosts.php');
			}else
					header('location:cmsPosts.php');
		}
	}
	require_once('footer.php');
?>