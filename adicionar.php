<?php
//conexão com banco de dados

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "crud_php_mysql";

$conn = mysqli_connect($servername, $username,$password,$dbname);

// verifica a Conexão
if(!$conn){
    die("Falha na conexão com o banco de dados: " . mysqli_connect_error());
}

if($_SERVER["REQUEST_METHOD"] == "POST"){
    $nome = $_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];


// Insere os dados na tabela "pessoas"
$sql = "INSERT INTO pessoas (nome, idade, email) VALUES ('$nome', $idade, '$email')";
if (mysqli_query($conn, $sql)) {
    header("location: index.php");
    exit();
} else {
    echo "Erro ao adicionar pessoa: " . mysqli_error($conn);
}
}
?>

<!DOCTYPE html>
<html>
<head>
	<title>Adicionar Pessoa</title>
</head>
<body>
	<h1>Adicionar Pessoa</h1>
	<form method="POST">
		<label>Nome:</label><br>
		<input type="text" name="nome"><br>
		<label>Idade:</label><br>
		<input type="number" name="idade"><br>
		<label>Email:</label><br>
		<input type="email" name="email"><br>
		<input type="submit" value="Adicionar">
	</form>
	<a href="index.php">Cancelar</a>
</body>
</html>
<?php
// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>