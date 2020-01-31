<?php

class Petugas_m extends CI_Model{
    
    function insert_db($data){
        $this->db->insert('petugas', $data);
    }
    
    function select_db(){
        return $this->db->query("select * FROM petugas")->result();
    }
    
    function select($table) {
        $query = $this->db->query("Select * from $table");
        return $query;
    }
      function select_other($table, $other, $kolom = null) {
        if (empty($kolom)) {
            $query = $this->db->query("Select * from $table $other");
        } else {
            $query = $this->db->query("Select $kolom from $table $other");
        }
        return $query;
    }

    function delete_db($id){
        $this->db->where('id_petugas',$id);
        $this->db->delete('petugas');
    }


    function select_by_db($id) {
        return $this->db->query("Select * FROM petugas WHERE id_petugas='$id'")->result();
    
    } 
    
    function edit_db($id, $data){   
        $this->db  ->where('id_petugas', $id);   
        $this->db  ->update('petugas', $data);
        return $this->db->affected_rows();
    }
     function select_petugas() {
        $query = $this->db->query("SELECT * FROM petugas");
        return $query->result();
    }
    
    function select_petugas_where($id) {
        $query = $this->db->query("SELECT * FROM petugas WHERE id_petugas='$id'");
        return $query->result();
    }
    
}
