<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
    function troca (&$n1, &$n2) {
      $aux = $n1;
      $n1 = $n2;
      $n2 = $aux;
    }
    $x = 4;
    $y = 5;
    echo "Antes. x = $x é y = $y <br />";
    troca($x, $y);
    echo "Depois. x = $x é y = $y <br />"
  ?>
  
</body>
</html>