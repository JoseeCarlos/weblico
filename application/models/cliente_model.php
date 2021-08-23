<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Cliente_model extends CI_Model {
	public function listarclientes(){
		$this->db->select('*');
		$this->db->from('cliente');
		return $this->db->get();
	}
	public function recuperarcliente($id)
	{
		$this->db->select('*');
		$this->db->from('clientes');
		$this->db->where('id',$id);
		return $this->db->get();
	}
	public function modificarcliente($id,$data)
	{
		$this->db->where('id',$id);
		$this->db->update('clientes',$data);
	}

	public function agregarcliente($data)
	{
		$this->db->insert('clientes',$data);
	}
	public function eliminarcliente($id){
		$this->db->where('id',$id);
		$this->db->delete('clientes');
	}
	
	
}