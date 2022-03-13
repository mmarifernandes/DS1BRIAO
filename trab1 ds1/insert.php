<?php
$nome = $_POST['nome'];
$email = $_POST['email'];
$senha  =$_POST['senha'];
 
// $custo = '08';
// $salt = 'Cf1f11ePArKlBJomM0F6aJ';
// $hash = crypt($senha, '$2a$' . $custo . '$' . $salt . '$');
$hash = password_hash($senha, PASSWORD_BCRYPT, ['cost' => 15]);
$conexao = mysqli_connect("localhost","root","","biblioteca") or print (mysqli_error());

$query = "INSERT INTO usuario (nome,email,senha) VALUES ('$nome','$email', '$hash')";

if (mysqli_query($conexao, $query)) {  
    header("Location: login.php?msg=OK");
} else {
    header("Location: login.php?msg=ERRO");
}

?>
