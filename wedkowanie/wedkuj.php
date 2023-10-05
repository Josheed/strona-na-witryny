<!DOCTYPE html>
<html>
<head>
    <title>Wędkowanie</title>
    <link rel='stylesheet' type='text/css' media='screen' href='style1.css'>
    <meta charset='utf-8'>
</head>

<body>
    <div id='baner'><b> Portal dla wędkarzy</b></div>
    <div id='prawy'><img src='ryba1.jpg' alt="sum"><br><a href='kwerendy.txt' download>Pobierz kwerendy</a></div>
    <div id='lewy1'><b><br>Ryby zamieszkujące rzeki</b>
    <?php
                // Połączenie z bazą danych
                $servername = "localhost";
                $username = "root";
                $password = "";
                $dbname = "wedkarz";

                $conn = new mysqli($servername, $username, $password, $dbname);

                // Sprawdzenie połączenia
                if ($conn->connect_error) {
                    die("Błąd połączenia: " . $conn->connect_error);
                }

                // Zapytanie SQL do odczytania danych
                $sql = "SELECT Ryby.nazwa, Lowisko.akwen, Lowisko.wojewodztwo
                FROM Ryby
                JOIN Lowisko ON Ryby.id = Lowisko.id
                WHERE Lowisko.rodzaj = 3";

                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    // Wyświetlanie danych w tabelce
                    echo '<ol>';
                    while ($row = $result->fetch_assoc()) {
                        echo "<li>" . $row["nazwa"] . " pływa w rzece " . $row["akwen"] . ", " . $row["wojewodztwo"] . "</li>";
                    }
                    echo '</ol>';
                } else {
                    echo "Brak danych";
                }
                '<br>';
                ?>
    </div>
    <div id='lewy2'>
        <h3>Ryby drapieżne naszych wód</h3>

        <?php
        $conn = new mysqli('localhost', 'root', '', 'wedkarz');

        if ($conn->connect_error) {
            die("Błąd połączenia z bazą danych: " . $conn->connect_error);
        }

        $sql = "SELECT nazwa, wystepowanie FROM ryby WHERE styl_zycia = 1";
        $result = $conn->query($sql);

        if ($result->num_rows > 0) {
            echo "<table border='1'>";
            echo "<tr><th>L.p</th><th>Gatunek</th><th>Wystepowanie</th></tr>";
            $lp = 1; // Zmienna do numeracji wierszy
            while ($row = $result->fetch_assoc()) {
                $nazwa = $row['nazwa'];
                $wystepowanie = $row['wystepowanie'];
                echo "<tr><td>$lp</td><td>$nazwa</td><td>$wystepowanie</td></tr>";
                $lp++; // Inkrementacja numeru wiersza
            }
            echo "</table>";
        } else {
            echo "Brak wyników.";
        }

        $conn->close();
        ?>

    </div>

    <div id='stopka'>Strone wykonał: Dominik Kowalski</div>
</body>
</html>