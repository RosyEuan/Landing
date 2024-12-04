<?php

class Forms extends CI_Controller {

    public function __construct() {
        parent::__construct();
        $this->load->helper(["url", "form"]);
        $this->load->library(["session", "MedooLib"]);
        $this->load->model("Formularios");
    }

    public function contacto() {
        // Recibe los datos en JSON
        $input = json_decode($this->input->raw_input_stream, true);

        // Valida que se hayan enviado todos los campos necesarios
        if (!isset($input['nombre1'], $input['telefono1'], $input['correo1'])) {
            echo json_encode(['status' => 'error', 'message' => 'Faltan campos por completar']);
            return;
        }

        // Limpia los datos recibidos
        $nombre = htmlspecialchars($input['nombre1'], ENT_QUOTES, 'UTF-8');
        $telefono = htmlspecialchars($input['telefono1'], ENT_QUOTES, 'UTF-8');
        $correo = htmlspecialchars($input['correo1'], ENT_QUOTES, 'UTF-8');

        // Intenta insertar los datos en la base de datos
        $insertado = $this->Formularios->insertarContacto($nombre, $telefono, $correo);

        if ($insertado) {
            echo json_encode(['status' => 'success', 'message' => 'El contacto se guardó correctamente']);
        } else {
            echo json_encode(['status' => 'error', 'message' => 'Hubo un problema al guardar el contacto']);
        }
    }
}
