<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Mantenimientos extends CI_Controller {


    public function index()
    {
        $data['blog_name'] = 'The Blog';
        $data['entries'] = $this->entries->getAll();
        $data['biographi'] = $this->entries->getBio();
        $this->load->view('Comentario_show', $data);
    }

   
        public function delete() 
    {
        //obtenemos el nombre
        $id = $this->uri->segment(3);
        //cargamos el modelo y llamamos a la función baja(), pasándole el nombre del registro que queremos borrar.
        $this->load->model('mantenimiento_model');
        $this->professors_model->delete($id);
        //mostramos la vista de nuevo.
        redirect('/mantenimiento','refresh');
        $this->index();
    }
    public function editar()
    {
        //cargamos el modelo y obtenemos la información del contacto seleccionado.
        $this->load->model('mantenimiento_model');
        $data['estudiante'] = $this->mantenimiento_model->obtenerEtudiante($this->uri->segment(3));
        //cargamos la vista para editar la información, pasandole dicha información.
        $this->load->view('editar', $data);
    }

    public function update() 
    {
         //recogemos los datos obtenidos por POST
        $data['first_name'] = $_POST['input1'];
        $data['last_name'] = $_POST['input2'];
        $data['document_number'] = $_POST['input3'];
        $data['email'] = $_POST['input4'];
        $data['updated_at'] = date('Y-m-d-G-i-s-A');
        $data['id'] = $this->uri->segment(3);
        //llamamos al modelo, concretamente a la función insert() para que nos haga el insert en la base de datos.
        $this->load->model('mantenimiento_model');
        $this->professors_model->updated($data);
        //volvemos a visualizar la tabla
        redirect('/mantenimiento','refresh');
        $this->index();
    }
}