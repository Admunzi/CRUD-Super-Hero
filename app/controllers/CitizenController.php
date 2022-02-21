<?php
namespace App\Controllers;

use App\Models\Citizen;
use App\Models\User;

class CitizenController extends BaseController{
    
    public function RegisterCitizenAction(){
        if (isset($_POST['inputName'])) {
            //Comprobamos que el nombre no es vacio ni el fichero esta erroneo
            $formulario = ($_POST["inputName"] == "" && $_POST["inputMail"] == "" && $_POST["inputUser"] == "" && $_POST["inputPassw"] == "") ? false: true;

            if ($formulario) {
                $usuario = User::getInstancia();
                //Si no existe el usuario lo creamos
                if (empty($usuario->getByUser($_POST["inputUser"]))){
                    //Creamos el usuario
                    $usuario->setUser($_POST["inputUser"]);
                    $usuario->setPassword($_POST["inputPassw"]);
                    $usuario->set();

                    $idUser = $usuario->lastInsert();                

                    //Creamos el superheroe
                    $citizen = Citizen::getInstancia();
                    $citizen->setName($_POST["inputName"]);
                    $citizen->setMail($_POST["inputMail"]);
                    $citizen->setId_User($idUser);
                    $citizen->set();
                    header('Location: /home');
                }
            }
        }
        $this-> renderHTML('../views/register-citizen.php');        
    }
}

?>