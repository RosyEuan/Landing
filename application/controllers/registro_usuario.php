<?php

class registro_usuario Extends CI_Controller{
 
    public function __construct() {
		parent::__construct();
	
        $this->load->library('form_validation');
        $this->load->model('LoginModel');
	}

    public function agregar_usuario() {
        // Validación de los datos
        $this->form_validation->set_rules('registro_nombre', 'Nombre', 'required');
        $this->form_validation->set_rules('registro_apellido', 'Apellido', 'required');
        $this->form_validation->set_rules('registro_correo', 'Correo', 'required|valid_email');
        $this->form_validation->set_rules('registro_telefono', 'Teléfono', 'required|numeric');
        $this->form_validation->set_rules('registro_usuario', 'Usuario', 'required');
        $this->form_validation->set_rules('registro_contrasena', 'Contraseña', 'required|min_length[6]');
    
        if ($this->form_validation->run() === FALSE) {
        
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            echo json_encode($response);
            return;
        }
    
        // Si la validacion es correcta
        $registro_nombre = $this->input->post('registro_nombre');
        $registro_apellido = $this->input->post('registro_apellido');
        $registro_correo = $this->input->post('registro_correo');
        $registro_telefono = $this->input->post('registro_telefono');
        $registro_usuario = $this->input->post('registro_usuario');
        $registro_contrasena = password_hash($this->input->post('registro_contrasena'), PASSWORD_DEFAULT);
    
        $resultado = $this->LoginModel->getRegistro(
            $registro_nombre,
            $registro_apellido,
            $registro_correo,
            $registro_telefono,
            $registro_usuario,
            $registro_contrasena
         );

         if($resultado == 1){
            $response = [
           'status' => 'error',
           'message' => 'El nombre de usuario ya existe'
       ];
         }
         else if($resultado == 2){
            $response = [
                'status' => 'error',
                'message' => 'El correo electronico ya esta registrado'];
         }else if($resultado ==3){
            $response = [
                'status' => 'error',
                'message' => 'El número telefonico ya esta registrado'];
         }
        else if ($resultado) {
           
            $response = [
                'status' => 'success',
                'message' => 'Usuario registrado correctamente.'
            ];
        } 
        else {
           
            $response = [
                'status' => 'error',
                'message' => 'Hubo un problema al registrar el usuario.'
            ];
        }
        
        echo json_encode($response); 
        
    }
}
?>
