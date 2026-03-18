<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smoki</title>
    <link rel="stylesheet" href="styl.css">
</head>
<body>
    <?php
        $poloczenie = mysqli_connect("localhost", "root", "", "smoki");

    ?>


    <header><h2>Poznaj smoki!</h2></header>
    <nav>
        <ul>
            <li>Baza</li>
            <li>Opisy</li>
            <li>Galeria</li>
        </ul>
    </nav>
    <main>
        <section>
            <h3>Baza Smoków</h3>
            <form method="POST">
                <select name="pochodzenie">
                    <?php 
                        $sql1 = "SELECT DISTINCT pochodzenie FROM `smok` ORDER BY pochodzenie ASC;";
                        if ($poloczenie) {
                            $wynik = mysqli_query($poloczenie,$sql1);
                            while ($row = mysqli_fetch_assoc($wynik)){
                                echo "<option>".$row['pochodzenie']."</option>";
                            }

                        }

                    ?>
                    
                </select>
                <button type="submit">Szukaj</button>
            </form>
            <table>
                <tr><th>Nazwa</th><th>Długość</th><th>Szerokość</th></tr>
                <tr><td></td><td>Skrypt2</td><td></td></tr>
            </table>
        </section>        
        <section>
            <h3>Opisy smoków</h3>
            <dl>
                <dt>Smok czerwony</dt>
                <dd>Pochodzi z Chin. Ma 1000 lat. Żywi się mniejszymi zwierzętami. Posiada łuski cenne na rynkach wschodnich do wyrabiania lekarstw. Jest dziki i groźny.</dd>
                
                <dt>Smok zielony</dt>
                <dd>Pochodzi z Bułgarii. Ma 10000 lat. Żywi się mniejszymi zwierzętami, ale tylko w kolorze zielonym. Jest kosmaty. Z sierści zgubionej przez niego, tka się najdroższe materiały.</dd>

                <dt>Smok niebieski</dt>
                <dd>Pochodzi z Francji. Ma 100 lat. Żywi się owocami morza. Jest natchnieniem dla najlepszych malarzy. Często im pozuje. Smok ten jest przyjacielem ludzi i czasami im pomaga. Jest jednak próżny i nie lubi się przepracowywać.</dd>                
            </dl>
        </section>        
        <section>
            <h3>Galeria</h3>
            <img src="smok1.JPG" alt="Smok czerwony">
            <img src="smok2.JPG" alt="Smok wielki">
            <img src="smok3.JPG" alt="Skrzydlaty łaciaty">
        </section>        
    </main>
    <footer><p>Stronę opracował: 93764912</p></footer>

    <?php
        mysqli_close($poloczenie);
    ?>
</body>
</html>