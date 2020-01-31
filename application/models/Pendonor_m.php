<?php

class Pendonor_m extends CI_Model{
    
    function insert_db($data){
        $this->db->insert('pendonor', $data);
    }
    
    function select_db(){
        return $this->db->query("select * FROM pendonor")->result();
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
        $this->db->where('id_pendonor',$id);
        $this->db->delete('pendonor');
    }


    function select_by_db($id) {
        return $this->db->query("Select * FROM pendonor WHERE id_pendonor='$id'")->result();
    
    } 
    
    function edit_db($id, $data){   
        $this->db  ->where('id_pendonor', $id);   
        $this->db  ->update('pendonor', $data);
        return $this->db->affected_rows();
    }
     function select_pendonor() {
        $query = $this->db->query("SELECT * FROM pendonor");
        return $query->result();
    }
    
    function select_pendonor_where($id) {
        $query = $this->db->query("SELECT * FROM pendonor WHERE id_pendonor='$id'");
        return $query->result();
    }
    
}
