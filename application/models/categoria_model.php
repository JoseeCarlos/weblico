 <?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */ 
class Categoria_model extends CI_Model
{ 	
	public function agregarCategoria($data)
	{
		$this->db->insert('categoria', $data);		
	} 

	public function retornarCategorias()
	{
		$this->db->select('c.Id, c.nombreCategoria, c.estado');
		$this->db->from('categoria c');	
		return $this->db->get();
	}

	public function retornarCategoria($idcategoria)
	{
		$this->db->select('c.Id, c.nombreCategoria, c.estado');
		$this->db->from('categoria c');	
		$this->db->where('c.Id', $idcategoria);
				
		return $this->db->get();
	}

	public function eliminarCategoria($idcategoria)
	{
		$this->db->where('Id',$idcategoria);
		$this->db->delete('categoria');	
	}

	public function deshabilitarCategoria($idcategoria)
	{
		$this->db->set('estado','0');
		$this->db->where('Id',$idcategoria);
		$this->db->update('categoria');				
	}

	public function habilitarCategoria($idcategoria)
	{
		$this->db->set('estado','1');
		$this->db->where('Id',$idcategoria);
		$this->db->update('categoria');				
	}

	public function modificarCategoria($idcategoria,$data)
	{
		
		$this->db->where('Id',$idcategoria);
		$this->db->update('categoria',$data);	
	}

}


