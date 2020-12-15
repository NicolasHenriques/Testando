<?php

Class CadastroUsuario
{
  public $pdo;

  public function cadastrar($nome, $CPF_Usuario, $email, $endereço, $senha){

    global $pdo;

    //verificar se ja existe o email cadastrado
    $sql = $pdo->prepare("SELECT ID_Usuario FROM usuario_professor WHERE Email = :e");
    $sql->bindValue(":e", $email);
    $sql->execute();
    if($sql->rowCount() > 0){
      return false; //ja esta cadastrada
    }
    else{
      //caso nao exista, cadastrar
      $sql = $pdo->prepare("INSERT INTO usuario_professor (NickName, CPF_Usuario, Email, Endereço, Senha) VALUES (:n, :c, :e, :en, :s)");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":c", $CPF_Usuario);
        /* $sql->bindValue(":m", $materia); */
        $sql->bindValue(":e", $email);
        $sql->bindValue(":en", $endereço);
        $sql->bindValue(":s", md5($senha));
        $sql->execute();

      return true;
    }

  }

  public function validprontuario($nome, $prontuario, $CPF){

    global $pdo;

    //verificar se ja existe o cpf cadastrado
    $sql = $pdo->prepare("SELECT Prontuario FROM professor WHERE CPF = :c");
    $sql->bindValue(":c", $CPF);
    $sql->execute();
    if($sql->rowCount() > 0){
      return false; //ja esta cadastrada
    }
    else{
      //caso nao exista, cadastrar
      $sql = $pdo->prepare("INSERT INTO professor (Nome, Prontuario, CPF) VALUES (:n, :p, :c)");
        $sql->bindValue(":n", $nome);
        $sql->bindValue(":p", $prontuario);
        $sql->bindValue(":c", $CPF);
        $sql->execute();

      return true;
    }

  }

  public function logar(){

    global $pdo;
    //verificar se o email e senha estao cadastrados
    $sql = $pdo->prepare("SELECT ID_Usuario FROM usuario_professor WHERE Email = :e AND senha = :s");
    $sql->bindValue(":e", $email);
    $sql->bindValue(":s", md5($senha));
    $sql->execute();
    if($sql->rowCount() > 0){
      //entrar no sistema
      $dado = $sql->fetch();
      session_start();
      $_SESSION['ID_Usuario'] = $dado['ID_Usuario'];
      return true; //logado com sucesso
    }
    else{
      return false; //não foi possivel logar
    }
  }
}



?>
