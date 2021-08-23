<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Producto extends CI_Controller
{	
	public function index()  
	{
    	if ($this->session->userdata('role')!='' && $this->session->userdata('role')!='Cliente')
		{
			$this->load->view('inc/head');
			$this->load->view('listaproductos');
			$this->load->view('inc/footer');
		}
		else{
			$data['msg']=$this->uri->segment(3);
		    $this->load->view('login',$data);
		}
		
	} 
 
	public function agregar()
	{
		//$data['msg']=$this->uri->segment(3);
		$data['categoria']=$this->producto_model->retornarCategorias();
		$this->load->view('inc/head');
		$this->load->view('page_newproducto',$data); 
		$this->load->view('inc/footer');		
	}
	
	public function agregar_productodb() 
	{
		$producto = $_POST['producto'];
		$precio = $_POST['precio'];	
		$descripcion = $_POST['descripcion'];
		$foto = $_FILES['foto'];
		$stock = $_POST['stock'];
		$categoria = $_POST['categoria'];
		$fechaVencimiento = $_POST['fechaVencimiento'];
		$presentacion = $_POST['presentacion'];

		$data['nombre']=$producto;
		$data['precio']=$precio;
		$data['descripcion']=$descripcion;
		$data['foto']=uniqid().$foto['name'];
		$data['stock']=$stock;
		$data['categoriaId']=$categoria;
		$data['fechaVencimiento']=$fechaVencimiento;
		$data['presentacion']=$presentacion;
		//$this->producto_model->agregarProducto($data);
		//redirect('producto/index/1','refresh');   
		//redirect('producto/listaproductos','refresh');
		  
        $res= $this->guardar_archivo($data['foto']);
        echo $res;
        if ($res=='okey') {
        	$this->producto_model->agregarProducto($data);
        	$this->listaproductos();
        }else{

        }
		
	}

	private function guardar_archivo($nombre)
	{
		$mi_archivo = 'foto';
        $config['upload_path'] = "images/";
        $config['file_name'] = $nombre;
        $config['allowed_types'] = "jpg|png";
        $config['max_size'] = "5000";
        $config['max_width'] = "2000";
        $config['max_height'] = "2000";

        $this->load->library('upload', $config);
        
        if (!$this->upload->do_upload($mi_archivo)) {
            
            return $this->upload->display_errors();
            
        }else{
        	return 'okey';
        }
	}

	public function modificar()
	{

		$idproducto=$_POST['idproducto'];
		$data['producto']=$this->producto_model->retornarProducto($idproducto);
		$this->load->view('inc/head');
		$this->load->view('modificar_producto',$data);
		$this->load->view('inc/footer'); 
	}

	public function mostrarProductos($idcategoria)
	{
		$idcategoria=$_POST['idcategoria'];
		$data['producto']=$this->producto_model->mostrarProducto($idcategoria);	
		$this->load->view('inc/head');
		$this->load->view('venta',$data);
		$this->load->view('inc/footer');
	}

	public function modificardb() 
	{
        $idproducto=$_POST['idproducto'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];	
		$foto = $_POST['foto'];
		$stock = $_POST['stock'];
		//$nombreCategoria = $_POST['nombreCategoria'];
		$presentacion = $_POST['presentacion'];

		$data['nombre']=$nombre;
		$data['precio']=$precio;
		$data['foto']=$foto;
		$data['stock']=$stock;
		//$cat['categoriaId']=$nombreCategoria;
		$data['presentacion']=$presentacion;
		$this->producto_model->modificarProducto($idproducto,$data);
		
		$this->listaproductos();
	}

	public function eliminardb()
	{			
		$idproducto=$_POST['idproducto'];
		$this->producto_model->eliminarProducto($idproducto);
		$this->listaproductos();
	}

	public function listaproductos() 
	{
	    if($this->session->userdata('role')!='' && $this->session->userdata('role')!='Cliente' && $this->session->userdata('role')!='Ventas')
		{
			$data['producto']=$this->producto_model->retornarProductos();
			$this->load->view('listaproductos',$data);
		}
		else{
			$data['msg']=$this->uri->segment(3);
		    $this->load->view('login',$data);
		}
		//$data['producto']=$this->producto_model->retornarProductos();
		//$this->load->view('inc/head');
		//$this->load->view('listaproductos',$data);
		//$this->load->view('inc/footer');
	} 

	public function listaproductoscliente()
	{
	    $data['categoria']=$this->producto_model->retornarCategorias();
		$data['producto']=$this->producto_model->retornarProductosB();
		$this->load->view('inc/head');
		$this->load->view('listaproductoscliente',$data);
		$this->load->view('inc/footer');
	}

	public function deshabilitardb()
	{
		$idproducto=$_POST['idproducto'];
		$this->producto_model->deshabilitarProducto($idproducto);
		$this->listaproductos();
	}

	public function habilitardb()
	{
		$idproducto=$_POST['idproducto'];
		$this->producto_model->habilitarProducto($idproducto);
		$this->listaproductos();
	}

	public function carrito()
	{
		$idproducto = $_POST['idproducto'];
		$nombre = $_POST['nombre'];
		$precio = $_POST['precio'];			
		$cantidad = $_POST['cantidad'];
		$stock = $_POST['stock'];
		$idUsuario = $_POST['idUsuario'];

		$resta = $stock-$cantidad;


        $data['idproducto']=$idproducto;
		$data['nombre']=$nombre;
		$data['precio']=$precio;		
		$data['cantidad']=$cantidad;
		$data['idUsuario']=$idUsuario;

        
		$this->producto_model->agregarCarrito($data);		
		redirect('usuario','refresh');
		
	}
	public function carritoLista()
	{
		$idUsuario=$_POST['idUsuario'];
		$data['carrito']=$this->producto_model->retornarCarrito($idUsuario);
		$this->load->view('inc/head');
		$this->load->view('listacarrito',$data);
		$this->load->view('inc/footer');
	}

	public function listaCarrito()
	{
		$data['carrito']=$this->producto_model->retornarTodoCarrito();
		$this->load->view('inc/head');
		$this->load->view('reporteCarrito',$data);
		$this->load->view('inc/footer');
	}

	public function quitarCarrito()
	{
		$idcarrito=$_POST['idcarrito'];
		$this->producto_model->eliminarCarrito($idcarrito);
		redirect('usuario','refresh');
		//redirect('producto/carritoLista');
	}

	public function carritoCompra()
	{
	

		$idcliente=$_POST['txtidcliente'];
		
		$consulta=$this->producto_model->retornarCarrito($idcliente);
		
		if ($consulta->num_rows()>0)
		{
		    foreach ($consulta->result() as $row) {
					$idcarrito=$row->Id;
                    $idproducto=$row->idproducto;
                    $nombre=$row->nombre;
                    $precio=$row->precio;        
                    $cantidad=$row->cantidad;
                    $usuario=$row->nombreUsuario;
                    $stock = $row->stock;
                    $resta = $stock-$cantidad;

                    $data['idCarrito']=$idcarrito;
                    $data['idProducto']=$idproducto;
		            $data['nombre']=$nombre;
		            $data['precio']=$precio;		
		            $data['cantidad']=$cantidad;
		            $data['usuario']=$usuario;
		            $this->producto_model->modificarStock($idproducto,$resta);
		            $this->producto_model->eliminarCarrito($idcarrito);
	                $this->producto_model->agregarReporte($data);
			}
		}
		else
		{
		    //el cliente no tiene carrito
		}
		
		
	
		
	}
	
	public function checkout()
	{
		$subtotal=$_POST['subtotal'];
        $final=$_POST['final'];
        
        
        $id=$_POST['txtidcliente'];
		$carritoprueba=$this->producto_model->carritoprueba($id);
		$data['carrito']=$carritoprueba;
		
		

        $this->carritoCompra();
		$this->load->view('inc/head');
		$this->load->view('checkout',$data,$subtotal,$final);
		$this->load->view('inc/footer');
	}

	public function venta()
	{
		$data['categoria']=$this->categoria_model->retornarCategorias();
		$this->load->view('inc/head');
		$this->load->view('venta',$data); 
		$this->load->view('inc/footer');
	}
	public function thankyou()
	{

		$this->load->view('inc/head');
		$this->load->view('thankyou'); 
		$this->load->view('inc/footer');
	}
	public function listalike()
	{
		$like=$_POST['txtlike'];
		$getlike=$this->producto_model->selectlike($like);
		$data['producto']=$getlike;

		$this->load->view('listaproductolike',$data);

	}
	public function listapedidos()
	{
	    $like=$this->session->userdata('nombreUsuario');
	    $getlike=$this->producto_model->selectpedidos($like);
		$data['producto']=$getlike;

		$this->load->view('listapedidos',$data);
	}
	public function listausuariosxls()
	{ 

      //Cargamos la librería de excel.
      $this->load->library('excel');
      $lista=$this->producto_model->retornarProductos();
	  $lista=$lista->result();

      $this->excel->setActiveSheetIndex(0);


      $nombrehoja="ListaProductos";
      $nombrearchivo=$nombrehoja.".xls";

      //metadatos del archivo
      $this->excel->getProperties()->setCreator("Miguel Creador")
							 ->setLastModifiedBy("Miguel Modificador")
							 ->setTitle("Ejmplo")
							 ->setSubject("Reporte Excel")
							 ->setDescription("Documento de prueba")
							 ->setKeywords("Excel PHP")
							 ->setCategory("Categoria del documento");

        $this->excel->getActiveSheet()->setTitle($nombrehoja);
        //Contador de filas
        $contador = 1;
        
        //tamano texto
        $this->excel->getDefaultStyle()->getFont()->setName('Arial')->setSize(15);

        //fondo celdas
        $this->excel->getActiveSheet()->getStyle('A1:C1')->getFill()->setFillType(PHPExcel_Style_Fill::FILL_SOLID); 
		$this->excel->getActiveSheet()->getStyle('A1:C1')->getFill()->getStartColor()->setARGB('cdcdcd'); 

        //Le aplicamos ancho las columnas.
        $this->excel->getActiveSheet()->getColumnDimension('A')->setWidth(5);
        $this->excel->getActiveSheet()->getColumnDimension('B')->setWidth(20);
        $this->excel->getActiveSheet()->getColumnDimension('C')->setWidth(20);
        //si queremos que el texto se ajuste
        //$this->excel->getActiveSheet()->getStyle('A1')->getAlignment()->setWrapText(true);
        //si queremos que el el tamano sea automatico
        //$this->excel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);

        //Le aplicamos negrita a los títulos de la cabecera.
        $this->excel->getActiveSheet()->getStyle("A{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("B{$contador}")->getFont()->setBold(true);
        $this->excel->getActiveSheet()->getStyle("C{$contador}")->getFont()->setBold(true);
        //Definimos los títulos de la cabecera.
        $this->excel->getActiveSheet()->setCellValue("A{$contador}", 'No.');
        $this->excel->getActiveSheet()->setCellValue("B{$contador}", 'PAIS');
        $this->excel->getActiveSheet()->setCellValue("C{$contador}", 'LATITUD');
        //Definimos la data del cuerpo.    

        //tamano texto y bold
        $this->excel->getDefaultStyle()->getFont()->setName('Arial')->setSize(10);
        $this->excel->getActiveSheet()->getStyle()->getFont()->setBold(false);

        foreach($lista as $row){
           //Incrementamos una fila más, para ir a la siguiente.
           $contador++;
           //Informacion de las filas de la consulta.
           $this->excel->getActiveSheet()->setCellValue("A{$contador}", $contador-1);
           $this->excel->getActiveSheet()->setCellValue("B{$contador}", $row->nombre);
           $this->excel->getActiveSheet()->setCellValue("C{$contador}", $row->precio);
           $this->excel->getActiveSheet()->setCellValue("D{$contador}", $row->descripcion);
           $this->excel->getActiveSheet()->setCellValue("E{$contador}", $row->foto);
           $this->excel->getActiveSheet()->setCellValue("F{$contador}", $row->stock);
           $this->excel->getActiveSheet()->setCellValue("G{$contador}", $row->categoriaId);
           $this->excel->getActiveSheet()->setCellValue("H{$contador}", $row->fechaVencimiento);
           $this->excel->getActiveSheet()->setCellValue("I{$contador}", $row->presentacion);
           $this->excel->getActiveSheet()->setCellValue("J{$contador}", $row->estado);
           $this->excel->getActiveSheet()->setCellValue("K{$contador}", $row->fechaCreacion);
           $this->excel->getActiveSheet()->setCellValue("L{$contador}", $row->fechaActualizacion);
        }

        //Le ponemos un nombre al archivo que se va a generar.
        header('Content-Type: application/vnd.ms-excel');
        header('Content-Disposition: attachment;filename="'.$nombrearchivo.'"');
        header('Cache-Control: max-age=0');
        $objWriter = PHPExcel_IOFactory::createWriter($this->excel, 'Excel5');
        //Hacemos una salida al navegador con el archivo Excel.
        $objWriter->save('php://output');
    }
    public function reporte()
    {
        $this->load->library('pdf');
        $lista=$this->producto_model->listaviewproducto();
        $lista=$lista->result();
        $this->pdf=new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("lista de Productos Registrados");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10,'Lista de Productos Registrados',0,0,'C');
        $this->pdf->Ln(10);
         $this->pdf->cell(20,5,'#','TBLR',0,'L',0);
        $this->pdf->cell(40,5,'Nombre','TBLR',0,'L',0); 
        $this->pdf->cell(40,5,'Precio','TBLR',0,'L',0);
        $this->pdf->cell(60,5,'Descripcion','TBLR',0,'L',0);   
       
        $this->pdf->Ln(5);

        $num=0;
        foreach ($lista as $row) {
            $nombre=$row->nombre;
            $primer=$row->precio;
            $segundo=$row->descripcion;
          
            $num++;
            $this->pdf->cell(20,5,$num,'TBLR',0,'L',0); 
            $this->pdf->cell(40,5,$nombre,'TBLR',0,'L',0);  
            $this->pdf->cell(40,5,$primer,'TBLR',0,'L',0);
            $this->pdf->cell(60,5,$segundo,'TBLR',0,'L',0); 
            
            $this->pdf->Ln(5);
        }
        $this->pdf->Output('listausuariosreport.pdf','I');
    }

}
?>
