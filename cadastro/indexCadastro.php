<?php
header('Content-Type: text/html; charset=UTF-8');
  require_once'../Classes/CadastroUsuario.php';
  $c = new CadastroUsuario;
  require_once'../Classes/DataBase.php';
  $u = new DataBase;
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
  <link rel="stylesheet" href="css-cadastro/cadastro.css">
  <link href="https://fonts.googleapis.com/css2?family=Source+Sans+Pro:wght@200&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Roboto+Slab&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Muli:wght@700&display=swap" rel="stylesheet">
  <!--ícone no navegador-->
  <link rel="shortcut icon" href="../images/favicon (1).ico" >
  <meta name="theme-color" content="black">
</head>

<body>

<!--CELULAR-->
  <!--LINHA LATERAL ROXA-->
  <div class="row">
      <div class="linha_lateral col s1 l1"></div>

      <!--LOGO-->
        <div class="logo">
          <img class="img-logo responsive-img" src="../images/LogoTestandoNome.png">
        </div>

<!--CAMPOS-->
<form method="POST">

<div class="input-field col s10 l8" id="nome" >
  <input class="flow-text validate" placeholder="Como se chama?" id="first_name" type="text" style="color:black; font-family: 'Muli';" name="nome">
</div>

<div class="input-field col s10 l8" id="cpf" >
  <input class="flow-text validate" placeholder="CPF" id="numero" type="number" data-length="11" name="CPF">
</div>

<div class="input-field col s10 l8" id="materia" name="materia">
    <div class="chips-placeholder validate" type="text" ></div>
</div>

<div class="input-field col s9 l8 " id="email">
  <!-- <input class="flow-text" id="email" placeholder="E-mail" type="email" class="validate" style="font-size: 75%;">
   <label data-error="E-mail inválido" for="email"></label>-->
    <input class="flow-text validate" placeholder="E-mail" id="email" type="email" name="email">
</div>

<div class="input-field col s10 l4" id="estado">
  <select id="estadofonte">
      <option value="" disabled selected>Selecione</option>
      <option value="1">Acre</option>
      <option value="2">Alagoas</option>
      <option value="3">Amapá</option>
      <option value="4">Amazonas</option>
      <option value="5">Bahia</option>
      <option value="6">Ceará</option>
      <option value="7">Distrito Federal</option>
      <option value="8">Espírito Santo</option>
      <option value="9">Goiás</option>
      <option value="10">Maranhão</option>
      <option value="11">Mato Grosso</option>
      <option value="12">Mato Grosso do Sul</option>
      <option value="13">Minais Gerais</option>
      <option value="14">Pará</option>
      <option value="15">Paraíba</option>
      <option value="16">Paraná</option>
      <option value="17">Pernambuco</option>
      <option value="18">Piauí</option>
      <option value="19">Rio de Janeiro</option>
      <option value="20">Rio Grande do Norte</option>
      <option value="21">Rio Grande do Sul</option>
      <option value="22">Rondônia</option>
      <option value="23">Roraima</option>
      <option value="24">Santa Catarina</option>
      <option value="25">São Paulo</option>
      <option value="26">Sergipe</option>
      <option value="27">Tocantins</option>
    </select>
    <label>Estados</label>
  </div>

  <div class="input-field col s10 l5" id="cidade" >
      <select id="estadofonte">
        <option value="" disabled selected>Selecione</option>
        <optgroup label="Estado 1">
          <option value="1">Cidade 1</option>
          <option value="2">Cidade 2</option>
        </optgroup>
        <optgroup label="Estado 2">
          <option value="3">Cidade 3</option>
          <option value="4">Cidade 4</option>
        </optgroup>
        <optgroup label="Estado 3">
          <option value="5">Cidade 5</option>
          <option value="6">Cidade 6</option>
        </optgroup>
        <optgroup label="Estado 4">
          <option value="7">Cidade 7</option>
          <option value="8">Cidade 8</option>
        </optgroup>
      </select>
      <label>Cidades</label>
    </div>

    <div class="input-field col s9 l8" id="endereço">
      <input class="flow-text validate" placeholder="Endereço" id="localização" type="text" name="endereço">
    </div>

    <div class="input-field col s9 l8" id="senha">
      <input class="flow-text validate" placeholder="Senha" id="senhas" type="password" name="senha">
    </div>

    <div class="input-field col s9 l8" id="confirmasenha">
      <input class="flow-text validate" placeholder="Confirmação de senha" id="confirmasenhas" type="password" name="confSenha">
  </div>

  <div>
      <input class="cadastro flow-text waves-effect yellow darken-2 waves-light hoverable" type="submit" value="Cadastrar">
  </div>
</form>

<?php

//verificar se clicou no botão
	if(isset($_POST['nome'])){

		$nome = addslashes($_POST['nome']);
		$CPF = addslashes($_POST['CPF']);
		/* $materia = addslashes($_POST['materia']); */
		$email = addslashes($_POST['email']);
		$endereço = addslashes($_POST['endereço']);
		$senha = addslashes($_POST['senha']);
		$confSenha = addslashes($_POST['confSenha']);
		//verificar se esta preenchido
/*  if(!empty($nome) && !empty($CPF) && !empty($email) && !empty($materia) && !empty($endereço) && !empty($senha) && !empty($confSenha) )*/
  if(!empty($nome) && !empty($CPF) && !empty($email) && !empty($endereço) && !empty($senha) && !empty($confSenha) )
  {

      $u->conectar("testando", "localhost", "root", "");
      if($u->msgErro == ""){
        if($senha == $confSenha)
        {
          if($c->cadastrar($nome, $CPF, $email, $endereço, $senha))
          {
            $c->cadastrar($nome, $CPF, $email, $endereço, $senha);
            echo "Cadastrado com sucesso!";
          }
          else{
            echo "email ja cadastrado";
          }
        }
        else{
          echo "Senha incorreta";
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

    </div>



<!-- JQuery CDN -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- JavaScript Materialize compilado e minificado -->
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>


<!--INICIALIZAÇÃO DOS CAMPOS "CIDADE" E "ESTADO"-->
<script>
  $(document).ready(function(){
    $('select').formSelect();
  });
</script>


<!-- INICIALIZAÇÃO DO CAMPO "MATERIAS QUE LECIONA" -->
<script>
$('#materia').chips({
   placeholder:'Matérias que leciona',
   secondaryPlaceholder:'+Matéria',
 });
</script>

</body>
</html>