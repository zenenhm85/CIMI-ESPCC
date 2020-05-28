<?php

class Departamento {
    
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
     public static function cadastrar($newdpto) {
        
        $conexao = mysqli_connect(Departamento::$url, Departamento::$usuario, Departamento::$senha, Departamento::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO dpto(nome) VALUES ('".$newdpto."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }   
     public static function alterar($nomeold, $nomenovo) {
        
        $conexao = mysqli_connect(Departamento::$url, Departamento::$usuario, Departamento::$senha, Departamento::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE dpto SET nome = '$nomenovo' WHERE nome='$nomeold'";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }     
     public static function excluir($nomeexcluir) {
        
        $conexao = mysqli_connect(Departamento::$url, Departamento::$usuario, Departamento::$senha, Departamento::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM dpto WHERE nome='$nomeexcluir'";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Departamento::$url, Departamento::$usuario, Departamento::$senha, Departamento::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM dpto";
        $listaDepartamento = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaDepartamento;     
    }     
}
?>