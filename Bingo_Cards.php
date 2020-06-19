<?php
	//Get the included files and get access to the session.
	include ('write_header.php');
	include ('write_bingo_cards.php');
	session_start();
?>
<html>
 <head>
  <title>Bingo Cards</title>
  <link rel="stylesheet" href="site.css">
 </head>
 <body>
 <?php write_header(); ?>
 <div>
	<?php 
		//Is there a BingoGame in $_SESSION?  There should be, if you got here from Bingo.php.
		//But it's possible that someone just typed "Bingo_Cards.php" into the URL bar.  So:
		if(array_key_exists('game', $_SESSION)) {
			if($_SESSION['game'] != null) {
				write_bingo_cards($_SESSION['game']);
			} else {
				echo("You must <a href=\"index.php\">create a bingo game</a> before creating bingo cards.");
			}
		} else {
			echo("You must <a href=\"index.php\">create a bingo game</a> before creating bingo cards.");
		} 
	?>
 </div>
 </body>
</html>