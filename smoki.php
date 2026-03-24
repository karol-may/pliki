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
            <li data-id="baza">Baza</li>
            <li data-id="opisy">Opisy</li>
            <li data-id="galeria">Galeria</li>
        </ul>
    </nav>
    <main>
        <section id="baza">
            <?php
               $pochodzenie = $_POST['pochodzenie'] ?? false;
            ?>
            <h3>Baza Smoków</h3>
            <form method="POST">
                <select name="pochodzenie">
                    <?php 
                        $sql1 = "SELECT DISTINCT pochodzenie FROM `smok` ORDER BY pochodzenie ASC;";
                        if ($poloczenie) {
                            $wynik = mysqli_query($poloczenie,$sql1);
                            while ($row = mysqli_fetch_assoc($wynik)){
                                $isSelected = ($pochodzenie==$row['pochodzenie'])?"selected":"";
                                echo "<option ".$isSelected.">".$row['pochodzenie']."</option>";
                            }
                        }

                    ?>                    
                </select>
                <button type="submit">Szukaj</button>
            </form>

            <table>
                <tr><th>Nazwa</th><th>Długość</th><th>Szerokość</th></tr>
                <?php
                $sql2 = "SELECT nazwa, dlugosc, szerokosc FROM `smok` WHERE pochodzenie = '$pochodzenie';";

                if ($pochodzenie) {
                    $wynik = mysqli_query($poloczenie,$sql2);
                    while ($row = mysqli_fetch_assoc($wynik)){
                       echo "<tr><td>".$row['nazwa']."</td><td>".$row['dlugosc']."</td><td>".$row['szerokosc']."</td></tr>";
                    }
                    
                }

                ?>
            </table>
        </section>        
        <section id="opisy">
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
        <section id="galeria">
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

    <script>
        

        let blocks = document.getElementsByTagName("li");
        let sections = document.getElementsByTagName("section");

        for (let block of blocks){
            block.addEventListener("click", (e)=>{
                setDefaultStyles();
                e.target.style.backgroundColor = "MistyRose";   
                
                let x = document.getElementById(e.target.getAttribute("data-id"));
                x.style.display = "block";
                
            });
        }

        function setDefaultStyles(){
            for (let block of blocks){
                block.style.backgroundColor = "#FFAEA5";
            }
            for (let section of sections){
                section.style.display = "none";
            }
        }
      
    </script>
</body>
</html>