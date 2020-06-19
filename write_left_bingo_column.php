<?php
	/*This code is used to write the left-side column on the Bingo.php page.
	It does the following:
		1)  Writes the heading, which right now is just "Bingo Card Generator".
		2)  Writes the "configuration table," which is the two-column, four-line table with the text boxes.
		3)  Writes the "buttons table, which is the two-row, two-column table with the buttons and the checkbox.
		4)  If there is an error message (i.e., it got bounced back from resolve.php) it displays that at the bottom.
	*/
	
	//This is the main function that gets called from outside.
	function write_left_bingo_column() {
		$configs = include('config.php');
		echo("<div class=\"left_column\">");
		write_header1();
		write_configuration_table($configs);
		write_buttons_table();
		write_error_message();
		echo("</div>");
	}
	
	//This function creates the standard header for every page in the bingo game application.
	//It creates a <header> element with just one thing:  The SILC logo image.
	//It finds the SILC logo at the URL specified in config.php.
	function write_header1() {
		$configs = include('config.php');
		$silc_logo_url = $configs['silc_logo_url'];
		//echo("<header>");
		echo("<a href='index.html'><img src='$silc_logo_url' style='float:left' width='116' height='58'> </a> <h3>  Bingo Generator </h3> ");
		//echo("</header>");
	}

	//This function creates the "configuration table."
	function write_configuration_table($configs) {
		echo("<table class=\"configuration_table\">");
		//First, the row with "Title" and the accompanying text box.
		echo(write_configuration_table_row("Title", title_content()));
		//Next, the row with "Number of Boards" and the accompanying text box.
		echo(write_configuration_table_row("Number of Boards", textbox_content('number_of_boards', $configs['default_number_of_boards'], $configs['min_number_of_boards'], $configs['max_number_of_boards'])));
		//Next, the row with "Height of the board" and the accompanying text box.
		echo(write_configuration_table_row("Height of the board", textbox_content('rows', $configs['default_height_of_board'], $configs['min_height_of_board'], $configs['max_height_of_board'])));
		//Finally, the row with "Width of the board" and the accompanying text box.
		echo(write_configuration_table_row("Width of the board", textbox_content('columns', $configs['default_width_of_board'], $configs['min_width_of_board'], $configs['max_width_of_board'])));
		echo("</table>");
	}
	
	//This function is used to actually write the "configuration table" rows.
	//It simply takes the two variables (one for the left, one for the right) and plugs them into the cells.
	function write_configuration_table_row($left_cell_contents, $right_cell_contents) {
		echo("<tr>");
		echo("<td class=\"configuration_cell_left\">$left_cell_contents</td>");
		echo("<td class=\"configuration_cell_right\">$right_cell_contents</td>");
		echo("</tr>");
	}
	
	//This function writes the whole of the "buttons table."
	function write_buttons_table() {
		echo("<table class=\"buttons_table\">");
		echo("<tr><td class=\"buttons_cell\"><input type=\"submit\" class=\"my_button\" value=\"Generate Bingo Cards\" name=\"generate_bingo_cards\"/></td class=\"buttons_cell\"><td><input type=\"submit\" value=\"Generate Bingo Word List\" class=\"my_button\" name=\"generate_bingo_word_list\"/></td></tr>");
		echo("<tr><td></td><td><input type=\"checkbox\" name=\"randomize\"/>Randomize Word List</td></tr>");
		echo("</table>");
	}
	
	//This function creates the text in the "Title" textbox.  
	//If the $_SESSION array already has a title stored in it, it populates with that.
	//Otherwise, it displays the default text "SILC Bingo Game" as a placeholder.
	function title_content() {
		if(array_key_exists('title', $_SESSION)) {
			if($_SESSION['title'] != null) {
				return "<input type=\"text\" name=\"title\" value=\"".htmlentities($_SESSION['title'])."\"/>";
			}
		}
		return "<input type=\"text\" name=\"title\" placeholder=\"Bingo Fun!\" />";
	}
	
	//This function creates the text in the "Number of Boards," "Height of the board," and "Width of the board" textboxes.
	//If the $_SESSION array already has something by that name, it populates the textbox with that value.
	//Otherwise, it displays the appropriate default text showing default values, max, and min.
	function textbox_content($name, $default, $min, $max) {
		if(array_key_exists($name, $_SESSION)) {
			if($_SESSION[$name] != null) {
				return "<input type=\"text\" name=\"$name\" value=\"".htmlentities($_SESSION[$name])."\"/>";
			}
		}
		return "<input type=\"text\" name=\"$name\" placeholder=\"$default ($min to $max permitted; $default default)\" />";
	}
	
	//This function writes an error message at the bottom of the left column, below the checkbox.
	//If the $_SESSION array has an error message, that is displayed.
	//Otherwise, it writes nothing (no error).
	function write_error_message() {
		if(array_key_exists('error_message', $_SESSION)) {
			if($_SESSION['error_message'] != null) {
				$error_message = $_SESSION['error_message'];
				echo("<label class=\"error_message\">$error_message</label>");
			}
		}
	}
?>