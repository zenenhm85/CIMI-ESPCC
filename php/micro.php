<?php
	session_start();

    include '../modelos/micro.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);
    $micro = new Micro();
    $micro::excluir($_POST['Tipo']); 
    echo "1";
   
?>