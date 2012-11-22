<?php

/**
 * pag_ini actions.
 *
 * @package    automotores
 * @subpackage pag_ini///// aqui se modifuco por default
 * @author     Your name here
 * @version    SVN: $Id: actions.class.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class defaultActions extends sfActions 
{
  public function executeLogin(sfWebRequest $request)
  {
     /* $this->getUser()->setAuthenticated(false);
        $this->getUser()->getAttributeHolder()->clear();
        $this->redirect(""); 
  /* * 
   * ************************************
 */
   
       
     if($request->isMethod(sfWebRequest::POST)){
          $usuario = $request->getParameter("usser"); //obtengo el usuario ingresado
          $pass = $request->getParameter("clave"); //obtengo el password del usuario
                 
          if (($usuario !='') AND ($pass !='')){  //si ninguno es cadena vacia
               
                $user = $this->esLoginCorrecto($usuario,$pass);                
                if (!empty($user)){ //Compruebo si encontro un usuario correcto
                    $this->getUser()->iniciarSesion($user); //Si son correctos, inicio sesion                    
                    //return $this->redirect($url);//'@homepage'); //vuelvo a cargar el home
                    return $this->redirect('auto/index');
                }else{
                    
                    $this->mje = "Usuario o Password Incorrectos";                    
                    return sfView::ERROR;
                }                
          }else{
              
              $this->mje = "Usuario y/o Password Vacíos";
              return sfView::ERROR;
          }
       }           
  }
           
  private function esLoginCorrecto($usuario,$pass){  
      
      $user_ok = UsuariosQuery::create();
      $user_ok->filterByNombre($usuario);
      $user_ok->filterByContrasenia($pass);
      
      $usr = $user_ok->findOne();      
       return $usr; 
  }    
 
  public function executeSalir(sfWebRequest $request){
      $this->getUser()->cerrarSesion();      
      return $this->redirect('pro_uni/uni');
  }
       
}
