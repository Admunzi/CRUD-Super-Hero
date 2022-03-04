<?php
namespace App\Controllers;

use App\Models\Request;
use App\Models\Superhero;

class RequestController extends BaseController{

    public function ShowRequestAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);

        $data = array();
        $requestSuperhero = Request::getInstancia();
        $data = $requestSuperhero->getAllWhereIdSuperhero($id);
        $this-> renderHTML('../views/hero-request_view.php',$data);
    }

    public function DeleteRequestAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);

        //Security layer
        if ($_SESSION['idProfile'] != $id) {
            header('Location: /home');
        }

        $objRequest = Request::getInstancia();
        $objRequest->delete($id);
        header('Location: /home');
    }
    
    public function CompleteRequestAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $idRequest = $elementos[count($elementos)-2];
        $idHero = end($elementos);

        //Security layer
        if ($_SESSION['idProfile'] != $idHero) {
            header('Location: /home');
        }
        
        $objRequest = Request::getInstancia();
        $objRequest->setId($idRequest);
        $objRequest->setCompleted(1);
        $objRequest->completeRequestById();
        
        //SI NO ES EXPERTO
        $objHero = Superhero::getInstancia();
        $dataHero = $objHero->get($idHero);

        if ($dataHero[0]['evolution_type'] != 'Expert') {
            //SI TIENE 3 SOLICITUDES CAMBIAR A EXPERTO EN BD Y PERFIL
            $dataRequest = $objRequest->getCountRequestFromHero($idHero);
            if (count($dataRequest) == 3) {
                $objHero->setId($idHero);
                $objHero->changeEvolutionType();
                $_SESSION['profile'] = "SuperHero";
            }
        }

        header('Location: /home');
    }
    
    public function AddRequestAction($requestWeb){
        $data = array();
        $elementos = explode('/',$requestWeb);
        $idHero = end($elementos);

        if (isset($_POST['inputTitle'])) {
            $formulario = ($_POST["inputTitle"] == "" && $_POST["inputDescription"] == "" ) ? false: true;

            if ($formulario) {
                //Creamos el superheroe
                $objRequest = Request::getInstancia();
                $objRequest->setTitle($_POST["inputTitle"]);
                $objRequest->setDescription($_POST["inputDescription"]);
                $objRequest->setCompleted(0);
                $objRequest->setIdSuperhero($idHero);
                $objRequest->setIdCitizen($_SESSION['idProfile']);
                $objRequest->set();
                var_dump($objRequest);
                header('Location: /request/'.$idHero);
            }
        }
        $this-> renderHTML('../views/add_request_view.php',$data);
    }
    
}