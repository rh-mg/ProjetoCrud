<div class="titulo"></div>

<?php

require_once "conexao.php";

$sql = "DELETE FROM cadastro WHERE id= 2";

$conexao = novaConexao();
$resultado = $conexao->query($sql);

if($resultado) {
    echo "Sucesso:)";
} else {
    echo "Erro: " . $conexao->error;
}

$conexao->close();