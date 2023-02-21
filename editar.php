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

// Verifica se o id do registro a ser editado foi fornecido
if (!isset($_GET["id"])) {
    header("location: index.php");
    exit();
}

// Seleciona o registro da tabela "pessoas" com base no id fornecido
$id = $_GET["id"];
$sql = "SELECT * FROM pessoas WHERE id = $id";
$result = mysqli_query($conn, $sql);

// Verifica se o registro existe
if (mysqli_num_rows($result) != 1) {
    header("location: index.php");
    exit();
}

// Coleta os dados do registro
$row = mysqli_fetch_assoc($result);
$nome = $row["nome"];
$idade = $row["idade"];
$email = $row["email"];

// Verifica se o formulário foi enviado
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Coleta os dados do formulário
    $nome =$_POST["nome"];
    $idade = $_POST["idade"];
    $email = $_POST["email"];
    // Atualiza os dados na tabela "pessoas"
    $sql = "UPDATE pessoas SET nome = '$nome', idade = $idade, email = '$email' WHERE id = $id";
    if (mysqli_query($conn, $sql)) {
            header("location: index.php");
            exit();
    } else {
            echo "Erro ao atualizar pessoa: " . mysqli_error($conn);
    }
}
?>
<!DOCTYPE html>
<html>
<head>
	<title>Editar Pessoa</title>
</head>
<body>
	<h1>Editar Pessoa</h1>
	<form method="POST">
		<label>Nome:</label><br>
		<input type="text" name="nome" value="<?php echo $nome; ?>"><br>
		<label>Idade:</label><br>
		<input type="number" name="idade" value="<?php echo $idade; ?>"><br>
		<label>Email:</label><br>
		<input type="email" name="email" value="<?php echo $email; ?>"><br>
		<input type="submit" value="Atualizar">
	</form>
	<a href="index.php">Cancelar</a>
</body>
</html>
<?php
// Fecha a conexão com o banco de dados
mysqli_close($conn);
?>