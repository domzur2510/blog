<?php
	require_once('header.php');
	if(isset($_SESSION['userID'])) header('location:index.php');
	else{
	?>
		<div class="maincontent">
		<div class="loginPage">
		<?php
			if(isset($_SESSION['loginError'])) {
				echo '<div>'.$_SESSION['loginError'].'</div>';
				unset($_SESSION['loginError']);
			}
			if(isset($_SESSION['loginError'])) echo '<div>'.$_SESSION['userID'].'</div>';
		?>
		<form method="POST" action="log.php">
			<div class="loginLabel">Login:</div>
			<div class="loginField"><input type="text" name="login" class="loginInput"/></div>
			<div style="clear:both;"></div>
			<div class="loginLabel">Hasło:</div>
			<div class="loginField"><input type="password" name="password" class="loginInput"/></div>
			<div style="clear:both;"></div>
			<div class="loginButton"><input type="submit" value="Zaloguj"/></div>
		</form>
		</div>
		</div>
	<?php
	}
	require_once('secmenu.php');
	require_once('footer.php');
?>