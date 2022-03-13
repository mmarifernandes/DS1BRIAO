<?php
session_start();

$email = $_POST['email'];
$senha  = $_POST['senha'];

$query2= "SELECT senha FROM usuario WHERE email='$email'";
$conexao = mysqli_connect("localhost","root","","biblioteca") or print (mysqli_error());

if($result2=mysqli_query($conexao, $query2)){
  
  $linha2 = mysqli_fetch_array($result2);
  
  $hash = $linha2[0];
  // print_r(crypt($senha, $hash) === $linha2[0]);
  // echo '<br>';
  // print_r($linha2[0]);
  $query = "SELECT * FROM usuario WHERE email='$email' and senha= '$hash'";
  if (crypt($senha, $hash) !== $linha2[0]) {
    echo 'Senha incorreta!';
    
  }else{
    
    if ($result=mysqli_query($conexao, $query)) {

      $linha = mysqli_fetch_array($result);
      if(!empty($linha)){
        $_SESSION['nome'] = $linha['nome'];
        $_SESSION['email'] = $linha['email'];
        $_SESSION['id'] = $linha['id'];
        header("Location: home.php");
      }else{
        unset($_SESSION['nome']);
    unset($_SESSION['email']);
    unset($_SESSION['id']);
    // header("Location: login.php?msg=LOGIN_ERROR");
    echo $email;
    echo $senha;
    print_r($linha);
  }
    // header("Location: login.php?msg=OK");
} else {
    header("Location: login.php?msg=ERRO");
  }
}
};


?>
<script>
    setTimeout(function () { window.open("login.php","_self"); }, 1000);

</script>