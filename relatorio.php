<?php 

  session_start();
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
  include 'modelos/teclado.php';
  include 'modelos/computador.php';
  include 'modelos/impressora.php';
  include 'modelos/monitor.php';
  include 'modelos/projector.php';  
  include 'modelos/rato.php';  
  include 'modelos/departamento.php'; 
 
  $dpto = new Departamento("");
  $dptolista = $dpto::todos();

  
  
 
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Inventario por departamentos</title>
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
                      <h1 class="h1 text-uppercase">Inventario por departamentos</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelrelatorio">Excel</i></button>
                       <table class="table table-hover" id="listarelatorio">
                        <thead >
                          <tr class="table-primary" >
                            
                            <th scope="col">Identificação</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Estado</th>                                                                                
                          </tr>
                        </thead>
                        <tbody class="relatorio">
                          <?php 
                          while ( $f=mysqli_fetch_array($dptolista)) {
                            $departamento = $f['nome'];
                            ?>
                              <tr>
                                <th colspan="3" class="text-uppercase"><h3 class="h3"><strong><?php echo $f['nome'];?></strong></h3></th>
                              </tr>  
                              <tr>
                                <th colspan="3"></th>
                              </tr>                              
                            <?php
                            $teclado = new Teclado();
                            $teclista = $teclado::todos2($departamento);
                            $comp = new Computador();
                            $complista = $comp::todos2($departamento);
                            $imp = new Impressora();
                            $implista = $imp::todos2($departamento);
                            $monitor = new Monitor();
                            $monlista = $monitor::todos2($departamento);                           
                            $projector = new Projector();
                            $projectorlista = $projector::todos2($departamento);
                            $rato = new Rato();
                            $ratolista = $rato::todos2($departamento);

                            ?>

                            <tr>
                                <th colspan="3"><h3>Computador</h3></th>
                            </tr>

                            <?php 

                            while ( $f2=mysqli_fetch_array($complista)) {
                              ?>
                              
                               <tr>
                                <th ><?php echo $f2['id'];?></th>
                                <th ><?php echo $f2['marca'];?></th>
                                <th ><?php echo $f2['estado'];?></th>
                               </tr>

                              <?php                              
                            }
                            ?>

                            <tr>
                                <th colspan="3"><h3>Monitor</h3></th>
                            </tr>
                            
                            <?php 
                            while ( $f3=mysqli_fetch_array($monlista)) {
                              ?>
                                
                               <tr>
                                <th ><?php echo $f3['id'];?></th>
                                <th ><?php echo $f3['marca'];?></th>
                                <th ><?php echo $f3['estado'];?></th>
                               </tr>

                              <?php                              
                            }
                            ?>
                              <tr>
                                 <th colspan="3"><h3>Impressora</h3></th>
                               </tr>
                              <?php
                            while ( $f4=mysqli_fetch_array($implista)) {
                              ?>
                              
                               <tr>
                                <th ><?php echo $f4['id'];?></th>
                                <th ><?php echo $f4['marca'];?></th>
                                <th ><?php echo $f4['estado'];?></th>
                               </tr>

                              <?php                              
                            }
                            ?>
                            <tr>
                                <th colspan="3"><h3>Projector</h3></th>
                              </tr>
                              <?php
                            while ( $f5=mysqli_fetch_array($projectorlista)) {
                              ?>
                                
                               <tr>
                                <th ><?php echo $f5['id'];?></th>
                                <th ><?php echo $f5['marca'];?></th>
                                <th ><?php echo $f5['estado'];?></th>
                               </tr>
                              <?php                              
                            }
                            ?>
                            <tr>
                                <th colspan="3"><h3>Rato</h3></th>
                              </tr>
                              <?php
                            while ( $f6=mysqli_fetch_array($ratolista)) {
                              ?>
                                
                               <tr>
                                <th ><?php echo $f6['id'];?></th>
                                <th ><?php echo $f6['marca'];?></th>
                                <th ><?php echo $f6['estado'];?></th>
                               </tr>
                              <?php                              
                            }
                            ?>
                            <tr>
                                <th colspan="3"><h3>Teclado</h3></th>
                              </tr>

                            <?php
                             while ( $f7=mysqli_fetch_array($teclista)) {
                              ?>
                                
                               <tr>
                                <th ><?php echo $f7['id'];?></th>
                                <th ><?php echo $f7['marca'];?></th>
                                <th ><?php echo $f7['estado'];?></th>
                               </tr>
                              <?php                              
                            }

                          }
                          ?>                    
                        </tbody>
                      </table>
                    </div>                   
                    <br>                  
                </div>
            </div>
        </div>
      </div>
      <?php include  'common_footer.php';?>
	</body>
</html>