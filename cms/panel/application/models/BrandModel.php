<?php
class BrandModel extends VS_Model {

    public function __construct()
    {
        parent::__construct();

        $this->dataTable = "brands";
    }

}