<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" >
    <title>Probeklausur2</title>
    <style>
        body { font-familiy: Verdana; }
        h1 { 
            text-align: center;
            background-color: lightgray;
            color: darkgrey;
            font-family: bold;
        }
        h3 {
            color: red;
            margin: 10px;
        }
        footer {
            text-align: center;
            background-color: lightgray;
            position: absolute;
            bottom: 0px;
            width: 100%;
            padding: 5px;
        }
        a, a:hover, a:visited, a:active { 
            color: black;
            text-decoration: none;
        }
        .karte{
            background-color:darkgray;
            height:20px;
            text-align:center;
            line-height:20px;
            color:green;
            margin:5px;
            box-shadow: 5px 10px #888888;
        }
    
    </style>
</head>
<body>
    <h1>Klausur 2.PZ</h1>
    <h3 class="message" id="message">Wählen Sie die Anzahl der Spalten (1-4) und die Anzahl der Bilder (4-10) aus</h3>

    <?php 
    if ($_GET && isset($_GET['anzahlSpalten']) && isset($_GET['anzahlBilder']))
    {
        $spalten = filter_var($_GET['anzahlSpalten'], FILTER_SANITIZE_NUMBER_INT);
        $zeilen = filter_var($_GET['anzahlBilder'], FILTER_SANITIZE_NUMBER_INT);
        $fehlerSpalten = false;
        $fehlerZeilen = false;
        $fehlerMessage = "";

        if($spalten <1 || $spalten >4)
        {
            $fehlerSpalten = true;
            $fehlerMessage .= "Anzahl der Spalten muss zwischen 1 und 4 (inkl.) sein!</br>";
        }
        if($zeilen <4 || $zeilen >10)
        {
            $fehlerZeilen = true;
            $fehlerMessage .= "Anzahl der Bilder muss zwischen 4 und 10 (inkl.) sein! </br>";
        }
    }
    if((isset($fehlerSpalten) && $fehlerSpalten) || (isset($fehlerZeilen) && $fehlerZeilen))
    {
        echo '
        <div class="message" style="color:red;">Korrigieren Sie Ihre Eingabe!</div>
        <div class="container">
           <form role="form" class="form-horizontal" action="index.php" method="GET">
           <div class="form-group row">
                <label class="control-label col-sm-6 col-md-4" for="zeilenInput">Anzahl Spalten (1-4):</label>
                <div class="col-sm-6 col-md-8">';
                if(isset($fehlerSpalten) && $fehlerSpalten)
                {
                    echo' <input class="form-control is-invalid" type="number" name="anzahlSpalten">
                    <div class="invalid-feedback">
                        Anzahl der Spalten muss zwischen 1 und 4 (inkl.) sein!
                    </div>';
                }
                else
                {
                    echo '<input class="form-control" type="number" name="anzahlSpalten" value="'.$spalten.'">';
                }
                echo '</div>  
                </div> 
                    
                <div class="form-group row">
                    <label class="control-label col-sm-6 col-md-4" for="anzahlBilder">Anzahl Bilder (4-10):</label>
                    <div class="col-sm-6 col-md-8">';
                    if(isset($fehlerZeilen) && $fehlerZeilen)
                    {
                        
                        echo '<input class="form-control is-invalid" type="number" name="anzahlBilder">
                                <div class="invalid-feedback">
                                    Anzahl der Bilder muss zwischen 4 und 10 (inkl.) sein!
                                </div>';
                    }
                    else
                    {
                        echo '<input class="form-control" type="number" name="anzahlBilder" value="'.$zeilen.'">';
                    }
                    echo '</div> 
                    </div> 
        
                    <div class="form-group row">
                        <div class="col-sm-offset-6 col-sm-6 col-md-offset-4 col-md-8">
                            <button type="submit" class="btn btn-primary">Weiter</button>
                        </div> 
                    </div> 
                </form>
               </div>';
    }

    else if((isset($fehlerSpalten) && !$fehlerSpalten) && (isset($fehlerZeilen) && !$fehlerZeilen))
    {
        // Eingaben korrekt --> Kacheln erzeugen
        echo '<div class="container-fluid">';
        echo '<div class="row">';
        for ($j = 0; $j < $zeilen; $j++) {
            for ($i = 0; $i < $spalten; $i++) {
                echo '<div class="karte col">' . $j . '</div>';
            }
            echo '<div class="w-100"></div>';
        }
        echo '</div>';
        echo '</div>';
    }
    else
    {
       echo' <div class="container">
    <form role="form" class="form-horizontal" action="index.php" method="get">
       <div class="form-group row">
           <label class="control-label col-sm-6 col-md-4" for="zeilenInput">Anzahl Spalten (1-4):</label>
           <div class="col-sm-6 col-md-8">
                <input class="form-control" type="number" id="anzahlSpalten" name="anzahlSpalten">
           </div>
       </div>

       <div class="form-group row">
           <label class="control-label col-sm-6 col-md-4" for="zeilenInput">Anzahl Bilder (4-10):</label>
           <div class="col-sm-6 col-md-8">
               <input class="form-control" type="number" id="anzahlBilder" name="anzahlBilder">
           </div>
       </div>
       <button type="submit" class="btn btn-primary">Weiter</button>
    </div>';
    }

    ?>
<footer><a href = "webtech.f4.htw-berlin.de/~s0562207/WebTechRepository/index.html">Sara Nill</a></footer>
<script>
    function changeColor(e)
    {  
        var karte = e.target;
        if(karte.style.backgroundColor == 'red')
        {
            karte.style.backgroundColor = 'darkgrey';
            karte.style.color = 'darkgreen';
        }
        else {
            karte.style.backgroundColor = 'red';
            karte.style.color = 'white';
        }
    }

    var karten = document.getElementsByClassName('karte');

    for (var i = 0; i < karten.length; i++) {
        var karte = karten[i];
        karte.onclick = changeColor;
        // oder: karte.addEventListener('click', changeColor);
    }
</script>
</body>
</html>