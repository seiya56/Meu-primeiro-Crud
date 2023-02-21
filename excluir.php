<?php
// Conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_php_mysql";
$conn = mysqli_connect($servername, $username, $password, $dbname);

// Verifica a conexão
if (!$conn) {
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

// Verifica se o id do registro a ser excluído foi fornecido
if (!isset($_GET["id"])) {
    header("location: index.php");
    exit();
}

// Exclui o registro da tabela "pessoas" com base no id fornecido
$id = $_GET["id"];
$sql = "DELETE FROM pessoas WHERE id = $id";
if (mysqli_query($conn, $sql)) {
    header("location: index.php");
    exit();
} else {
    echo "Erro ao excluir pessoa: " . mysqli_error($conn);
}

// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>