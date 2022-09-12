<?php
class OrderModel extends CI_Model {
    public $dataTable ="orders";
    public function __construct()
    {
        parent::__construct();
    }
    public function get($where = array()){
        return $this->db->where($where)->get($this->dataTable)->row();
    }

    public function getAll($where = array(),$order = " id ASC"){
        return $this->db->where($where)->order_by($order)->get($this->dataTable)->result();
    }

    public function add($data = array()){
        return $this->db->insert($this->dataTable, $data);
    }
    public function update($where = array(), $data = array()){
        return $this->db->where($where)->update($this->dataTable, $data);
    }

    public function delete($where = array()){
        return $this->db->where($where)->delete($this->dataTable);
    }
}