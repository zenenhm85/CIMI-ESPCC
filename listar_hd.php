<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/hdd.php';

  if(isset($_POST['marcahd']) && isset($_POST['capacidadehd'])) {
     $marca = $_POST['marcahd'];
     $cap = $_POST['capacidadehd'];

     $hdd = new HDD();
     $hdd::cadastrar($marca, $cap);
     $listadohd = $hdd::todos();
  }
  else{
       $hdd = new HDD();
       $listadohd = $hdd::todos();
  }
  
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Listar HD</title>
		<?php include  'common_head.php';?>
	</head>
	<body>
		<!-- -----------------Nav Bar---------------------------------------- -->
         <?php include  'nav.php';?>
    <!-- -----------------FIM Nav Bar---------------------------------------- -->
		<div class="container-fluid">
            <div class="row" >
    <!-- -----------------Menu esquerdo---------------------------------------- -->
                <div class="col-5 col-sm-3 col-md-2 col-lg-2 col-xl-2 menu">
                    <?php include  'menu.php';?>
                </div>
    <!-- -----------------FIM Menu esquerdo---------------------------------------- -->
                <div class="col-7 col-sm-9 col-md-10 col-lg-10 col-xl-10">
                    
                    <br>
                    <div class="container">
                      <div class="row">
                      <h1 class="h1 text-uppercase">Lista de HDD</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelhd" >Excel</i></button>
                       <table class="table table-hover" id="listahd">
                        <thead >
                          <tr class="table-primary" >
                            <th scope="col">Marca</th>
                            <th scope="col">Capacidade</th>
                            <th scope="col">Excluir</th>                                                      
                          </tr>
                        </thead>
                        <tbody class="hd">
                          <?php 
                          while ( $f=mysqli_fetch_array($listadohd)) {
                            ?>
                            <tr>
                              <th data-id1="<?php echo $f['marca']; ?>" data-id2="<?php echo $f['capacidade']; ?>" class="marcahd"><?php echo $f['marca']; ?></th>
                              <th data-id1="<?php echo $f['marca']; ?>" data-id2="<?php echo $f['capacidade']; ?>" class="caphd"><?php echo $f['capacidade']; ?></th>
                              
                               <th><button type="button" class="btn btn-sm excluirhd red" data-toggle="modal" data-target="#ExcluirHd" data-id1="<?php echo $f['marca']; ?>" data-id2="<?php echo $f['capacidade']; ?>"><i class="fa fa-times-circle-o  fa-fw"></button></th>        
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="ExcluirHd" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo HDD</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando um HDD. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-marca="" data-cap="" id="excluirhd">Sim</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                    
                </div>
            </div>
        </div>
      </div>

        

        <?php include  'common_footer.php';?>
	</body>
</html>