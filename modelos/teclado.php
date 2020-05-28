<?php

class Teclado{   
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
        
        $conexao = mysqli_connect(Teclado::$url, Teclado::$usuario, Teclado::$senha, Teclado::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO teclado(id,marca,dpto,estado) VALUES ('".$id."','".$marca."','".$dpto."','".$estado."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }
    public static function alterar($idold,$id,$marca,$dpto,$estado) {
        
        $conexao = mysqli_connect(Teclado::$url, Teclado::$usuario, Teclado::$senha, Teclado::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE teclado SET id='$id', marca='$marca', dpto='$dpto', estado='$estado'  WHERE id='$idold'";
        $aux =  mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $aux;        
    }   
     
     public static function excluir($id) {
        
        $conexao = mysqli_connect(Teclado::$url, Teclado::$usuario, Teclado::$senha, Teclado::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM teclado WHERE id='$id'";
        $aux = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $aux;      
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Teclado::$url, Teclado::$usuario, Teclado::$senha, Teclado::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM teclado ORDER BY dpto";
        $listaTeclado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaTeclado;     
    }
     public static function todos2($dpto) {
        
       $conexao = mysqli_connect(Teclado::$url, Teclado::$usuario, Teclado::$senha, Teclado::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM teclado WHERE dpto='$dpto'";
        $listaTeclado = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaTeclado;     
    }         
}
?>