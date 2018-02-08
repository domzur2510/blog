<?php
require_once('.\header.php');
?>
<div class="maincontent">
<?php
	if(isset($_GET['category'])){
		$query='SELECT ID FROM category WHERE Name="'.$_GET['category'].'";';
		
		$category=$pdo->query($query);
		if($category->rowCount()>0){
			$category=$category->fetchAll();
			
			$category=$category[0]['ID'];
			
			$query='SELECT * FROM posts WHERE category='.$category.' ORDER BY addDate DESC;';
			$posts=$pdo->query($query);
			if($posts->rowCount()>0){
				$posts=$posts->fetchAll();
			
				foreach($posts as $post){
					echo '<div class="post">';
					echo '<a class="link" href="post.php?id='.$post['ID'].'"><div class="title">'.$post['title'].'</div></a>';
					
					echo '<div class="addData">'.$post['addDate'].'</div>';
					
					echo '<div class="content">'.$post['content'].'</div>';
					echo '<div class="author">~'.$post['author'].'</div>';
					echo '<a class="link" href=".\post.php?id='.$post['ID'].'"><div class="commNumb">';
					$query='SELECT COUNT(ID) FROM comments WHERE PostID='.$post['ID'].';';
					$comms=$pdo->query($query);
					$comms=$comms->fetchAll();
					$comms=$comms[0][0];
					echo 'Liczba komentarzy:'.$comms;
					echo '</div></a>';
					echo '</div>';
				}
			}else
				echo '<div class="content" style="border-bottom-style:solid;border-top-style:solid"></br>Na razie brak postów z danej kategorii.</br></div>';
		}
		else header('location: index.php');
	}
	else{
		
			$query='SELECT * FROM posts ORDER BY addDate DESC;';
			$posts=$pdo->query($query);
			if($posts->rowCount()>0){
				$posts=$posts->fetchAll();
			
				foreach($posts as $post){
					echo '<div class="post">';
					echo '<a class="link" href=".\post.php?id='.$post['ID'].'"><div class="title">'.$post['title'].'</div></a>';
					echo '<div class="addData">'.$post['addDate'].'</div>';
					
					echo '<div class="content">'.$post['content'].'</div>';
					echo '<div class="author">~'.$post['author'].'</div>';
					
					echo '<a class="link" href=".\post.php?id='.$post['ID'].'"><div class="commNumb">';
					$query='SELECT COUNT(ID) FROM comments WHERE PostID='.$post['ID'].';';
					$comms=$pdo->query($query);
					$comms=$comms->fetchAll();
					$comms=$comms[0][0];
					echo 'Liczba komentarzy:'.$comms;
					echo '</div></a>';
					echo '</div>';
				}
			}else
				echo '<div class="content" style="border-bottom-style:solid;border-top-style:solid"></br>Na razie brak postów.</br></div>';
		}
		
		
?>
</div>

<?php
require_once('.\secmenu.php');
require_once('.\footer.php');
?>