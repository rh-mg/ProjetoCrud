<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

<div class="titulo"></div>

<?php

require_once "conexao.php";


$registros = [];
$conexao = novaConexao();

if($_GET['excluir']) {
    $ecluirSQL = "DELETE FROM cadastro WHERE id = ?";
    $stmt = $conexao->prepare($excluirSQL);
    $stmt->bind_param("i", $_GET['excluir']);
    $stmt->execute();
}

$sql = "SELECT id, nome, email, nascimento FROM cadastro";
$resultado = $conexao->query($sql);
if($resultado->num_rows > 0) {
    while($row = $resultado->fetch_assoc()) {
        $registros[] = $row;
    }
} elseif($conexao->error) {
    echo "Erro: " . $conexao->error;
}
    
$conexao->close();

?>

<table class="table table-hover table-striped">
    <thead>
        <th>Nome</th>
        <th>Nascimento</th>
        <th>E-mail</th>
        <th>Ações</th>
</thead>
<tbody>
    <?php foreach($registros as $registro) : ?>
        <tr>
        <td><?= $registro['id'] ?></td>
            <td><?= $registro['nome'] ?></td>
            <td>
                <?=
                date('d/m/Y', strtotime($registro['nascimento']))
                ?>
                
            </td>
            <td><?= $registro['email'] ?></td>
            <td><a href="C:\Users\Pc01\Desktop\ProjetoCrud\db\excluir_2.php<?=$registro['id'] ?>"
            class="btn btn-danger">Excluir</a></td>
                
            <tr>
                <?php endforeach ?>
</tbody>
    </table>

    <style>
table > * {
    font-size: 1.2rem;
}
        </style>