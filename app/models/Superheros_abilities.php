<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Superheros_abilities extends DBAbstractModel {
    /*CONSTRUCCIÓN DEL MODELO SINGLETON*/
    private static $instancia;
    public static function getInstancia(){
        if (!isset(self::$instancia)) {
            $miclase = __CLASS__;
            self::$instancia = new $miclase;
        }
        return self::$instancia;
    }
    public function __clone(){
        trigger_error('La clonación no es permitida!.', E_USER_ERROR);
    }

    private $id;
    private $id_superhero;
    private $id_ability;
    private $value;

    public function setId($id) {
        $this->id = $id;
    }
    public function setId_superhero($id_superhero) {
        $this->id_superhero = $id_superhero;
    }
    public function setId_ability($id_ability) {
        $this->id_ability = $id_ability;
    }
    public function setValue($value) {
        $this->value = $value;
    }
    public function getMensaje(){
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO superheros_abilities(id_superhero, id_ability, value)
                        VALUES(:id_superhero, :id_ability, :value)";

        $this->parametros['id_superhero']= $this->id_superhero;
        $this->parametros['id_ability']=$this->id_ability;
        $this->parametros['value']=$this->value;

        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id=''){
        $this->query = "
            SELECT *
            FROM superheros_abilities
            WHERE id = :id";
        //Cargamos los parámetros.
        $this->parametros['id']= $id;

        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();

        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        }else {
            $this->mensaje = 'sh no encontrado';
        }
        return $this->rows;
    }

    public function edit() {
        $this->query = "UPDATE superheros_abilities SET id_superhero= :id_superhero, id_ability= :id_ability, value= :value WHERE id= :id";
        $this->parametros['id_superhero']= $this->id_superhero;
        $this->parametros['id_ability']= $this->id_ability;
        $this->parametros['value']= $this->value;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH editado correctamente';
    }

    public function delete($id){
        $this->query = "DELETE FROM superheros_abilities WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

    public function getAllWhereHero($idHero=''){
        $this->query = "SELECT superheros_abilities.id ,abilities.name, superheros_abilities.value FROM superheros_abilities INNER JOIN abilities 
            ON superheros_abilities.id_ability = abilities.id WHERE superheros_abilities.id_superhero = :id";

        $this->parametros['id']= $idHero;

        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();
        if(count($this->rows) == 1) {
            foreach ($this->rows[0] as $propiedad=>$valor) {
                $this->$propiedad = $valor;
            }
            $this->mensaje = 'sh encontrado';
        }else {
            $this->mensaje = 'sh no encontrado';
        }

        return $this->rows;
    }

}
?>