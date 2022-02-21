<?php
namespace App\Controllers;

use App\Models\Superhero;
use App\Models\User;

class SuperheroController extends BaseController{

    public function AddSuperheroAction(){
        if (isset($_POST['inputName'])) {
            //Comprobamos que el nombre no es vacio ni el fichero esta erroneo
            $formulario = ($_POST["inputName"] == "" && $_FILES['file']['error'] == 0 && $_POST["inputUser"] == "" && $_POST["inputPassw"] == "") ? false: true;

            if ($formulario) {
                $a_Nombre = explode(".",$_FILES['file']['name']);
                $ext = end($a_Nombre);

                //Comprobamos si el fichero tiene el formato correcto
                if (($_FILES["file"]["size"] < MAXSIZE) && (in_array($ext, ALLOWEDEXTENSION)) && (in_array($_FILES["file"]["type"], ALLOWEDFORMAT))) {
                    
                    $usuario = User::getInstancia();
                    //Si no existe el usuario lo creamos
                    if (empty($usuario->getByUser($_POST["inputUser"]))){
                        //Creamos el usuario
                        $usuario->setUser($_POST["inputUser"]);
                        $usuario->setPassword($_POST["inputPassw"]);
                        $usuario->set();

                        $idUser = $usuario->lastInsert();
                        $filename = $idUser."-".$_POST['inputName'].".".$ext;
                        move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);
                        
    
                        //Creamos el superheroe
                        $superheroe = Superhero::getInstancia();
                        $superheroe->setName($_POST["inputName"]);
                        $superheroe->setImg($filename);
                        $superheroe->setId_User($idUser);
                        $superheroe->set();
                        header('Location: /home');
                        }
                }
            }
        }
        $this-> renderHTML('../views/add_superhero_view.php');
    }

    public function DeleteSuperheroAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);
        $objSuperHero = Superhero::getInstancia();
        $objSuperHero->delete($id);
        header('Location: /home');
    }

    public function EditSuperheroAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);

        //Parametros para subida de archivos
        $data = array();
        $objSuperHero = Superhero::getInstancia();

        //Si entra por post el form
        if(isset($_POST['inputName']) && $_FILES['file']['error'] == 0){
            $a_Nombre = explode(".",$_FILES['file']['name']);
            $ext = end($a_Nombre);

            //Comprobamos si es valido el fichero
            if (($_FILES["file"]["size"] < MAXSIZE) && (in_array($ext, ALLOWEDEXTENSION)) && (in_array($_FILES["file"]["type"], ALLOWEDFORMAT))) {
                if ($_FILES["file"]["error"] > 0){
                } else {
                    $data = $objSuperHero->get($id);

                    unlink(DIRUPLOAD. $data[0]["img"] );
                    $filename = $id."-".$_POST['inputName'].".".$ext;
                    move_uploaded_file($_FILES["file"]["tmp_name"], DIRUPLOAD . $filename);

                    $superheroe = Superhero::getInstancia();
                    $superheroe->setId($id);
                    $superheroe->setName($_POST['inputName']);
                    $superheroe->setImg($filename);            
                    $superheroe->edit();
                    header('Location: /home');
                }
            }
        }else{
            $data = $objSuperHero->get($id);
        }


        $this-> renderHTML('../views/edit_superhero_view.php',$data);
    }
}