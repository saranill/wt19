<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Uebung 9</title>
    <?php 
        require_once "./player.php";

        if ($_GET['name'])
        {
        $name = $_GET['name'];
        }
        if ($_POST['name'])
        {
        $name = $_POST['name'];
        }
    ?>
    <style>
        h1 { 
            background-color: grey;
            color: white;
            text-align: center;
            padding: 5px; 
        }
        h4 {
            background-color: blue;
            color: white;
            text-align: center;
            padding: 5px;
            width: 100%;
        }
        #wuerfel {
            width: 200px;
            height: 200px;
            background-color: blue;
            
            margin-top: 20px;

        }
        footer { 
            background-color: grey;
            color: white;
            text-align: center;
            padding: 5px;
            
        }
        #footer, #footer:hover, #footer:visited, #footer:active { color: white; }
        @media screen and (max-width: 769px)
        {
            #mitte { display: none;}
        }
    
    </style>
</head>
<body>
    <div class="container-fluid">
        <?php
        if (isset($name)) {
            echo "<h1>".$name." spielt</h1>";
        } 
        else {
            echo "<h1>Ein Spiel</h1>";
        }
        ?>
        <div class="main row"> 
        
            
            <?php 
            if (isset($name))
            {   
                
                echo '<h4 id="zuege"> Anzahl Zuege: </h4>';
                echo '<div class = "spielen row">
                <div id="wuerfel" class="square col-sm-12 col-md-4" onclick="wuerfeln()"></div>
                <ol id="liste" class="col-sm-12 col-md-8"><li>Liste der Würfe</li></ol>
                </div> ';
                
            }  
            else
            { 
            echo '<div id="links" class="col-sm-12 col-md-3 list-group">';
            echo '<h3>Auswahl Spielerin</h3>';
            echo "<ul>";
            for( $i=0;  $i < count($player); $i++ )
            {
                echo '<li><a href="./indexh.php?name='.$player[$i]['name'].'"> '.$player[$i]['name'].'('.$player[$i]['moves'].')</a></li>';
            }

            echo "</ul>";
            echo '</div>';
            echo '<div id="mitte" class="col-md-2">
            <h3>oder</h3>
        </div>
        <div id="rechts" class="col-sm-12 col-md-7">
            <h3>Neue Spielerin anlegen</h3>
            <form action="indexh.php" method="post">
                <input type="text" placeholder="Name" name="name"/>
                <button type="submit" class="btn btn-primary"> Neue Spielerin anlegen </button>
            
            </form>
        </div>';
            }
            ?>
        </div>
        <script> 
            var count = 0;
            var gewonnen = false;
            function wuerfeln()
            {
                if(gewonnen)
                {
                    return false;
                }
                var number = Math.floor(Math.random()*6)+1;
                var wuerfel = document.getElementById("wuerfel");
                wuerfel.innerHTML = number;
                var liste = document.getElementById("liste");
                if (number==6)
                {
                gewonnen = true;
                liste.innerHTML += '<li> <a href= "./indexh.php"> Wurf: '+ number +' --> Ende(Startseite)</a></li>';

                }
                else
                {
                liste.innerHTML += "<li> Wurf: " + number+"</li>";
                }
                count++;
                var zuege = document.getElementById("zuege");
                zuege.innerHTML = "Anzahl Zuege: " + count;
            }

        </script>
<footer>
   <a id="footer" href="http://webtech.f4.htw-berlin.de/~s0562207/wt19">Sara Nill</a> 
</footer>
</div>
</body>
</html>