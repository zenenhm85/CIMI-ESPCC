<?php

class Impressora{
    
    
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
        
        $conexao = mysqli_connect(Impressora::$url, Impressora::$usuario, Impressora::$senha, Impressora::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO impressora(id,marca,dpto,estado) VALUES ('".$id."','".$marca."','".$dpto."','".$estado."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }
    public static function alterar($idold,$id,$marca,$dpto,$estado) {
        
        $conexao = mysqli_connect(Impressora::$url, Impressora::$usuario, Impressora::$senha, Impressora::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE impressora SET id='$id', marca='$marca', dpto='$dpto', estado='$estado'  WHERE id='$idold'";
        $aux =  mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $aux;        
    }   
     
     public static function excluir($id) {
        
        $conexao = mysqli_connect(Impressora::$url, Impressora::$usuario, Impressora::$senha, Impressora::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM impressora WHERE id='$id'";
        $aux = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $aux;      
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Impressora::$url, Impressora::$usuario, Impressora::$senha, Impressora::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM impressora ORDER BY dpto";
        $listaImpressora = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaImpressora;     
    }
     public static function todos2($dpto) {
        
       $conexao = mysqli_connect(Impressora::$url, Impressora::$usuario, Impressora::$senha, Impressora::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM impressora WHERE dpto='$dpto'";
        $listaImpressora = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaImpressora;     
    }         
}
?>