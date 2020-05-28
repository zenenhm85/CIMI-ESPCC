<?php 
session_start();
if(!isset($_SESSION['Usuario'])){
        exit();                                 
    }  
?>
<!DOCTYPE html>
<html lang="pt">
	<head>
		<title>CONTROLO DE INVENTÁRIO DE MATERIAIS INFORMÁTICOS NA ESPCC</title>
		<?php include  'common_head.php';?>
	</head>
	<body>
		<!-- -----------------Nav Bar---------------------------------------- -->
         <?php include  'nav.php';?>
    <!-- -----------------FIM Nav Bar---------------------------------------- -->
		<div class="container-fluid">
            <div class="row">
    <!-- -----------------Menu esquerdo---------------------------------------- -->
                <div class="col-5 col-sm-3 col-md-2 col-lg-2 col-xl-2 menu">
                    <?php include  'menu.php';?>
                </div>
    <!-- -----------------FIM Menu esquerdo---------------------------------------- -->
                <div class="col-7 col-sm-9 col-md-10 col-lg-10 col-xl-10">
                    <br><br>
                    <img src="img/principal.jpg" class="img-fluid" alt="invESPCC">
                </div>
            </div>
        </div>

        

        <?php include  'common_footer.php';?>
	</body>
</html>