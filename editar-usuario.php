
<?php
include 'config.php';


$id = $_GET['id'];
$sql = "SELECT * FROM usuarios WHERE id=$id";
$res = $conn->query($sql);
$row = $res->fetch_object();

if (!$row) {
    echo '<script>alert("Usuário não encontrado.");location.href="index.php";</script>';
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Editar Usuário</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Editar Usuário</h1>
    <form action="salvar-usuario.php" method="POST">
        <input type="hidden" name="acao" value="editar">
        <input type="hidden" name="id" value="<?php echo $row->id; ?>">
        <div class="mb-3">
            <label>Nome</label>
            <input type="text" name="nome" value="<?php echo $row->nome; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>E-mail</label>
            <input type="email" name="email" value="<?php echo $row->email; ?>" class="form-control" required>
        </div>
        <div class="mb-3">
            <label>Data de Nascimento</label>
            <input type="date" name="data_nasc" value="<?php echo $row->data_nasc; ?>" class="form-control" required>
        </div>
        <button type="submit" class="btn btn-success">Salvar</button>
    </form>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>