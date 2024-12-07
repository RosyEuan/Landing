<?php
class Pagar extends CI_Controller{

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->load->model('PagarModal');
        $this->load->library('form_validation');
        $this->load->library('session');
        $this->load->library("MedooLib");
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }

    public function obtenerPlan() {
        
        $input = json_decode($this->input->raw_input_stream, true);
        $id_plan = $input['id_plan']; // Recibir el ID del formulario

        if (!is_numeric($id_plan)) {
            echo json_encode(['status' => 'error', 'message' => 'ID del plan inválido']);
            return;
        }
    
        $plan = $this->PagarModal->buscarPlan($id_plan);
    
        if ($plan) {
            log_message('info', 'Plan obtenido: ' . print_r($plan, true));
            echo json_encode(['status' => 'success', 'data' => $plan]);
        } else {
            log_message('error', 'No se encontró el plan con ID ' . $id_plan);
            echo json_encode(['status' => 'error', 'message' => 'No se encontraron datos del plan']);
        }
    }
    

    public function guardarDatos() {
        $input = json_decode(file_get_contents('php://input'), true);
    
        if (empty($input)) {
            echo json_encode(['success' => false, 'message' => 'Datos no recibidos']);
            return;
        }
    
        // Dividir los datos para las tablas
        $empresa = $input['empresa'];
        $tarjeta = $input['tarjeta'];
    
        // Obtener el ID del usuario desde la sesión
        $id_usuario = $this->session->userdata('id_usuario');
        if (!$id_usuario) {
            echo json_encode(['success' => false, 'message' => 'Usuario no identificado']);
            return;
        }
    
        // Insertar datos en la tabla empresa
        $insertEmpresa = $this->db->insert('empresa', [
            'id_usuario'      => $id_usuario,
            'nombre_empresa'  => $empresa['nombre_empresa'],
            'giro_comercial'  => $empresa['giro_comercial'],
            'num_empleados'   => $empresa['num_empleados']
        ]);
    
        // Insertar datos en la tabla pagos_tarjeta
        $insertTarjeta = $this->db->insert('pagos_tarjeta', [
            'id_usuario'      => $id_usuario,
            'num_tarjeta'     => $tarjeta['num_tarjeta'],
            'titular_tarjeta' => $tarjeta['titular_tarjeta'],
            'vencimiento'     => $tarjeta['vencimiento'],
            'cvv'             => $tarjeta['cvv'],
            'tipo_tarjeta'    => $tarjeta['tipo_tarjeta'],
        ]);
    
        if ($insertEmpresa && $insertTarjeta) {
            echo json_encode(['success' => true, 'message' => 'Datos guardados correctamente']);
        } else {
            echo json_encode(['success' => false, 'message' => 'Error al guardar datos']);
        }
    }



}

?>