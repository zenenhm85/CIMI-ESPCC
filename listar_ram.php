<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/ram.php';

  if(isset($_POST['tiporam']) && isset($_POST['capacidaderam'])) {
     $tipo = $_POST['tiporam'];
     $cap = $_POST['capacidaderam'];

     $ram = new Ram("", "");
     $ram::cadastrar($tipo, $cap);
     $listadoram = $ram::todos();
  }
  else{
      $ram = new Ram("","");
      $listadoram = $ram::todos();
  }
  
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Listar RAM</title>
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
                      <h1 class="h1 text-uppercase">Lista de RAM</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelram" >Excel</i></button>
                       <table class="table table-hover" id="listaram">
                        <thead >
                          <tr class="table-primary" >
                            <th scope="col">Tipo</th>
                            <th scope="col">Capacidade</th>                            
                            <th scope="col">Excluir</th>                                                      
                          </tr>
                        </thead>
                        <tbody class="ram">
                          <?php 
                          while ( $f=mysqli_fetch_array($listadoram)) {
                            ?>
                            <tr>
                              <th data-id1="<?php echo $f['tipo']; ?>" data-id2="<?php echo $f['capacidade']; ?>" class="tiporam"><?php echo $f['tipo']; ?></th>
                              <th data-id1="<?php echo $f['tipo']; ?>" data-id2="<?php echo $f['capacidade']; ?>" class="capram"><?php echo $f['capacidade']; ?></th>
                              
                               <th><button type="button" class="btn btn-sm excluirram red" data-toggle="modal" data-target="#ExcluirRam" data-id1="<?php echo $f['tipo']; ?>" data-id2="<?php echo $f['capacidade']; ?>"><i class="fa fa-times-circle-o  fa-fw"></button></th>        
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="ExcluirRam" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Ram</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando uma Ram. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-tipo="" data-cap=""  id="excluirram">Sim</button>                 
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