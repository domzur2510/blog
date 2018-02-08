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
			<table class="posts">
			<thead>
			<tr>
			<td class="postsHeadTitle">Tytuł</td>
			<td class="postsHeadData">Data dodania</td>
			<td class="postsHeadAuthor">Podpis</td>
			<td class="postsHeadAction">Akcje</td>
			</tr>
			</thead>
			<tbody>
			<?php
			$query="SELECT ID, title, addDate, author FROM posts ORDER BY addDate DESC";
			$posts=$pdo->query($query);
			$posts=$posts->fetchAll();
			foreach($posts as $post){
				echo '<tr>';
				echo '<td class="postsBodyTitle">'.$post['title'].'</td>';
				echo '<td class="postsBodyData">'.$post['addDate'].'</td>';
				echo '<td class="postsBodyAuthor">'.$post['author'].'</td>';
				echo '<td class="postsBodyAction">';
				echo '<a class="link" href="cmsEditPost.php?id='.$post['ID'].'"><button>Edytuj post</button></a>';
				echo '<a class="link" href="cmsShowComments.php?id='.$post['ID'].'"><button>Pokaż komentarze</button></a>';
				echo '<a class="link" href="cmsDeletePost.php?id='.$post['ID'].'"><button>Usuń post</button></a>';
				echo '</td>';
				echo '</tr>';
			}
			?>
			
			</tbody>
			
			</table>
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>