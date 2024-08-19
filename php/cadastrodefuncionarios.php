<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cadastro de Funcionários</title>
</head>
<body>
    <h1>Os dados informados são: </h1>
    <?php
    //Recebendo dados do formulário e colocando em uma variável
    $nome=$_POST["txtNome"];
    
    $endereco=$_POST["txtEndereco"];
    $cpf=$_POST["txtCpf"];
    $estado=$_POST["listaEstados"];
    $dtNasc=$_POST["txtData"];
    $sexo=$_POST["sexo"];
    $cinema=isset($_POST["checkCinema"]);
    //ISSET é um função nativa do PHP que serve para saber se uma variável está definida. Ela basicamente verifica a existência de uma variável, e assim, retorna um valor boleano (true se for verdadeiro, e false se for falso). Ou seja, caso uma variável não esteja definida, ela possui o valor nulo (null)
    $musica=isset($_POST["checkMusica"]);
    $info=isset($_POST["checkInfo"]);
    $login=$_POST["txtLogin"];
    $senha1=$_POST["txtSenha1"];
    $senha2=$_POST["txtSenha2"];
    $arquivo=$_FILES["txtFoto"];

    //Verificar campos
    $camposOK=true;//Determina se ocorreu erro
    if($nome==""){
        echo "Informe o NOME.<br>";
        $camposOK=false;
    }
   

    if($endereco==""){
        echo "Informe o ENDEREÇO.<br>";
        $camposOK=false;
    }

    //verificar se as SENHAS conferem
    if($senha1 != $senha2){
        echo "As senhas não conferem!.<br>";
        $camposOK=false;
    }
   

    // Extrai somente os números
    $cpf = preg_replace( '/[^0-9]/is', '', $cpf );
     
    // Verifica se foi informado todos os digitos corretamente
    if (strlen($cpf) != 11) {
        echo "CPF Inválido.<br>";
        $camposOK=False;
    }

    // Verifica se foi informada uma sequência de digitos repetidos. Ex: 111.111.111-11
    if (preg_match('/(\d)\1{10}/', $cpf)) {
      echo "CPF Inválido.<br>";
      $camposOK=False;
    }

    $nascimento = new DateTime($dtNasc);
    $hoje = new DateTime();
    $idade = $hoje->diff($nascimento)->y;
    if ($idade < 18) {
        echo "Você precisa ter pelo menos 18 anos para se cadastrar. <br/>";
        $camposOK = false;
    };
   

    // Faz o calculo para validar o CPF
    for ($t = 9; $t < 11; $t++) {
        for ($d = 0, $c = 0; $c < $t; $c++) {
            $d += $cpf[$c] * (($t + 1) - $c);
        }
        $d = ((10 * $d) % 11) % 10;
        if ($cpf[$c] != $d) {
            echo "CPF Inválido.<br>";
            $camposOK=False;
        }
    }

    //verificar erro de up
    if($arquivo['error']!=0){
        echo "Erro no UPLOAD do arquivo. <br>";
        $camposOK=false;
    }

    //verifica o tamanho
    if($arquivo['size']==0){
        echo "Erro no tamanho do arquivo. <br>";
        $camposOK=false;
    }

    //Verificao maior tamanho permitido 5MB

    if($arquivo['size']>5242880){
        echo "Erro no tamanho do arquivo. <br>";
        $camposOK=false;
    }

    //verificando o tipo do arquivo
    if(($arquivo['type']!="image/gif") && ($arquivo['type']!="image/jpeg") && ($arquivo['type']!="image/pjpeg") && ($arquivo['type']!="image/x-png") && ($arquivo['type']!="image/png") && ($arquivo['type']!="image/bmp") && ($arquivo['type']!="image/jpg")){
        echo "ERRO no arquivo.Tipo não permitido.<br>";
        $camposOK=false;
    }

    //movendo o arquivo para algum diretório válido
    if ($camposOK) {
        $destino = "C:/xampp/htdocs/upload/$nome" . basename($arquivo['name']);
        if (move_uploaded_file($arquivo['tmp_name'], $destino)) {
            echo "Arquivo enviado com sucesso!<br>";
            $imgV =$nome . basename($arquivo['name']);
            echo "<img src='/upload/$imgV' />";
        } else {
            echo "Erro ao copiar o arquivo para o destino.<br>";
        }
    };


    if($camposOK){
        echo "<table border='0' cellpadding='5'";
        echo "<tr><td>Nome: </td><td><b> $nome </b></td></tr> ";
        echo "<tr><td>Cpf: </td><td><b> $cpf </b></td></tr> ";
        echo "<tr><td>Endereço: </td><td><b> $endereco </b></td></tr> ";
        echo "<tr><td>Estado: </td><td><b> $estado </b></td></tr> ";
        echo "<tr><td>Data Nasc.: </td><td><b> $dtNasc </b></td></tr> ";
        echo "<tr><td>Sexo: </td><td><b> $sexo </b></td></tr> ";
        echo "<tr><td>Login: </td><td><b> $login </b></td></tr> ";
        echo "<tr><td>Senha: </td><td><b> $senha1 </b></td></tr> ";

        //campos do tipo Checkbox retornam verdadeiro se tiverem marcados
        echo "<tr><td>ÀREAS DE INTERRESSE: </td><td><b>";
        if($cinema==true){
            echo "Cinema <br>";
        }
        if($musica==true){
            echo "Música <br>";
        }
        if($info==true){
            echo "Informática <br>";
        }
        echo"</b></td></tr></table>";
    }
    ?>
</body>
</html>