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
			if(isset($_SESSION['passerr'])){
				echo '<div class="PassErr">'.$_SESSION['passerr'].'</div>';
				unset($_SESSION['passerr']);
			}
			
			echo '<form method="POST" action="EditPassword.php">';
			echo '<table>';
			
			echo '<tr><td>Hasło</td><td><input type="password" name="pass1"/></td></tr>';
			echo '<tr><td>Powtórz hasło:</td><td><input type="password" name="pass2"/></td></tr>';
			echo '</table>';
			echo '<input type="submit" value="Zmień"/>';
			echo '</form>';
			
			?>
			
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>