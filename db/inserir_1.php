<?php 

require_once "conexao.php";

$sql = "INSERT INTO cadastro
(nome, nascimento, email, telefone, cpf, mensagem)
VALUES (
     'joana',
     '2000-10-29',
     'maria@gmail.com',
     '21987654321',
     '12345s78909',
     'adasda uma mensagem aqui'
    )";

    $conexao = novaConexao();
    $resultado = $conexao->query($sql);

    if($resultado) {
        echo "Sucesso :)";
    } else {
        echo "Erro: " . $conexao->error;
    }
    
    $conexao->close();