<?php

class HDD {
    
    
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
    
     public static function cadastrar($marca, $capacidade) {
        
        $conexao = mysqli_connect(HDD::$url, HDD::$usuario, HDD::$senha, HDD::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO hd(marca,capacidade) VALUES ('".$marca."','".$capacidade."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }   
     
     public static function excluir($marca, $capacidade) {
        
        $conexao = mysqli_connect(HDD::$url, HDD::$usuario, HDD::$senha, HDD::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM hd WHERE marca='$marca' AND capacidade='$capacidade'";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(HDD::$url, HDD::$usuario, HDD::$senha, HDD::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM hd";
        $listaHDD = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaHDD;     
    }     
}
?>