<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/computador.php';
  include 'modelos/marca.php';  
  include 'modelos/departamento.php'; 
   include 'modelos/micro.php';
  $marca = new Marca(""); 
  $marcalista = $marca::todos(); 
  $dpto = new Departamento("");
  $dptolista = $dpto::todos();
  $micro = new Micro();
  $microlista = $micro::todos();

  if(isset($_POST['codinvc'])) {
     $id=$_POST['codinvc'];
     $marca=$_POST['marcacomp'];
     $dpto = $_POST['dptocomp'];
     $estado = $_POST['estadocomp'];
     $micro = $_POST['micro'];
     $tipo = $_POST['tipo'];
     $hd = $_POST['capacidadehd'];
     $ram = $_POST['capacidaderam'];
     $comp = new Computador();
     $comp::cadastrar($id,$marca,$dpto,$estado,$tipo,$micro,$hd,$ram);
     $listacomp = $comp::todos2($dpto);
  }
  else{
      $comp = new Computador();
      $listacomp = $comp::todos();
  }
  
 
?>
<!DOCTYPE html>
<html lang="pt">
  <head>
    <title>Listar Computador</title>
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
                      <h1 class="h1 text-uppercase">Lista de Computadores</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelcomp" >Excel</i></button>
                       <table class="table table-hover" id="listacomp">
                        <thead >
                          <tr class="table-primary">
                            <th scope="col">Id</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Departamento</th>
                            <th scope="col">Estado</th>
                            <th scope="col">Micro</th>
                            <th scope="col">HD</th>
                            <th scope="col">RAM</th>
                            <th scope="col">Tipo</th>                            
                            <th scope="col">Alterar</th>
                            <th scope="col">Excluir</th> 
                          </tr>
                        </thead>
                        <tbody class="computador">
                          <?php 
                          while ( $f=mysqli_fetch_array($listacomp)) {
                            ?>
                            <tr>
                              <th id="<?php echo $f['id']; ?>" class="idcomp"><?php echo $f['id']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="marcacomp"><?php echo $f['marca']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="dptocomp"><?php echo $f['dpto']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="estadcomp"><?php echo $f['estado']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="microcomp"><?php echo $f['micro']; ?></th>
                              <th id="<?php echo $f['id']; ?>" class="hdcomp"><?php echo $f['hd']; ?></th> 
                              <th id="<?php echo $f['id']; ?>" class="ramcomp"><?php echo $f['ram']; ?></th> 
                              <th id="<?php echo $f['id']; ?>" class="tipocomp"><?php echo $f['tipo']; ?></th>                       
                              <th><button type="button" class="btn btn-dark btn-sm altercomp" data-toggle="modal" data-target="#ModificarComp" data-id="<?php echo $f['id'];?>" data-marca="<?php echo $f['marca']; ?>" data-dpto="<?php echo $f['dpto'];?>" data-estado="<?php echo $f['estado']; ?>" data-tipo = "<?php echo $f['tipo'];?>" data-micro = "<?php echo $f['micro'];?>" data-hd = "<?php echo $f['hd'];?>" data-ram = "<?php echo $f['ram'];?>"><i class="fa fa-edit fa-fw"></button></th>  
                              <th><button type="button" class="btn btn-sm excluircomp red" data-toggle="modal" data-target="#ExcluindoComp" data-id="<?php echo $f['id'];?>"><i class="fa fa-times-circle-o fa-fw"></button></th>               
                            </tr>
                            <?php
                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>
                    <!-- Modal -->
                    <div class="modal fade" id="ExcluindoComp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Excluindo Computador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <h6 class="h6">Está eliminando um Computador. Deseja continuar?</h6> 
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Não</button>
                            <button type="button" class="btn btn-secondary" data-id=""  id="excluircomp">Sim</button>                 
                          </div>
                        </div>
                      </div>
                    </div>
                    <!-- Fim Modal -->
                    <!-- Modal 2 -->
                    <div class="modal fade" id="ModificarComp" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
                      <div class="modal-dialog" role="document">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Modificar um Computador</h5>
                            <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                            </button>
                          </div>
                          <div class="modal-body">
                            <form>
                              <div class="row">
                                <div class="col-6">
                                  
                                  <div class="form-group">
                                    <label>Identificação</label>
                                    <input type="text" class="form-control" id="idcompm">
                                  </div>
                                  <div class="form-group">
                                    <label >Marca</label>
                                    <select class="form-control" id="marcacompm">
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
                                    <select class="form-control" id="dptocompm">
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
                                    <select class="form-control" id="estadocompm">
                                      <option value="Bom">Bom</option>  
                                      <option value="Mal">Mal</option>                      
                                    </select>
                                  </div>                        
                                </div> 
                                <div class="col-6">
                                  <div class="form-group">
                                    <label>Capacidade HD</label>
                                    <input type="number" min="0" class="form-control" id="capacidadehdm" required placeholder="Em GB" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 8 || event.charCode == 0" >
                                  </div>
                                  <div class="form-group">
                                    <label>Capacidade RAM</label>
                                    <input type="number" min="0" class="form-control" id="capacidaderamm" required placeholder="Em GB" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 8 || event.charCode == 0" >
                                  </div>                          
                                   <div class="form-group">
                                    <label for="exampleInputPassword1">Tipo</label>
                                    <select class="form-control" id="tipom">
                                      <option>Mesa</option>
                                      <option>Laptop</option>                          
                                    </select>
                                  </div>
                                  <div class="form-group">
                                    <label for="exampleInputPassword1">Microprocessador</label>
                                    <select class="form-control" id="microm">
                                      <?php 
                                      while ($l = mysqli_fetch_array($microlista)) {
                                        ?>
                                        <option value="<?php echo $l['tipo']?>"><?php echo $l['tipo']?></option>
                                        <?php
                                      }
                                      ?>                        
                                    </select>
                                  </div>              
                                </div>              
                              </div>
                            </form>              
                          </div>
                          <div class="modal-footer">
                            <button type="button" class="btn" data-dismiss="modal" >Cancelar</button>
                            <button type="button" class="btn btn-secondary" data-id=""  id="alterarcomp">OK</button>                 
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