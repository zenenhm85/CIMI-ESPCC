<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/departamento.php';

  if(isset($_POST['nomedpto'])) {
     $nome = $_POST['nomedpto'];
     $dpto = new Departamento($nome);
     $dpto::cadastrar($nome);
     $listadpto = $dpto::todos();
  }
  else{
      $dpto = new Departamento("");
      $listadpto = $dpto::todos();
  }
  
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Listar Departamento</title>
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
                      <h1 class="h1 text-uppercase">Lista de Departamentos</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="exceldpto" >Excel</i></button>
                       <table class="table table-hover" id="listadpto">
                        <thead >
                          <tr class="table-primary" >
                            <th scope="col">Nome Departamentos</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>                                                      
                          </tr>
                        </thead>
                        <tbody class="dpto">
                          <?php 
                          while ( $f=mysqli_fetch_array($listadpto)) {
                            ?>
                            <tr>
                              <th id="<?php echo $f['nome']; ?>" class="nomedptolista"><?php echo $f['nome']; ?></th>
                              <th><button type="button" class="btn btn-dark btn-sm alterardpto" data-toggle="modal" data-target="#exampleModal2" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-edit fa-fw"></button></th>  
                               <th><button type="button" class="btn btn-sm excluirdpto red" data-toggle="modal" data-target="#exampleModal1" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-times-circle-o  fa-fw"></button></th>        
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando um Departamento. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-nome=""  id="excluirdpto">Sim</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                    <!-- Modal 2 -->
                    <div class="modal fade" id="exampleModal2" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar um Departamento</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nome Departamento</label>
                              <input type="text" class="form-control" name="nomedptom" id="nomedptom">                      
                            </div> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-secondary" data-nome=""  id="alerardpto">OK</button>                 
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