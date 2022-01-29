<?php
namespace App\Controllers;
//use Vendor\.. Si usamos un tercero (biblioteca)

class DefaultController extends BaseController{

    public function saludaAction(){
        $data = array();
        $this->renderHTML('../views/holamundo_view.php',$data);
    }

    private function diesPares(){
        $lista = array();
        for ($i=0; $i < 10; $i++) { 
            $lista[]= $i*2;
        }
        return $lista;
    }

    public function numerosAction(){
        $data = array();
        $data = $this->diesPares();
        $this->renderHTML('../views/numeros_view.php',$data);
    }
}



?>