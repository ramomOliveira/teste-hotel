<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Terceiro</title>
</head>
<body>

<form method="post" style="display: flex; flex-direction: column; gap: 24px; margin: auto; max-width: 600px;">
    <label for="a">Digite o primeiro número:</label>
    <input type="text" id="a" name="a" placeholder="Digite o número">

    <label for="b">Digite o segundo número:</label>
    <input type="text" id="b" name="b" placeholder="Digite o número">

    <label for="c">Digite o terceiro número:</label>
    <input type="text" id="c" name="c" placeholder="Digite o número">

    <button type="submit">Verificar</button>

    <div>
    <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $a = $_POST["a"];
        $b = $_POST["b"];
        $c = $_POST["c"];
        

        if (is_numeric($a) && is_numeric($b) && is_numeric($c)) {
            $a = intval($a);
            $b = intval($b);
            $c = intval($c);

            $numeros = [$a, $b, $c];

            rsort($numeros);
            echo "<p>Números em ordem decrescente: " . implode(", ", $numeros) . "</p>";

            echo "<p>O A é: ($a)</p>";
            echo "<p>O B é: ($b)</p>";
            echo "<p>O C é: ($c)</p>";
            if ($a>$b) {
                echo "<p>O A é MAIOR que b</p>";
            } else if($a>$c) {
              echo "<p>O A é MAIOR que c</p>";
            } else {
              echo "<p>O A é MENOR que b e c</p>";
            }
        } else {
            echo "<p>O valor digitado não é um número válido.</p>";
        }

        
    }
  ?>
    </div>
  </form>

 
  
</body>
</html>