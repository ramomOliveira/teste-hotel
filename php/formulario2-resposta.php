<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Comentário</title>
</head>
<body>
  <?php
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $website = $_POST['website'];
    $comentario = $_POST['comentario'];

    echo "<p>Seu nome é $nome</p>";
    echo "<p>Seu e-mail é $email</p>";
    echo "<p>Seu Website é $website</p>";
    echo "<p>Seu comentário é $comentario</p>";

  ?>
  
</body>
</html>