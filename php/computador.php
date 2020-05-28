<?php
	session_start();

    include '../modelos/computador.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);

    if(!isset($_POST['Ida'])){
        $computador = new Computador();
        $aux = $computador::excluir($_POST['Id']); 
       if($aux){
            echo "1";
        }
        else{
            echo "0";
        } 
    }
    else{
        $computador = new Computador();
        $aux = $computador::alterar($_POST['Ida'], $_POST['Id'], $_POST['Marca'], $_POST['Dpto'], $_POST['Estado'],$_POST['Tipo'],$_POST['Micro'],$_POST['Hd'],$_POST['Ram']); 
        if($aux){
            echo "1";
        }
        else{
            echo "0";
        }
        
    }     
   
?>