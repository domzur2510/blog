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
			if(isset($_GET['id'])){
				?>
					
					<div class="maincontent">
					<div class="cmsContent">
					
					
					<?php
				if($_GET['id']!=NULL){
					$id=$_GET['id'];
					$query='SELECT * FROM posts WHERE ID='.$id.';';
					$check=$pdo->query($query);
					if($check->rowCount()!=1){
						echo 'Taki artykuł nie istnieje.';
					}else{
						$query='SELECT * FROM comments WHERE PostID='.$id.';';
						$comments=$pdo->query($query);
						if($comments->rowCount()==0){
							echo 'Wybrany post nie został jeszcze skomentowany.';
						}else{
							$comments=$comments->fetchAll();
							?>
							<br/>
							<table class="comments">
							<thead>
							<tr>
							<td class="commentsHeadAuthor">
							Autor
							</td>
							<td class="commentsHeadContent">
							Komenatarz
							</td>
							<td class="commentsHeadData">
							Data dodania
							</td>
							<td class="commentsHeadAction">
							Akcje
							</td>
							
							</tr>
							</thead>
							<tbody>
							<?php
							foreach($comments as $comm){
								echo '<tr>';
								echo '<td class="commentsBodyAuthor">'.$comm['author'].'</td>';
								echo '<td class="commentsBodyContent">'.$comm['content'].'</td>';
								echo '<td class="commentsBodyData">'.$comm['addData'].'</td>';
								echo '<td class="commentsBodyAction">';
								echo '<a class="link" href="cmsDeleteComment.php?id='.$comm['ID'].'"><button>Usuń</button></a>';
								echo '</td>';
								echo '</tr>';
							}
							?>
							</tbody>
							</table>
							<br/>
							<?php
						}
					}
					
				}else{
					header('location: cmsPosts.php');
				}
				?>
				
				</div>
				</div>
				<?php
			}else{
				header('location: cmsPosts.php');
			}
		}
	}
	require_once('footer.php');
?>