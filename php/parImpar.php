<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Par Ímpar</title>
</head>
<body>

<form method="post">
    <label for="numero">Digite o número:</label>
    <input type="text" id="numero" name="numero" placeholder="Digite o número">
    <button type="submit">Verificar</button>
  </form>

  <?php
    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        $num = $_POST["numero"];

        if (is_numeric($num)) {
            $num = intval($num);

            if ($num % 2 == 0) {
                echo "<p>O número $num é PAR.</p>";
            } else {
                echo "<p>O número $num é ÍMPAR.</p>";
            }
        } else {
            echo "<p>O valor digitado não é um número válido.</p>";
        }
    }
  ?>
  
</body>
</html>