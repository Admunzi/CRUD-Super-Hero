<?php
namespace App\Controllers;

use App\Models\Ability;
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

    public function AddAbilityAction($requestWeb){
        $elementos = explode('/',$requestWeb);
        $idHero = end($elementos);
        $data = array();

        if (isset($_POST['selectAbilities'])) {
            if ($_POST['selectAbilities'] != "" && $_POST['inputValue'] != "") {
                $abilitiesSuperhero = Superheros_abilities::getInstancia();
                $abilitiesSuperhero->setId_superhero($idHero);
                $abilitiesSuperhero->setId_ability($_POST['selectAbilities']);
                $abilitiesSuperhero->setValue($_POST['inputValue']);

                $abilitiesSuperhero->set();
            }
        }elseif (isset($_POST['inputName'])) {
            if ($_POST['inputName'] != "") {
                $ability = Ability::getInstancia();
                $ability->setName($_POST['inputName']);
                $ability->set();    
            }
        }

        $abilitiesSuperhero = Ability::getInstancia();
        $data = $abilitiesSuperhero->getAll();
        $this-> renderHTML('../views/add_ability_view.php',$data);    
    }
}