<?php 
class Usuario {  // classe Usuário
    private $id;
    private $nome;
    private $email;
    private $senha;
    private $pdo; /* Atributos da classe Usuário*/

    function __construct() {
        $dns = "mysql:dbname=usuariopwii;host=localhost";
        $dbUser = "root";
        $dbPass = "";

        // método construtor , serve para que a classe ao ser instanciada,ela já faça coisas

        try{
            $this->pdo = new PDO($dns, $dbUser, $dbPass);
            return true;
        } catch (\Throwable $th){
            return false;
        }    
    }

    function cadastrar($nome, $email, $senha){ // método cadastrar ; atributos email, nome e senha
        // passo 1 criar a query(consulta)

        $sql = "INSERT INTO usuarios SET nome = :n, email = :e, senha = :s"; // vai consultar 

        // passo 2 preparar a query
        $stmt = $this->pdo->prepare($sql);

        // passo 3 usar o bindValue

        $stmt->bindValue(":n", $nome);
        $stmt->bindValue(":e",$email);
        $stmt->bindValue(":s",$senha);

        // passo 4 exercutar a query
        $stmt->execute();
    }

    function chkUser($email){ // método para checar se o usuário existe
        // passo 1 
        $sql = "SELECT * FROM usuarios WHERE email = :e ";

        // passo 2 
        $stmt = $this->pdo->prepare($sql);

        // passo 3
        $stmt->bindValue(":e", $email);

        // passo 4 
        $stmt->execute();

        // saber se encontrou o registro

        return $stmt->rowCount();

    }
}
?>