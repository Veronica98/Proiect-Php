<?php

require_once("Calculator_greutate.php");
require_once("Helpers/Database.php");

?>
<!DOCTYPE html>
<html>
	
	<head>
		<title>Calculator greutate</title>
	</head>
	
	
	<body>
	
		<form>
			
			
			Gen:<select name="gen">
				<option value="1">Feminin</option>
				<option value="2">Masculin</option>
			</select>
			<br><br>
			Greutate actuala: <input type="text" name="greutateact">
			<br><br>
			Inaltime (in cm): <input type="text" name="inaltime">
			<br><br>
			Varsta: <input type="text" name="varsta">
			<br><br>
			<input type="submit" value="Calculeaza">
			<a href="/Proiect%20final%20modulul%201/">Resetare</a>
			
		</form>
	
		<hr>
		
		<div id="content">
	
			<?php
			
				echo calculeaza_greutate_ideala();
			
			?>
		
		
	</body>
	
</html>