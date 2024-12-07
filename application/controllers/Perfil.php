<?php
class Perfil extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->model('PerfilModel');
        $this->load->library('form_validation');
        $this->load->library('session');
    }

}
?>
