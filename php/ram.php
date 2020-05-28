<?php
	session_start();

    include '../modelos/ram.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);
    $ram = new Ram("","");
    $ram::excluir($_POST['Tipo'],$_POST['Cap'] ); 
    echo "1";
   
?>