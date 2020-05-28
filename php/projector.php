<?php
	session_start();

    include '../modelos/projector.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);

    if(!isset($_POST['Ida'])){
        $projector = new Projector();
        $aux = $projector::excluir($_POST['Id']); 
       if($aux){
            echo "1";
        }
        else{
            echo "0";
        } 
    }
    else{
        $projector = new Projector();
        $aux = $projector::alterar($_POST['Ida'], $_POST['Id'], $_POST['Marca'], $_POST['Dpto'], $_POST['Estado']); 
        if($aux){
            echo "1";
        }
        else{
            echo "0";
        }
        
    }     
   
?>