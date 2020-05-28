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
		<title>Quantidades por departamentos</title>
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
                      <h1 class="h1 text-uppercase">Quantidades por departamentos</h1><hr>
                       <button type="button" class="btn btn-primary btn-lg"  id="excelrelatorio" >Excel</i></button>
                       <table class="table table-hover" id="listarelatorio">
                        <thead >
                          <tr class="table-primary" >
                            
                            <th scope="col">Acessório</th>
                            <th scope="col">Quantidade</th>
                                                                                                           
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
                              <th>Computador</th>
                              <th><?php echo mysqli_num_rows($complista); ?></th>
                            </tr>                  

                            <tr>
                              <th>Monitor</th>
                              <th><?php echo mysqli_num_rows($monlista); ?></th>
                            </tr>                            
                            
                            <tr>
                              <th>Impressora</th>
                              <th><?php echo mysqli_num_rows($implista); ?></th>
                            </tr>
                            
                            <tr>
                              <th>Projector</th>
                              <th><?php echo mysqli_num_rows($projectorlista); ?></th>
                            </tr>
                            
                            <tr>
                              <th>Rato</th>
                              <th><?php echo mysqli_num_rows($ratolista); ?></th>
                            </tr>
                            
                            <tr>
                              <th>Teclado</th>
                              <th><?php echo mysqli_num_rows($teclista);?></th>
                            </tr> 
                          <?php
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