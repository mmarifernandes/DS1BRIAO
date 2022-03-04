<?php
$conexao = mysqli_connect("localhost","root", "", "my_table") or print (mysqli_error());

$codigo = $_GET['codigo'];

// print_r($nome);

$sql = "DELETE FROM pecas WHERE codigo = $codigo";


 
	// Comando SQL executado 
$resultado = mysqli_query($conexao,$sql);

if ($resultado) echo "registro adicionado com sucesso <br />";

// Encerra conexão
mysqli_close($conexao);

?>

<button onclick="history.go(-1);">Voltar</button>