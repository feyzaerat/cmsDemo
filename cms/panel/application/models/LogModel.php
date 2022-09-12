<?php

class LogModel extends CI_Model
{
    public $dataTable = 'logs';

    public function getAll($where = array()){
        return $this->db->where($where)->get($this->dataTable)->result();
    }
    public function get($where, $dataTable){
        return $this->db->where($where)->get($dataTable)->row();
    }
    public function add($data = array()){
        return $this->db->insert($this->dataTable, $data);
    }
    public function delete($where = array()){
        return $this->db->where($where)->delete($this->dataTable);
    }
}