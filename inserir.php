<?php
$conexao = mysqli_connect("localhost","root", "", "my_table") or print (mysqli_error());

$nome = $_POST['nome'];
$quantidade = $_POST['quantidade'];
$preco = $_POST['preco'];


$sql = "INSERT INTO pecas (nome, quantidade, preco)
VALUES ('$nome', '$quantidade', '$preco')";

 
	// Comando SQL executado 
$resultado = mysqli_query($conexao,$sql);

if ($resultado) echo "registro adicionado com sucesso <br />";

// Encerra conexão
mysqli_close($conexao);

?>