<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Employee_model extends CI_Model {
private $primary_key='emp_autoid';
    private $table_name='employee';
 
    public function insert_temp($tempall) {
        $this->db->insert('templogin', $tempall);
    }

    public function saveuser($data) {
        $this->db->insert('employee', $data);
    }

    public function insertfb($datafb) {
        $this->db->insert('employee', $datafb);
    }

 
    public function selectlogin_update($id) {
        $this->db->where('emp_autoid', $id);
        $query = $this->db->get('employee')->result();
        return $query;
    }

    public function checkemail_emp($email) {
        $this->db->where('emp_email', $email);
        $query = $this->db->get('employee')->result();
        return $query;
    }

    public function checkemail_temp($token) {
        $this->db->where('temp_token', $token);
        $query = $this->db->get('templogin')->result();
        return $query;
    }

    public function selecttoken_temp($token) {
        $this->db->where('temp_token', $token);
        $query = $this->db->get('templogin')->result();
        return $query;
    }

    public function deletetoke_temp($token) {
        $this->db->where('temp_token', $token);
        $this->db->delete('templogin');
    }

    public function selectuser($id) {
        $this->db->where('emp_autoid', $id);
        $query = $this->db->get('employee');
        return $query->result();
    }


    public function selectfb($id) {
        $this->db->where('emp_FB_id', $id);
        $query = $this->db->get('employee');
        return $query->result();
        //  echo $this->db->last_query();
    }



    public function update_pass_emp($id, $newpass) {
        $this->db->where('emp_autoid', $id);
        $this->db->update('employee', $newpass);
    }

    public function update_emp($id, $password) {
        $this->db->where('emp_autoid', $id);
        $this->db->update('employee', $password);
    }


    public function select_emp_wh_username($username) {
        $this->db->select('emp_password,emp_autoid');
        $this->db->where('emp_username', $username);
        $query = $this->db->get('employee');
        return $query->result();
    }

    
  function get_paged_list($limit=10, $offset=0, $order_column='', $order_type='asc'){
        if(empty($order_column)||empty($order_type)){
            $this->db->order_by($this->primary_key,'asc');  
        }
        else{
            $this->db->order_by($order_column,$order_type);
            return $this->db->get($this->table_name, $limit, $offset);
            
        }
    }
    function count_all(){
        return $this->db->count_all($this->table_name); 
    }
    function get_by_id($id){
        $this->db->where($this->primary_key,$id);
        return $this->db->get($this->table_name);
    }
    function save($person){
        $this->db->insert($this->table_name,$person);
        return $this->db->insert_id();  
    }
    function update($id,$person){
        $this->db->where($this->primary_key,$id);   
        $this->db->update($this->table_name,$person);
    }
    function delete($id){
        $this->db->where($this->primary_key,$id);
        $this->db->delete($this->table_name);
    }
}
