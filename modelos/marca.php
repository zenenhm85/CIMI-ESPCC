<?php

class Marca {
    
    private $nome;
    private static $url = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $database = "cimi";

    function __construct($nome) {
       $this->nome = $nome;
       $url = "localhost";
       $usuario = "root";
       $senha ="";
       $database = "rrhh";
   }
    public function getNome() {
        return $this->nome;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
     public static function cadastrar($newmarca) {
        
        $conexao = mysqli_connect(Marca::$url, Marca::$usuario, Marca::$senha, Marca::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO marca(nome) VALUES ('".$newmarca."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }   
     public static function alterar($nomeold, $nomenovo) {
        
        $conexao = mysqli_connect(Marca::$url, Marca::$usuario, Marca::$senha, Marca::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE marca SET nome = '$nomenovo' WHERE nome='$nomeold'";
        mysqli_query($conexao, $sql);
        $sql = "UPDATE computador SET marca = '$nomenovo' WHERE marca='$nomeold'";
        mysqli_query($conexao, $sql);
        $sql = "UPDATE projector SET marca = '$nomenovo' WHERE marca='$nomeold'";
        mysqli_query($conexao, $sql);
         $sql = "UPDATE monitor SET marca = '$nomenovo' WHERE marca='$nomeold'";
        mysqli_query($conexao, $sql);        
        mysqli_close($conexao);        
    }     
     public static function excluir($nomeexcluir) {
        
        $conexao = mysqli_connect(Marca::$url, Marca::$usuario, Marca::$senha, Marca::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM marca WHERE nome='$nomeexcluir'";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Marca::$url, Marca::$usuario, Marca::$senha, Marca::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM marca";
        $listaMarca = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaMarca;     
    }     
}
?>