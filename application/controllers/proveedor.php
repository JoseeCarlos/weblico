<?php 
defined('BASEPATH') OR exit('No direct script access allowed');

class Proveedor extends CI_Controller
{	
	public function index()  
	{
	
		if($this->session->userdata('role')!='' && $this->session->userdata('role')!='Cliente')
        {
            $data['proveedores']=$this->provedor_model->listproveedor();
            $this->load->view('pageproveedor',$data);
        }
        else
        {
            $data['msg']=$this->uri->segment(3);
		    $this->load->view('login',$data);
        }
		
    } 
    public function listarproveedor()
    {
        if($this->session->userdata('role')!='' && $this->session->userdata('role')!='Cliente')
        {
            $data['proveedores']=$this->provedor_model->listproveedor();
            $this->load->view('pageproveedor',$data);
        }
        else
        {
            $data['msg']=$this->uri->segment(3);
		    $this->load->view('login',$data);
        }

    }
    public function agregar()
    {
        $this->load->view('page_newproveedor');

    }
    public function agregarproveedor()
    {
        $data['nombreProveedor']=$_POST['nombre'];
		$data['telefono']=$_POST['telefono'];
		$data['direccion']=$_POST['direccion'];
		$data['latitud']=$_POST['latitud'];
		$data['longitud']=$_POST['longitud'];
        $data['idCiudad']=$_POST['ciudad'];
        $this->provedor_model->agregardb($data);
        redirect('proveedor/listarproveedor','refresh');
        
    }
    public function modificar()
    {
        $id=$_POST['id'];
        $data['proveedor']=$this->provedor_model->getfull($id);
        $this->load->view('page_modificarproveedor',$data);


    }
    public function modificardb()
    {
        $id=$_POST['id'];
        $data['nombreProveedor']=$_POST['nombre'];
		$data['telefono']=$_POST['telefono'];
		$data['direccion']=$_POST['direccion'];
		$data['latitud']=$_POST['latitud'];
		$data['longitud']=$_POST['longitud'];
        $data['idCiudad']=$_POST['ciudad'];
        $this->provedor_model->dbmodificar($id,$data);
        redirect('proveedor/listarproveedor','refresh');
    }
    public function eliminardb()
    {
        $id=$_POST['id'];
        $data['estado']='0';
        $this->provedor_model->deshabilitar($id,$data);
        redirect('proveedor/listarproveedor','refresh');
        
    }
    public function reporte()
    {
        $this->load->library('pdf');
        $lista=$this->provedor_model->listproveedor();
        $lista=$lista->result();
        $this->pdf=new Pdf();
        $this->pdf->AddPage();
        $this->pdf->AliasNbPages();
        $this->pdf->SetTitle("lista de Usuarios Proveedores Registrados");
        $this->pdf->SetLeftMargin(15);
        $this->pdf->SetRightMargin(15);
        $this->pdf->SetFillColor(210,210,210);
        $this->pdf->SetFont('Arial','B',11);
        $this->pdf->Cell(30);
        $this->pdf->Cell(120,10,'Lista de Proveedores Registrados',0,0,'C');
        $this->pdf->Ln(10);
         $this->pdf->cell(20,5,'#','TBLR',0,'L',0);
        $this->pdf->cell(60,5,'Nombre','TBLR',0,'L',0); 
        $this->pdf->cell(40,5,'Telefono','TBLR',0,'L',0);
        $this->pdf->cell(40,5,'Direccion','TBLR',0,'L',0);   
       
        $this->pdf->Ln(5);

        $num=0;
        foreach ($lista as $row) {
            $nombre=$row->nombreProveedor;
            $primer=$row->telefono;
            $segundo=$row->direccion;
          
            $num++;
            $this->pdf->cell(20,5,$num,'TBLR',0,'L',0); 
            $this->pdf->cell(60,5,$nombre,'TBLR',0,'L',0);  
            $this->pdf->cell(40,5,$primer,'TBLR',0,'L',0);
            $this->pdf->cell(40,5,$segundo,'TBLR',0,'L',0); 
            
            $this->pdf->Ln(5);
        }
        $this->pdf->Output('listausuariosreport.pdf','I');
    }
 
	
}
?>
