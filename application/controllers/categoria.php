<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Categoria extends CI_Controller
{
public function listacategorias()
	{
		$data['categoria']=$this->producto_model->retornarCategorias();
		$this->load->view('inc/head');
		$this->load->view('listacategoria',$data);
		$this->load->view('inc/footer');
	}

	public function agregarcategoria()
	{
		$this->load->view('inc/head');
		$this->load->view('agregar_categoria'); 
		$this->load->view('inc/footer');		
	}

	public function agregar_categoriadb()
	{
		$nombreCategoria = $_POST['nombreCategoria'];	

		$data['nombreCategoria']=$nombreCategoria;		
		
		$this->producto_model->agregarcategoria($data);		
		$this->listacategorias();	  
        //$this->guardar_archivo();
	}

	public function modificar()
	{

		$idproducto=$_POST['idcategoria'];
		$data['categoria']=$this->producto_model->retornarCategoria($idcategoria);
		$this->load->view('inc/head');
		$this->load->view('modificar_categoria',$data);
		$this->load->view('inc/footer'); 
	}

	public function modificardb() 
	{
        $idcategoria=$_POST['idcategoria'];
		$nombreCategoria = $_POST['nombreCategoria'];
		

		$data['nombreCategoria']=$nombreCategoria;
		
		$this->producto_model->modificarCategoria($idcategoria,$data);
		
		redirect('categoria/listacategoria');
		   echo "Modificacion exitosa";
	}

	public function eliminardb()
	{			
		$idcategoria=$_POST['idcategoria'];
		$this->producto_model->eliminarCategoria($idcategoria);
		$this->listacategorias();
	}
	public function deshabilitardb()
	{
		$idcategoria=$_POST['idcategoria'];
		$this->producto_model->deshabilitarCategoria($idcategoria);
		$this->listacategorias();
	}

	public function habilitardb()
	{
		$idcategoria=$_POST['idcategoria'];
		$this->producto_model->habilitarCategoria($idcategoria);
		$this->listacategorias();
	}
}


?>

