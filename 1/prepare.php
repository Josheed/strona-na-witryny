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
// Create database
$conn->query("CREATE DATABASE Sklep");
$conn->select_db("Sklep");

// Create table
$conn->query("CREATE TABLE Dane (
    id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
    name TINYTEXT NULL,
    description TEXT NULL,
    image TEXT NULL,
    cena FLOAT NULL,
    kupione INT UNSIGNED NULL DEFAULT 0
    )");

// Sample data
$data = array(
    array("title" => "Okulary rowerowe", "description" => "Okulary rowerowe Rockrider ST100 kat. 3", "img" => "https://contents.mediadecathlon.com/p2448217/k$6a7f6840c62d4bffa8cc49e2da504561/sq/okulary-rowerowe-rockrider-st100-kat-3.jpg?format=auto&f=969x969", "price" => 299.99),
    array("title" => "Plecak turystyczny", "description" => "Plecak turystyczny Quechua Arpenaz NH100 30 litrów.", "img" => "https://contents.mediadecathlon.com/p1805377/k$afe444e3f147fb634e0a02167dc631ce/sq/plecak-turystyczny-quechua-arpenaz-nh100-30-litrow.jpg?format=auto&f=969x969", "price" => 999.99),
    array("title" => "Czapka myśiwska", "description" => "Czapka myśiwska zimowa SOLOGNAC 500 z podwijanymi nausznikami", "img" => "https://contents.mediadecathlon.com/p983089/k$4b59822ab8f502be6627a184b2e34167/sq/czapka-mysiwska-zimowa-solognac-500-z-podwijanymi-nausznikami.jpg?format=auto&f=969x969", "price" => 229.99),
    array("title" => "Czapka narciarska", "description" => "Czapka narciarska uszatka dla dorosłych Wedze Firstheat", "img" => "https://contents.mediadecathlon.com/p68162/k$12f45c9103424e5fc29042c8218c4f91/sq/czapka-narciarska-uszatka-dla-doroslych-wedze-firstheat.jpg?format=auto&f=969x969", "price" => 599.99),
    array("title" => "Koło do hulajnogi", "description" => "Koło do hulajnogi freestyle Oxelo 120 mm", "img" => "https://contents.mediadecathlon.com/p2050308/k$2d49413b88cbb9839db190ebc5674293/sq/kolo-do-hulajnogi-freestyle-oxelo-120-mm.jpg?format=auto&f=969x969", "price" => 399.99),
    array("title" => "Zestaw hantli", "description" => "Zestaw hantli kompozytowych Logo 2x15kg Gymtek ", "img" => "https://cdn.sport-shop.pl/p/v1/medium/f97acc200ad24db6603fd6fb23727a0a.jpg", "price" => 549.99),
    array("title" => "Ściskacz do rąk", "description" => "Ściskacz do rąk z regulacją siły 10-40kg Gymtek ", "img" => "https://cdn.sport-shop.pl/p/v1/medium/4d1e43a394cd3cae4758828f2527c0d0.jpg", "price" => 2599.99),
    array("title" => "Rower elektromagnetyczny", "description" => "Rower elektromagnetyczny XB2000 Gymtek ", "img" => "https://cdn.sport-shop.pl/p/v1/medium/94dd80eb7c2185980cbc477475e3d9c8.jpg", "price" => 449.99),
);

// Insert data into table
foreach ($data as $item) {
    $sql = "INSERT INTO Dane (name, description, image, cena) VALUES ('" . $item['title'] . "', '" . $item['description'] . "', '" . $item['img'] . "', " . $item['price'] . ")";
    $conn->query($sql);
}

// We are done
$conn->close();