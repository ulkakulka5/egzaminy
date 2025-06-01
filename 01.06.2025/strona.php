<?php
$id_polaczenia=mysqli_connect('localhost', 'root', '', 'terminarz');

if(!$id_polaczenia)
{
    echo "polaczenie nie udane.";
    mysqli_close($id_polaczenia);
}
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>Zadania na lipiec</title>
    <link rel="stylesheet" href="styl6.css">
</head>
<body>
    <header>
    <div id="pierwszy">
 <img src="logo1.png" alt="lipiec" style="height: 140px;">
 
    </div>

    <div id="drugi">
<h1>TERMINARZ</h1>
<p>najbliższe zadania:
<?php
$wynik1=mysqli_query($id_polaczenia,"SELECT DISTINCT wpis FROM zadania WHERE dataZadania BETWEEN '2020-07-01' AND '2020-07-07' AND wpis != '';");

while($wiersz=mysqli_fetch_array($wynik1))
{
    echo $wiersz['wpis']."; ";
}
?>
</p>
    </div>
    </header>

    <main>
<?php
$wynik2=mysqli_query($id_polaczenia, "SELECT dataZadania, wpis FROM zadania where miesiac='lipiec';");
$ilosc=mysqli_num_rows($wynik2);
for($i=0; $i<$ilosc; $i++)
{
    $wiersz2=mysqli_fetch_array($wynik2);
    echo '<section class= "kalendarz">  <h6>'.$wiersz2["dataZadania"].'</h6> <p >'.$wiersz2["wpis"].'</p></section>';
    
}
mysqli_close($id_polaczenia);
?>


    </main>

    <footer>
<a href="sierpien.html" >Terminarz na sierpień</a>
<p>Stronę wykonał: 07263001146</p>
    </footer>
</body>
</html>
