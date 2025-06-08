<?php
$id=mysqli_connect("localhost", "root",'', "biblioteka");
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Biblioteka publiczna</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <header>
        <h1>Biblioteka w Książkowicach Wielkich </h1>
    </header>
    <aside id="lewy">
        <h3>Polecamy dzieła autorów:</h3>
        <ol>
            <?php
                $zapytanie = "SELECT imie, nazwisko FROM autorzy ORDER BY nazwisko ASC;";
                $wynik=mysqli_query($id, $zapytanie);
                 while ($licznik = mysqli_fetch_array($wynik))
                    {
                         echo "<li>".$licznik['imie']." ".$licznik['nazwisko']."</li>";
                    }
            ?>
        </ol>
    </aside>
    <main>
        <h3>ul. Czytelnicza 25, Książkowice&nbsp;Wielkie</h3>
        <p><a href="mailto:sekretariat@biblioteka.pl ">Napisz do nas</a></p>
        <img src="biblioteka.png" alt="książki">
    </main>
    <aside id="prawy1">
        <h3>Dodaj czytelnika</h3>
        <form action="biblioteka.php" method="post">
            <label for="imie">imię: </label> 
            <input type="text" name="imie" id="imie"><br>
            <label for="nazwisko">nazwisko: </label>
            <input type="text" name="nazwisko" id="nazwisko"><br>
            <label for="symbol">symbol: </label>
            <input type="number" name="symbol" id="symbol"><br>
            <button type="submit" id="dodaj" name="dodaj">DODAJ</button>
        </form>
    </aside>
    <aside id="prawy2">
            <?php
               if(isset($_POST["dodaj"]) && isset($_POST["imie"]) && isset($_POST["nazwisko"])) {
                    $imie = $_POST["imie"];
                    $nazwisko = $_POST["nazwisko"];
                    $symbol = $_POST["symbol"];
                    $zapytanie2="INSERT INTO czytelnicy VALUES(NULL, '$imie', '$nazwisko' ,'$symbol');";
                    $wynik2=mysqli_query($id, $zapytanie2);
                echo "Czytelnik ".$imie." ".$nazwisko." został(a) dodany do bazy danych";
            }

             ?>
    </aside>
    <footer>
            <p>Projekt strony: 123456789</p>
    </footer>
</body>
</html>
<?php
mysqli_close($id) ;
?>
