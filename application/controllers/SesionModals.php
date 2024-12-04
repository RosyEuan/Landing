<?php
class SesionModals extends CI_Controller{

    public function __construct() {
        parent::__construct();
        $this->load->helper(["url", "form"]);
        $this->load->library(["session", "MedooLib"]);
        $this->load->model("Formularios");
    }

        public function sesion()
    {
        $activo = $this->session->userdata('logged_in'); // Verificar si está logueado
        $response = ['logged_in' => $activo ? true : false];
        echo json_encode($response);
    }



}

?>