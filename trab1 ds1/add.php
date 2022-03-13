<?php session_start(); ?> 

<?php
$id = $_SESSION['id'];

if(isset($_POST['add'])){
$add = $_POST['add'];
}
$conexao = mysqli_connect("localhost","root","","biblioteca") or print (mysqli_error());

$query = "INSERT INTO livrousuario (id,id_livro) VALUES ('$id','$add')";
$query2 = "UPDATE livros set quantidade = quantidade-1 where id_livro = $add";
if (mysqli_query($conexao, $query)) {  
    mysqli_query($conexao, $query2);
    header("Location: home.php");
} else {
   echo 'Livro já adicionado!';
   
}

?>
<script>
    setTimeout(function () { window.open("home.php","_self"); }, 1000);

</script>