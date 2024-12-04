<?php
class Formularios extends CI_Model {

    public function __construct() {
        parent::__construct();
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }

    public function insertarContacto($nombre, $telefono, $correo) {
        $result = $this->db->insert('contacto', [
            'nombre' => $nombre,
            'telefono' => $telefono,
            'correo' => $correo
        ]);
    
        // Medoo devuelve un booleano, no un objeto con `rowCount`.
        return $result ? true : false;
    }
    



}