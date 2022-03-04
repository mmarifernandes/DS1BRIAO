<?php
$conexao = mysqli_connect("localhost","root","","my_table") or print (mysqli_error());

$query = "SELECT codigo,nome,quantidade,preco FROM pecas ORDER BY nome";

$resultado = mysqli_query($conexao,$query);
?>
<table border="1"><tr>
	<td><b>Nome</b></td>
	<td><b>Quantidade</b></td>
    <td><b>Preço</b></td>
</tr>
<?php


while($linha = mysqli_fetch_array($resultado)){
    echo "<tr><td>".$linha['nome']."</td><td>".$linha['quantidade']."</td><td>".$linha['preco']." </td> <td> <form method='post' action=delete.php?codigo=".strval($linha['codigo'])."><button>Remover</button></td><td></form><form method='post' action=update.php?codigo=".strval($linha['codigo'])."><button>Editar</button></td></form></td> </tr><br />";
}

mysqli_close($conexao);

?>