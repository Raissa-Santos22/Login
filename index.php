<?php 

// importar a classe

require 'Usuario.class.php';

if(isset($_POST['nome'])){
    $nome = $_POST['nome'];
    $email = $_POST['email'];
    $senha = $_POST['senha'];

    $usuario = new Usuario();

    $ok = $usuario->cadastrar($nome, $email, $senha);
    if($ok){
        echo "<h1>Registro inserido $nome";
    }else{
        echo "<h1>Erro";
    }
}



?>