<?php

class VS_Model extends CI_Model{
    public $dataTable;

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

        if (isAllowedWriteModule())
        return $this->db->insert($this->dataTable, $data);
        else
            return false;
    }
    public function update($where = array(), $data = array()){

        if (isAllowedUpdateModule())
        return $this->db->where($where)->update($this->dataTable, $data);
        else
            return false;
    }

    public function delete($where = array()){

        if (isAllowedDeleteModule())
        return $this->db->where($where)->delete($this->dataTable);
        else
            return false;
    }

    public function count($where = array()){
        return $this->db->where($where)->count_all($this->dataTable);
    }
    public function countToday(){
        $users = getActiveUser();


            $this->db->select('createdAt');
            $this->db->from($this->dataTable);
            $this->db->like('createdAt', date("Y-m-d"));

            return $this->db->count_all_results();


    }

}