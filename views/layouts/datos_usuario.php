
          <div class="user-panel">
            <div class="pull-left image">
				<?php
				     $usuariox = ($_SESSION['usuariox']); 
				?>
             
              <?php
              	if(!empty($_SESSION['imagen_perfilx'])){
					echo '<img src="'.$imagen.'" class="img-circle" alt="User Image"/>';
				}else{
					echo '<img src="../../dist/img/fotos_usuarios/no_user.png" class="img-circle" alt="User Image"/>';
				}
				?>
            </div>
            <div class="pull-left info">
              <?php echo ' <p>'.$usuariox.'</p>'; ?>

              <a href="#"><i class="fa fa-circle text-success"></i> Activo</a>
            </div>
          </div>
