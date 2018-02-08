<?php
session_start();
?>
<!doctype html>
<html>
	<head>
	<meta charset="UTF-8"/>
	<link rel="Stylesheet" type="text/css" href=".\style.css"/>
	<title>Blog hobbystyczny</title>
	</head>
	<body>
	<div id="minemenu">
		<a class="link" href="index.php"><div id="logo">Blog hobbystyczny</div></a>
		<?php
			if(isset($_SESSION['userID'])){
				if($_SESSION['userID']==1){
					echo '<a class="link" href="logout.php"><div class="mainmenuposition">Wyloguj</div></a>';
					echo '<a class="link" href="cms.php"><div class="mainmenuposition">Panel administracyjny</div></a>';
				}
			}
			else{
				echo '<a class="link" href="login.php"><div class="mainmenuposition">Zaloguj</div></a>';
			}
		?>
		
		<a class="link" href="about.php"><div class="mainmenuposition">O mnie</div></a>
		<a class="link" href="index.php?category=movies"><div class="mainmenuposition">Filmy</div></a>
		<a class="link" href="index.php?category=games"><div class="mainmenuposition">Gry</div></a>
		<a class="link" href="index.php?category=books"><div class="mainmenuposition">Książki</div></a>
		<a class="link" href="index.php?category=music"><div class="mainmenuposition">Muzyka</div></a>
		<a class="link" href="index.php"><div class="mainmenuposition">Strona główna</div></a>
		<div style="clear:both"></div>
	</div>
	<div class="container">
<?php
try{
		$pdo=new PDO('mysql:host=localhost;dbname=s32', 'root', '');
		$pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	}
	catch(PDOException $e){
		echo $e->getMessage();
	}
?>