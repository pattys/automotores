       <br><br> <br>
           <?php if (!($sf_user->isAuthenticated())): ?>      
          <h1>Gestion Automotor - Provincia del Chubut</h1>
          <?php  use_stylesheet('apariencia.css');?>
          <link href='http://fonts.googleapis.com/css?family=Crete+Round' rel='stylesheet' type='text/css'>
          
          <center>
          <div id="cabecera"> 
              <div id="text_cabecera"> Gestion Automotor<br>Provincia del Chubut</div>
              <div id="img_cabecera"><img src="<?php echo image_path('escudo_chubut.png');?>" width="100" height="100"></div>
          </div>
          </center>
  
        <br>
        <center>
        <div id="contenedor">
            <div id="login">
                <form method="post">
                Usuario<br>   
                <input type ="text"  name="usser"/><br><br>
                Contraseña<br>
                <input type ="password"  name="clave"/><br><br>
                <input type="submit" value="Entrar"/><br>
                </form>              
            </div>
        </div>
        </center>
        			
   
    
    <footer>
        
        <div id="creditos">Todos los derechos reservados<br>
            Nestor Aspiroz | Estrada Patricia
        </div>
      <?php else:?>  
        <a href="<?php echo url_for('auto/index') ?>"></a>
     <?php endif;?>   
    </footer>

