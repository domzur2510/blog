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
			To jest panel administracyjny. Możesz tutaj zarządzać dodanymi postami, dodawać nowe artykuły, usuwać komentarze czy edytować swoje dane.
			<br/>
			</div>
			</div>
			<?php
		}
	}
	require_once('footer.php');
?>