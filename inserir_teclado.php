<?php 
  session_start();  
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  

  include 'modelos/marca.php';  
  include 'modelos/departamento.php'; 
  $marca = new Marca(""); 
  $marcalista = $marca::todos(); 
  $dpto = new Departamento("");
  $dptolista = $dpto::todos();
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Inserir Teclado</title>
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
                    
                    <h1 class="h1">Inserir Teclado</h1><hr>
                    <form action="listar_teclado.php" method="post">
                        <div class="row">
                        <div class="col-12">
                          
                          <div class="form-group">
                            <label>Identificação</label>
                            <input type="text" class="form-control" name="idtec" required placeholder="Número de inventário">
                          </div>
                          <div class="form-group">
                            <label >Marca</label>
                            <select class="form-control" name="marcatec">
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
                            <label >Departamento</label>
                            <select class="form-control" name="dptotec">
                              <?php 
                              while ($g = mysqli_fetch_array($dptolista)) {
                                ?>
                                <option value="<?php echo $g['nome']?>"><?php echo $g['nome']?></option>
                                <?php
                              }
                              ?>                             
                            </select>
                          </div>
                          <div class="form-group">
                            <label >Estado</label>
                            <select class="form-control" name="estadotec">
                              <option value="Bom">Bom</option>  
                              <option value="Mal">Mal</option>                      
                            </select>
                          </div>                                 
                          <button type="submit" class="btn btn-lg btn-dark">Inserir</button>
                        </div>             
                      </div>
                    </form>                    
                </div>
            </div>
        </div>

        

        <?php include  'common_footer.php';?>
	</body>
</html>