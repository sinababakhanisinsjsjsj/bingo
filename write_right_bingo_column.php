<?php
/*This code is used to write the right-side column on the Bingo.php page.
	It does the following:
		1)  Writes the "about" link, which goes to the About.php page.
		2)  Writes the "word list explanation," which for now is "Word List (one word per line)"
		3)  Writes the text area where all the words will be displayed.
	*/
	
	//This is the main function that gets called from outside.
	function write_right_bingo_column() {
		echo("<div class=\"right_column\">");
		//write_about_link();
		write_word_list_explanation();
		write_text_area();
		echo("</div>");
	}
	
	//This function writes the "about" link.
	function write_about_link() {
		echo("<p><a class=\"about_link\" href=\"About.php\">About</a></p>");
	}
	
	//This function writes the "word list explanation."
	function write_word_list_explanation() {
		echo("<p>Word List (one word per line)</p>");
	}
	
	//This function writes the text area.
	//For now, I am assuming 25 rows by 30 columns.
	function write_text_area() {
		echo("<textarea name=\"word_list\" rows=\"25\" cols=\"30\" >".text_area_content()."</textarea>");
	}
	
	//This function fills in the content of the text area.
	//If the $_SESSION array has anything in the 'word list" index, it will populate that.
	//Otherwise, it fills in the default.
	function text_area_content() {
		if(array_key_exists('word_list', $_SESSION)) {
			if($_SESSION['word_list'] != null) {
				return htmlentities($_SESSION['word_list']);
			}
		}
		return "Enter your words here\nOne per line";
	}
?>