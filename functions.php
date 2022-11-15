<?php
	function PRINTR($array) {
		echo('<pre>');
		print_r($array);
		echo('</pre>');
	}
	function ALERT($message) {
		echo '<script type="text/JavaScript">alert(\''.$message.'\')</script>';
	}
?>