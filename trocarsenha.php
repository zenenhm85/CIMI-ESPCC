<?php 
  session_start();  
  if(!isset($_SESSION['Usuario'])){
        exit();                                 
    } 



  
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>Inserir Rato</title>
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
                  <h1 class="page-header blue">Trocar Senha Usuario</h1>
                  <form action="listar_rato.php" method="post">
                      <div class="row">
                      <div class="col-12">            
                        
                             <form>
                              <div class="form-group">
                                <label for="nome" >Nome Usuário:</label>
                                <input type="text" class="form-control" id="dnu" name="dnu" disabled value="<?php echo $_SESSION['Usuario'];?>">
                              </div>
                              <div class="form-group">
                                <label for="nome">Senha anterior:</label>
                                <input type="password" class="form-control" id="senhaanterior" name="senhaanterior" required>
                              </div>
                              <div class="form-group">
                                <label for="bi">Nova senha:</label>
                                <input type="password" class="form-control" id="novasenha" name="novasenha" required>
                              </div>
                              <div class="form-group">
                                <label for="pai">Repetir Nova senha:</label>
                                <input type="password" class="form-control" id="rnovasenha" name="rnovasenha" required>
                              </div>                              
                              <button type="button" id= "trocarsenha" class="btn btn-dark btn-lg">Trocar senha</button>
                              <button type="reset" class="btn btn-secondary btn-lg" style="float: right;">Apagar tudo</button>
                              <br><br>
                            </form> 
                        
                      </div>             
                    </div>
                  </form>                    
              </div>
            </div>
        </div>
        <?php include  'common_footer.php';?>
	</body>
</html>