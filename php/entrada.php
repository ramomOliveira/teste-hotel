<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Saída de dados</title>
</head>
<body>
  <h1>Dados Recebidos</h1>
  <?php
    $nome = $_POST['nome'];
    $mes = $_POST['mes'];
    echo "<p>Olá $nome</p>";
    echo "Você nasceu em $mes";
  ?>
</body>
</html>