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
			<form method="POST" action="EditAbout.php">
			<?php
			$query='SELECT about FROM about';
			$about=$pdo->query($query);
			$about=$about->fetchAll();
			$about=$about[0]['about'];
			?>
			
			<?php
				echo '<div><textarea name="about" class="editPost">'.$about.'</textarea></div>';
				?>
				
				
				<input type="submit" value="Zmień"/>
			</form>
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>