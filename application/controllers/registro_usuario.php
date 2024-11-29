<?php

class registro_usuario Extends CI_Controller{
 
    public function __construct() {
		
		$this->load->library('MedooLib');
	}

    public function agregar_usuario(){

        if(isset($_POST['registro_nombre']) && !empty($_POST['registro_nombre'])){
            $registro_nombre = $_POST['registro_nombre'];

            $sql = this->medoolib->getInstance();

            $sql->select('usuarios', '*' ,[
                'nombre' => $registro_nombre
            ]);

            $data['usuario'] = $sql;
            $this->load->view('datos', $data);
        }

    }
   

}


?>