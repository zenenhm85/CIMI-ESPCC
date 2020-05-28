<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/rato.php';
  include 'modelos/marca.php';  
  include 'modelos/departamento.php'; 
  $marca = new Marca(""); 
  $marcalista = $marca::todos(); 
  $dpto = new Departamento("");
  $dptolista = $dpto::todos();

  if(isset($_POST['idrato'])) {
     $id=$_POST['idrato'];
     $marca=$_POST['marcarato'];
     $dpto = $_POST['dptorato'];
     $estado = $_POST['estadorato'];
     $rato = new Rato();
     $rato::cadastrar($id,$marca,$dpto,$estado);
     $listarato = $rato::todos2($dpto);
  }
  else{
      $rato = new Rato();
      $listarato = $rato::todos();
  }
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Listar Rato</title>
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
                      <h1 class="h1 text-uppercase">Lista de Rato</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelpro" >Excel</i></button>
                       <table class="table table-hover" id="listapro">
                        <thead >
                          <tr class="table-primary" >
                            <th scope="col">Identificação</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th>                                                      
                          </tr>
                        </thead>
                        <tbody class="rato">
                          <?php 
                          while ( $f=mysqli_fetch_array($listarato)) {
                            ?>
                            <tr>
                              <th id="<?php echo $f['id']; ?>" class="idrato"><?php echo $f['id']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="marcarato"><?php echo $f['marca']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="dptorato"><?php echo $f['dpto']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="estadorato"><?php echo $f['estado']; ?></th>
                              <th><button type="button" class="btn btn-dark btn-sm alterrato" data-toggle="modal" data-target="#ModificarRato" data-id="<?php echo $f['id'];?>" data-marca="<?php echo $f['marca']; ?>" data-dpto="<?php echo $f['dpto'];?>" data-estado="<?php echo $f['estado']; ?>"><i class="fa fa-edit fa-fw"></button></th>  
                               <th><button type="button" class="btn btn-sm excluirrato red" data-toggle="modal" data-target="#ExcluindoRato" data-id="<?php echo $f['id'];?>"><i class="fa fa-times-circle-o fa-fw"></button></th>        
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="ExcluindoRato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Rato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando um Rato. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-id=""  id="excluirrato">Sim</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                    <!-- Modal 2 -->
                    <div class="modal fade" id="ModificarRato" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar um Rato</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                                <div class="row">
                                <div class="col-12">
                                  
                                  <div class="form-group">
                                    <label>Identificação</label>
                                    <input type="text" class="form-control" id="idrato">
                                  </div>
                                  <div class="form-group">
                                    <label >Marca</label>
                                    <select class="form-control" id="marcarato">
                                      <?php 
                                      while ($f2 = mysqli_fetch_array($marcalista)) {
                                        ?>
                                        <option value="<?php echo $f2['nome']?>"><?php echo $f2['nome']?></option>
                                        <?php
                                      }

                                      ?>
                                      
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label >Departamento</label>
                                    <select class="form-control" id="dptorato">
                                      <?php 
                                      while ($f3 = mysqli_fetch_array($dptolista)) {
                                        ?>
                                        <option value="<?php echo $f3['nome']?>"><?php echo $f3['nome']?></option>
                                        <?php
                                      }
                                      ?>                             
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label >Estado</label>
                                    <select class="form-control" id="estadorato">
                                      <option value="Bom">Bom</option>  
                                      <option value="Mal">Mal</option>                      
                                    </select>
                                  </div>                        
                                </div>             
                              </div>
                            </form>              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-secondary" data-id=""  id="alterarrato">OK</button>                 
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