<?php
require_once('header.php');
	if(!isset($_SESSION['userID'])){
		header('location:index.php');
	}else{
		if($_SESSION['userID']!=1){
			header('location:index.php');
		}
		else{
			require_once('cmsmenu.php');
			?>
					
			<div class="maincontent">
			<div class="cmsContent">
			<br/>
			<?php
			if(isset($_POST['content'])&&isset($_POST['title'])){
				if($_POST['content']!=NULL&&$_POST['title']!=NULL){
					$content=$_POST['content'];
					$title=$_POST['title'];
					if(isset($_POST['author'])){
						if($_POST['author']!=NULL){
							$author=$_POST['author'];
						}else {
							$query='SELECT firstname FROM about';
							$author=$pdo->query($query);
							$author=$author->fetchAll();
							$author=$author[0]['firstname'];
						}
					}else{
						$query='SELECT firstname FROM about';
						$author=$pdo->query($query);
						$author=$author->fetchAll();
						$author=$author[0]['firstname'];
					}
					if(isset($_POST['category'])){
						if($_POST['category']!=NULL){
							$category=$_POST['category'];
						}else{
							$category=1;
						}
					}else{
						$category=1;
					}
					$query='INSERT INTO posts (author, title, content, category) VALUES ("'.$author.'","'.$title.'","'.$content.'",'.$category.');';
					$pdo->query($query);
					header('location:cms.php');
					
				}else{
					echo 'Błąd dodawania postu. Treść postu lub tytul jest pusty.';
				}
			}
			else{
				echo 'Błąd dodawania postu.';
			}
			?>
			<br/>
			</div>
			</div>
			<?php
		}
	}
require_once('footer.php');
?>