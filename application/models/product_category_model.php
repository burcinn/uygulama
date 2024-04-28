
<?php
class Product_category_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
    }

    /* Tabloya veri ekleyen fonksiyon */
    public function add($data = array())
    {
        return $this->db->insert("product_categories", $data);
    }

    /* Tablodaki tüm kayıtları çeken fonksiyon */

    public function getAll($order = "id ASC")
    {
        return $this->db->order_by($order)->get("product_categories")->result();
    }

    /* ornekkkk where=array(
    "created_at<="=>date(); mesela bunda oluşturma tarihinden kuçujleri al
        "id"=5; sadece id 5 i al */

    public function delete($where=array())
    {
        return $this->db->where($where)->delete("product_categories");
    }
    public function get($where)
    {
        return $this->db->where($where)->get("")->row();
    }
// result toplum row dizzi olarak gonderiri

  public function update($where=array(),$data=array())
 {
  return $this->db->where($where)->update("product_categories",$data);
 }


}



?>