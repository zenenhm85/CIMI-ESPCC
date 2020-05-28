<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/marca.php';

  if(isset($_POST['nomemarca'])) {
     $nome = $_POST['nomemarca'];
     $marca = new Marca($nome);
     $marca::cadastrar($nome);
     $listamarca = $marca::todos();
  }
  else{
      $marca = new Marca("");
      $listamarca = $marca::todos();
  }
  
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Listar Marca</title>
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
                      <h1 class="h1 text-uppercase">Lista de Marca</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelmarca" >Excel</i></button>
                       <table class="table table-hover" id="listamarca">
                        <thead >
                          <tr class="table-primary" >
                            <th scope="col">Nome Marca</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>                                                      
                          </tr>
                        </thead>
                        <tbody class="marca">
                          <?php 
                          while ( $f=mysqli_fetch_array($listamarca)) {
                            ?>
                            <tr>
                              <th id="<?php echo $f['nome']; ?>" class="nomemarcalista"><?php echo $f['nome']; ?></th>
                              <th><button type="button" class="btn btn-dark btn-sm alterarmarca" data-toggle="modal" data-target="#ModificarMarca" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-edit fa-fw"></button></th>  
                               <th><button type="button" class="btn btn-sm excluirmarca red" data-toggle="modal" data-target="#ExcluindoMarca" data-nome="<?php echo $f['nome'];?>"><i class="fa fa-times-circle-o  fa-fw"></button></th>        
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="ExcluindoMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando um Fornecedor. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-nome=""  id="excluirmarca">Sim</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                    <!-- Modal 2 -->
                    <div class="modal fade" id="ModificarMarca" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar um Marca</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <div class="form-group">
                              <label for="exampleInputEmail1">Nome Fornecedor</label>
                              <input type="text" class="form-control" name="nomemarcam" id="nomemarcam">                      
                            </div> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-secondary" data-nome=""  id="alterarmarca">OK</button>                 
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