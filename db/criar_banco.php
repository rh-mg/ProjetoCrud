
<?php
require_once "conexao.php";

$conexao = novaConexao(null);
// DDL - Data Definition Lang.
$sql = 'CREATE DATABASE IF NOT EXISTS projeto_crud';

$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso :)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();