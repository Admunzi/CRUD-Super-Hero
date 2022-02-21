<?php
namespace App\Controllers;

use App\Models\Citizen;
use App\Models\Superhero;
use App\Models\User;

class IndexController extends BaseController{
    
    public function IndexAction(){
        $data = array();
        $superheroe = Superhero::getInstancia();

        if (isset($_POST['inputUser'])) {
            if ($_POST['inputUser'] != "" && $_POST['inputPassword'] != "") {
                //Comprobamos si el usuario está en la bd
                $userObj = User::getInstancia();
                $userObj->setUser($_POST['inputUser']);
                $userObj->setPassword($_POST['inputPassword']);

                $aDataUser = $userObj->getUserLogin();
                if (!empty($aDataUser)){
                    $idUser = $aDataUser[0]['id'];
                    //Comprobamos el rol superhero o ciudadano
                    $superheroObj = Superhero::getInstancia();
                    $aDataHero = $superheroObj->getByIdUser($idUser);

                    session_start();
                    if (!empty($aDataHero)){
                        $_SESSION['perfil'] = "Hero";
                    }else{
                        $citizenObj = Citizen::getInstancia();
                        $_SESSION['perfil'] = "Citizen";

                    }
                    
                    var_dump($_SESSION['perfil']);

                }
            }
        }
        
        if (isset($_POST['inputValue'])) {
            $valueInput = $_POST['inputValue'];
            $data = $superheroe->getContains($valueInput);
        }else{
            $data = $superheroe->getAll();
        }
        
        $this-> renderHTML('../views/index_view.php',$data);
    }
}

?>