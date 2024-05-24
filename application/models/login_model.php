<?php
class brands_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Tabloya veri ekleyen fonksiyon */
    public function add($data = array())
    {
        return $this->db->insert("users", $data);
    }

    /* Tablodaki tüm kayıtları çeken fonksiyon */

    public function getAll($order = "id ASC")
    {
        return $this->db->order_by($order)->get("users")->result();
    }
}