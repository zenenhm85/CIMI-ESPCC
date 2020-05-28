<?php

class Micro {    
   
    private static $url = "localhost";
    private static $usuario = "root";
    private static $senha = "";
    private static $database = "cimi";

    function __construct() {
       
       $url = "localhost";
       $usuario = "root";
       $senha ="";
       $database = "rrhh";
    }
    
     public static function cadastrar($newmicro) {
        
        $conexao = mysqli_connect(Micro::$url, Micro::$usuario, Micro::$senha, Micro::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO micro(tipo) VALUES ('".$newmicro."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }   
    
     public static function excluir($tipo) {
        
        $conexao = mysqli_connect(Micro::$url, Micro::$usuario, Micro::$senha, Micro::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM micro WHERE tipo='$tipo'";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Micro::$url, Micro::$usuario, Micro::$senha, Micro::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM micro";
        $listaMicro = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaMicro;     
    }     
}
?>