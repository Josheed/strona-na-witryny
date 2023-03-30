<?php

$produkty = $_POST;


$produkty = array_filter($produkty);

if (empty($produkty)) {
    header("Location: /");
    return;
}

// Connect to the database
$servername = "localhost";
$username = "root";
$password = "";
$conn = new mysqli($servername, $username, $password);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

// Select the database
$conn->select_db("sklep");

$allPrice = 0;

echo "<h1>Dziekujemy za zakup</h1>";
echo "<h3>Twoje zamówienie:</h3>";
// Select data, looping through the array of IDs
foreach ($produkty as $produkt => $cena) {
    // Get the item data from the database
    $result = $conn->query("SELECT * FROM dane WHERE id = $produkt");
    $row = $result->fetch_assoc();

    // Update the "bought" column in the database with the new amount
    $newAmount = $row['kupione'] + $cena;
    $conn->query("UPDATE dane SET kupione = $newAmount WHERE id = $produkt");

    // Calculate the item's total price based on the quantity purchased
    $totalPrice = $row['cena'] * $cena;

    // Add the item's total price to the order subtotal
    $allPrice += $totalPrice;

    // Display the item data and total price
    echo "<hr>";
    echo "<p><b>" . $row['name'] . " - " . $row['cena'] . " zł x " . $cena . "</b></p>";
    echo "<p>Netto: " . round($totalPrice / 1.23, 2) . " zł</p>";
    echo "<p>VAT: " . round($totalPrice / 1.23 * 0.23, 2) . " zł</p>";
}
echo "<hr>";

// Display the order subtotal and total tax
echo "<p><b>Suma: " . $allPrice . " zł</b></p>";
echo "<p>Netto: " . round($allPrice / 1.23, 2) . " zł</p>";
echo "<p>VAT: " . round($allPrice / 1.23 * 0.23, 2) . " zł</p>";
echo "<br>";
echo "<h3>Zapraszamy ponownie!</h3>";
echo "<br>";

// Add print and homepage links
echo "<p><a href='javascript:window.print()'>Kliknij aby wydrukować</a></p>";
echo "<p><a href='/'>Powrót do strony głównej</a></p>";