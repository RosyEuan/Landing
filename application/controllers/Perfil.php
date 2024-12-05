<?php
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PerfilModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

    public function obtenerNombre() {
        // Verificar que el usuario tiene una sesión activa
        $id_usuario = $this->session->userdata('id_usuario');

        if ($id_usuario) {
            // Obtener datos del usuario
            $nombre = $this->PerfilModel->NombreApellido($id_usuario);

            // Depuración
            log_message('info', 'Resultado obtenido: ' . print_r($nombre, true));

            if (!empty($nombre)) {
                echo json_encode(['status' => 'success', 'data' => $nombre]);
            } else {
                echo json_encode(['status' => 'error', 'message' => 'No se encontraron datos del usuario']);
            }
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Sesión no iniciada']);
        }
    }
}
?>
