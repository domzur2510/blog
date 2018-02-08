
<div class="secmenu">
<?php
if(isset($_SESSION['newsletterAlert'])) {
	echo '<span class="newsletterAlert">'.$_SESSION['newsletterAlert'].'</span><br/>';
	unset($_SESSION['newsletterAlert']);
}
if(isset($_SESSION['newsletterInf'])) {
	echo '<span class="newsletterInf">'.$_SESSION['newsletterInf'].'</span><br/>';
	unset($_SESSION['newsletterInf']);
}
?>
Zapisz się do naszego newslettera!
Wpisz swój email poniżej a otrzymasz powiadomienie o każdym nowym poście!
<form method="POST" action="newsletter.php">
<div type="textfield>"><input name="email" type="text"></div>
<div class="button"><input type="submit" value="Zapisz się!"/></div>
</form>
</div>
<div style="clear:both"></div>