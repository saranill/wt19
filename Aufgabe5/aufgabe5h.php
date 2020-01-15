<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    <title>Übung 5</title>
    <style>
    .table { 
        background-color: cornflowerblue;
        color: white;
     }

     thead { 
         background-color: grey;
     }
    </style>

    <?php
    
    function zufzahl($max, $anzahl, $stellen)
    {
        echo "<table class=table>";
        echo "<thead> <tr> <th>Zufallszahl</th>";
        
        for($i=1; $i<=$stellen; $i++)
      {
        echo "<th>gerundet $i </th>";
        
        echo "$zzahl $gerundet2 $gerundet3 <br/>";
      }

      echo "</thead> </tr> <tbody>";

      for($j=1; $j<=$anzahl; $j++)
      {
         $zzahl = rand(1, $max);
         echo "<tr> <td> $zzahl </td>";

         for($j=1; $j<=$stellen; $j++)
         {
            echo "<td>".abschneiden($zzahl, $j);
            
         }
        
         echo "</tr>";
        
      }

        echo "</tbody> </table>";
    }


    function abschneiden($zahl, $stellen=2)
    {
        $base = pow(10,$stellen);
        return $zahl - ($zahl % $base);
    }
     
     ?>
</head>
<body>
    <h1>Zufallszahlen</h1>
    <div>
        <?php zufzahl(20000, 20, 4); ?>
    </div>
</body>
</html>