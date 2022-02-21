<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Superhero extends DBAbstractModel {
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
    private $img;
    private $evolution_type;
    private $idUser;
    private $created_at;
    private $updated_at;

    public function setId($id) {
        $this->id = $id;
    }
    public function setName($name) {
        $this->name = $name;
    }
    public function setImg($img) {
        $this->img = $img;
    }
    public function setEvolution_type($evolution_type) {
        $this->evolution_type = $evolution_type;
    }
    public function setId_User($idUser) {
        $this->idUser = $idUser;
    }
    public function getMensaje(){
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO superheros(name, img, evolution_type, idUser)
                        VALUES(:name, :img, :evolution_type, :idUser)";
        $this->parametros['name']= $this->name;
        $this->parametros['img']=$this->img;
        $this->parametros['evolution_type']="Principiante";
        $this->parametros['idUser']=$this->idUser;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id=''){
        $this->query = "
            SELECT *
            FROM superheros
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

    public function getByIdUser($idUser=''){
        $this->query = "
            SELECT *
            FROM superheros
            WHERE idUser = :idUser";
        //Cargamos los parámetros.
        $this->parametros['idUser']= $idUser;

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

    public function getAll(){
        $this->query = "SELECT * FROM superheros";
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

    public function getContains($input){
        $this->query = "
                    SELECT *
                    FROM superheros
                    WHERE name LIKE CONCAT('%',:name,'%')";
        //Cargamos los parámetros.
        $this->parametros['name']= $input;

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
        $this->query = "UPDATE superheros SET name= :name, img= :img, updated_at=CURRENT_TIMESTAMP WHERE id= :id";
        $this->parametros['name']= $this->name;
        $this->parametros['img']= $this->img;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH editado correctamente';
    }

    public function delete($id){
        $this->query = "DELETE FROM superheros WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

}
?>