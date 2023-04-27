<!DOCTYPE html>
<html>

<head>
	<title>Logowanie</title>
</head>

<body>
	

	<?php
	// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

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

	$conn->select_db("Sklep");

	// Select data
	$result = $conn->query("SELECT * FROM Dane");

	// Show the database structure
	// The result should look like this
	// ---
	// id | int
	// title | varchar
	// description | varchar
	// img | varchar
	// price | float
	// ---


	$columns = $conn->query("SHOW COLUMNS FROM Dane");
	echo "<div class='p-8'>";
	echo "<h2 class='text-center'>Struktura</h2>";
	echo "<div class='flex justify-center'>";
	echo "<table class='table-auto'>";
	echo "<tr>";
	echo "<th class='px-4 py-2'>Nazwa</th>";
	echo "<th class='px-4 py-2'>Typ</th>";
	echo "</tr>";
	while ($row = $columns->fetch_assoc()) {
		echo "<tr>";
		echo "<td class='border px-4 py-2'>" . $row['Field'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['Type'] . "</td>";
		echo "</tr>";
	}
	echo "</table>";
	echo "</div>";
	echo "</div>";






	// Display data
	echo "<div class='p-8'>";
	echo "<h2 class='text-center'>Wszystkie rekordy</h2>";
	echo "<div class='flex justify-center'>";
	echo "<table class='table-auto'>";
	echo "<tr>";
	echo "<th class='px-4 py-2'>ID</th>";
	echo "<th class='px-4 py-2'>Nazwa</th>";
	echo "<th class='px-4 py-2'>Opis</th>";
	echo "<th class='px-4 py-2'>Obraz</th>";
	echo "<th class='px-4 py-2'>Cena</th>";
	echo "<th class='px-4 py-2'>Kupione</th>";
	echo "</tr>";
	while ($row = $result->fetch_assoc()) {
		echo "<tr>";
		echo "<td class='border px-4 py-2'>" . $row['id'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['name'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['description'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['image'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['cena'] . "</td>";
		echo "<td class='border px-4 py-2'>" . $row['kupione'] . "</td>";
		echo "</tr>";
	}
	?>
</body>

</html>