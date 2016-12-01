<?php 

defined('BASEPATH') OR exit('No direct script access allowed');

class Materials_model extends CI_Model {

    public function inserttmtr_category($data) {
        $this->db->insert('materials_type_category', $data);
    }

    public function add_material($data) {
        $this->db->insert('materials', $data);
    }

    public function insert_store($data) {
        $this->db->insert('store_materials', $data);
    }

    public function insert_substore($data) {
        $this->db->insert('sub_store_materials', $data);
    }

    public function add_report_picking($data) {
        $this->db->insert('report_picking', $data);
    }

    public function selectmtr_type() {
        $query = $this->db->get('materials_type')->result();
        return $query;
    }

    public function selectmtr_category($type_id) {
        $this->db->where('ty_id', $type_id);
        $query = $this->db->get('materials_type_category')->result();
        return $query;
    }

    public function selectmtr_typefor_name($type_id) {
        $this->db->where('ty_id', $type_id);
        $query = $this->db->get('materials_type')->result();
        return $query;
    }

    public function select_mareialsall($perpage, $start) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        $this->db->where('mtr_status', 0);
        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');
        $this->db->order_by('mtr_date', 'asc');
        $query = $this->db->get('materials', $perpage, $start)->result();
        return $query;
    }

    public function get_count_select_mareialsall() {
        $this->db->where('mtr_status', 0);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function selectmtr_category_name($category_id) {
        $this->db->where('ct_auto', $category_id);
        $query = $this->db->get('materials_type_category')->result();
        return $query;
    }

    public function select_where_mareialsall($id) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        $this->db->from('materials');
        $this->db->where('mtr_autoid', $id);
        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function selectmaterials($status) {
        $this->db->where('mtr_status', $status);
        $query = $this->db->get('materials')->result();
        return $query;
    }

    public function selectconfirm($confirm,$d,$m,$y) {
        $this->db->where('mtr_status', $confirm);
          $this->db->where('DAYOFMONTH(mtr_date)', $d);
        $this->db->where('MONTH(mtr_date)', $m);
        $this->db->where('YEAR(mtr_date)', $y);
        $query = $this->db->get('materials')->result();
        return $query;
    }

    public function select_materials() {
        $this->db->select('store_materials.*,materials_type.ty_name,materials_type_category.ct_name');
        $this->db->from('store_materials');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_store_product($id) {
        $this->db->select('store_materials.*,materials_type.ty_name,materials_type_category.ct_name,ss_autoid,ss_unit,ss_price');
        $this->db->where('store_materials.sm_autoid', $id);
        $this->db->join('store_sale', 'store_materials.sm_autoid = store_sale.sm_autoid','left');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
       return $this->db->get('store_materials')->result();
       
    }

    public function product_search1($key,$T01) {
          $this->db->select('sm_autoid , sm_productname');
        $this->db->like('sm_productname', $key);
        $this->db->where('sm_typeid', $T01);
        $query = $this->db->get('store_materials');
        return $query->result();
    }

        public function product_search2($key,$T02) {
          $this->db->select('sm_autoid , sm_productname');
        $this->db->like('sm_productname', $key);
        $this->db->where('sm_typeid', $T02);
        $query = $this->db->get('store_materials');
        return $query->result();
    }
        public function product_search3($key,$T03) {
          $this->db->select('sm_autoid , sm_productname');
        $this->db->like('sm_productname', $key);
        $this->db->where('sm_typeid', $T03);
        $query = $this->db->get('store_materials');
        return $query->result();
    }
        public function product_search4($key,$T04) {
          $this->db->select('sm_autoid , sm_productname');
        $this->db->like('sm_productname', $key);
        $this->db->where('sm_typeid', $T04);
        $query = $this->db->get('store_materials');
        return $query->result();
    }
        public function product_search5($key,$T05) {
          $this->db->select('sm_autoid , sm_productname');
        $this->db->like('sm_productname', $key);
        $this->db->where('sm_typeid', $T05);
        $query = $this->db->get('store_materials');
        return $query->result();
    }

    public function select_mat_to_calendar($m, $Y) {

        $this->db->select('mtr_autoid,mtr_date,mtr_productname');
        $this->db->from('materials');
        $this->db->where('mtr_status', 0);
        $this->db->where('MONTH(mtr_date)', $m);
        $this->db->where('YEAR(mtr_date)', $Y);
        $this->db->order_by('mtr_date', 'asc');
        $query = $this->db->get()->result();
//echo $this->db->last_query();
        return $query;
    }

    public function select_rp_to_calendar($m, $Y) {

        $this->db->select('rp_autoid,rp_date,rp_productname');
        $this->db->from('report_picking');
        $this->db->where('rp_status', 0);
        $this->db->where('MONTH(rp_date)', $m);
        $this->db->where('YEAR(rp_date)', $Y);
        $this->db->order_by('rp_date', 'asc');
        $query = $this->db->get()->result();
//echo $this->db->last_query();
        return $query;
    }

    public function select_mat_to_calendar_emp($m, $Y, $id) {

        $this->db->select('mtr_autoid,mtr_date,mtr_productname');
        $this->db->from('materials');
        $this->db->where('mtr_status', 0);
        $this->db->where('emp_autoid', $id);
        $this->db->where('MONTH(mtr_date)', $m);
        $this->db->where('YEAR(mtr_date)', $Y);
        $this->db->order_by('mtr_date', 'asc');
        $query = $this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_rp_to_calendar_emp($m, $Y, $id) {
        $this->db->select('rp_autoid,rp_date,rp_productname');
        $this->db->from('report_picking');
        $this->db->where('rp_status', 0);
        $this->db->where('emp_id', $id);
        $this->db->where('MONTH(rp_date)', $m);
        $this->db->where('YEAR(rp_date)', $Y);
        $this->db->order_by('rp_date', 'asc');
        $query = $this->db->get()->result();
        //echo $this->db->last_query();
        return $query;
    }

    public function select_day_material($dayfrist, $dayend, $perpage, $start2) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');

        //$this->db->from('materials');
        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('mtr_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('materials.emp_autoid', $id);
        }
        $this->db->where('mtr_date BETWEEN "' . date('Y-m-d 00:00:00', strtotime($dayfrist)) . '" AND "' . date('Y-m-d 23:59:59', strtotime($dayend)) . '"');

        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start2)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_day_material() {
        $this->db->where('mtr_status', 1);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_month_material($year, $monthfrist, $monthend, $lastDay, $perpage, $start2) {

        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        //$this->db->from('materials');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('mtr_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('materials.emp_autoid', $id);
        }
        $this->db->where('mtr_date BETWEEN "' . date('Y-m-01 00:00:00', strtotime($monthfrist)) . '" AND "' . date('Y-m-' . $lastDay . ' 23:59:59', strtotime($monthend)) . '"');
        $this->db->where("DATE_FORMAT(mtr_date,'%Y')", $year);

        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start2)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_month_material() {
        $this->db->where('mtr_status', 1);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_year_material($year, $perpage, $start2) {

        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        //$this->db->from('materials');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('mtr_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('materials.emp_autoid', $id);
        }
        $this->db->where("DATE_FORMAT(mtr_date,'%Y')", $year);

        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start2)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_year_material() {
        $this->db->where('mtr_status', 1);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_error_material($perpage, $start2) {

        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('mtr_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('materials.emp_autoid', $id);
        }
        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start2)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function select_error_materials() {

        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('mtr_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('materials.emp_autoid', $id);
        }
        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials')->result();
//echo $this->db->last_query();
        return $query;
    }


    public function get_count_select_error_material() {
        $this->db->where('mtr_status', 1);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_mareialsall_confirm($perpage, $start) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        // $this->db->from('materials');
        $this->db->where('mtr_status', 1);


        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_mareialsall_confirm() {
        $this->db->where('mtr_status', 1);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_where_store($id) {
        $this->db->where('sm_autoid', $id);
        $query = $this->db->get('store_materials')->result();
        return $query;
    }


    public function select_store_whtpye($key,$limit,$page) {
        $this->db->select('store_materials.*,materials_type.ty_name,materials_type_category.ct_name');
        $this->db->from('store_materials');
        $this->db->like('sm_productname', $key);
        $this->db->limit($limit, $page);
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
        $query = $this->db->get()->result();
//echo $this->db->last_query();
        return $query;
    }

    public function select_rp($status) {
        $this->db->where('rp_status', $status);
        $query = $this->db->get("report_picking")->result();
        return $query;
    }

    public function select_rp_confirm($statusconfirm,$d,$m,$y) {
        $this->db->where('rp_status', $statusconfirm);
         $this->db->where('DAYOFMONTH(rp_date)', $d);
        $this->db->where('MONTH(rp_date)', $m);
        $this->db->where('YEAR(rp_date)', $y);
        $query = $this->db->get("report_picking")->result();
        return $query;
    }


    public function update_status_mareialsall($id, $status) {
        $this->db->where('mtr_autoid', $id);
        $this->db->update('materials', $status);
    }

    public function update_store($id, $data) {
        $this->db->where('sm_autoid', $id);
        $this->db->update('store_materials', $data);
    }
  

    public function select_mareialsall_emp($id, $perpage, $start1) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
//$this->db->select('*');
        //$this->db->from('materials');
        $this->db->where('materials.emp_autoid', $id);
        $this->db->where('mtr_status', 0);


        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');

        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');
//        $this->db->order_by('mtr_date', 'asc');
        $query = $this->db->get('materials', $perpage, $start1)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_mareialsall_emp($id) {
        $this->db->where('emp_autoid', $id);
        $this->db->where('mtr_status', 0);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function select_mareialsall_confirm_emp($id, $perpage, $start2) {
        $this->db->select('materials.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname');
        //$this->db->from('materials');

        $this->db->where('materials.emp_autoid', $id);

        $this->db->join('materials_type_category', 'materials.ct_id = materials_type_category.ct_auto');
        $this->db->join('employee', 'materials.emp_autoid = employee.emp_autoid');
        $this->db->join('materials_type', 'materials.ty_id = materials_type.ty_id');

        $query = $this->db->get('materials', $perpage, $start2)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_mareialsall_confirm_emp($id) {
        $this->db->where('emp_autoid', $id);
        $query = $this->db->count_all_results('materials');
        return $query;
    }

    public function update_data_materials($id_emp, $id_pro, $update_mtr) {
        $this->db->where('emp_autoid', $id_emp);
        $this->db->where('mtr_id', $id_pro);
        $this->db->update('materials', $update_mtr);
//echo $this->db->last_query();
    }

    public function selectconfirm_emp($id_emp,$d,$m,$y) {
        $this->db->where('emp_autoid', $id_emp);
        $this->db->where('mtr_status', 1);
           $this->db->where('DAYOFMONTH(mtr_date)', $d);
        $this->db->where('MONTH(mtr_date)', $m);
        $this->db->where('YEAR(mtr_date)', $y);
        $query = $this->db->get('materials')->result();
        return $query;
    }

    public function selectwaiting_emp($id_emp) {
        $this->db->where('emp_autoid', $id_emp);
        $this->db->where('mtr_status', 0);

        $query = $this->db->get('materials')->result();
        return $query;
    }

    public function selectmtr_type_emp($id_emp, $id_pro) {
        $this->db->select('*');
        $this->db->from('materials');

        $this->db->where('emp_autoid', $id_emp);
        $this->db->where('mtr_autoid', $id_pro);

        $query = $this->db->get()->result();
        return $query;
    }

    public function delete_data_materials($id_emp, $id_pro) {

        $this->db->where('emp_autoid', $id_emp);
        $this->db->where('mtr_autoid', $id_pro);
        $this->db->delete('materials');
    }

    public function delete_data_materials_admin($id_pro) {
        $this->db->where('mtr_autoid', $id_pro);
        $this->db->delete('materials');
    }

    public function select_picking($perpage, $start) {
        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        // $this->db->from('report_picking');

        $this->db->where('rp_status', 0);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');

        $query = $this->db->get('report_picking', $perpage, $start)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_picking() {
        $this->db->where('rp_status', 0);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_picking_id($id) {
        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        $this->db->from('report_picking');

        $this->db->where('rp_autoid', $id);
        $this->db->where('rp_status', 0);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');

        $query = $this->db->get()->result();
//echo $this->db->last_query();
        return $query;
    }

    public function update_rp($id, $status) {
        $this->db->where('rp_autoid', $id);
        $this->db->update('report_picking', $status);
    }

    public function update_store_rp($id, $amount) {
        $this->db->where('sm_autoid', $id);
        $this->db->update('store_materials', $amount);
    }

    public function select_picking_confirm($perpage, $start) {

        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        // $this->db->from('report_picking');

        $this->db->where('rp_status', 1);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');

        $query = $this->db->get('report_picking', $perpage, $start)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_picking_confirm() {
        $this->db->where('rp_status', 1);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_day_material1($dayfrist, $dayend, $perpage, $start4) {
        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        // $this->db->from('report_picking');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('rp_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('report_picking.emp_id', $id);
        }
        $this->db->where('rp_date BETWEEN "' . date('Y-m-d 00:00:00', strtotime($dayfrist)) . '" AND "' . date('Y-m-d 23:59:59', strtotime($dayend)) . '"');

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');
        $query = $this->db->get("report_picking", $perpage, $start4)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_day_material1() {
        $this->db->where('rp_status', 1);

        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_month_material1($year, $monthfrist, $monthend, $lastDay, $perpage, $start) {

        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        // $this->db->from('report_picking');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('rp_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('report_picking.emp_id', $id);
        }
        $this->db->where('rp_date BETWEEN "' . date('Y-m-01 00:00:00', strtotime($monthfrist)) . '" AND "' . date('Y-m-' . $lastDay . ' 23:59:59', strtotime($monthend)) . '"');
        $this->db->where("DATE_FORMAT(rp_date,'%Y')", $year);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');
        $query = $this->db->get('report_picking', $perpage, $start)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_month_material1() {
        $this->db->where('rp_status', 1);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_year_material1($year, $perpage, $start4) {

        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        //$this->db->from('report_picking');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('rp_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('report_picking.emp_id', $id);
        }
        $this->db->where("DATE_FORMAT(rp_date,'%Y')", $year);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');
        $query = $this->db->get('report_picking', $perpage, $start4)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_year_material1() {
        $this->db->where('rp_status', 1);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_error_material1($perpage, $start4) {

        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        $this->db->from('report_picking');

        if ($_SESSION['sessemp']['status'] == 0) {
            $this->db->where('rp_status', 1);
        } else {
            $id = $_SESSION['sessemp']['id'];
            $this->db->where('report_picking.emp_id', $id);
        }
        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $query = $this->db->get('report_picking', $perpage, $start4)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_error_material1() {
        $this->db->where('rp_status', 1);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_picking_emp($id, $perpage, $start3) {
        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        //$this->db->from('report_picking');

        $this->db->where('report_picking.emp_id', $id);
        $this->db->where('rp_status', 0);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');

        $query = $this->db->get('report_picking', $perpage, $start3)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_picking_emp($id) {
        $this->db->where('rp_status', 0);
        $this->db->where('emp_id', $id);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function select_picking_confirm_emp($id, $perpage, $start4) {
        $this->db->select('report_picking.*,materials_type.ty_name,materials_type_category.ct_name,employee.emp_fristname,store_materials.sm_productname');
        //$this->db->from('report_picking');

        $this->db->where('report_picking.emp_id', $id);

        $this->db->join('materials_type', 'report_picking.ty_id = materials_type.ty_id');
        $this->db->join('materials_type_category', 'report_picking.ct_auto = materials_type_category.ct_auto');
        $this->db->join('employee', 'report_picking.emp_id = employee.emp_autoid');
        $this->db->join('store_materials', 'report_picking.sm_autoid = store_materials.sm_autoid');

        $this->db->order_by('rp_date', 'asc');

        $query = $this->db->get('report_picking', $perpage, $start4)->result();
//echo $this->db->last_query();
        return $query;
    }

    public function get_count_select_picking_confirm_emp($id) {
        $this->db->where('emp_id', $id);
        $query = $this->db->count_all_results('report_picking');
        return $query;
    }

    public function delete_rp_whid($id) {
        $this->db->where('rp_autoid', $id);
        $this->db->delete('report_picking');
    }

    public function update_sub_store($id, $ssm) {
        $this->db->where('ssm_autoid', $id);
        $this->db->update('sub_store_materials', $ssm);
    }

    public function select_substore_product($id) {
        $this->db->select('sub_store_materials.*,materials_type.ty_name,materials_type_category.ct_name');
        $this->db->from('sub_store_materials');
        $this->db->where('ssm_autoid', $id);
        $this->db->join('materials_type_category', 'sub_store_materials.ssm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'sub_store_materials.ssm_typeid= materials_type.ty_id');
        $query = $this->db->get()->result();
        return $query;
    }

    public function select_rpid($id) {
        $this->db->where('rp_autoid', $id);
        $this->db->where('rp_status', 0);
        $query = $this->db->get("report_picking")->result();
        return $query;
    }
   
    public function select_ss_whid($id) {
        $this->db->select('store_sale.*,store_materials.*');
        $this->db->from('store_sale');
        $this->db->where('store_sale.sm_autoid', $id);
        $this->db->join('store_materials', 'store_materials.sm_autoid = store_sale.sm_autoid');
        $query = $this->db->get()->result();
        return $query;
    }
    public function select_sm_whct_auto($ct_auto) {
        $this->db->where('sm_categoryid', $ct_auto);
        $query = $this->db->get('store_materials')->result();
        return $query;
    }

    public function add_order($data) {
          $this->db->insert('report_order_detail', $data);
    }

 public function count_order_whrpo_id($id) {
        $this->db->where('rpo_autoid', $id);
        $query = $this->db->count_all_results('report_order_detail');
        return $query;
    }

    public function select_od_wh_empid_stt($status,$emp_id){
     $this->db->select('report_order_detail.*');
        $this->db->from('report_order_detail');
        $this->db->where('od_status', $status);
        $this->db->where('emp_autoid', $emp_id);
        $query = $this->db->get()->result();
        return $query;
    }
     public function row_od_wh_empid_stt($status,$emp_id){
     $this->db->select('report_order_detail.*');
        $this->db->from('report_order_detail');
        $this->db->where('od_status', $status);
        $this->db->where('emp_autoid', $emp_id);
        $this->db->limit(1);
        $this->db->order_by('od_autoid', 'desc');
        $query = $this->db->get()->result();
        return $query;
    }

     public function update_rpo_id_to_od($data,$status,$emp_autoid) {
        $this->db->where('emp_autoid', $emp_autoid);
        $this->db->where('od_status', $status);
          $this->db->update('report_order_detail', $data);
    }

      public function add_rpo($data) {
          $this->db->insert('report_order', $data);
    }
   public function delete_row_od($id) {
            $this->db->where('od_autoid', $id);
            $this->db->delete('report_order_detail');
    }


   

       public function save_to_sale($data) {
        $this->db->insert('store_sale', $data);
    }
      public function update_sm_sale($sm_sale,$sm_autoid) {
        $this->db->where('sm_autoid', $sm_autoid);
        $this->db->update('store_materials', $sm_sale);
    } 

        public function select_all_rpo() {
       $this->db->select('report_order.*,employee.emp_fristname');
            $this->db->from('report_order');
        $this->db->join('employee', 'employee.emp_autoid = report_order.emp_autoid');
         $query = $this->db->get()->result();
        return $query;
    }
    public function select_rpo_od_whid_status($rpo_id,$rpo_status){
   $this->db->select('report_order.*,report_order_detail.*');
            $this->db->from('report_order');
        $this->db->where('report_order.rpo_autoid', $rpo_id);
        $this->db->where('report_order.rpo_status', $rpo_status);
        $this->db->join('report_order_detail', 'report_order_detail.rpo_autoid = report_order.rpo_autoid');
         $query = $this->db->get()->result();
        return $query;
}

        public function select_rpo_od_whid($id) {
       $this->db->select('report_order.*,report_order_detail.*,employee.emp_fristname,ty_name,ct_name');
            $this->db->from('report_order');
        $this->db->where('report_order.rpo_autoid', $id);
        $this->db->join('employee', 'report_order.emp_autoid = employee.emp_autoid');
        $this->db->join('report_order_detail', 'report_order_detail.rpo_autoid = report_order.rpo_autoid');
        $this->db->join('materials_type_category', 'report_order_detail.ct_id = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'report_order_detail.ty_id= materials_type.ty_id');
         $query = $this->db->get()->result();
        return $query;
    }
 public function select_ss_sm($limit,$offset,$order_column, $order_type){
       $this->db->select('store_sale.*,store_materials.sm_productname,store_materials.sm_image,store_materials.sm_autoid,store_materials.sm_productdetail,store_materials.sm_amount,materials_type.ty_name,materials_type_category.ct_name');
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
               $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
             if(empty($order_column)||empty($order_type)){
            $this->db->order_by('store_sale.sm_autoid','asc');  
        }
        else{
            $this->db->order_by('store_sale.'.$order_column,$order_type);
        }
    return $this->db->get('store_sale',$limit, $offset)->result();
        
 }
 public function delete_row_ss($id) {
            $this->db->where('ss_autoid', $id);
            $this->db->delete('store_sale');
    }
     public function select_ss_smwhid($id){
       $this->db->select('store_sale.*,store_materials.sm_productname,store_materials.sm_image,store_materials.sm_autoid,store_materials.sm_productdetail,materials_type.ty_name,materials_type_category.ct_name');
            $this->db->from('store_sale');
        $this->db->where('store_sale.ss_autoid', $id);
        $this->db->join('store_materials', 'store_sale.sm_autoid = store_materials.sm_autoid');
        $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
         $query = $this->db->get()->result();
        return $query;
 }


    public function update_store_sale($ss_autoid, $data) {
        $this->db->where('ss_autoid', $ss_autoid);
        $this->db->update('store_sale', $data);
    }
 
    public function count_store_sale() {
        return  $this->db->count_all('store_sale');
        
    }


public function select_repicking($emp_id, $rp_id) {
        $this->db->select('*');
        $this->db->from('report_picking');

        $this->db->where('rp_autoid', $rp_id);
        $this->db->where('emp_id', $emp_id);
        $query = $this->db->get()->result();
        return $query;
    }



    public function select_sub_store_materials($id) {
        $this->db->select('*');
        $this->db->from('sub_store_materials');
        $this->db->where('ssm_autoid', $id);
        $query = $this->db->get()->result();
        return $query;
    }



    public function update_status_rpo($rpo_id,$data){
   $this->db->where('rpo_autoid', $rpo_id);
        $this->db->update('report_order', $data);
    }

   public function count_sm_smsale0($sm_sale) {
        $this->db->select('sm_sale');
        $this->db->where('sm_sale', $sm_sale);
        $query =   $this->db->get('store_materials')->result();
        $count= count($query);
        return $count;
    }
      public function count_sm() {
        $this->db->select('sm_sale');
        $query =   $this->db->get('store_materials')->result();
        $count= count($query);
        return $count;
    }
 public function select_sm_limit_sm_sale0($limit,$offset,$order_column, $order_type,$sm_sale){
       $this->db->select('store_materials.*,materials_type.ty_name,materials_type_category.ct_name');
        $this->db->where('sm_sale', $sm_sale);
               $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
               if(empty($order_column)||empty($order_type)){
            $this->db->order_by('sm_autoid','asc');  
        }
        else{
            $this->db->order_by($order_column,$order_type);
        }
    return $this->db->get('store_materials',$limit, $offset)->result();
        
 }
  public function select_sm_limit($limit,$offset,$order_column, $order_type){ 
       $this->db->select('store_materials.*,materials_type.ty_name,materials_type_category.ct_name');
               $this->db->join('materials_type_category', 'store_materials.sm_categoryid = materials_type_category.ct_auto');
        $this->db->join('materials_type', 'store_materials.sm_typeid= materials_type.ty_id');
          if(empty($order_column)||empty($order_type)){
            $this->db->order_by('sm_autoid','asc');  
        }
        else{
            $this->db->order_by($order_column,$order_type);
        }
    return $this->db->get('store_materials',$limit, $offset)->result();
        
 }
 public function delete_row_sm($id,$sm_sale) {
            $this->db->where('sm_autoid', $id);
            $this->db->where('sm_sale', $sm_sale);
            $this->db->delete('store_materials');
            if($this->db->affected_rows() > 0){
                return 1;
            }else{
                return  0;
            }
   
    }
     public function delete_row_ssm($id) {
            $this->db->where('ssm_autoid', $id);
            $this->db->delete('sub_store_materials');
    }
}


