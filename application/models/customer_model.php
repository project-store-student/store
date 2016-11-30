<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Customer_model extends CI_Model {

    public function insert_customer($data) {
        $query = $this->db->insert('customer', $data);
        return $query;
    }

    public function select_all_cus($email) {
        $this->db->select('*');
        $this->db->where('c_email', $email);
        $query = $this->db->get('customer');
        return $query->result();
    }

    public function select_customer($id) {
        $this->db->where('c_autoid', $id);
        $this->db->or_where('c_facebook_id', $id);

        $query = $this->db->get('customer');
        return $query->result();
    }

    public function update_data_customer($id, $data) {
        $this->db->where('c_autoid', $id);
        $this->db->or_where('c_facebook_id', $id);
        return $this->db->update('customer', $data);
    }

    public function checkemail_customer($email) {
        $this->db->select('customer.*');
        $this->db->where('c_email', $email);
        $query = $this->db->get('customer')->result();
        return $query;
    }

    public function checkemail_temp($token) {
        $this->db->where('temp_token', $token);
        $query = $this->db->get('templogin')->result();
        return $query;
    }

    public function insert_temp($tempall) {
        $this->db->insert('templogin', $tempall);
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

    public function update_emp($id, $password) {
        $this->db->where('c_autoid', $id);
        $this->db->update('customer', $password);
    }

}
