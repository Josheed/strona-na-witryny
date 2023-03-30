<!DOCTYPE html>
<html>

<head>
	<title>Logowanie</title>
</head>

<body>
	

	<?php
	// Dane do logowania do bazy danych
	$servername = "localhost";
	$username_db = "root";
	$password_db = "";
	$dbname = "sklep";

	// Sprawdzenie, czy formularz został wysłany
	if (!isset($_POST['password'])) {
		// Show the password form
		echo "<p>Podaj hasło:</p>";
		echo "<form method='post'>";
		echo "<input type='password' name='password' placeholder='Hasło'>";
		echo "<input type='submit' value='Zaloguj'>";
		echo "</form>";
		return;
	}
	$password = $_POST['password'];
	if ($password != 'kowalski') {
		echo "<p>Niepoprawne hasło</p>";
		echo "<form method='post'>";
		echo "<input type='password' name='password' placeholder='Hasło'>";
		echo "<input type='submit' value='Zaloguj'>";
		echo "</form>";
		return;
	}

	echo "crongster";
	?>
</body>

</html>