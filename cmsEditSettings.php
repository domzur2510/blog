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
			<a class="link" href="cmsEditNames.php"><div class="cmsmenuOption">Zmień imię i nazwisko</div></a>
			<a class="link" href="cmsEditEmail.php"><div class="cmsmenuOption">Zmień email</div></a>
			<a class="link" href="cmsEditPassword.php"><div class="cmsmenuOption">Zmień hasło</div></a>
			<a class="link" href="cmsEditAbout.php"><div class="cmsmenuOption">Zmień opis bloga</div></a>
			<a class="link" href="cmsEditNewsletter.php"><div class="cmsmenuOption">Zmień treść newslettera</div></a>
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>