<?php

class Rato{   
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
    
     public static function cadastrar($id,$marca,$dpto,$estado) {
        
        $conexao = mysqli_connect(Rato::$url, Rato::$usuario, Rato::$senha, Rato::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO rato(id,marca,dpto,estado) VALUES ('".$id."','".$marca."','".$dpto."','".$estado."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }
    public static function alterar($idold,$id,$marca,$dpto,$estado) {
        
        $conexao = mysqli_connect(Rato::$url, Rato::$usuario, Rato::$senha, Rato::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE rato SET id='$id', marca='$marca', dpto='$dpto', estado='$estado'  WHERE id='$idold'";
        $aux =  mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $aux;        
    }   
     
     public static function excluir($id) {
        
        $conexao = mysqli_connect(Rato::$url, Rato::$usuario, Rato::$senha, Rato::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM rato WHERE id='$id'";
        $aux = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $aux;      
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Rato::$url, Rato::$usuario, Rato::$senha, Rato::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM rato ORDER BY dpto";
        $listaRato = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaRato;     
    }
     public static function todos2($dpto) {
        
       $conexao = mysqli_connect(Rato::$url, Rato::$usuario, Rato::$senha, Rato::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM rato WHERE dpto='$dpto'";
        $listaRato = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaRato;     
    }         
}
?>