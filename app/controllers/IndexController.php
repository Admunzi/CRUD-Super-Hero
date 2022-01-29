<?php
namespace App\Controllers;

use App\Models\Superheroe;

class IndexController extends BaseController{
    
    public function IndexAction(){
        $data = array();
        $superheroe = Superheroe::getInstancia();
        $data = $superheroe->getLast();
        $this-> renderHTML('../views/index_view.php',$data);
    }

    public function addAction(){
        if (isset($_POST['inputNombre'])) {
            $formulario = ($_POST["inputNombre"] == "" || $_POST["inputVelocidad"] == "") ? false: true;

            if ($formulario) {
                $superheroe = Superheroe::getInstancia();
                $superheroe->setNombre($_POST["inputNombre"]);
                $superheroe->setVelocidad($_POST["inputVelocidad"]);            
                $superheroe->set();
                header('Location:'.DIRBASEURL.'/home');
            }
        }

        //Si no llega post o ni valida
        $this-> renderHTML('../views/addSuperheroe_view.php');
    }

    public function delAction($request){
        $elementos = explode('/',$request);
        $id = end($elementos);
        $objSuperHeroe = Superheroe::getInstancia();
        $objSuperHeroe->delete($id);
        header('Location:'.DIRBASEURL.'/home');
    }

    public function editAction($request){
        $elementos = explode('/',$request);
        $id = end($elementos);

        if (isset($_POST['inputNombre'])) {
            $formulario = ($_POST["inputNombre"] == "" || $_POST["inputVelocidad"] == "") ? false: true;

            if ($formulario) {
                $superheroe = Superheroe::getInstancia();
                $superheroe->setId($id);
                $superheroe->setNombre($_POST["inputNombre"]);
                $superheroe->setVelocidad($_POST["inputVelocidad"]);            
                $superheroe->edit();
                header('Location:'.DIRBASEURL.'/home');
            }

        }else{
            $data = array();
            $objSuperHeroe = Superheroe::getInstancia();
            $data = $objSuperHeroe->get($id);
        }
        $this-> renderHTML('../views/editSuperheroe_view.php',$data);
    }
}

?>