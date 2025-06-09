<?php
$polaczenie=mysqli_connect('localhost','root','','wolontariat');
if($polaczenie==FALSE)
?>
<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <title>WOLONTARIAT SZKOLNY</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
            <h1>KONKURS - WOLONTARIAT SZKOLNY</h1>
    </header>
    <main>
            <h3>Konkursowe nagrody</h3>
            <input type="button" onclick="location.reload()" value="Losuj nowe nagrody">
           <table>
            <thead>
                <tr>
                <th>Nr</th>
                <th>Nazwa</th>
                <th>Opis</th>
                <th>Wartość</th>
            </tr>
            </thead>
            <tbody>
                <?php
                $liczba=1;
                    $zapytanie=mysqli_query($polaczenie,'SELECT nazwa, opis, cena FROM nagrody GROUP BY RAND() LIMIT 5');
                    while($wiersz=mysqli_fetch_array($zapytanie))
                    {
                        
                        echo'<tr><td>'.$liczba.'</td><td>'.$wiersz['nazwa'].'</td><td>'.$wiersz['opis'].'</td><td>'.$wiersz['cena'].'</td></tr>';
                        $liczba++;
                    }


                ?>
            </tbody>
            
           </table>

    </main>
    <aside>
            <img src="puchar.png" alt="Puchar dla wolontariusza">
            <h4>Polecane linki</h4>
            <ul>
                <li><a href="puchar.png">Kwerenda1</a></li>
               <li><a href="puchar.png">Kwerenda2</a></li>
               <li><a href="puchar.png">Kwerenda3</a></li>
               <li><a href="puchar.png">Kwerenda4</a></li>
            </ul>
    </aside>
    <footer>
            <p>Numer zdającego: 07263001146</p>
    </footer>
</body>
</html>
