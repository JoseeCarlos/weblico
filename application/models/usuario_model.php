<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario_model extends CI_Model {
	public function validar($login,$password){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nombreUsuario',$login);
		$this->db->where('contraseña',$password);
		return $this->db->get();
	}
	public function getdatos($user,$telefono)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('nombreUsuario',$user);
		$this->db->where('telefono',$telefono);
		return $this->db->get();
	}
	public function listarusuarios($id){
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('Id',$id);
		return $this->db->get();
	}
	public function getInfo($id)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('Id',$id);
		return $this->db->get();
	}

	public function modificarusuario($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('usuario',$data);
	}
	public function agregardb($data)
	{
		$this->db->insert('usuario',$data);
	}
	public function insercodigo($data,$user,$telefono)
	{
		$this->db->where('nombreUsuario',$user);
		$this->db->where('telefono',$telefono);
		$this->db->update('usuario',$data);
	}
	public function cambiocontra($codigo,$data)
	{
		$this->db->where('codigo',$codigo);
		$this->db->update('usuario',$data);

	}
	public function listausuarios()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		return $this->db->get();
	}
	public function listaclientes()
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('estado','1');
		$this->db->where('role','Cliente');
		return $this->db->get();
	}
	public function getusuario($id)
	{
		$this->db->select('*');
		$this->db->from('usuario');
		$this->db->where('Id',$id);
		return $this->db->get();
	}
	public function deleteusuario($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('usuario',$data);

	}
	public function modificarusuarios($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('usuario',$data);

	}
	public function newcontra($id,$data)
	{
		$this->db->where('Id',$id);
		$this->db->update('usuario',$data);

	}
	public function newCliente($data)
	{
		$this->db->insert('usuario',$data);

	}
}