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
			$query='SELECT email FROM about';
			$email=$pdo->query($query);
			$email=$email->fetchAll();
			$email=$email[0];
			
			echo '<form method="POST" action="EditEmail.php">';
			echo '<table>';
			echo '<tr><td>Email:</td><td><input type="text" name="email" value="'.$email['email'].'"/></td></tr>';
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