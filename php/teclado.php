<?php
	session_start();

    include '../modelos/teclado.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);

    if(!isset($_POST['Ida'])){
        $teclado = new Teclado();
        $aux = $teclado::excluir($_POST['Id']); 
       if($aux){
            echo "1";
        }
        else{
            echo "0";
        } 
    }
    else{
        $teclado = new Teclado();
        $aux = $teclado::alterar($_POST['Ida'], $_POST['Id'], $_POST['Marca'], $_POST['Dpto'], $_POST['Estado']); 
        if($aux){
            echo "1";
        }
        else{
            echo "0";
        }
        
    }     
   
?>