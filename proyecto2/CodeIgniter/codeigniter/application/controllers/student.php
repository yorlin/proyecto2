<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student extends CI_Controller {


    public function index()
    {
        $this->load->helper('url');
        // access the DB get all students
        // send the result to the view
        // 
        //$data = [["id" => '1', "name" => 'Bladimir']];
        $this->load->view('student_index');
    }

    public function show($id)
    {
        // access the DB get student with id = $id
        // send the result to the view
        //$result = $this->db->get('students')->where("id = $id");
        $name = 'Bladimir';
        $lastname = 'Arroyo';
        $data['student_id'] = $id;
        $data['name'] = $name;
        $data['last_name'] = $lastname;
        $this->load->view('student_show', $data);
    }

}