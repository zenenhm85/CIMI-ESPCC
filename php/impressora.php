<?php
	session_start();

    include '../modelos/impressora.php';
	
	$url = "localhost";
    $usuario="root";
    $senha="";
    $database='cimi';
    $conexao =mysqli_connect($url,$usuario,$senha,$database);
    if(!isset($_POST['Ida'])){
        $impressora = new Impressora();
        $aux = $impressora::excluir($_POST['Id']); 
       if($aux){
            echo "1";
        }
        else{
            echo "0";
        } 
    }
    else{
        $impressora = new Impressora();
        $aux = $impressora::alterar($_POST['Ida'], $_POST['Id'], $_POST['Marca'], $_POST['Dpto'], $_POST['Estado']); 
        if($aux){
            echo "1";
        }
        else{
            echo "0";
        }        
    }     
   
?>