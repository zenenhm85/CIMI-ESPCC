<?php 
  session_start();  
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  

  include 'modelos/marca.php';  
  include 'modelos/departamento.php'; 
  include 'modelos/micro.php';

  $marca = new Marca(""); 
  $marcalista = $marca::todos(); 
  $dpto = new Departamento("");
  $dptolista = $dpto::todos();
  $micro = new Micro(); 
  $microlista = $micro::todos(); 
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Inserir Computador</title>
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
                    
                    <h1 class="h1">Inserindo Computador</h1><hr>
                    <form action="listar_computador.php" method="POST">
                        <div class="row">
                        <div class="col-6">
                            <div class="form-group">
                                <label for="exampleInputEmail1">Código de Inventário</label>
                                <input type="text" class="form-control" name="codinvc">                      
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword1">Marca</label>
                                <select class="form-control" name="marcacomp">
                                  <?php 
                                    while ($f = mysqli_fetch_array($marcalista)) {
                                      ?>
                                      <option value="<?php echo $f['nome']?>"><?php echo $f['nome']?></option>
                                      <?php
                                    }

                                    ?>
                                </select>
                            </div>
                              <div class="form-group">
                                <label for="exampleInputPassword1">Estado</label>
                                <select class="form-control" name="estadocomp" required>
                                  <option>Bom</option>
                                  <option>Mal</option>                          
                                </select>
                              </div>
                              <div class="form-group">
                                <label >Departamento</label>
                                <select class="form-control" name="dptocomp">
                                  <?php 
                                  while ($g = mysqli_fetch_array($dptolista)) {
                                    ?>
                                    <option value="<?php echo $g['nome']?>"><?php echo $g['nome']?></option>
                                    <?php
                                  }
                                  ?>                             
                                </select>
                              </div>
                              <button type="submit" class="btn btn-lg btn-dark">Inserir</button>
                         </div>
                         
                        <div class="col-6">
                        <div class="form-group">
                            <label>Capacidade HD</label>
                            <input type="number" min="0" class="form-control" name="capacidadehd" required placeholder="Em GB" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 8 || event.charCode == 0" >
                          </div>
                          <div class="form-group">
                            <label>Capacidade RAM</label>
                            <input type="number" min="0" class="form-control" name="capacidaderam" required placeholder="Em GB" onkeypress="return (event.charCode >= 48 && event.charCode <= 57) || event.charCode == 8 || event.charCode == 0" >
                          </div>                          
                           <div class="form-group">
                            <label for="exampleInputPassword1">Tipo</label>
                            <select class="form-control" name="tipo">
                              <option>Mesa</option>
                              <option>Laptop</option>                          
                            </select>
                          </div>
                          <div class="form-group">
                            <label for="exampleInputPassword1">Microprocessador</label>
                            <select class="form-control" name="micro">
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
            </div>
        </div>

        

        <?php include  'common_footer.php';?>
	</body>
</html>