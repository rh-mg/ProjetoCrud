<?php

session_start();

$mysqli = new mysqli('127.0.0.1:3306', 'root', 'root', 'crud') or die(mysqli_error($mysqli));

$id = 0;
$update = false;
$nome = '';
$nascimento = '';
$email = '';
$phone = '';
$cpf = '';
$mensagem = '';


if(isset($_POST['save'])) {
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cpf = $_POST['cpf'];
    $mensagem = $_POST['mensagem'];

    $mysqli->query("INSERT INTO data (nome, nascimento, email, phone, cpf, mensagem) VALUES ('$nome', '$nascimento', '$email', '$phone', '$cpf', '$mensagem')") or
    die($mysqli->error);

    $_SESSION['message'] = "Dados foram guardados.";
    $_SESSION['msg_type'] = "success";

    header("location: ../index.php");
    

    
}

if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    $mysqli->query("DELETE FROM data WHERE id=$id") or die($mysqli->error());

    $_SESSION['message'] = "Dados foram deletados.";
    $_SESSION['msg_type'] = "danger";

    header("location: ../index.php");

}

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $update = true;
    $result = $mysqli->query("SELECT * FROM data WHERE id=$id") or die($mysqli->error());
    if (count($result)==1){
        $row = $result->fetch_array();
        $nome = $row['nome'];
        $nascimento = $row['nascimento'];
        $email = $row['email'];
        $phone = $row['phone'];
        $cpf = $row['cpf'];
        $mensagem = $row['mensagem'];
    }
}

if(isset($_POST['update'])){
    $id = $_POST['id'];
    $nome = $_POST['nome'];
    $nascimento = $_POST['nascimento'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $cpf = $_POST['cpf'];
    $mensagem = $_POST['mensagem'];

    $mysqli->query("UPDATE data SET nome='$nome', nascimento='$nascimento', email='$email', phone='$phone', cpf='$cpf', mensagem='$mensagem' WHERE id=$id") or
             die($mysqli->error);

    $_SESSION['message'] = "Os Dados foram atualizado.";
    $_SESSION['msg_type'] = "warning";
         
    header("location: ../index.php");
             
}

