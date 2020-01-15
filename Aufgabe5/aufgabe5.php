<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>
    <link rel="stylesheet"
        href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css"/>
    
    <style> 
       table {
            color: black;
            background-color: cornflowerblue;
        }
        thead{
            background-color: grey;
        }
    </style>
   
    <?php 
    function zufzahl ($max, $anzahl, $stellen)
    {
        echo "<table class=table >";
        echo "<thead > <tr> <th>Zufallszahl</th>";
        
        for($j=1; $j<=$stellen; $j++)
        {
           
            echo "<th> gerundet $j </th>";
           
        }

        echo "</tr></thead><tbody>";
        for($i=0; $i<=$anzahl; $i++)
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