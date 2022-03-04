<?php
namespace App\Controllers;

use App\Models\Superhero;

class UserController extends BaseController{
 
    public function CloseSessionAction(){
        unset($_SESSION['profile']);
        unset($_SESSION['idProfile']);
        session_destroy();
        header('location: /home');
    }
}
?>