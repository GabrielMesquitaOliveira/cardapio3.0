<?php

include "conexao.php";
$objeto=new Usuario($_REQUEST);
$objeto->exibirUsuario();
$objeto->salvarUsuario();
$objeto->buscarUsuario();

class Usuario {

private $id;

private $email;

private $senha;

public $telefone;

public $nome;


public function __construct($arDados) {

    $this->email = $arDados ["email"];
    $this->senha = $arDados ["senha"];
    $this->telefone = $arDados ["telefone"];
    $this->nome = $arDados["nome"];
    // O password_hash e para maior seguranca
   // $this->senha = password_hash($senha, PASSWORD_DEFAULT);

}

    public function exibirUsuario(){
        $texto  = "usuario cadastrado <b>".$this->nome ."</b>";  
        echo $texto;
    }

    public function buscarUsuario(){
        $conexao = new ConexaoMySQL();
        $conexao->conectar();

        $meuSQl = "select * from usuario"; 
        $resultado = $conexao->executarConsulta($meuSQl);
        while ($row = $resultado->fetch_assoc()) {
            echo "<pre>";
            var_dump($row);
            echo "</pre>";  
        }
        $conexao->desconectar();

    }

    public function salvarUsuario(){
        $conexao = new ConexaoMySQL();
        $conexao->conectar();
        echo "chegou aqui";

        $sql = "INSERT INTO usuario (email, senha, telefone, nome) VALUES ('$this->email','$this->senha','$this->telefone','$this->nome')";
        //echo $sql;
        $conexao->executarConsulta($sql);
        $conexao->desconectar();

    }


}

class ConexaoMySQL {
    private $host = "localhost";
    private $usuario = "root";
    private $senha = "";
    private $banco = "cardapio";
    private $conexao;

    public function __construct() {
       
    }

    public function conectar() {
        $this->conexao = new mysqli($this->host, $this->usuario, $this->senha, $this->banco);

        if ($this->conexao->connect_error) {
            die("Erro na conexão com o banco de dados: " . $this->conexao->connect_error);
        }
    }

    public function desconectar() {
        if ($this->conexao) {
            $this->conexao->close();
        }
    }

    public function executarConsulta($sql) {
        if(!$resultado = $this->conexao->query($sql)){
            echo $this->conexao->error;
        }
        return $resultado;
    }

   
}

/*
// metodo pra obter informacoes dos usuario

public function getNome(){
    
    return $this->nome;
    
}


public function getEmail(){
    
    return $this->email;
    
}

// Metodo para verificar a senha

public function verificarsenha($senha){
    
    return password_verify($senha, $this-> senha);
    
    }/** */



?>