<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Array</title>
</head>
<body>
  <?php
    $estado = ["ver", "ver2", "ver3", "ver4"];
    $estado[0] = "Parado";
    $estado[1] = "Executado";
    $estado[2] = "Finalizado";
    $estado["ES"] = "Espirito Santo";
    $estado["RJ"] = "Rio de Janeiro";
    echo "<pre style='color: blue'>";
    print_r($estado);
    echo "</pre>";
    echo $estado[2] . "<br />";
    echo $estado["RJ"];
    var_dump($estado);
    echo  "<pre>
      teste
            3
                
            455

                         5
    </pre>";
  ?>
  
</body>
</html>