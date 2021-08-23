<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Principal extends CI_Controller {

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
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('inc/head');
		$this->load->view('principal_vista');
		$this->load->view('inc/footer');
	}
	public function registrar(){
		$nombre=$_POST['nombre'];
		$password=$_POST['password'];
		$repassword=$_POST['repassword'];
		if ($password==$repassword) {
			$mensaje="Usuario registrado";
		}else{
			$mensaje="error de password";
		}
		$data['nombre']=$nombre;
		$data['mensaje']=$mensaje;
		$this->load->view('resultado',$data);
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */