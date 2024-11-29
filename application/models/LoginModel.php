<?php

class LoginModel extends CI_Model{

    protected $db;
  
    public function __construct() {
        parent::__construct();
        $this->load->library("MedooLib");
        $this->db = $this->medoolib->getInstance();
    }

    public function getLogin($usuario) { 
        try {
            $result = $this->db->select("usuarios", "*", [
                "usuario" => $usuario
            ]);
    
            return $result;
        } catch (Exception $e) {
            log_message('error', 'Error en consulta: ' . $e->getMessage());
            return false; 
        }
    }
    public function getRegistro(
        $registro_nombre,
        $registro_apellido,
        $registro_correo,
        $registro_telefono,
        $registro_usuario,
        $registro_contraseña
      ){
        try {

           $existing_user = $this->db->select('usuarios', '*', [
                'usuario' => $registro_usuario 
            ]);
            $existing_email = $this->db->select('usuarios','*',[
                'correo' => $registro_correo
            ]);
            $existing_telefono = $this->db->select('usuarios','*',[
                'telefono' => $registro_telefono
            ]);


            if($existing_user){
                return 1;
             }
             else if($existing_email){
                return 2;
             }
             else if($existing_telefono){
                return 3;
             }  
                 $resultado = $this->db->insert('usuarios', [
                    'nombre' => $registro_nombre,
                    'apellido' => $registro_apellido,
                    'correo' => $registro_correo,
                    'telefono' => $registro_telefono,
                    'usuario' => $registro_usuario,
                    'contraseña' => $registro_contraseña
            ]);
            return $resultado; 
        }
        catch(Exception $e){
            log_message('error', 'Error en consulta: ' . $e->getMessage);
            return false;
        }
    }



}
?>