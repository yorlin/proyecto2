<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Entrada extends CI_Controller {

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

	//funcion que trae todas las entredas y las manda al index home
	public function index()
	{
		
		if($this->session->userdata('validated')){
			echo "Administrador";
            $data['blog_name'] = 'The Blog';
		
		$data['entries'] = $this->entries->getAll();
		$data['biographi'] = $this->entries->getBio();
	    $this->load->view('home_index', $data);
        }else{

        	$data['blog_name'] = 'The Blog';
		
		$data['entries'] = $this->entries->getValidate();
		$data['biographi'] = $this->entries->getBio();
	    $this->load->view('home_index', $data);
        }
		

	}

	public function error() 
	{
		echo "Error 404, try again later";
	}

public function blogger(){

		$data['blog_name'] = 'The Blog';
		$data['biographi'] = $this->entries->getBio();
	    $this->load->view('blogger', $data);

}
public function Ver($id)
	{
		$data['blog_name'] = 'The Blog';
		$data['biographi'] = $this->entries->getBio();
       $data['entry'] = $this->entries->getEntrada($id);
       $data['comentario'] = $this->entries->comentar($id);
       $data['id_entrada']=$id;
	   $this->load->view('Entrada_show', $data);
		
}
public function comentario(){

    $data['id']=$this->input->post("entrada");
	return  $this->load->view('Comentario',$data); 
}
        public function insert_coment(){
        	$id =  $this->input->post('entrada');
                $comentario= array(
                        'id_entrada' => $this->input->post('entrada'),
                        'author' => $this->input->post("author"),
                        'comment' => $this->input->post('comment'),
                        'date' => date('Y-m-d H:i:s'),
                        );             
                $this->entries->insert($comentario);
                redirect(base_url()."entrada/Ver/".$id);
        }

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */