<?php

class Login extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('LoginModel');
        $this->load->library('form_validation');
        $this->load->library("session");
    }

    public function iniciar()
    {
        log_message('info', 'Datos recibidos: ' . print_r($this->input->post(), true));
        $this->form_validation->set_rules('usuario', 'Usuario', 'required|trim');
        $this->form_validation->set_rules('contraseña', 'Contraseña', 'required|trim');

        if ($this->form_validation->run() === FALSE) {
            log_message('error', 'Errores de validación: ' . validation_errors());
            $response = [
                'status' => 'error',
                'message' => validation_errors()
            ];
            echo json_encode($response);
            return;
        }

        $usuario = $this->input->post('usuario');
        $password = $this->input->post('contraseña');
        // $hash = password_hash($password, PASSWORD_DEFAULT);

        log_message('info', 'Usuario recibido: ' . $usuario);
        log_message('info', 'Contraseña recibida: ' . $password);

        if (empty($password)) {
            log_message('error', 'Contraseña vacía');
            echo json_encode(['status' => 'error', 'message' => 'Contraseña vacía']);
            return;
        }

        $result = $this->LoginModel->getLogin($usuario);

        if ($result && isset($result[0]['contraseña']) && !empty($result[0]['contraseña'])) {

            if (password_verify($password, $result[0]['contraseña'])) {
                $this->session->set_userdata([
                    'nombre_usuario' => $result[0]['usuario'],
                    'id_usuario' => $result[0]['id_usuario'], // Guarda el id del usuario
                    'logged_in' => true
                ]);
                log_message('info', 'Inicio de sesión exitoso para: ' . $usuario);
                echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso']);
                return;
            } else {
                log_message('error', 'Contraseña incorrecta para el usuario: ' . $usuario);
                echo json_encode(['status' => 'error', 'message' => 'Usuario o contraseña incorrectos']);
                return;
            }
        } else {
            log_message('error', 'Usuario no encontrado: ' . $usuario);
            echo json_encode(['status' => 'error', 'message' => 'Usuario o contraseña incorrectos']);
        }
    }

    public function obtenerPerfil()
    {
        if (!$this->session->userdata('logged_in')) {
            echo json_encode(['status' => 'error', 'message' => 'Debe iniciar sesión para acceder al perfil']);
            return;
        }

        // Debugging para verificar la sesión
        log_message('info', 'ID de usuario en la sesión: ' . $this->session->userdata('id_usuario'));

        $id_usuario = $this->session->userdata('id_usuario');
        $datosUsuario = $this->LoginModel->getobtenerUsuarioPorId($id_usuario);

        if ($datosUsuario) {
            log_message('info', 'Datos del usuario obtenidos: ' . print_r($datosUsuario, true));
            echo json_encode(['status' => 'success', 'data' => $datosUsuario]);
        } else {
            log_message('error', 'No se encontraron datos para el ID de usuario: ' . $id_usuario);
            echo json_encode(['status' => 'error', 'message' => 'No se encontraron datos del usuario']);
        }
    }


    public function logout()
    {
        $this->session->sess_destroy(); // Elimina la sesion chavales
        echo json_encode(['status' => 'success', 'message' => 'Sesión finalizada']);
    }


    public function verificarSesion()
    {

        $usuario = $this->input->post('usuario');
        $password = $this->input->post('contraseña');
        $hash = password_hash($password, PASSWORD_DEFAULT);

        $result = $this->loginModel->getLogin('usuario');

        if (!empty($result) && password_verify($password, $hash)) {
            $this->session->set_userdata([
                'usuario' => $usuario,
                'id_usuario' => $result[0]['id'],
                'logged_in' => true
            ]);
            echo json_encode(['status' => 'success', 'message' => 'Inicio de sesión exitoso']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Usuario o contraseña incorrectos']);
        }
    }
}
