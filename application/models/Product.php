<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product extends CI_Model{
	//get and return product rows
	public function getRows($id = ''){
  	$this->db->select('store_sale.*,store_materials.*');
        $this->db->from('store_sale');
        $this->db->join('store_materials', 'store_materials.sm_autoid = store_sale.sm_autoid');
		if($id){
			$this->db->where('store_sale.sm_autoid', $id);
			$query = $this->db->get();
			$result = $query->row_array();
		}else{
			$this->db->order_by('sm_productname','asc');
			$query = $this->db->get();
			$result = $query->result_array();
		}
		return !empty($result)?$result:false;
	}
	//insert transaction data
	public function insertTransaction($data = array()){
		$insert = $this->db->insert('payments',$data);
		return $insert?true:false;
	}
}
