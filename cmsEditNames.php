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
			$query='SELECT firstname, lastname FROM about';
			$names=$pdo->query($query);
			$names=$names->fetchAll();
			$names=$names[0];
			
			echo '<form method="POST" action="EditNames.php">';
			echo '<table>';
			echo '<tr><td>Imie:</td><td><input type="text" name="firstname" value="'.$names['firstname'].'"/></td></tr>';
			echo '<tr><td>Nazwisko:</td><td><input type="text" name="lastname" value="'.$names['lastname'].'"/></td></tr>';
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