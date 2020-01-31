<?php

class Darah_m extends CI_Model{
    
    function insert_db($data){
        $this->db->insert('darah', $data);
        return $this->db->affected_rows();
    }
    
    function select_db(){
        return $this->db->query("select * FROM darah")->result();
    }
    
    function delete_db($idDarah){
        $this->db->where('id_darah',$idDarah);
        $this->db->delete('darah');
    }

    function select_by_db($idDarah) {
        return $this->db  ->query("Select * FROM darah WHERE id_darah='$idDarah'")->result();
    
    } 
    
    function edit_db($idDarah, $data){   
        $this->db  ->where('id_darah', $idDarah);   
        $this->db  ->update('darah', $data);
        return $this->db->affected_rows();
    }
     function select_darah() {
        $query = $this->db->query("SELECT * FROM darah");
        return $query->result();
    }
    
    function select_darah_where($idDarah) {
        $query = $this->db->query("SELECT * FROM darah WHERE id_darah='$idDarah'");
        return $query->result();
    }
    
}
