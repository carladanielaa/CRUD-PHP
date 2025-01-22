

<?php 

$host = 'localhost';
$user = 'root';
$password = ''; // Ajuste a senha conforme necessário
$database = 'cadastros';

// Conexão com o banco de dados
$conn = new mysqli($host, $user, $password, $database);

if ($conn->connect_error) {
    die('Erro ao conectar ao banco de dados: ' . $conn->connect_error);
}
?>
