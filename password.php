<!doctype html>
<html>
  <head>
		<title>Password Generator</title>
	</head>
	<body>
		<?php
		/*
		 * Define two constants, MIN_LENGTH and MAX_LENGTH, which specify the minimum and
		 * maximum number of printable ascii characters in a generated password.
		 */
			define('MIN_LENGTH', 1);
			define('MAX_LENGTH', 15);

			function generate_password($nchars) {

		/*
		 * Use the rand() function to generate "nchars" (function argument) printable ascii
		 * characters.
		 *
		 * Printable ascii characters are all characters between '!' and '~', inclusive
		 *
		 * Append each character to the "password" local variable until a printable password
		 * string of 'nchars' characters has been generated.
		 */
				$min_rand=ord('!');
				$max_rand=ord('~');
				$password="";

				for ($i = 1; $i <= $nchars; $i++) {
					$random_val=rand($min_rand, $max_rand);
					$password .= chr($random_val);
				}

			/*
			 * Return the generated password string to the function caller
			 */
				return $password;
			}

			/* If the user has clicked on the "Generate Password" button after specifying how
			 * many characters should be in the password, call the "generate_password" function
			 * to generate a password.
			 *
			 * If the function returns a password string whose length matches the number of
			 * characters specified by the user to appear in the password, print the password
			 * to the screen in a large font
			 */

			if (isset($_POST['submit']) AND is_numeric($_POST['nchars'])) {
		     	$password = generate_password($_POST['nchars']);
		     	if (strlen($password) == $_POST['nchars']) {
		     		print '<p>The password is <span style="font-size: x-large">' . $password . '</span></p>';
		     	} else {
		     		print '<p>Error generating the password. Please try again.</p>';
		     	}
		     }
		?>

			<!--
			 * Generate an html form with descriptive text and a pull-down numeric menu that allows the user to
			 * specify the number of characters in the generated password.
			 *
			 * Make the form "sticky" if the user has previously specified the number of characters to appear
			 * in the password.
			 -->
		<form action="" method="post">
			<p>This utility generates a password using printable ascii characters.</p>
			<p>How many characters in the password?&nbsp;</p>
			<select name="nchars">
				<?php
				    for ($s = MIN_LENGTH; $s <= MAX_LENGTH; $s++) {
				    	if (isset($_POST['nchars']) AND ($_POST['nchars'] == $s)) {
				    		print "<option value=$s selected>$s</option>";
				    	} else {
				    		print "<option value=$s>$s</option>";
				    	}
				    }
				?>
			</select>
			<br>
			<br>
			<input type="submit" name="submit" value="Generate Password" />
		</form>
		
	</body>
</html>
