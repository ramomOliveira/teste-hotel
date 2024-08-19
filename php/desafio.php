<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Document</title>
</head>
<body>
  <?php
   setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'portuguese');
    function saudacao() {
      date_default_timezone_set('America/Sao_Paulo'); 
      
      $hora = date('H');
      $saudacao = "";
      
      if ($hora >= 5 && $hora < 12) {
          $saudacao = "<p style='color: red'>Bom dia!</p>";
      } elseif ($hora >= 12 && $hora < 18) {
          $saudacao = "<p style='color: green'>Boa tarde!</p>";
      } else {
          $saudacao = "<p style='color: blue'>Boa noite!</p>";
      }
      
      // Adicionar a data completa
      // $data_completa = date('l, d M Y H:i:s O');
      $data_completa = date('F jS, Y');
      $saudacao .= "<p>Agora são: $data_completa</p>";
      
      return $saudacao;
    }
    echo saudacao();
  ?>
</body>
</html>