<?php

class Computador{
    
    
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
    
     public static function cadastrar($id,$marca,$dpto,$estado,$tipo,$micro,$hd,$ram) {
        
        $conexao = mysqli_connect(Computador::$url, Computador::$usuario, Computador::$senha, Computador::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "INSERT INTO computador(id,marca,dpto,estado,tipo,micro,hd,ram) VALUES ('".$id."','".$marca."','".$dpto."','".$estado."','".$tipo."','".$micro."','".$hd."','".$ram."')";
        mysqli_query($conexao, $sql);
        mysqli_close($conexao);        
    }
    public static function alterar($idold,$id,$marca,$dpto,$estado,$tipo,$micro,$hd,$ram) {
        
        $conexao = mysqli_connect(Computador::$url, Computador::$usuario, Computador::$senha, Computador::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "UPDATE computador SET id='$id', marca='$marca', dpto='$dpto', estado='$estado',tipo='$tipo', micro='$micro',hd='$hd',ram='$ram'  WHERE id='$idold'";
        $aux =  mysqli_query($conexao, $sql);
        mysqli_close($conexao);
        return $aux;        
    }   
     
     public static function excluir($id) {
        
        $conexao = mysqli_connect(Computador::$url, Computador::$usuario, Computador::$senha, Computador::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "DELETE FROM computador WHERE id='$id'";
        $aux = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $aux;      
    }  
    public static function todos() {
        
       $conexao = mysqli_connect(Computador::$url, Computador::$usuario, Computador::$senha, Computador::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM computador ORDER BY dpto";
        $listaComputador = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaComputador;     
    }
     public static function todos2($dpto) {
        
       $conexao = mysqli_connect(Computador::$url, Computador::$usuario, Computador::$senha, Computador::$database);
        //mysql_select_db(AlunoDAO::$DATABASE,$conexao);
        $sql = "SELECT * FROM computador WHERE dpto='$dpto'";
        $listaComputador = mysqli_query($conexao, $sql);
        mysqli_close($conexao);  
        return $listaComputador;     
    }        
}
?>