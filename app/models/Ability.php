<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Ability extends DBAbstractModel {
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
    private $name;

    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function getMensaje(){
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO abilities(name) VALUES(:name)";

        $this->parametros['name']= $this->name;

        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id=''){
        $this->query = "
            SELECT *
            FROM abilities
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
        $this->query = "UPDATE abilities SET name= :name WHERE id= :id";
        $this->parametros['name']= $this->name;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH editado correctamente';
    }

    public function delete($id){
        $this->query = "DELETE FROM abilities WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }
    
    public function getAll(){
        $this->query = "
            SELECT *
            FROM abilities";

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