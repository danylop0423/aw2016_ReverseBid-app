<?php

class UserController extends AbstractController
{
	
	public function editProfileAction($request, $response, $args)
    {
	  $loggedUser = $request->getAttribute('loggedUser');
	  $args['title'] = 'Edita Tus Datos';
	  if($loggedUser){
		
		if($request->isPost()){
     		return self::solve_editProfile_post($request, $response, $args,$loggedUser);
		}
		 else{   //si se trata de una petición Get:
		   $args['title'] = 'Edita Tus Datos';
		   $args['loggedUser'] = $loggedUser;	
		   return $this->render($response, 'editProfile.php', $args);
		   }
	 
	  }else{ 
		$args['error'] = 'Estas intentando acceder sin permisos';
		return $this->render($response, 'home.php', $args);}
   }
		
	
    public function showProfileAction($request, $response, $args)
    {
        $args['title'] = 'Mi Perfil';
        $loggedUser = $request->getAttribute('loggedUser');
		$picDefault="/assets/images/add_user.png";
        if ($loggedUser) {
			if(!$loggedUser['foto'])
				$loggedUser['foto']=$picDefault;										 
			$args['loggedUser'] = $loggedUser;
			return $this->render($response,'profile.php', $args);
        }else {
         $args['error'] = 'Primero debes iniciar sesión';
		 return $this->render($response,'login.php', $args);
     }
 }

    public function createUserAction($request, $response, $args)
    {
        $args['title'] = 'Nuevo usuario';

        if ($request->isPost()) {
            $user = $request->getParam('user');
            if (!$this->userExists($user['email'])) {
                unset($user['password-r']);

                //encriptar contraseña
                $user = $this->generatePassword($user);

                $id = $this->db->insert(array_keys($user))
                    ->into('usuarios')
                    ->values(array_values($user))
                    ->execute()
                ;



                if ($id) {
                    $args['title'] = 'Bienvenido ' . $user['nombre'];
                    $user['id']=$id;
					$args['loggedUser'] = $user;
                    $_SESSION['loggeduser'] = base64_encode(serialize($user));

                    return $this->render($response, 'home.php', $args);
                }

                $args['error'] = 'Error al crear el usuario, vuelva a intentarlo';
            } else {
                $args['error'] = 'El usuario introducido ya existe';
            }
        }

        return $this->render($response, 'createUser.php', $args);
    }

	
//PRIVATE FUNCTIONS:
	
    private function userExists($email)
    {
        $user = $this->db->select()
            ->from('usuarios')
            ->where('email', '=', htmlspecialchars($email))
            ->execute()
            ->fetch()
        ;

        return $user !== false;
    }
	
	
   private function solve_editProfile_post($request,$response,$args,$loggedUser){
		   $picDefault="/assets/images/add_user.png";
		   $newUser = $request->getParam('user');
		   $newUser['id']=$loggedUser['id'];
		   if(!$newUser['foto'])
				$newUser['foto']=$picDefault;	
		   else 
			   $newUser['foto']=self::proc_profileImage($loggedUser['id']);
		   
		   if($newUser['foto'][0]!=='/'){
                $args['error'] = $newUser['foto'];
				return $this->render($response, 'editProfile.php', $args);
			   } 		       			   
		   
		   foreach ($newUser as $clave => $valor){
			   $newUser[$clave]=htmlspecialchars(trim(strip_tags($valor)));}
		   
		   if($newUser['password']){
				if($newUser['password']===$newUser['password-r']){
					$newUser=$this->generatePassword($newUser);
				}else{
					$args['error'] = 'Las contraseñas no coinciden!!';
					return $this->render($response, 'editProfile.php', $args);
				}	 			   
		   }
		   else{
			   $newUser['password']=$loggedUser['password'];
			   $newUser['salt']=$loggedUser['salt'];
		   }
		   unset($newUser['password-r']);
		   $id = $this->db->update($newUser)
					  ->table('usuarios')
                      ->where('email','=',$loggedUser['email'])
					  ->execute()
                      ;
            //si se ha actualizado usuario correctamente o ambos son iguales
			//(porque la foto no se actualiza solo se sobrescribe en el dir del servidor ):				
		   if($id || $newUser['foto']===$loggedUser['foto']) {
			  $args['title'] = 'Mi Perfil';		
			  $newUser['id']=$loggedUser['id'];
			  $loggedUser=$newUser;
			  $_SESSION['loggeduser'] = base64_encode(serialize($loggedUser));									 
			  $args['loggedUser'] = $loggedUser;
			  $args['error'] = 'Tus datos se han Actualizado correctamente';
		      return $this->render($response, 'profile.php', $args);
		   }else{
			  $args['error'] = 'Error No se han podido actualizar tus datos vuelve a intentarlo';
		      return $this->render($response, 'editProfile.php', $args);}
		
	}
	
   
  private function proc_profileImage($originPic){ 
	$picDefault="/assets/images/add_user.png";
	$originFile=isset($_FILES['pic'])? $_FILES['pic']:false;
	
	if($originFile){
	  $originType=$originFile['type'];
	  if (((strpos($originType, "gif") || strpos($originType, "jpeg") ||strpos($originType, "jpg")) 
		     || strpos($originType, "png"))){
				  $dir='assets\images\users\\';
				  $tmpFile = $_FILES['pic']['tmp_name'];
				  $im = file_get_contents($tmpFile);
				  $dimensiones=getimagesize($tmpFile);
				  $ancho=$dimensiones[0];
				  $alto=$dimensiones[1];
				  
				  $myAuxImage=imagecreatefromstring($im);
				  $anchonuevo = 200;
				  $altonuevo = 250;

				  $newImage=imagecreatetruecolor($anchonuevo,$altonuevo);
				  imagecopyresampled($newImage,$myAuxImage,0,0,0,0,$anchonuevo, $altonuevo,$ancho,$alto);
				  imagedestroy($myAuxImage);
				  $calidad=100;

			
			      $newFullName="$originPic".".jpg";
 			      if(imagejpeg($newImage,$dir.$newFullName,$calidad)){   
				     return '/assets/images/users/'.$newFullName;
			      }
				  return "No se ha podido subir su imagen";
		  }
		  return "El fichero que intentas subir no es una Imagen";
	}	
    return $picDefault;
		
  }

  
  
	private function generatePassword($user){

		$pepper = 'estoeslaPimienta12389';
        $salt = rand(10000 , 99999);
        $user['salt'] = $salt;

        $pass = $salt;
        $pass .= $user['password'];
        $pass .= $pepper;
        $pass = hash('sha256', $pass);
        $user['password'] = $pass;

        return $user;

	}

	
}