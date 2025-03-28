<?php 

// importar a classe

require 'Usuario.class.php';

$sucesso = $usuario = new Usuario(); //  Pega a instancia da classe Usuario e guarda dentro da variável sucesso

if($sucesso){ 

    $ff = $usuario->chkUser("fabioclaret@gmail.com"); 
    /*
     Será procurado pelo usuario Fabio através do método chkUser pelo email e o resultado será guardado dentro
     da variável $ff
    */
    if($ff== 0){
        $usuario->cadastrar("Fabio CLaret", "fabioclaret@gmail.com", "1234");
        echo "<h1>Cadastrado com sucesso!";
    }else{
        echo "<h1>O usuário já existe!";
    }
    /*
    Se o resultado for falso == 0, então o usuário deverá ser cadastrado e depois exibirá a mensagem cadastrado com sucesso, se o resultado for verdadeiro; então já existe esse usuário, ou seja exibira a mensagem que o usuário já existe
    */
}else{
    echo "<h1> Erro ao conectar com o banco!";
}
echo "</h1>";

?>