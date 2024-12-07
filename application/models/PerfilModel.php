<?php
class PerfilModel extends CI_Model {

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }

    public function actualizarUsuario($id_usuario, $datos) {
        // Usa el método update de Medoo
        $result = $this->db->update('usuarios', [
            'usuario'    => $datos['usuario'],
            'Telefono'   => $datos['Telefono'],
            'Correo'     => $datos['Correo']
        ], [
            'id_usuario' => $id_usuario
        ]);

        // Verifica si la operación fue exitosa
        if ($result->rowCount() > 0) {
            return true; // Actualización exitosa
        } else {
            return false; // Actualización fallida
        }
    }
}
?>
