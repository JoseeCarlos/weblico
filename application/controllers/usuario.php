<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Usuario extends CI_Controller {
	public function index()
	{
		
		//$consulta=$this->producto_model->listaviewproducto();	
		//$data['productos']=$consulta;
		//$this->load->view('pageprincipal',$data);
		$listaProducto=$this->producto_model->listaProducto(); 
		$data['producto']=$listaProducto;
		$this->load->view('inc/head');
		$this->load->view('pageprincipal',$data);
		$this->load->view('inc/footer');
	}
	public function validarusuario(){
		$login=$_POST['login'];
		$password=$_POST['password'];
		$consulta=$this->usuario_model->validar($login,$password);
		if ($consulta->num_rows()>0) {
			foreach ($consulta->result() as $row) {
				$this->session->set_userdata('Id',$row->Id);
				$this->session->set_userdata('nombreUsuario',$row->nombreUsuario);
				$this->session->set_userdata('role',$row->role);
			}
			redirect('usuario/index');
		}else{
			redirect('usuario/loginuser/1','refresh');
		}
	}
	public function panel(){
		if ($this->session->userdata('login'))
		 {
		 	if ($this->session->userdata('tipo')=='invitado')
		 	{
		 		$listaclientes=$this->cliente_model->listarclientes();
		        $data['clientes']=$listaclientes;
		         $this->load->view('tabla_clientes',$data);
		 	}
		 	else
		 	{
		 		if ($this->session->userdata('tipo')=='admin')
		 		 {

		 	       $listaclientes=$this->usuario_model->listarusuarios();
		           $data['usuario']=$listaclientes;
		          $this->load->view('tabla_usuarios',$data);
		 		}
		 	}
				
		}else{
			redirect('usuario/index/2','refresh');
		}
	}
	public function logout(){
		$this->session->sess_destroy();
		redirect('usuario/index');
	}
	public function listarusuarios(){

		if($this->session->userdata('role')!='' && $this->session->userdata('role')!='Cliente' && $this->session->userdata('role')!='Ventas')
		{
			$data['usuarios']=$this->usuario_model->listausuarios();
			$this->load->view('pageusuario',$data);
		}
		else{
			$data['msg']=$this->uri->segment(3);
		    $this->load->view('login',$data);
		}
	}
	public function agregar()
	{
		
		$this->load->view('page_newuser');
		
	}
	public function loginuser(){
		$data['msg']=$this->uri->segment(3);
		$this->load->view('login',$data);
	}
	public function codigo(){
		$this->load->view('enviarcorreo');
	}
	public function info(){

		$id=$this->session->userdata('Id');
		
		$listainfo=$this->usuario_model->listarusuarios($id);
		$data['usuario']=$listainfo;
		$this->load->view('page_editarinfo',$data);
	
	}
	public function email()
	{

		$user=$_POST['login'];
		$telefono=$_POST['telefono'];
		$consulta=$this->usuario_model->getdatos($user,$telefono);
		if ($consulta->num_rows()>0) {
			foreach ($consulta->result() as $row) {
				$usuario=$row->nombreUsuario;
				$telef=$row->telefono;
			}
			
		}else{
			redirect('usuario/loginuser');
		}
		$contra= rand(1000, 9999);
		$data['codigo']=$contra;
		$this->usuario_model->insercodigo($data,$usuario,$telef);
include('httpPHPAltiria.php');


$altiriaSMS = new AltiriaSMS();
$altiriaSMS->setLogin('mercato.abarrotes@gmail.com');
$altiriaSMS->setPassword('7fcae8qb');
$altiriaSMS->setDebug(true);
$sDestination = '591'.$telef;
$response = $altiriaSMS->sendSMS($sDestination,"Hola ".$usuario." Su codigo de recuperacion es ".$contra);

if (!$response)
{
	echo "El envío ha terminado en error";

}
else{
	$this->load->view('page_recuperarcontra');
}
 



	}
	public function actualizarinfo()
	{
		$id=$this->session->userdata('Id');
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['genero']=$_POST['genero'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		
	
		
		
		$this->usuario_model->modificarusuario($id,$data);
		//redirect('usuario/','refresh');
		$this->info();
	}
	public function agregarusuario(){

		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['genero']=$_POST['genero'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		$contra= rand(1000, 9999);
		$data['contraseña']=$contra;
		$data['telefono']=$_POST['telefono'];
		$data['role']=$_POST['role'];
		$this->usuario_model->agregardb($data);
		include('httpPHPAltiria.php');


$altiriaSMS = new AltiriaSMS();
$altiriaSMS->setLogin('mercato.abarrotes@gmail.com');
$altiriaSMS->setPassword('7fcae8qb');
$altiriaSMS->setDebug(true);
$sDestination = '591'.$_POST['telefono'];
$response = $altiriaSMS->sendSMS($sDestination, "Bienvenido a la pagina de LicoTeam ".$_POST['nombreUsuario']." Su contraseña es ".$contra);

if (!$response)
{
	echo "El envío ha terminado en error";

}
else{
	$this->listarusuarios();

}

	}
	public function cambiocontra(){
		$codigo=$_POST['codigo'];
		if ($_POST['pass1']==$_POST['pass2']) {
			$data['contraseña']=$_POST['pass1'];
			$this->usuario_model->cambiocontra($codigo,$data);
			$this->info();
			//redirect('usuario/','refresh');



		}else{
		    //$this->listarusuarios();
			redirect('usuario/index/1','refresh');

		}

	}
	public function modificar()
	{
		$id=$_POST['id'];
		$data['usuario']=$this->usuario_model->getusuario($id);
		$this->load->view('page_editaruser',$data);


	}
	public function eliminardb()
	{
		$id=$_POST['id'];
		$data['estado']='0';
		$this->usuario_model->deleteusuario($id,$data);
		redirect('usuario/listarusuarios','refresh');

	}
	public function modificardb()
	{
		$id=$_POST['id'];
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['genero']=$_POST['genero'];
		$data['email']=$_POST['email'];
		$data['telefono']=$_POST['telefono'];
		$this->usuario_model->modificarusuarios($id,$data);
		redirect('usuario/listarusuarios','refresh');

	}
	public function newpassword()
	{
		$id=$this->session->userdata('Id');
		if ($_POST['pass2']==$_POST['pass3']) {

			$data['contraseña']=$_POST['pass2'];
			$this->usuario_model->newcontra($id,$data);
			redirect('usuario/','refresh');
		}
		else{
			echo "las contrase;as no son iguales";

		}
		
		

		
	}
	public function crearCliente()
	{
		$data['nombre']=$_POST['nombre'];
		$data['primerApellido']=$_POST['primerApellido'];
		$data['segundoApellido']=$_POST['segundoApellido'];
		$data['fechaNacimiento']=$_POST['fechaNacimiento'];
		$data['genero']=$_POST['genero'];
		$data['email']=$_POST['email'];
		$data['nombreUsuario']=$_POST['nombreUsuario'];
		$data['contraseña']=$_POST['password'];
		$data['telefono']=$_POST['telefono'];
		$data['role']='Cliente';

		if($data['contraseña']==$_POST['password2'])
		{
			$this->usuario_model->newCliente($data);

			redirect('usuario/loginuser/6','refresh');
		}
		else
		{
			redirect('usuario/loginuser/5','refresh');
		}

	}
	public function listarclientes(){

		$data['usuarios']=$this->usuario_model->listaclientes();
		$this->load->view('listarclientes',$data);
	}
	public function generarreporte()
	{
	    	$this->load->library('pdf');
		$lista=$this->usuario_model->listausuarios();
		$lista=$lista->result();
		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("lista de Usuarios Registrados");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'Lista de Clientes',0,0,'C');
		$this->pdf->Ln(10);
		$this->pdf->cell(40,5,'nombre','TBLR',0,'L',0);	
		$this->pdf->cell(40,5,'primerApellido','TBLR',0,'L',0);
		$this->pdf->cell(40,5,'segundoApellido','TBLR',0,'L',0);	
		$this->pdf->cell(40,5,'fechaNacimiento','TBLR',0,'L',0);
		$this->pdf->Ln(5);
		foreach ($lista as $row) {
			$nombre=$row->nombre;
			$primer=$row->primerApellido;
			$segundo=$row->segundoApellido;
			$fecha=$row->fechaNacimiento;
			$this->pdf->cell(40,5,$nombre,'TBLR',0,'L',0);	
			$this->pdf->cell(40,5,$primer,'TBLR',0,'L',0);
			$this->pdf->cell(40,5,$segundo,'TBLR',0,'L',0);	
			$this->pdf->cell(40,5,$fecha,'TBLR',0,'L',0);
			$this->pdf->Ln(5);
		}
		$this->pdf->Output('listausuariosreport.pdf','I');
	}
	public function listacliente(){
		$this->load->library('pdf');
		$lista=$this->cliente_model->listarclientes();
		$lista=$lista->result();
		$this->pdf=new Pdf();
		$this->pdf->AddPage();
		$this->pdf->AliasNbPages();
		$this->pdf->SetTitle("listaclientes");
		$this->pdf->SetLeftMargin(15);
		$this->pdf->SetRightMargin(15);
		$this->pdf->SetFillColor(210,210,210);
		$this->pdf->SetFont('Arial','B',11);
		$this->pdf->Cell(30);
		$this->pdf->Cell(120,10,'Lista de Clientes',0,0,'C');
		$this->pdf->Ln(10);
		foreach ($lista as $row) {
			$nombre=$row->nombre;
			$this->pdf->cell(62,5,$nombre,'TBLR',0,'L',0);
			$this->pdf->Ln(5);
		}
		$this->pdf->Output('listaclientes.pdf','I');
	}
}