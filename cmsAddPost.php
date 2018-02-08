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
			<form method="POST" action="addPost.php">
				<div>Tytuł:<input type="text" name="title"/></div><br/>
				<div><textarea name="content" class="editPost"></textarea></div>
				<div>
				Kategoria:<select name="category">
				<?php
				$query='SELECT * FROM category';
				$categories=$pdo->query($query);
				$categories=$categories->fetchAll();
				foreach($categories as $category){
					echo '<option value="'.$category['ID'].'">'.$category['Name'].'</option>';
				}
				?>
				</select>
				Podpis:
				<input type="text" name="author">
				</div>
				<input type="submit" value="Dodaj"/>
			</form>
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>