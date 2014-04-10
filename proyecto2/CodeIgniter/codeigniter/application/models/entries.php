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

}


?>