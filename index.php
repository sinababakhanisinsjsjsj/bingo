<?php
//Get the included files and get access to the session.
include('write_header.php');
include('write_left_bingo_column.php');
include('write_right_bingo_column.php');
session_start();
?>
<html>

<head>
	<title>Bingo</title>
	<link rel="stylesheet" href="site.css">
</head>

<body>
	<?php write_header(); ?>
	<form action="resolve.php" method="post">
		<?php write_left_bingo_column(); ?>
		<?php write_right_bingo_column(); ?>
	</form>
</body>

</html>