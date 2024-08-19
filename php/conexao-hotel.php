<?php
  $servername = "localhost";
  $username = "ramom";
  $password = "BfOsince1810BBP";
  $dbname = "hotel";

  //Criando a conexão
  $conn = new mysqli($servername, $username, $password, $dbname);

  //Verificando a conexão
  if ($conn -> connect_errno) {
    die("Falha na conexão:" . $conn -> connect_errno);
  };

  error_log("Conexão com sucesso");

?>