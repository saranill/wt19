<!DOCTYPE html>
<html lang="de">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title>Uebung 9</title>
    <?php 
        require_once "./player.php";
    ?>

    <style>
        
        h1, footer { 
            background-color: grey;
            color: white;
            text-align: center;
            padding: 10px;
        }
        a, a:hover, a:visited, a:active { color: white; }
        @media screen and (max-width: 786px)
        {
            #mitte { display: none;}
        }
    
     </style>
</head>

<body>
<div class="container-fluid">
    <h1>Ein Spiel</h1>

    <div class="main" class="row">
        <section id="links" class="col-sm-12 col-md-3">
            <h2>Auswahl Spielerin</h2>
        </section>
        <section id="mitte" class="col-md-2">
            <h2>oder</h2>
        </section>
        <section id="rechts" class="col-sm-12 col-md-7">
            <h2>Neue Spielerin anlegen</h2>
        <form action="index.php" method="post">
                <input type ="text" placeholder="Name" name="name" />
                <button type="submit" class="btn btn-primary">Neue Spielerin anlegen</button>
        </form>
        </section>
    </div>
   

 <footer>
    <a href="webtech.f4.htw-berlin.de/~s0562207/WebTechRepository/index.html">
        Sara Nill</a>
 </footer>
 </div>
</body>
</html>