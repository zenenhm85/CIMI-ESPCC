<?php
	session_start();

    include '../modelos/departamento.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);

    if(!isset($_POST['Nomea'])){
        $dpto = new Departamento("");
        $dpto::excluir($_POST['Nome']); 
        echo "1";  
    }
    else{
        $dpto = new Departamento("");
        $dpto::alterar($_POST['Nomea'], $_POST['Nome']); 
        echo "1";
    }     
   
?>