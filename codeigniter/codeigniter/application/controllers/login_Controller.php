<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login_Controller extends CI_Controller {

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$this->load->view('login');
	}

	//funcion que trae los usuarios y contraseña  x post y compara si son iguales al usuaio para saber si estan registradas 
	public function validacion()
	{
		$frmlogin= array(
              
             'user'=>$this->input->post("user"),

             'pass'=>$this->input->post("pass")

		 );

       
		$row = $this->entries->getUser($frmlogin);
		$data['dbUsuario'] = $row;
		// $this->entries->getUser($frmlogin);

      if(count( $data['dbUsuario']) > 0){
  		
  		      $data = array(
                    'userid' => $row->Id,
                    'lname' => $row->name,
                    'username' => $row->username,
                    'validated' => true
                    );
            $this->session->set_userdata($data);

  redirect("home");

       }else{
        $this->session->sess_destroy();
        redirect("home");

       }


	}
}