<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuarios extends CI_Controller {
	public function index()
	{
		$listausuario=$this->usuario_model->listarclientes();
		$data['usuarios']=$listausuario;
		$this->load->view('inc/head');
		$this->load->view('lista_view',$data);
		$this->load->view('inc/footer');
	}
	public function prueba(){
		$query=$this->db->get('usuarios');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
	public function modificar()
	{
		$id=$_POST['id'];
		$data['infousuario']=$this->usuario_model->recuperarusuario($id);
		
		$this->load->view('update_usuarii',$data);
		
	}
	public function modificardb()
	{
		$id=$_POST['Id'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['genero']=$_POST['genero'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		$data['password']=$_POST['password'];
		
		$this->usuario_model->modificarusuario($id,$data);
		redirect('usuario/panel','refresh');
	}
	public function agregar()
	{
		
		$this->load->view('new_usuario');
		
	}
	public function agregardb()
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['genero']=$_POST['genero'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['direccion']=$_POST['direccion'];
		$data['telefono']=$_POST['telefono'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		$data['password']=$_POST['password'];


		$this->usuario_model->agregarusuario($data);
		redirect('usuario/panel','refresh');
	}
	public function eliminardb()
	{
		$id=$_POST['id'];
		$this->usuario_model->eliminarusuario($id,$data);
		redirect('usuario/panel','refresh');
	}
	
	
	
}