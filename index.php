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

// Selecionar todos os registos de pessoas
$sql = "SELECT * FROM pessoas";
$result = mysqli_query($conn, $sql)
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <h1>Lista de pessoas</h1>
    <table>
        <thead>
            <tr>
                <th>Id</th>
                <th>Nome</th>
                <th>Email</th>
                <th>Ações</th>
            </tr>
        </thead>
        <tbody>
            <?php while ($row = mysqli_fetch_assoc($result)){?>
                <tr>
                    <td><?php echo $row['id'];?></td>
                    <td><?php echo $row['nome'];?></td>
                    <td><?php echo $row['idade'];?></td>
                    <td><?php echo $row['email'];?></td>
                    <td>
                        <a href="editar.php?id=<?php echo $row['id'];?>">Editar</a>
                        <a href="excluir.php?id=<?php echo $row['id'];?>">Excluir</a>
                    </td>
                </tr>
                <?php }?>
        </tbody>
    </table>
    <a href="adicionar.php">Adicionar Pessoa</a>
</body>
</html>

<?php
// Fecha a conexão com o banco

mysqli_close($conn);
?>