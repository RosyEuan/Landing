<?php
class PerfilModel extends CI_Model {

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }

    public function NombreApellido($id_usuario) {
        // Depuración: Verificar si el ID está llegando
        log_message('info', 'Buscando datos para ID usuario: ' . $id_usuario);

        // Consulta a la base de datos
        $resultado = $this->db->select('usuarios', ['nombre', 'apellido'], [
            'id_usuario' => $id_usuario
        ]);

        // Depuración: Verifica los resultados obtenidos
        log_message('info', 'Resultado de consulta: ' . print_r($resultado, true));

        return !empty($resultado) ? $resultado[0] : null;
    }
}
?>
