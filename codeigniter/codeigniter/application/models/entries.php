<?php 


class Entries extends CI_Model {

    /**
     * Get subdomain name for a especified account
     * @param account_id
     * @return subdomain name found
     */ 

    //funcion que trae todas las entradas
    function getAll()
    {       
        
        $query = $this->db->get('entradas');
        return $query->result_array();
           
    }
    function getValidate()
    {       
        $this->db->where('Validacion', true);
        $query = $this->db->get('entradas');

        
        return $query->result_array();
           
    }

//trae los datos del usuraio y los comparamos con los parametros
    function getUser($datos)
    {       
        
        $query = $this->db->query("select * from usuarios where username='".$datos['user']."' and  password = sha('".$datos['pass']."')");
        return $query->row();
           
    }
     function getBio()
    {       
        
        $query = $this->db->get('estadisticas');

        return $query->result_array();
           
    }
     function getEntrada($id)
    {       
        
          $query = $this->db->query("select * from entradas where id = $id");

        return $query->result_array()[0];
           
    }
       
       public function insert($data) 
  {
    $this->db->set('id_entrada', $data['id_entrada']);
    $this->db->set('author', $data['author']);
    $this->db->set('comment', $data['comment']);
    $this->db->set('date', $data['date']);
    $this->db->insert('comentarios');
  }


public function comentar($id){

        $query = $this->db->query("select * from comentarios where id_entrada = $id");
        return $query->result_array();

}

}
?>