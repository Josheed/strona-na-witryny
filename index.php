<!DOCTYPE html>
<?php
$servername = "localhost";
$username = "root";
$password = "";
$database = "Sklep";

// Create connection
$conn = new mysqli($servername, $username, $password, $database);

// Check connection
if ($conn->connect_error) {
  die("Connection failed: " . $conn->connect_error);
}
echo "Connected successfully";
?>
<html>

<head>
  <link rel="stylesheet" href="main.css">
</head>

<body>

  <div class="topnav">
    <a class="active" href="#home">Home</a>
    <a href="#news">News</a>
    <a href="#contact">Contact</a>
    <a href="admin.php">Admin</a>
  </div>
  <div class="myDiv">
    <h2>Kowalsky Sport</h2>
    <p>Najlepszy sklep sportowy w trójmieście.</p>
  </div>
  <br>
  <form method='POST' action="rachunek.php">
    <div class="product-grid">
      <?php
      // przykładowe zapytanie SQL do pobrania produktów z bazy danych
      $sql = "SELECT * FROM dane";
      $result = mysqli_query($conn, $sql);
      while ($row = mysqli_fetch_assoc($result)) {
        ?>
        <div class="product">
          <img src="<?php echo $row['image']; ?>" alt="<?php echo $row['name']; ?>">
          <h3>
            <?php echo $row['name']; ?> -
            <?php echo $row['cena']; ?>pln
          </h3>
          <p>
            <?php echo $row['description']; ?>
          </p>
          <input type='number' value='0' type='number' name='<?php echo $row['id'] ?>' id='<?php echo $row['id'] ?>'
            min='0' placeholder='Ilość'>
          <label>Dodaj do koszyka</label>
        </div>

      <?php } ?>
    </div>
    <div class="center">
      <button type='submit'>Kup</button>
  </form>

</body>