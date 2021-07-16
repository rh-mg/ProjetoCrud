<?php 

require_once "conexao.php";
// DDL - Data Definition Lang.
$sql = "CREATE TABLE IF NOT EXISTS cadastro (
    id INT(6) UNSIGNED AUTO_INCREMENT PRIMARY KEY,
    nome VARCHAR(100) NOT NULL,
    nascimento DATE,
    email VARCHAR(100) NOT NULL,
    telefone VARCHAR(20) NOT NULL,
    cpf VARCHAR(20) NOT NULL,
    mensagem CHAR(180) NOT NULL,

)";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();