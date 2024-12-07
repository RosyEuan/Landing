<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Website extends CI_Controller {
	

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see https://codeigniter.com/userguide3/general/urls.html
	 */
	public function __construct() {
		parent::__construct();
		$this->load->library('MedooLib');
		$this->load->library("session");
	}
	public function index()
	{
		$logged_in = $this->session->userdata('logged_in');
		$this->load->view('puntoventa', ['logged_in' => $logged_in]);
	}

	public function perfil()
	{
		$logged_in = $this->session->userdata('logged_in');
		
		if (!$logged_in) {
			// Redirige a la página principal usando la base_url configurada
			redirect(base_url());
			return;
		}

		$this->load->view('perfil', ['logged_in' => $logged_in]);
	}

	public function editar_perfil()
	{
		$logged_in = $this->session->userdata('logged_in');
		
		if (!$logged_in) {
			// Redirige a la página principal usando la base_url configurada
			redirect(base_url());
			return;
		}

		$this->load->view('editar_perfil', ['logged_in' => $logged_in]);
	}

	// Ejemplo pa que vea belen TODO
	public function datos(){

		$db = $this->medoolib->getInstance();

		$existing_user = $db->select('usuarios', '*', [
			'usuario' => 'admin'
		]);
	
		// Si el usuario no existe, realizar la inserción
		if (empty($existing_user)) {
			$db->insert('usuarios', [
				'usuario' => 'admin',
				'contraseña' => 'ejemplo123',
				'nombre'  => 'Angel',
				'apellido'  => 'Chi',
				'Telefono' => '9988776655',
				'Correo' => 'correo@example.com'
			]);
		}
	
		// Obtener todos los usuarios con medoo
		$usuarios = $db->select('usuarios', '*');
		
		$data['usuarios'] = $usuarios;
		$this->load->view('datos', $data);
	}
}
