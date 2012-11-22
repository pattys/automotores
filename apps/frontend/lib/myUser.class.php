<?php //esta es la clase de los logueos,representa la sesion
//aca se agregan todois los metodos que queramos

class myUser extends sfBasicSecurityUser
{
     protected $usuario_db;

    public function iniciarSesion(Usuarios $usuario){                
        //guardo el objeto usuario en la sesion
        
       
        //Seteo el atributo "nombre" del usuario
       
        $this->setAttribute("usser", $usuario->getNombre());
        $this->setAttribute("clave", $usuario->getContrasenia());
        //Seteo el atributo "dni" del usuario
        $this->setAuthenticated(true);
    }       
     
    
    public function cerrarSesion(){       
        $this->getAttributeHolder()->clear();
        $this->setAuthenticated(false);
        $this->clearCredentials();
    }
    
    public function setErrorLogin($msj){
        $this->setAttribute('error_login',$msj);        
    }
    
    public function setPassword($nuevo_pass){
        $this->setAttribute('pass',$nuevo_pass);        
    }
    
    public function getErrorLogin(){
        return $this->getAttribute('error_login',"");        
    }
    
    public function removerErrorLogin(){
        $this->getAttributeHolder()->remove('error_login');
    }        
    
}
