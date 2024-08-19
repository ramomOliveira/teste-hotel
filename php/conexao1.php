<?php
  $servername = "localhost";
  $username = "ramom";
  $password = "BfOsince1810BBP";
  $dbname = "seu_banco_de_dados";

  //Criando a conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Verificando a conexão
  if ($conn -> connect_errno) {
    die("Falha na conexão:" . $conn -> connect_errno);
  };

  echo "Conexão com sucesso"
  // $uuid = com_create_guid(); // ou use uma biblioteca para gerar UUID
  // $nome = 'João Silva';
  // $email = 'joao.silva@example.com';
  // $senha = 'senha123';
?>
