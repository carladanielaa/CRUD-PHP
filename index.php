
<?php
include 'config.php';


$sql = "SELECT * FROM usuarios";
$res = $conn->query($sql);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Lista de Usuários</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
</head>
<body>
<div class="container mt-5">
    <h1>Lista de Usuários</h1>
    <a href="novo-usuario.php" class="btn btn-primary mb-3">Novo Usuário</a>
    <table class="table table-bordered">
        <thead>
            <tr>
                <th>ID</th>
                <th>Nome</th>
                <th>E-mail</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = $res->fetch_object()): ?>
                <tr>
                    <td><?php echo $row->id; ?></td>
                    <td><?php echo $row->nome; ?></td>
                    <td><?php echo $row->email; ?></td>
                    <td>
                        <a href="editar-usuario.php?id=<?php echo $row->id; ?>" class="btn btn-warning btn-sm">Editar</a>
                        <a href="salvar-usuario.php?acao=deletar&id=<?php echo $row->id; ?>" class="btn btn-danger btn-sm" onclick="return confirm('Tem certeza que deseja excluir?');">Excluir</a>
                    </td>
                </tr>
            <?php endwhile; ?>
        </tbody>
    </table>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
