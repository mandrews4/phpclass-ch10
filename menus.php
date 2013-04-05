<!doctype html>
<html>
  <head>
	<title>Date Menus</title>
	</head>
	<body>
		<?php // Script 10.1 - menus.php
		function make_date_menus($start_year, $number_of_years=10) {
			$months = array (1 => 'January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December');
			print '<select name="month">';
			foreach ($months as $key => $value) {
				print "\n<option value=\"$key\">$value</option>";
			}
			print '</select>';

			print '<select name="day">';
			for ($day = 1; $day <= 31; $day++) {
				print "\n<option value=\"$day\">$day</option>";
			}
			print '</select>';

			print '<select name="year">';
			for ($y = $start_year; $y <= ($start_year + $number_of_years); $y++) {
				print "\n<option value=\"$y\">$y</option>";
			}
			print '</select>';
		} // End of make_date_menus() function.

		print '<form action="" method="post">';
		make_date_menus(date('Y'), 7);
		print '</form>';
	?>
	</body>
</html>
