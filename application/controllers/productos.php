<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Productos extends CI_Controller {
	public function index()
	{
		$listaprod=$this->producto_model->listarproduct();
		$data['producto']=$listaclientes;
	
		$this->load->view('pageproducto',$data);
		
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
		$listacategoria=$this->producto_model->listarcategoria();
		$data['categoria']=$listacategoria;
		$this->load->view('page_newproducto',$data);
		
	}
	public function agregardb()
	{
		$data['nombre']=$_POST['nombre'];
		$data['precio']=$_POST['precio'];
		$data['descripcion']=$_POST['descripcion'];
		$data['stock']=$_POST['stock'];
		$data['categoriaId']=$_POST['categoriaId'];
		$data['fechaVencimiento']=$_POST['fechaVencimiento'];
		$data['presentacion']=$_POST['presentacion'];
		$consulta="";
		$this->producto_model->agregarproducto($data);
		$consulta=$this->producto_model->getmaxid();
		if ($consulta->num_rows() > 0) {
			foreach ($consulta->result() as $row ) {
				$id=$row->Id;
				if ($_FILES['foto']['type']=='image/png') {
					copy($_FILES['foto']['tmp_name'],'img/'.$id.'.png');
					$data1['foto']=$id.'.png';
					$this->producto_model->agregarfoto($data1,$id);
				}

			}
			redirect('productos/','refresh');

			
		}
		else{
			
		}


	
	
	}
	public function eliminardb()
	{
		$id=$_POST['id'];
		$this->cliente_model->eliminarcliente($id,$data);
		redirect('usuario/panel','refresh');
	}
	
	
	
}