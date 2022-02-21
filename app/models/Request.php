<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Request extends DBAbstractModel {
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
    private $title;
    private $description;
    private $completed;
    private $idSuperhero;
    private $idCitizen;
    private $created_at;
    private $updated_at;

    public function setId($id) {
        $this->id = $id;
    }
    public function setTitle($title) {
        $this->title = $title;
    }
    public function setDescription($description) {
        $this->description = $description ;
    }
    public function setCompleted($completed) {
        $this->completed = $completed ;
    }
    public function setIdSuperhero($idSuperhero) {
        $this->idSuperhero = $idSuperhero ;
    }
    public function setIdCitizen($idCitizen) {
        $this->idCitizen = $idCitizen ;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO request(title, description, completed, isSuperhero, idCitizen)
                        VALUES(:title, :description, :completed, :isSuperhero, :idCitizen)";
        $this->parametros['title']= $this->title;
        $this->parametros['description']= $this->description;
        $this->parametros['completed']= $this->completed;
        $this->parametros['isSuperhero']= $this->isSuperhero;
        $this->parametros['idCitizen']= $this->idCitizen;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function getAllWhereIdSuperhero($idSuperhero=''){
        $this->query = "SELECT * FROM request WHERE idSuperhero = :idSuperhero";
        //Cargamos los parámetros.
        $this->parametros['idSuperhero']= $idSuperhero;
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
    public function get($id=''){
        $this->query = "
            SELECT *
            FROM request
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
        $this->query = "UPDATE request SET title= :title, description= :description, completed= :completed, isSuperhero= :isSuperhero, idCitizen= :idCitizen, updated_at=CURRENT_TIMESTAMP WHERE id= :id";
        $this->parametros['title']= $this->title;
        $this->parametros['description']= $this->description;
        $this->parametros['completed']= $this->completed;
        $this->parametros['isSuperhero']= $this->isSuperhero;
        $this->parametros['idCitizen']= $this->idCitizen;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH editado correctamente';
    }

    public function delete($id){
        $this->query = "DELETE FROM request WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

}
?>