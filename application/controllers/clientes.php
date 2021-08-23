<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Clientes extends CI_Controller {
	public function index()
	{
		$listaclientes=$this->cliente_model->listarclientes();
		$data['clientes']=$listaclientes;
		$this->load->view('inc/head');
		$this->load->view('lista_view',$data);
		$this->load->view('inc/footer');
	}
	public function prueba(){
		$query=$this->db->get('clientes');
		$execonsulta=$query->result();
		print_r($execonsulta);
	}
	public function modificar()
	{
		$id=$_POST['id'];
		$data['infocliente']=$this->cliente_model->recuperarcliente($id);
		
		$this->load->view('update_clientes',$data);
		
	}
	public function modificardb()
	{
		$id=$_POST['id'];
		$data['nombre']=$_POST['nombre'];
		$data['correo']=$_POST['email'];
		$data['zip']=$_POST['zip'];
		$data['telefono1']=$_POST['telefono1'];
		$data['telefono2']=$_POST['telefono2'];
		$data['pais']=$_POST['pais'];
		$data['direccion']=$_POST['direccion'];
		
		$this->cliente_model->modificarcliente($id,$data);
		redirect('usuario/panel','refresh');
	}
	public function agregar()
	{
		
		$this->load->view('new_clientes');
		
	}
	public function agregardb()
	{
		$data['nombre']=$_POST['nombre'];
		$data['correo']=$_POST['email'];
		$data['zip']=$_POST['zip'];
		$data['telefono1']=$_POST['telefono1'];
		$data['telefono2']=$_POST['telefono2'];
		$data['pais']=$_POST['pais'];
		$data['direccion']=$_POST['direccion'];

		$this->cliente_model->agregarcliente($data);
		redirect('usuario/panel','refresh');
	}
	public function eliminardb()
	{
		$id=$_POST['id'];
		$this->cliente_model->eliminarcliente($id,$data);
		redirect('usuario/panel','refresh');
	}
	
	
	
}