
<?php
include 'config.php';


if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $acao = $_POST['acao'];

    if ($acao === 'cadastrar') {
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);
        $data_nasc = $_POST['data_nasc'];

        $sql = "INSERT INTO usuarios (nome, email, senha, data_nasc) VALUES ('$nome', '$email', '$senha', '$data_nasc')";

        if ($conn->query($sql)) {
            header('Location: index.php');
        } else {
            echo 'Erro: ' . $conn->error;
        }
    }

    if ($acao === 'editar') {
        $id = $_POST['id'];
        $nome = $_POST['nome'];
        $email = $_POST['email'];
        $data_nasc = $_POST['data_nasc'];

        $sql = "UPDATE usuarios SET nome='$nome', email='$email', data_nasc='$data_nasc' WHERE id=$id";

        if ($conn->query($sql)) {
            header('Location: index.php');
        } else {
            echo 'Erro: ' . $conn->error;
        }
    }
} elseif ($_GET['acao'] === 'deletar') {
    $id = $_GET['id'];

    $sql = "DELETE FROM usuarios WHERE id=$id";

    if ($conn->query($sql)) {
        header('Location: index.php');
    } else {
        echo 'Erro: ' . $conn->error;
    }
}
?>