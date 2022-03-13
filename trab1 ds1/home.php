<?php session_start(); ?> 
<?php
$id = $_SESSION['id'];
if(isset($_POST['add'])){
$add = $_POST['add'];
print_r($add);
}
$conexao = mysqli_connect("localhost","root","","biblioteca") or print (mysqli_error());


$query2 = "SELECT livros.id_livro, autores, titulo, ano, editora, quantidade FROM livros JOIN livrousuario on livros.id_livro = livrousuario.id_livro WHERE livrousuario.id=$id;";


$resultado2 = mysqli_query($conexao,$query2);

?>
<head>
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
<style>
  body{
    background:  #b6d3de;
  }
    .container{
        margin-top: 100px;
        margin-left: 100px;
        margin-right: 100px;
        background: #d3e6ed;
      
      },
    nav{
        width: 100%;
        display: flex;
        position: fixed;
        background-color: #d3e6ed;
        z-index: 99;
    }
    .table{
      border-color: #000
    }
    </style>
</head>
<body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <div class="container-fluid">
        <a class="navbar-brand" href="#">Bem-vindo(a) <?php echo $_SESSION['nome'];?></a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
          <div class="navbar-nav">
            <a class="nav-link active" aria-current="page" href="logout.php">Sair</a>
          </div>
        </div>
      </div>
    </nav>
    
    
    <div class="container">
    <?php


 function url($campo, $valor, $login)
        {
            $result = array();
            if (isset($_GET["titulo"])) $result["titulo"] = "titulo=" . $_GET["titulo"];
            if (isset($_GET["ano"])) $result["ano"] = "ano=" . $_GET["ano"];
            
            $result[$campo] = $campo . "=" . $valor;
            return ("home.php?email=".strtr(implode("&", $result) , " ", "+"));
          }
          
          $value = "";
          if (isset($_GET["titulo"])) $value = $_GET["titulo"];
        if (isset($_GET["ano"])) $value = $_GET["ano"];

        echo "<input type=\"text\" size=40 style=\"margin-top:25; margin-left: 200; position: absolute\" id=\"valor1\" name=\"valor1\" value=\"" . $value . "\" size=\"70\"> \n";

        $parameters = array();
        if (isset($_GET["orderby"])) $parameters[] = "orderby=" . $_GET["orderby"];
        if (isset($_GET["offset"])) $parameters[] = "offset=" . $_GET["offset"];


        echo "<select style='position: absolute; margin-left: 540; margin-top:27;' id=\"campo\" name=\"campo\">\n";
        echo "<option value=\"titulo\"" . ((isset($_GET["titulo"])) ? " selected" : "") . ">Titulo</option>\n";
        echo "<option value=\"ano\"" . ((isset($_GET["ano"])) ? " selected" : "") . ">Ano</option>\n";
        
        echo "</select>";
        echo "<a style='position: absolute; margin-left: 610; margin-top:30;' href=\"\" id=\"valida\" onclick=\" value = document.getElementById('valor1').value.trim().replace(/ +/g, '+'); result = '" . strtr(implode("&", $parameters) , " ", "+") . "'; result = ((value != '') ? document.getElementById('campo').value+'='+value+((result != '') ? '' : '') : '')+result; this.href ='home.php?'+((result != '') ? '' : '')+result;\">&#x1F50E;</a><br>\n";
        echo '</center>';
        ?>


<div class="row">
<div class="col">

<h4>Livros disponíveis</h4>
<table border = 1 class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Ano</th>
      <th scope="col">Editora</th>
      <th scope="col">Autores</th>
      <th scope="col">Quantidade disponível</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>

<?php

        $where = array();
        if (isset($_GET["titulo"])) $where[] = "titulo like '%" . strtr($_GET["titulo"], " ", "%") . "%'";
        if (isset($_GET["ano"])) $where[] = "ano =" . $_GET["ano"];

        $where = (count($where) > 0) ? "where " . implode(" and ", $where) : "";

$query = "SELECT id_livro, autores, titulo, ano, editora, quantidade FROM livros ".$where."";
$resultado = mysqli_query($conexao,$query);


while($linha = mysqli_fetch_array($resultado)){
    echo "<tr> <td>".$linha['id_livro']."</td>
    <td>".$linha['titulo']."</td>
    <td>".$linha['ano']."</td>
    <td>".$linha['editora']."</td>
    <td>".$linha['autores']."</td>
    <td>".$linha['quantidade']."</td>";
    if($linha['quantidade']==0){
      echo"<form method='POST' action='add.php'>
      <td><button type='submit' name='add' value=".$linha['id_livro']." disabled>&#x1F91A;</button></td>
      </form>";
    }else{
      echo"<form method='POST' action='add.php'>
      <td><button type='submit' name='add' value=".$linha['id_livro'].">&#x1F91A;</button></td>
      </form>";
    }
    echo"</tr>";
  }

?>



</tbody>
</table>
</div>
<div class="col">
  <h4>Meus Livros</h4>
  <?php
  if( ! mysqli_num_rows($resultado2) ) {
    echo'Nada adicionado';
  }else{
    ?>
  <table border = 1 class="table">
  <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Titulo</th>
      <th scope="col">Ano</th>
      <th scope="col">Editora</th>
      <th scope="col">Autores</th>
      <th scope="col"></th>

    </tr>
  </thead>
  <tbody>

<?php


while($linha2 = mysqli_fetch_array($resultado2)){
    echo "<tr> <td>".$linha['id_livro']."</td>
    <td>".$linha2['titulo']."</td>
    <td>".$linha2['ano']."</td>
    <td>".$linha2['editora']."</td>
    <td>".$linha2['autores']."</td>
    <form method='POST'>
    </form>
    </tr>";
  }
}
  ?>

  </tbody>
</table>
</div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>


