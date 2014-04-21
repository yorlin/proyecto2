<?php 


class Entries extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 
    
    public function delete($id) 
    {
        $this->db->where('id', $id);
        $this->db->delete('professor');
    }
    public function updated($data) 
    {
        $this->db->set('first_name', $data['first_name']);
        $this->db->set('last_name', $data['last_name']);
        $this->db->set('email', $data['email']);
        $this->db->set('document_number', $data['document_number']);
        $this->db->set('updated_at', $data['updated_at']);
        $this->db->where('id', $data['id']);
        $this->db->update('professor');
    }

}


?>