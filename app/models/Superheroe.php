<?php

namespace App\Models;

#Importar modelo de abstraccion de base de datos
require_once('DBAbstractModel.php');

class Superheroe extends DBAbstractModel {
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
    private $nombre;
    private $velocidad;
    private $created_at;
    private $updated_at;

    public function setId($id) {
        $this->id = $id;
    }
    public function setNombre($nombre) {
        $this->nombre = $nombre;
    }
    public function setVelocidad($velocidad) {
        $this->velocidad = $velocidad ;
    }

    public function getMensaje(){
        return $this->mensaje;
    }

    public function set() {
        $this->query = "INSERT INTO superheroes(nombre, velocidad)
                        VALUES(:nombre, :velocidad)";
        $this->parametros['nombre']= $this->nombre;
        $this->parametros['velocidad']=$this->velocidad;
        $this->get_results_from_query();
        $this->mensaje = 'SH agregado correctamente';
    }

    public function get($id=''){
        $this->query = "
            SELECT *
            FROM superheroes
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

    public function getAll(){
        $this->query = "SELECT * FROM superheroes";
        //Cargamos los parámetros.
        //Ejecutamos consulta que devuelve registros.
        $this->get_results_from_query();
        foreach ($this->rows[0] as $propiedad=>$valor) {
            $this->$propiedad = $valor;
        }

        return $this->rows;
    }

    public function getLast(){
        $this->query = "SELECT *FROM superheroes ORDER BY id DESC LIMIT 5";
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
        $this->query = "UPDATE superheroes SET nombre= :nombre, velocidad= :velocidad, updated_at=CURRENT_TIMESTAMP WHERE id= :id";
        $this->parametros['nombre']= $this->nombre;
        $this->parametros['velocidad']= $this->velocidad;
        $this->parametros['id']= $this->id;
        $this->get_results_from_query();
        $this->mensaje = 'SH editado correctamente';
    }

    public function delete($id){
        $this->query = "DELETE FROM superheroes WHERE id = :id";
        $this->parametros['id']=$id;
        $this->get_results_from_query();
        $this->mensaje = 'SH eliminado';
    }

}
?>