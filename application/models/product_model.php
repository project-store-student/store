<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class product_model extends CI_Model {

    public function select_store_sale_slider_one($perpage, $start) {
        $this->db->select('store_sale.*,materials_type.ty_name,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image');
        //$this->db->from('store_sale');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
//        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
//        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');
        $this->db->order_by('ss_autoid', 'RANDOM');

        //$this->db->order_by('', 'asc');
        $query = $this->db->get('store_sale', $perpage, $start)->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_store_category($id) {
        $this->db->select('materials_type_category.*');
        $this->db->from('materials_type_category');
        $this->db->where('materials_type_category.ty_id', $id);

        $this->db->join('materials_type', 'materials_type_category.ty_id = materials_type.ty_id');

        $query = $this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_store_type_1($id, $perpage_type, $start_type) {
        $this->db->select('store_sale.*,materials_type.ty_name,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image');
        //$this->db->from('store_sale');

        $this->db->where('store_materials.sm_typeid', $id);

        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

//        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
//        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');
//        $this->db->order_by('ss_autoid', 'asc');
        $this->db->order_by('ss_autoid', 'RANDOM');


        $query = $this->db->get('store_sale', $perpage_type, $start_type)->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_store_show_category($id, $c_id, $perpage_ct, $start_ct) {
        $this->db->select('store_sale.*,materials_type.ty_name,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image');
        //$this->db->from('store_sale');

        $this->db->where('store_materials.sm_typeid', $id);
        $this->db->where('store_materials.sm_categoryid', $c_id);

        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

//        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
//        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');
        $this->db->order_by('ss_autoid', 'asc');
        $query = $this->db->get('store_sale', $perpage_ct, $start_ct)->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_store_type_1_count($id) {
        $this->db->where('store_materials.sm_typeid', $id);
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $query = $this->db->count_all_results('store_sale');
        return $query;
    }

    public function select_store_show_category_count($id, $c_id) {
        $this->db->where('store_materials.sm_typeid', $id);
        $this->db->where('store_materials.sm_categoryid', $c_id);
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $query = $this->db->count_all_results('store_sale');
        //echo $this->db->last_query();

        return $query;
    }

    public function select_list_cart($id) {

        $this->db->select('store_sale.*,materials_type.ty_name,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image,store_materials.sm_productdetail');
        $this->db->from('store_sale');

        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

        $this->db->where('store_sale.sm_autoid', $id);
        $this->db->order_by('ss_autoid', 'asc');
        $query = $this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_stroe_sale($id) {
        $this->db->select('store_sale.*');
        $this->db->from('store_sale');
        $this->db->where('ss_autoid', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function insert_favorites($data) {
        $query = $this->db->insert('customer_favorites', $data);
        return $query;
    }

    public function favorites_count($id_user) {
        $this->db->where('c_id', $id_user);
        $this->db->group_by('ss_autoid');

        $query = $this->db->count_all_results('customer_favorites');
        return $query;
    }

    public function delete_favorites($id_sale, $id_user) {
        $this->db->where('ss_autoid', $id_sale);
        $this->db->where('c_id', $id_user);
        $query = $this->db->delete('customer_favorites');
        return $query;
    }

    public function delete_favorites_category($id_sale, $id_category, $id_user) {
        $this->db->where('caf_autoid', $id_category);
        $this->db->where('ss_autoid', $id_sale);
        $this->db->where('c_id', $id_user);
        $query = $this->db->delete('customer_favorites');
        return $query;
    }

    public function select_favorites($id) {
        $this->db->select('customer_favorites.*');
        $this->db->from('customer_favorites');
        $this->db->where('c_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_store_favorites_limit($id) {
        $this->db->select('category_favorites.*');
        $this->db->from('category_favorites');

        $this->db->where('category_favorites.c_id', $id);

        $query = $this->db->get()->result();
        return $query;
    }

    public function select_store_favorites_img($id) {
        $this->db->select('customer_favorites.*,category_favorites.caf_date,category_favorites.caf_name,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image,store_materials.sm_productdetail');
        $this->db->from('customer_favorites');

        $this->db->where('customer_favorites.c_id', $id);

        $this->db->order_by('cf_autoid', 'DESC');
        //$this->db->limit(1);

        $this->db->join('category_favorites', 'customer_favorites.caf_autoid = category_favorites.caf_autoid');
        $this->db->join('store_sale', 'customer_favorites.ss_autoid = store_sale.ss_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $query = $this->db->get()->result();
        return $query;
    }

    public function insert_category_favorites($data) {
        $query = $this->db->insert('category_favorites', $data);
        return $query;
    }

    public function select_category_favorites_limit($id) {
        $this->db->select('category_favorites.*');
        $this->db->from('category_favorites');
        $this->db->where('c_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_category_favorites($id) {

        $this->db->select('category_favorites.*,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image,store_materials.sm_productdetail');
        $this->db->from('category_favorites');

        $this->db->where('category_favorites.c_id', $id);
        $this->db->order_by('caf_autoid', 'DESC');

        $this->db->join('customer_favorites', 'category_favorites.caf_autoid = customer_favorites.caf_autoid');
        $this->db->join('store_sale', 'customer_favorites.ss_autoid = store_sale.ss_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_favorites_category($id, $name) {
        $this->db->where('caf_name', $name);
        $this->db->where('c_id', $id);
        $query = $this->db->count_all_results('category_favorites');
        return $query;
    }

    public function select_favorites_category_forsave($id, $name) {
        $this->db->select('category_favorites.caf_autoid');
        $this->db->from('category_favorites');
        $this->db->where('caf_name', $name);
        $this->db->where('c_id', $id);
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_item_favorites($cid, $name) {

        $this->db->select('customer_favorites.*,category_favorites.caf_name,store_sale.ss_price,store_sale.ss_unit,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_productdetail,store_materials.sm_amount,store_materials.sm_image,store_materials.sm_productdetail');
        $this->db->from('customer_favorites');

        $this->db->where('customer_favorites.c_id', $cid);
        $this->db->where('category_favorites.caf_name', $name);
        //$this->db->order_by('caf_autoid', 'DESC');

        $this->db->join('category_favorites', 'customer_favorites.caf_autoid = category_favorites.caf_autoid');
        $this->db->join('store_sale', 'customer_favorites.ss_autoid = store_sale.ss_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $query = $this->db->get()->result();
        return $query;
    }

    public function update_category_favorites($id, $id_cate, $data) {
        $this->db->where('caf_autoid', $id_cate);
        $this->db->where('c_id', $id);
        $query = $this->db->update('category_favorites', $data);
        return $query;
    }

    public function delete_category_id_favorites($id, $id_cate) {
        $this->db->where('caf_autoid', $id_cate);
        $this->db->where('c_id', $id);
        $query = $this->db->delete('category_favorites');
        return $query;
    }

    public function delete_cutomer_id_favorites($id, $id_cate) {
        $this->db->where('caf_autoid', $id_cate);
        $this->db->where('c_id', $id);
        $query = $this->db->delete('customer_favorites');
        return $query;
    }

    public function type_mtr() {
        $this->db->select('materials_type.*');
        $this->db->from('materials_type');
        $query = $this->db->get()->result();
        return $query;
    }

    public function getRows($id = '') {
        $this->db->select('store_sale.*,store_materials.*');
        $this->db->from('store_sale');
        $this->db->join('store_materials', 'store_materials.sm_autoid = store_sale.sm_autoid');
        if ($id) {
            $this->db->where('store_sale.sm_autoid', $id);
            $query = $this->db->get();
            $result = $query->row_array();
        } else {
            $this->db->order_by('sm_productname', 'asc');
            $query = $this->db->get();
            $result = $query->result_array();
        }
        return !empty($result) ? $result : false;
    }

    public function insertTransaction($data = array()) {
        $insert = $this->db->insert('payments', $data);
        return $insert ? true : false;
    }

    public function insert_idproduct($product) {
        $insert = $this->db->insert('sub_payments', $product);
        return $insert ? true : false;
    }

    public function insert_addresscustomer($customer) {
        $insert = $this->db->insert('payment_addresscustomer', $customer);
        return $insert ? true : false;
    }

    public function selectTransaction($txn_id) {
        $this->db->where('payments.txn_id', $txn_id);
        $query = $this->db->count_all_results('payments');
        return $query;
    }

    public function select_product_payment($txn_id, $cid) {
        $this->db->select('sub_payments.*,payments.*,store_sale.ss_price,store_sale.ss_unit,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_amount,store_materials.sm_image');
        $this->db->from('sub_payments');

        $this->db->where('sub_payments.txn_id', $txn_id);
        $this->db->where('payments.c_id', $cid);

        $this->db->join('payments', 'payments.txn_id = sub_payments.txn_id');
        $this->db->join('store_sale', 'sub_payments.sm_autoid = store_sale.sm_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

        $query = $this->db->get()->result();
        return $query;
    }

    public function select_product_payment_event2($txn_id, $cid) {
        $this->db->select('sub_payments.*,payments.*,store_sale.ss_price,store_sale.ss_unit,materials_type.ty_name,materials_type_category.ct_name,store_materials.sm_productname,store_materials.sm_amount,store_materials.sm_image');
        $this->db->from('sub_payments');

        $this->db->where('sub_payments.txn_id', $txn_id);
        $this->db->where('payments.c_id', $cid);
        $this->db->where('payments.payment_status', "0");
        
        $this->db->join('payments', 'payments.txn_id = sub_payments.txn_id');
        $this->db->join('store_sale', 'sub_payments.sm_autoid = store_sale.sm_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

        $query = $this->db->get()->result();
        return $query;
    }

    public function select_payment_history($cid) {
        $this->db->select('payments.*');
        $this->db->from('payments');
        $this->db->where('c_id', $cid);
        $query = $this->db->get()->result();
        return $query;
    }

    public function search_payment_history($search) {
        $this->db->select('payments.*');
        $this->db->from('payments');
        $this->db->like('payments.txn_id', $search);
        $query = $this->db->get()->result();
        return $query;
    }

    public function search_payment_history_event2($search) {
        $this->db->select('payments.*');
        $this->db->from('payments');
        $this->db->where('payment_status', "0");
        $this->db->like('payments.txn_id', $search);
        $query = $this->db->get()->result();
        return $query;
    }

    public function insert_payment_pending($data) {
        return $this->db->insert('payment_pending', $data);
    }

    public function update_payment_status($txn_id, $data_update) {
        $this->db->where('txn_id', $txn_id);
        $this->db->where('c_id', $_SESSION['customer']['id']);
        $query = $this->db->update('payments', $data_update);
        return $query;
    }

    public function selectforupdate_store_materials($sm_autoid) {
        $this->db->select('store_materials.sm_amount');
        $this->db->from('store_materials');
        $this->db->where('sm_autoid', $sm_autoid);
        $query = $this->db->get()->result();
        return $query;
    }

    public function update_store_materials($sm_autoid, $data_update) {
        $this->db->where('sm_autoid', $sm_autoid);
        $query = $this->db->update('store_materials', $data_update);
        return $query;
    }

    public function select_paymentforverify() {
        $this->db->select('*');
        $this->db->from('payments');
        $this->db->join('customer', 'payments.c_id = customer.c_autoid OR payments.c_id  = customer.c_facebook_id', 'left');
        $query = $this->db->get()->result();

        return $query;
    }

    public function select_payment($txtid, $c_id) {
        $this->db->select('*');
        $this->db->from('payments');

        $this->db->where('payments.txn_id', $txtid);
//        $this->db->where('c_autoid', $c_id);
//        $this->db->or_where('c_facebook_id', $c_id);

        $this->db->join('sub_payments', 'payments.txn_id = sub_payments.txn_id');
        $this->db->join('payment_pending', 'payments.txn_id = payment_pending.txn_id', 'left');
        $this->db->join('payment_addresscustomer', 'payments.txn_id = payment_addresscustomer.txn_id');

        $this->db->join('store_sale', 'sub_payments.sm_autoid = store_sale.sm_autoid');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type', 'store_materials.sm_typeid = materials_type.ty_id');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');

        $this->db->join('customer', 'payments.c_id = customer.c_autoid OR payments.c_id  = customer.c_facebook_id', 'left');

        $query = $this->db->get()->result();
//        echo $this->db->last_query();
        return $query;
    }

    public function update_statuspayment($txn_id, $c_id, $data) {
        $this->db->where('txn_id', $txn_id);
        $this->db->where('c_id', $c_id);
        $query = $this->db->update('payments', $data);
        return $query;
    }

    public function select_payment_forupdate($txtid, $c_id) {
        $this->db->select('*');
        $this->db->from('payments');

        $this->db->where('payments.txn_id', $txtid);
        $this->db->where('c_id', $c_id);

        $this->db->join('sub_payments', 'payments.txn_id = sub_payments.txn_id');

        $query = $this->db->get()->result();
//        echo $this->db->last_query();
        return $query;
    }

    public function select_store_materials_forupdate($sm_autoid) {
        $this->db->select('sm_autoid,sm_amount');
        $this->db->from('store_materials');

        $this->db->where('sm_autoid', $sm_autoid);

        $query = $this->db->get()->result();
//        echo $this->db->last_query();
        return $query;
    }

    public function update_amountmtr($sm_autoid, $dataupdate) {
        $this->db->where('sm_autoid', $sm_autoid);
        $query = $this->db->update('store_materials', $dataupdate);
        return $query;
    }

}
