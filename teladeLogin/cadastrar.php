<?php
  require_once 'CLASSES/usuarios.php';
  $u = new Usuario; 
?>

<html lang ="pt-br">
    <head>
    <meta charset="utf-8"/> 
    <title>Projeto login</title> 
    <link rel="stylesheet"  href="CSS/estilo.css">
</head>
<body>
    <div id="corpo-form-cad">
<h1>Cadastrar</h1>
    <form method="POST">
        <input type="text" name="nome" placeholder="Nome completo" maxlength="30">
        <input type="text" name="telefone" placeholder="Telefone" maxlength="30">
        <input type="email" name="email" placeholder="Usuario" maxlength="40">
        <input type="password" name="senha" placeholder="senha" maxlength="15">
        <input type="password" name="confsenha" placeholder="Confirme a senha" maxlength="15">
        <input type="submit" value="Cadastrar">
        <a href="cadastrar.php">Se cadastre <strong>Aqui</strong>
     </form>
     </div>
     <?php
    //verificar se clicou no botao
    if(isset($_POST['nome']))
    {
        $nome = addslashes($_POST['nome']);
        $telefone = addslashes($_POST['telefone']);
        $email = addslashes($_POST['email']);
        $senha = addslashes($_POST['senha']);
        $confirmarsenha = addslashes($_POST['confsenha']);
        //verificar se esta preenchido
        if(!empty($nome) && !empty($telefone) && !empty($email) && !empty($senha)
         && !empty($confirmarsenha))
{
    $u->conectar("meuprimeiro_banco", "localhost", "root","");
    if($u->msgErro == "")//se esta tudo ok 
    {
        if($senha == $confirmarsenha)
 { 
   if($u->cadastrar($nome,$telefone,$email,$senha))
   {
    echo "Cadastrado com sucesso! Acesse para entrar!";
   }
   else 
   {
       echo "Email ja cadastrado!";
   }
}
else
{
     echo "Senha e confirmar senha não correspondem!";
    }   
 }
     else
    {
        echo "Erro: ".$u->msgErro;
    }
}
else
{ 
    echo "preencha todos os campos!";
}
    }


     ?>
</body>
</html>