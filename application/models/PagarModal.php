<?php
class PagarModal extends CI_Model{

    protected $db;

    public function __construct() {
        parent::__construct();
        $this->load->library("MedooLib");
        $this->db = $this->medoolib->getInstance(); // Carga la instancia de Medoo
    }
    
    public function buscarPlan($id_plan) {
        try {
            $result = $this->db->select('planes', 'nombre_plan', [
                'id_plan' => $id_plan
            ]);
    
            return $result ? $result[0] : false; // Devuelve el primer resultado o false si no hay datos
        } catch (Exception $e) {
            log_message('error', 'Error en consulta: ' . $e->getMessage());
            return false;
        }
    }

}

?>