<?php
class UserModel extends VS_Model {

    public function __construct()
    {
        parent::__construct();

        $this->dataTable="users";
    }



    /*public function GetUserData()

    {

        $this->db->select('id,username,full_name,img_url,user_role');

        $this->db->from($this->dataTable);

        $this->db->where("id",$this->session->userdata['Admin']['id']);

        $this->db->limit(1);

        $query = $this->db->get();

        if ($query) {

            return $query->row_array();

        } else {

            return false;

        }

    }
    public function VendorsList()

    {

        $this->db->select('id,full_name,img_url');

        $this->db->from($this->dataTable);

        $this->db->where("isActive","1");

        $query = $this->db->get();

        $r=$query->result_array();

        return $r;

    }
    public function PictureUrlById($id)

    {

        $this->db->select('id,img_url');

        $this->db->from($this->dataTable);

        $this->db->where("id",$id);

        $this->db->limit(1);

        $query = $this->db->get();

        $res = $query->row_array();

        if(!empty($res['img_url'])){

            return base_url('uploads/users_v/'.$res['img_url']);

        }else{

            return base_url('public/images/user-icon.jpg');

        }

    }*/

}