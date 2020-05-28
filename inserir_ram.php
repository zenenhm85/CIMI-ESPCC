<?php 
    session_start();
     if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Inserir RAM</title>
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
                    
                    <h1 class="h1">Inserir RAM</h1><hr>
                    <form action="listar_ram.php" method="post">
                        <div class="row">
                        <div class="col-12">
                          <div class="form-group">
                            <label>Tipo</label>
                            <input type="text" class="form-control" name="tiporam" placeholder="DDR, DDR2, DDR3, DDR4, etc">            
                          </div>  
                          <div class="form-group">
                            <label>Capacidade</label>
                            <input type="number" value="1" min="1" class="form-control" name="capacidaderam" placeholder="Em GB" onkeypress="return event.charCode >= 0 && event.charCode <= 1">
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