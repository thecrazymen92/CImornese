<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct(){
		parent::__construct();
		$this->load->library('encryption');
		$this->load->model('incidencia_model');
        $this->load->model('usuario_model');
	}
	public function index(){
		//echo CI_VERSION;
	        //$plain_text = 'This is a plain-text message!';
	        //$ciphertext = $this->encryption->encrypt($plain_text);

	        // Outputs: This is a plain-text message!
	        //echo $this->encryption->decrypt($ciphertext);
        if($this->input->cookie('logueado', TRUE))
			redirect('dashboard');
		
		$data = array('user' => "Usuario", 'password' => "Contraseña");

		//$contents['row']          = $this->product_model->product();
		$contents['content']      = $this->load->view('login',$data,TRUE);

		$this->load->view('template',$contents);

	}
	public function logout(){
		if($this->input->cookie('logueado', TRUE)){
			//delete_cookie("name");
			delete_cookie("nombre");
			delete_cookie("password");
			delete_cookie("logueado");
			delete_cookie("cargo");
		}
		redirect('login');
	}
	public function loginparams(){
		if($this->input->cookie('logueado', TRUE)){
			redirect('dashboard');
		}
		else if ($this->input->post()) {
         $usuario = $this->input->post('usuario');
         $clave = $this->input->post('clave');
         $usuario1 = $this->usuario_model->usuario_por_nombre_contrasena($usuario, $clave);
         if ($usuario1) {
            //$usuario_data = array(
	            //   'id' => $usuario1->id,
	            //   'nombre' => $usuario1->nombre,
	            //   'logueado' => TRUE
	            //);
	            //var_dump($usuario_data);
	            //$this->session->set_userdata($usuario_data);
	            //$iduser=$usuario1->id;
	            //$this->input->set_cookie('user_id',$usuario1->id),'28800';
	            //var_dump($usuario1->id));
            $this->input->set_cookie('nombre',$usuario1->nombre,'28800');
            $this->input->set_cookie('cargo',$usuario1->cargo,'28800');
            $this->input->set_cookie('password',$this->encryption->encrypt($usuario1->contrasena),'28800');
            $this->input->set_cookie('logueado',TRUE,'28800');
            //$this->session->set_userdata("logueado",TRUE);
	            //$this->session->set_userdata("nombre",$usuario1->nombre);
	            //echo $this->session->test;
            redirect('dashboard');
         } else {
            redirect('login');
         }
      } else {
         $this->index();
      }
//
		// if($this->input->post('usuario') && $this->input->post('clave')){
		// 	$usuario = $this->input->post('usuario');
		// 	$clave = $this->input->post('clave');
		// }else{
		// 	$usuario = $this->input->post('testuser');
		// 	$clave = $this->input->post('testpassword');
		// }

		// if($usuario=="yanpool.valencia@mornese.pe" && $clave=="12345678")
		// {
		// 	$data = array('usuario' => $usuario, 'clave' => $clave);
		// 	$this->session->set_userdata('user_session',$data);
		// 	$data['row']          = $this->product_model->product();
		// 	$data['user_session'] = $this->session->userdata('user_session');
		// 	redirect('/dashboard',$data);
		// 	$contents['content']      = $this->load->view('dashboard',$data,TRUE);
		// 	$this->load->view('template',$contents);
		// }else{
		// 	redirect('/login');
		// }
	
	}
	public function dashboard(){
		//var_dump($this->session->has_userdata('logueado'));
				//$cookietest=$this->input->cookie('cookie_Prueba', TRUE);
				//var_dump($cookietest["nombre"]);

		        //$this->encryption->encrypt($plain_text);
		        //$this->encryption->decrypt($ciphertext);

		if($this->input->cookie('logueado', TRUE)){
         $data = array();
         $data['cargo'] = $this->input->cookie('cargo', TRUE);
         $data['usuario'] = $this->input->cookie('nombre', TRUE);
         $data['logueado'] = $this->input->cookie('logueado', TRUE);
         $data['user_id'] = $this->input->cookie('user_id', TRUE);

        $lista_incidencias=$this->incidencia_model->lista_incidencias();

        $data['lista_incidencias']=$lista_incidencias;//->unbuffered_row();

        //echo "<br>".$data['usuario']."<br>". $this->encryption->decrypt($data['usuario'])."asd";
			//$testingvar=$data['usuario'];
			//echo $testingvar."dsa";

        $contents['content'] = $this->load->view('dashboard',$data,TRUE);

		$this->load->view('template',$contents);
     	}else{
     		redirect('login');
			//$data = array();
				//$data['usuario'] = "bad";
				//$contents['content'] = $this->load->view('dashboard',$data,TRUE);

				//$this->load->view('template',$contents);
     	}

		// var_dump($this->session->userdata("usuario"));
			// //echo "ok";
			// if(false){
			// 	redirect('/login/index');
			// }
			// else{

			
			// }

	}
	
	public function editar(){
		$contents=array('ejemplo1' => "1");
		echo $this->load->view('popup-form',$contents,TRUE);
	}
	public function configurar(){
		$contents=array('ejemplo1' => "1");
		echo $this->load->view('popup-form-graficos',$contents,TRUE);
	}
	public function lista_incidencias($tipo,$fecha_ini,$fecha_fin){
        $lista_incidencias=$this->incidencia_model->grafico_incidencias_fecha($tipo,$fecha_ini,$fecha_fin);
		echo json_encode($lista_incidencias);
	}
	public function incidencias_area($fecha_ini,$fecha_fin,$areas){
        $lista_incidencias=$this->incidencia_model->grafico_incidencias_area($fecha_ini,$fecha_fin,$areas);
        echo json_encode($lista_incidencias);
		}
	public function motivos_incidencias($fecha_ini,$fecha_fin,$areas){
        $lista_incidencias=$this->incidencia_model->motivos_incidencias($fecha_ini,$fecha_fin,$areas);
        echo json_encode($lista_incidencias);
		}
	public function incidencia_area_mes($fecha_ini,$fecha_fin,$areas){
        $lista_incidencias=$this->incidencia_model->incidencia_area_mes($fecha_ini,$fecha_fin,$areas);
        echo json_encode($lista_incidencias);
		}
	
}
