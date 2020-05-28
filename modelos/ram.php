<?php

class Ram {
    
    private $tipo;
    private $capacidade;
    private static $url = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $database = "cimi";

    function __construct($tipo, $capacidade) {
       $this->tipo = $tipo;
       $this->capacidade = $capacidade;
       $url = "localhost";
       $usuario = "root";
       $senha ="";
       $database = "rrhh";
   }
    
     public static function cadastrar($tipo, $capacidade) {
        
        $conexao = mysqli_connect(Ram::$url, Ram::$usuario, Ram::$senha, Ram::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO ram(tipo,capacidade) VALUES ('".$tipo."','".$capacidade."' )";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }   
     
     public static function excluir($tipo, $capacidade) {
        
        $conexao = mysqli_connect(Ram::$url, Ram::$usuario, Ram::$senha, Ram::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM ram WHERE tipo='$tipo' AND capacidade='$capacidade'" ;
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Ram::$url, Ram::$usuario, Ram::$senha, Ram::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM ram";
        $listaRam = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaRam;     
    }     
}
?>