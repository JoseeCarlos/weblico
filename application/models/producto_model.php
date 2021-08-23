<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/**
 * 
 */
class Producto_model extends CI_Model
{ 
	
	public function agregarProducto($data)
	{
		$this->db->insert('producto', $data);		
	} 

	public function retornarProductos()
	{
		$this->db->select('p.Id, p.nombre, p.precio, p.descripcion, 
			p.foto, p.stock, c.nombreCategoria, p.fechaVencimiento, 
			p.presentacion, p.estado, p.fechaCreacion, p.fechaActualizacion, p.categoriaId');
		$this->db->from('producto p');
		$this->db->join('categoria c','p.categoriaId = c.Id');

		return $this->db->get();
	}
	public function retornarProductosB()
	{
		$this->db->select('p.Id, p.nombre, p.precio, p.descripcion, 
			p.foto, p.stock, c.nombreCategoria, p.fechaVencimiento, 
			p.presentacion, p.estado, p.fechaCreacion, p.fechaActualizacion, p.categoriaId');
		$this->db->from('producto p');
		$this->db->where('p.estado', '1');
		//$this->db->where('p.stock','0');
		$this->db->join('categoria c','p.categoriaId = c.Id');


		return $this->db->get();
	}

	public function retornarProducto($idproducto)
	{
		$this->db->select('p.Id, p.nombre, p.precio, p.descripcion, 
			p.foto, p.stock,c.nombreCategoria, p.fechaVencimiento, 
			p.presentacion, p.estado, p.fechaCreacion, p.fechaActualizacion');
		$this->db->from('producto p');
		$this->db->where('p.Id', $idproducto);
		$this->db->join('categoria c','p.categoriaId = c.Id');		
		return $this->db->get();
	}

	public function mostrarProducto($idcategoria)
	{
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->where('categoriaId', $idcategoria);
				
		return $this->db->get();
	}

	

	public function eliminarProducto($idproducto)
	{
		$this->db->where('Id',$idproducto);
		$this->db->delete('producto');	
	}

	public function deshabilitarProducto($idproducto)
	{
		$this->db->set('estado','0');
		$this->db->where('Id',$idproducto);
		$this->db->update('producto');				
	}

	public function habilitarProducto($idproducto)
	{
		$this->db->set('estado','1');
		$this->db->where('Id',$idproducto);
		$this->db->update('producto');				
	}

	public function modificarProducto($idproducto,$data)
	{
		
		$this->db->where('Id',$idproducto);
		$this->db->update('producto',$data);	
	}

	public function agregarCarrito($data)
	{
		$this->db->insert('carrito', $data);		
	} 

	

	
	public function retornarStock($idproducto)
	{
		$this->db->select('p.stock');
		$this->db->from('producto p');
		$this->db->where('p.Id', $idproducto);
		return $this->db->get();
	}
	public function retornarCarrito($idUsuario)
	{
		$this->db->select('c.Id, c.idproducto, c.idUsuario, c.nombre, c.precio, c.cantidad, p.stock, u.nombreUsuario');
		$this->db->from('carrito c');
		$this->db->join('producto p','c.idproducto = p.Id');
		$this->db->join('usuario u','c.idUsuario = u.Id');
		$this->db->where('c.idUsuario',$idUsuario);
		return $this->db->get();		
	}

	public function retornarTodoCarrito()
	{		
		$this->db->select('*');
		$this->db->from('detallecarrito c');
		//$this->db->join('usuario u','c.idUsuario = u.id');
		return $this->db->get();
	}
	public function modificarStock($idproducto,$resta)
	{
		$this->db->set('stock',$resta);
		$this->db->where('Id',$idproducto);
		$this->db->update('producto');		
	} 

	public function eliminarCarrito($idcarrito)
	{
		$this->db->where('Id',$idcarrito);
		$this->db->delete('carrito');	
	}

	public function agregarReporte($data)
	{
		$this->db->insert('detallecarrito', $data);
	}

	public function listaviewproducto()
	{
		$this->db->select('*');
		$this->db->from('producto');
		//$this->db->join('usuario u','c.idUsuario = u.id');
		return $this->db->get();
	}

	public function listarproduct()
	{
		$this->db->select('*');
		$this->db->from('producto');
		//$this->db->join('usuario u','c.idUsuario = u.id');
		return $this->db->get();
	}
	public function listaProducto()
	{
       $this->db->select('*');
       $this->db->from('producto');
       $this->db->where('estado',1);
       $this->db->where('stock >',1);
       return $this->db->get();
	}
	
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
	public function carritoprueba($id)
	{
		$this->db->select('*');
		$this->db->from('carrito');
		$this->db->where('idUsuario',$id);
		return $this->db->get();
	}
	public function selectlike($like)
	{
		$this->db->select('*');
		$this->db->from('producto');
		$this->db->like('nombre',$like);
		$this->db->where('stock >',1);
		return $this->db->get();
	}
	public function getcarrito($idcliente)
	{
		$this->db->select('*');
		$this->db->from('carrito');
		$this->db->where('idUsuario',$idcliente);
		return $this->db->get();
	}
	public function selectpedidos($like)
	{
	    $this->db->select('*');
		$this->db->from('detallecarrito');
		$this->db->like('usuario',$like);
		return $this->db->get();
	}


}
