<?php
  include ("../Classes/DataBase.php");
  require_once'../Classes/DataBase.php';
  $u = new DataBase;

  $u->conectar("testando", "localhost", "root", "");

  require_once'../Classes/CadastroUsuario.php';
  $c = new CadastroUsuario;

  $consulta = "SELECT * FROM professor";
  $con = $pdo->query($consulta) or die($pdo->error);
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
  <meta charset="UTF-8">
  <!-- Font web de ícones -->
  <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
  <!-- CSS compilado e minificado -->
  <link type="text/css" rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css" media="screen"/>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Testando</title>
  <link rel="stylesheet" href="css-validprontuario/validprontuario.css">
  <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
  <!--ícone no navegador-->
  <link rel="shortcut icon" href="../images/favicon (1).ico" >
  <meta name="theme-color" content="black">
</head>

<body>
  <header>

    <div class= "row">

      <form method="post" class= "col l9 s9" id="barrapesq">
        <input type="text" class="col l7 s7">
        <button class="btn-floating btn-large waves-effect waves-light" id="botaopesq">
          <i class="material-icons" id="icone">search</i>
        </button>
      </form>

 <a class="btn-floating btn-large waves-effect waves-light  teal accent-4 " id="botaoadd"><i class="material-icons">add</i></a>
    </div>

<form method= "POST">
  <div id="campos">
      <!-- acho que isso aqui só funciona com looping-->
      <input class="flow-text validate" type="text" size="30" id="nome" placeholder="Nome" name="nome">
      <input class="flow-text validate" type="text" size="9" id="prontuario" placeholder="Prontuário" name="prontuario">
      <input class="flow-text validate" type="number" data-length="11" id="cpf" placeholder="CPF" name="CPF">
  </div>

  <div>
      <input class="cadastro flow-text waves-effect yellow darken-2 waves-light hoverable" type="submit" value="Cadastrar" >
  </div>
</form>

<?php

  if(isset($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
    $prontuario = addslashes($_POST['prontuario']);
		$CPF= addslashes($_POST['CPF']);
		//verificar se esta preenchido

  if(!empty($nome) && !empty($prontuario) && !empty($CPF))
  {
      $u->conectar("testando", "localhost", "root", "");
      if($u->msgErro == ""){
          if($c->validprontuario($nome, $prontuario, $CPF))
          {
            echo "Cadastrado com sucesso!";
            if($c->verification($CPF, $prontuario)){
              echo "CPF existente";
            }
            else{
              echo "Não existe cpf";
            }
          }
          else{
            echo "CPF ja cadastrado";
          }
      }
      else {
        echo "Erro: ".$u->msgErro;
      }
  }
  else{
    echo "Preencha todos os campos";
  }
}
?>


<?php while($dado = $con->fetch()) { ?>
  <table class="centered  responsive-table">
      <tbody>  <tr>
          <td><?php echo $dado["Prontuario"];?></td>
          <td><?php echo $dado["Nome"];?></td>
          <td><?php echo $dado["CPF"];?></td>
      </tr> </tbody>  
  </table><?php } ?>

  </header>
</body>