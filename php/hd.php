<?php
	session_start();

    include '../modelos/hdd.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);
    $hd = new HDD("","");
    $hd::excluir($_POST['Marca'],$_POST['Cap']); 
    echo "1";
   
?>