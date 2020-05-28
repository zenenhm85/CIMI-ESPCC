<?php
	session_start();

    include '../modelos/marca.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);

    if(!isset($_POST['Nomea'])){
        $marca = new Marca("");
        $marca::excluir($_POST['Nome']); 
        echo "1";  
    }
    else{
        $marca = new Marca("");
        $marca::alterar($_POST['Nomea'], $_POST['Nome']); 
        echo "1";
    }     
   
?>