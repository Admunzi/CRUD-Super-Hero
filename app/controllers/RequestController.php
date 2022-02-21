<?php
namespace App\Controllers;

use App\Models\Request;

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
        $objRequest = Request::getInstancia();
        $objRequest->delete($id);
        header('Location: /home');
    }
    
}