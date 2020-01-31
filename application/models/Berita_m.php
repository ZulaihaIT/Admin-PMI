<?php

class Berita_m extends CI_Model{
    
    function insert_db($data){
        $this->db->insert('berita', $data);
    }
    
    function select_db(){
        return $this->db->query("select * FROM berita")->result();
    }
    function select_by_db($id) {
        return $this->db->query("Select * FROM berita WHERE id_berita='$id'")->result();
    
    }
    
    function delete_db($id){
        $this->db->where('id_berita',$id);
        $this->db->delete('berita');
    }

    function edit_db($id, $data){   
        $this->db->where('id_berita', $id);   
        $this->db->update('berita', $data);
        return $this->db->affected_rows();
    }
     function select_berita() {
        $query = $this->db->query("SELECT * FROM berita");
        return $query->result();
    }
    
    function select_berita_where($id) {
        $query = $this->db->query("SELECT * FROM berita WHERE id_berita='$id'");
        return $query->result();
    }
    
}
