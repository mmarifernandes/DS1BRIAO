<?php
$conexao = mysqli_connect("localhost","root", "", "my_table") or print (mysqli_error());

$codigo = $_GET['codigo'];
$codigo1 = $codigo;
// $nome = $_POST['nome'];
// $quantidade = $_POST['quantidade'];
// $preco = $_POST['preco'];

// print_r($nome);
if(isset($_POST['nome'])&& isset($_POST['quantidade'])&&isset($_POST['preco'])){
$sql = "UPDATE pecas SET nome = '".$_POST['nome']."', quantidade = ".$_POST['quantidade'].", preco = ".$_POST['preco']." WHERE codigo = $codigo";
$resultado = mysqli_query($conexao,$sql);
}
$result = "SELECT * FROM pecas WHERE codigo= $codigo";
$teste = mysqli_query($conexao,$result);
$row= mysqli_fetch_array($teste);

 
	// Comando SQL executado 
echo "Edite: <br />";
?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Document</title>
</head>
<?php
// Encerra conexão
mysqli_close($conexao);
        echo '<form id="form" action="update.php?codigo=' . $_GET['codigo'] . '" method="post">';


        if(isset($_POST['nome'])&& isset($_POST['quantidade'])&&isset($_POST['preco'])){

?>
<input type="hidden" name="nome" class="txtField" value="<?php echo $_POST['nome']; ?>">
<input type="hidden" name="quantidade" class="txtField" value="<?php echo $_POST['quantidade']; ?>">
<input type="hidden" name="preco" class="txtField" value="<?php echo $_POST['preco']; ?>">
<?php
        }
?>
<body>
<!-- <form method="post" action="update.php?email=' . $_GET['email'] . '"> -->
<label for="nome">Nome</label>
<input type="hidden" name="codigo" class="txtField" value="<?php echo $_GET['codigo']; ?>">
<input type="text" name="nome">
<label for="quantidade">Quantidade</label>
<input type="text" name="quantidade">
<label for="preco">Preço</label>
<input type="text" name="preco">
<button type="submit" value ="enviar">Enviar</button>
</form>
  <button onclick="history.go(-2);">Voltar</button>
</body>
</html>



