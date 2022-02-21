<?php
namespace App\Controllers;

use App\Models\Superheros_abilities;

class AbilityController extends BaseController{

    public function ShowAbilitiesAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);

        $data = array();
        $abilitiesSuperhero = Superheros_abilities::getInstancia();
        $data = $abilitiesSuperhero->getAllWhereHero($id);
        $this-> renderHTML('../views/hero-abilities_view.php',$data);
    }

    public function DeleteAbilityAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $id = end($elementos);

        $objSuperheros_abilities = Superheros_abilities::getInstancia();
        $objSuperheros_abilities->delete($id);
        header('Location: /home');
    }
}