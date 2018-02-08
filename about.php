<?php
	require_once('.\header.php');
?>
	<div class="maincontent">
		<div class="post">
			<div id="aboutTitle">
				O MNIE
			</div>
			<div id="aboutcontent">
				<?php
					$query='SELECT * FROM about';
					$about=$pdo->query($query);
					$about=$about->fetchAll();
					$about=$about[0];
					echo '<p id="aboutName">'.$about['firstname'].' '.$about['lastname'].'</p>';
					
					echo '<p id="aboutEmail">'.$about['email'].'</p>';
					echo '<p id="about">'.$about['about'].'</p>';
				?>
			</div>
		</div>
	</div>
<?php
	require_once('.\secmenu.php');
	require_once('.\footer.php');
?>