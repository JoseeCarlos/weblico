<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Provedor_model extends CI_Model {

	
	public function listarcategoria()
	{
		$this->db->select('*');
		$this->db->from('categoria');
		return $this->db->get();
	}
	public function agregardb($data)
	{
		$this->db->insert('proveedor',$data);

	}
	public function listproveedor()
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		$this->db->where('estado','1');
		return $this->db->get();

	}
	public function getfull($id)
	{
		$this->db->select('*');
		$this->db->from('proveedor');
		$this->db->where('Id',$id);
		return $this->db->get();

	}
	public function deshabilitar($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('proveedor',$data);

	}
	public function dbmodificar($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('proveedor',$data);

	}
}

