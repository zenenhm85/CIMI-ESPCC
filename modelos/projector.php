<?php

class Projector{
    
    
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
        
        $conexao = mysqli_connect(Projector::$url, Projector::$usuario, Projector::$senha, Projector::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO projector(id,marca,dpto,estado) VALUES ('".$id."','".$marca."','".$dpto."','".$estado."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }
    public static function alterar($idold,$id,$marca,$dpto,$estado) {
        
        $conexao = mysqli_connect(Projector::$url, Projector::$usuario, Projector::$senha, Projector::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE projector SET id='$id', marca='$marca', dpto='$dpto', estado='$estado'  WHERE id='$idold'";
        $aux =  mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $aux;        
    }   
     
     public static function excluir($id) {
        
        $conexao = mysqli_connect(Projector::$url, Projector::$usuario, Projector::$senha, Projector::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM projector WHERE id='$id'";
        $aux = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $aux;      
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Projector::$url, Projector::$usuario, Projector::$senha, Projector::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM projector ORDER BY dpto";
        $listaProjector = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaProjector;     
    }
     public static function todos2($dpto) {
        
       $conexao = mysqli_connect(Projector::$url, Projector::$usuario, Projector::$senha, Projector::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM projector WHERE dpto='$dpto'";
        $listaProjector = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaProjector;     
    }         
}
?>