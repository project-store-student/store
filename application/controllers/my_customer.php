<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class My_customer extends CI_Controller {

    public function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->model('product_model');
        $this->load->model('customer_model');
        $this->load->model('employee_model');
        $this->load->helper('cookie');
        $this->load->helper('url');
        $this->load->helper('general_helper');
        $this->load->library('facebook');
        $this->load->library('paypal_lib');


        $test['footer_type'] = $this->product_model->type_mtr();
        $this->session->set_userdata("footer", $test);

        $this->load->library('googlemaps');

        $config['center'] = '16.4304742,102.863721';
        $config['zoom'] = '15';
        $this->googlemaps->initialize($config);

        $marker = array();
        $marker['position'] = '16.4290711, 102.8633442';
        $this->googlemaps->add_marker($marker);
        $test['map'] = $this->googlemaps->create_map();
        $this->session->set_userdata("footer", $test);
        // $this->load->view('view_file', $data);
    }

    public function check_id() {
        if (isset($_SESSION['customer'])) {
            
        } else {
            redirect(base_url('product/'));
        }
    }

    public function index() {

        $perpage = 4;
        $start = 0;
        $perpage_type = 16;
        $perpage_ct = 16;


        $page = $this->uri->segment(2);
        $pagecategory = $this->uri->segment(3);
        $category_id = $this->uri->segment(4);
        $page_num = $this->uri->segment(5);

        for ($i = 1; $i <= 5; $i++) {

            if ($page == $i) {
                $page_type = $page_num;
                $this->session->unset_userdata('total');
            } else {
                $page_type = 1;
                $this->session->unset_userdata('total');
            }
            if (isset($_SESSION["c_id"])) {
                $cid = $_SESSION["c_id"];
            } else {
                $cid = "";
            }
            if ($category_id == $cid) {
                $page_ct = $page_num;
                $this->session->unset_userdata('total_ca');
                $this->session->unset_userdata('cid');
            } else {
                if (isset($category_id)) {
                    $page_ct = $page_num;
                    $this->session->unset_userdata('total_ca');
                    $this->session->unset_userdata('cid');
                } else {
                    $page_ct = 1;
                    $this->session->unset_userdata('total_ca');
                    $this->session->unset_userdata('cid');
                }
            }


            $start_type = ($page_type - 1) * $perpage_type;
            $start_ct = ($page_ct - 1) * $perpage_ct;

            $data['data'][$i] = $this->product_model->select_store_sale_slider_one($perpage, $start);
            $start += 4;

            $id = "T0" . $i;
            $data['type'][$i] = $this->product_model->select_store_type_1($id, $perpage_type, $start_type);
            $data['category'][$i] = $this->product_model->select_store_category($id);
            if ($pagecategory == "all") {
                $this->session->set_userdata("c_id", "");
            } else {
                if (!isset($pagecategory)) {
                    $this->session->set_userdata("c_id", "");
                } else {
                    $c_id = $category_id;
                    $data['type'][$i] = $this->product_model->select_store_type_1($id, $perpage_type, $start_type);
                    $data['show_category'][$i] = $this->product_model->select_store_show_category($id, $c_id, $perpage_ct, $start_ct);
                    $this->session->set_userdata("c_id", $c_id);
                }
            }

//////////////////////////////
            $row = $this->product_model->select_store_type_1_count($id);

            $total_page = ceil($row / $perpage_type);
            $datatotal = array(
                'total' => $total_page,
                'amountpage' => $page_type,
            );
            $this->session->set_userdata("page$i", $datatotal);
//////////////////////////////
            $c_id = $_SESSION["c_id"];
            $row_ca = $this->product_model->select_store_show_category_count($id, $c_id);

            $total_page_ca = ceil($row_ca / $perpage_ct);
            $datatotal_ca = array(
                'total_ca' => $total_page_ca,
                'amountpage_ca' => $page_ct,
                'cid' => $c_id,
                'name' => $pagecategory
            );
            $this->session->set_userdata("page_ca$i", $datatotal_ca);
//////////////////////////////
        }
        //  print_r($data);
        if (isset($_SESSION['customer']['id'])) {
            $id_user = $_SESSION['customer']['id'];
        } else {
            $id_user = "";
        }
        $data['test'] = $this->product_model->select_favorites($id_user);
        //print_r($data['test']);
        //print_r($data['caf_autoid']);
        $this->load->view('view_product', $data);
    }

    public function view_login() {
        $data['login_url'] = $this->facebook->getLoginUrl(array(
            'redirect_uri' => site_url('my_customer/login_facebook'),
            'scope' => 'user_about_me,email,public_profile'
        ));
        $this->load->view('view_loginproduct', $data);
    }

    public function showupload() {
        $defulttype = $this->uri->segment(3);
        $arrimg = explode('.', $defulttype);
        $miantype = "image/jpg";

        if ($arrimg[1] == "png") {
            $miantype = "image/png";
        }
        $img = "C:\AppServ\www\myproject/branches/store/img/" . $this->uri->segment(3);
        header('Pragma: public');
        header('Cache-Control: max-age=86400');
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
        header('Content-Type: ' . $miantype);
        echo readfile($img);
    }

    public function sign_up_customer() {

        $data['c_facebook_id'] = "0";
        $data['c_name'] = $this->input->post('firstname');
        $data['c_lastname'] = $this->input->post('lastname');
        $data['c_email'] = $this->input->post('email');
        $data['c_password'] = md5($this->input->post('password'));
        $data['c_gender'] = $this->input->post('gender');
        $data['c_address'] = $this->input->post('address');
        $check['data_check'] = $this->customer_model->checkemail_customer($data['c_email']);
        if (isset($check['data_check'][0]->c_email)) {
            echo 2;
        } else {
            echo $this->customer_model->insert_customer($data);
        }
    }

    public function customer_edit_profile() {
        $this->check_id();

        $data['detail'] = $this->customer_model->select_customer($_SESSION['customer']['id']);
        $this->load->view("view_editcustomer", $data);
    }

    public function login_customer() {
        $this->load->library('facebook');
        $login['emp_email'] = $this->input->post("username");
        $login['emp_password'] = md5($this->input->post("password"));

        $allcus['all'] = $this->customer_model->select_all_cus($login['emp_email']);
        print_r($allcus);
        foreach ($allcus['all'] as $value) {
            $pass = $value->c_password;
            $id = $value->c_autoid;
        }
        $password = $pass;
        if ($password == $login['emp_password']) {
            $data_customer['data'] = $this->customer_model->select_customer($id);

            foreach ($data_customer['data'] as $key) {
                $idcus = $key->c_autoid;
                $name = $key->c_name;
                $lastname = $key->c_lastname;
                $email = $key->c_email;
                $gender = $key->c_gender;
            }
            $arrcus = array(
                'id' => $idcus,
                'name' => $name . " " . $lastname,
                'email' => $email,
                'gender' => $gender,
            );
            $this->session->set_userdata('customer', $arrcus);
        } else {
            echo "fail";
        }
    }

    public function login_facebook() {
        $user = $this->facebook->getUser();
        if ($user) {
            try {
                $data['user_profile'] = $this->facebook->api('/me?fields=id,first_name,last_name,email,picture,link,gender');
                $id = $this->customer_model->select_customer($data['user_profile']['id']);
                if ($data['user_profile']['gender'] == "male") {
                    $gender = 1;
                } else {
                    $gender = 2;
                }
                $arrcus = array(
                    'id' => $data['user_profile']['id'],
                    'name' => $data['user_profile']['first_name'] . " " . $data['user_profile']['last_name'],
                    'picture' => $data['user_profile']['picture']['data']['url'],
                    'link' => $data['user_profile']['link'],
                    'email' => $data['user_profile']['email'],
                    'gender' => $gender
                );
                if (count($id) >= 1) {
                    
                } else {
                    $datainsert = array(
                        'c_facebook_id' => $data['user_profile']['id'],
                        'c_name' => $data['user_profile']['first_name'],
                        'c_lastname' => $data['user_profile']['last_name'],
                        'c_facebook_picture' => $data['user_profile']['picture']['data']['url'],
                        'c_facebook_link' => $data['user_profile']['link'],
                        'c_email' => $data['user_profile']['email'],
                        'c_gender' => $gender
                    );
                    $this->customer_model->insert_customer($datainsert);
                }
            } catch (FacebookApiException $e) {
                $user = null;
            }
        }
        $this->session->set_userdata('customer', $arrcus);
        redirect(product_url());
    }

    public function login() {

        $this->load->view('login.php');
    }

    public function logout() {
        $this->load->library('facebook');
        $this->facebook->destroySession();
        session_destroy();
        redirect(product_url());
    }

    public function add_item() {
        $id = $this->input->post('id');
        $item_cookie = $this->input->cookie();
        if ($id == "undefined") {
            if (count($item_cookie) <= 1) {
                echo "begin";
            } else {
                echo $this->cookie_amount($id) - 1;
            }
        } else {
            $amount = 1;
            $item = array(
                'name' => $id,
                'value' => $amount,
                'expire' => 3600,
            );
//           $this->session->set_userdata($item_cookie);
//            print_r($_SESSION);
            $this->input->set_cookie($item, TRUE);
//print_r($item_cookie);
            echo $this->cookie_amount($id);
        }
    }

    public function cookie_amount($id) {
        $ad = 0;
        $item_cookie = $this->input->cookie();
// print_r($item_cookie);
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
//echo $id;
                $ad++;
            } else {
                if ($key == $id) {
                    
                } else {
//echo $key;
                    $ad++;
                }
            }
        }
        return $ad;
    }

    public function cookie_amount_delete($id) {
        $ad = 0;
        $item_cookie = $this->input->cookie();
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
//echo $id;
//$ad++;
            } else {
                if ($key == $id) {
                    
                } else {
//echo $key;
                    $ad++;
                }
            }
        }
        return $ad;
    }

//
    public function delete_item() {
        $id = $this->input->post('id');
        $item_cookie = $this->input->cookie();
//       print_r($item_cookie);
        if ($id == "undefined") {
            if (count($item_cookie) <= 1) {
                echo "begin";
            } else {
                echo $this->cookie_amount_delete($id) - 1;
            }
        } else {
            delete_cookie($id);
//print_r($item_cookie);
            echo $this->cookie_amount_delete($id);
        }
//        $this->session->set_userdata($item_cookie);
//        print_r($_SESSION);
    }

    public function show_list_cart() {

        $item_cookie = $this->input->cookie();
        $i = 0;
        $data = array();
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
//echo $id;
//$ad++;
            } else {
                $data['list_data'][$i] = $this->product_model->select_list_cart($key)[0];
            }
            $i++;
        }
        $this->load->view('view_listcart', $data);
    }

    public function delete_cart() {
        $id = $this->input->post('id');
        $item_cookie = $this->input->cookie();
//print_r($item_cookie);
        if (count($item_cookie) <= 2) {
            echo "begin";
            delete_cookie($id);
        } else {
            delete_cookie($id);
            echo $this->cookie_amount_delete($id);
        }
    }

    public function update_customer() {
        $this->check_id();
        $id = $this->input->post('c_id');
        $customer_update['c_name'] = $this->input->post('c_name');
        $customer_update['c_lastname'] = $this->input->post('c_lastname');
        $customer_update['c_email'] = $this->input->post('email_customer');
        $customer_update['c_gender'] = $this->input->post('gender');
        $customer_update['c_address'] = $this->input->post('address_customer');
        echo $check = $this->customer_model->update_data_customer($id, $customer_update);
        if ($check == 1) {
            $_SESSION['customer']['name'] = $customer_update['c_name'] . " " . $customer_update['c_lastname'];
        }
    }

    public function view_forgotpassword() {
        $this->load->view('view_forgotpassword_customer');
    }

    public function forgotpassword_customer() {
        $temp['temp_email'] = $this->input->post("emailInput");
        $temp['temp_token'] = md5($this->input->post("token"));
        $temp['temp_date'] = date('Y-m-d H:i:s', strtotime("now"));

// print_r($temp);

        $check_emp_complete['data'] = $this->customer_model->checkemail_customer($temp['temp_email']);

        if (empty($check_emp_complete['data'])) {
            echo "ไม่มี E-mail : " . $temp['temp_email'] . " นี้อยู่ในระบบ";
        } else {
            $check_temp['temp'] = $this->customer_model->checkemail_temp($temp['temp_token']);

            if (!empty($check_temp['temp'])) {
                echo "ระบบได้ทำการส่งไปแล้ว กรุณณาตรวจสอบที่ E-mail ของท่าน";
            } else {

                $this->customer_model->insert_temp($temp);
                $config = Array(
                    'protocol' => 'smtp',
                    'smtp_host' => 'ssl://smtp.gmail.com',
                    'smtp_port' => 465,
                    'smtp_user' => 'apisit.junpim@gmail.com',
                    'smtp_pass' => 'apisit260837',
                    'mailtype' => 'html',
                    'charset' => 'iso-8859-1',
                    'newline' => "\r\n"
                );
                $selectemail_temp['data'] = $this->customer_model->checkemail_temp($temp['temp_token']);

                $html = $this->load->view('view_email_customer', $selectemail_temp, true);
                $this->load->library('email');
                $this->email->initialize($config);
                $this->email->from('apisit.junpim@gmail.com', 'Apisit Junpim');
                $this->email->to($temp['temp_email']);
                $this->email->subject('You forgotpassword');
                $this->email->message($html);
//$this->email->send();

                if ($this->email->send()) {
                    echo 'Send email';
                } else {
                    show_error($this->email->print_debugger());
                }
            }
        }
    }

    public function activate_customer() {
        $token = $this->input->get("token");
        $datatoken_temp['data'] = $this->customer_model->selecttoken_temp($token);

        foreach ($datatoken_temp['data'] as $key) {
            $email = $key->temp_email;
            $token = $key->temp_token;
            $date = $key->temp_date;
        }
        if (empty($datatoken_temp['data'])) {
            redirect("");
        } else {
            $start_date = new DateTime($date);
            $end_date = new Datetime(date("y-m-d H:i:s"));
            $interval = $start_date->diff($end_date);
//echo "Result " . $interval->y . " years, " . $interval->m . " months, " . $interval->d . " days ". $interval->h . " H ". $interval->i . " I ". $interval->s . " s ";
            if ($interval->y > 0 || $interval->m > 0 || $interval->d > 0 || $interval->h > 0 || $interval->i > 30) {
                $this->customer_model->deletetoke_temp($token);
            } else {
                $this->load->view('view_newpassword_customer', $datatoken_temp);
            }
        }
    }

    public function set_newpassword() {
        $newpassword = $this->input->post("newpassword");
        $token = $this->input->post("token");

        $dataall_temp['data'] = $this->customer_model->selecttoken_temp($token);
//print_r($dataall_temp);
        foreach ($dataall_temp['data'] as $key) {
            $email = $key->temp_email;
        }
//        // print_r($temp);
        $email_emp['data'] = $this->customer_model->checkemail_customer($email);
//print_r($fblogin);
        foreach ($email_emp['data'] as $key) {
            $id = $key->c_autoid;
        }
        $set = array('c_password' => md5($newpassword));
        $this->customer_model->update_emp($id, $set);

        $this->customer_model->deletetoke_temp($token);
    }

    public function customer_contact() {
        $name = $this->input->post("id");
        $email = $this->input->post("email");
        $phone = $this->input->post("phone");
        $tomessage = $this->input->post("message");


        $config = Array(
            'protocol' => 'smtp',
            'smtp_host' => 'ssl://smtp.gmail.com',
            'smtp_port' => 465,
            'smtp_user' => 'apisit.junpim@gmail.com',
            'smtp_pass' => 'apisit260837',
            'mailtype' => 'html',
            'charset' => 'iso-8859-1',
            'newline' => "\r\n"
        );

        $this->load->library('email');
        $this->email->initialize($config);
        $this->email->from($email, $name);
        $this->email->to('apisit.junpim@gmail.com');
        $this->email->subject('Contact');
        $this->email->message($tomessage . "<br><br><br>Phone : " . $phone);
//$this->email->send();

        if ($this->email->send()) {
            echo 'Send email';
        } else {
            show_error($this->email->print_debugger());
        }
    }

    public function favorites() {
        if (isset($_SESSION['customer']['id'])) {
            $id_sale = $this->input->post('id');
            $date = date('Y-m-d');
            $data['data'] = $this->product_model->select_stroe_sale($id_sale);
            foreach ($data['data'] as $key) {
                $id_product = $key->sm_autoid;
            }

            $id_user = $_SESSION['customer']['id'];
            $name = "All Favorites";
            $check_category = $this->product_model->select_favorites_category($id_user, $name);
            if ($check_category <= 0) {
                $originalDate = date('Y-m-d');
                $date = date("Y-m-d", strtotime($originalDate));
                $datainsert = array(
                    'caf_name' => $name,
                    'caf_date' => $date,
                    'c_id' => $id_user
                );
                $this->product_model->insert_category_favorites($datainsert);
            }
            $id_category = $this->product_model->select_favorites_category_forsave($id_user, $name);
            if (isset($_SESSION['chk'])) {
                foreach ($_SESSION['chk'] as $key) {
                    $datainsert = array(
                        'ss_autoid' => $id_sale,
                        'sm_autoid' => $id_product,
                        'c_id' => $id_user,
                        'cf_date' => $date,
                        'caf_autoid' => $key
                    );
                    $check = $this->product_model->insert_favorites($datainsert);
                }
            } else {
                $datainsert = array(
                    'ss_autoid' => $id_sale,
                    'sm_autoid' => $id_product,
                    'c_id' => $id_user,
                    'cf_date' => $date,
                    'caf_autoid' => $id_category[0]->caf_autoid
                );
                $check = $this->product_model->insert_favorites($datainsert);
            }
            if ($check == 1) {
                echo $count = $this->product_model->favorites_count($id_user);
            } else {
                echo "fail";
            }
        } else {
            echo "user_not_login";
        }
    }

    public function delete_favorites() {
        $this->check_id();

        $id_sale = $this->input->post('id');
        $id_user = $_SESSION['customer']['id'];
        $check = $this->product_model->delete_favorites($id_sale, $id_user);
        if ($check == 1) {
            echo $count = $this->product_model->favorites_count($id_user);
        } else {
            echo "fail";
        }
    }

    public function delete_favorites_fromview_itemfovrites() {
        $this->check_id();

        $id_sale = $this->input->post('id');
        $id_category = $this->input->post('id_category');

        $id_user = $_SESSION['customer']['id'];
        $check = $this->product_model->delete_favorites_category($id_sale, $id_category, $id_user);
        if ($check == 1) {
            echo $count = $this->product_model->favorites_count($id_user);
        } else {
            echo "fail";
        }
    }

    public function check_favorites() {
        $id_user = $_SESSION['customer']['id'];
        echo $count = $this->product_model->favorites_count($id_user);
    }

    public function show_favorites() {
        $this->check_id();
        $id_user = $_SESSION['customer']['id'];
        $data['data'] = $this->product_model->select_store_favorites_limit($id_user);
        $data['data_img'] = $this->product_model->select_store_favorites_img($id_user);

        $data['data_setting'] = $this->product_model->select_category_favorites_limit($id_user);
        $data['show_category_favorites'] = $this->product_model->select_category_favorites($id_user);
        //print_r($data['show_category_favorites']);
        $this->load->view('view_listfavorites', $data);
    }

    public function create_favorites() {
        $name = $this->input->post('namename_favorites');
        $originalDate = $this->input->post('date_favorites');
        $date = date("Y-m-d", strtotime($originalDate));
        $id_user = $_SESSION['customer']['id'];
        $datainsert = array(
            'caf_name' => $name,
            'caf_date' => $date,
            'c_id' => $id_user
        );
        $check = $this->product_model->insert_category_favorites($datainsert);

        if ($check == 1) {
            echo "success";
        } else {
            echo "fail";
        }
    }

    public function view_checkbox() {
        $id_user = $_SESSION['customer']['id'];
        $data['check_c_f'] = $this->product_model->select_category_favorites_limit($id_user);
        $this->load->view('view_checkbox_favorites', $data);
    }

    public function setting_favorites() {

        //$array = array();
        $array = $this->input->post('setting');
        $this->session->set_userdata("chk", $array);
    }

    public function favorites_category() {
        $chk = urldecode($this->uri->segment(3));

        $cid = $_SESSION['customer']['id'];
        if ($chk == "AllFavorites") {
            $name = "All Favorites";
        } else {
            $name = $chk;
        }

        $data['item'] = $this->product_model->select_item_favorites($cid, $name);
        $this->load->view('view_itemfavorites', $data);
    }

    public function edit_category_favorites() {
        $this->check_id();

        $id_cate = $this->input->post('id_cate');
        $new_name = $this->input->post('new_name');
        $cid = $_SESSION['customer']['id'];
        $data = array('caf_name' => $new_name);
        echo $this->product_model->update_category_favorites($cid, $id_cate, $data);
    }

    public function delete_category_favorites() {
        $this->check_id();

        $id_cate = $this->input->post('id_cate');
        $cid = $_SESSION['customer']['id'];
        $this->product_model->delete_cutomer_id_favorites($cid, $id_cate);
        echo $this->product_model->delete_category_id_favorites($cid, $id_cate);
    }

    public function buy_topaypal() {
        //Set variables for paypal form
        $this->check_id();
        $returnURL = base_url('my_customer/success_topaypal'); //payment success url
        $cancelURL = base_url('my_customer/cancel_topaypal'); //payment cancel url
        $notifyURL = base_url('my_customer/ipn_topaypal'); //ipn url
        //get particular product data
        $item_cookie = $this->input->cookie();

        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
                
            } else {
                $array_amount[$key] = $vaule;
                $arrayproduct[] = $this->product_model->getRows($key);
            }
        }

        if (isset($_SESSION['customer']['name'])) {
            echo $userID = $_SESSION['customer']['name']; //current user id
        } else {
            echo $userID = ""; //current user id
        }
        //$logo = base_url() . 'assets/images/codexworld-logo.png';
        $i = 1;


        $this->paypal_lib->add_field('return', $returnURL);
        $this->paypal_lib->add_field('cancel_return', $cancelURL);
        $this->paypal_lib->add_field('notify_url', $notifyURL);
        $this->paypal_lib->add_field('custom', $userID);


        $this->paypal_lib->add_field('cmd', '_cart');
        $this->paypal_lib->add_field('upload', '1');

        /*
         * Ex. multiply item   
         * $this->paypal_lib->add_field('item_name_1', 'Nokia N70');
          $this->paypal_lib->add_field('item_number_1', '1');
          $this->paypal_lib->add_field('amount_1', '50');
          $this->paypal_lib->add_field('quantity_1', '10');

          $this->paypal_lib->add_field('item_name_2', 'Nokia N55');
          $this->paypal_lib->add_field('item_number_2', '2');
          $this->paypal_lib->add_field('amount_2', '100');
          $this->paypal_lib->add_field('quantity_2', '20');
         */

        foreach ($arrayproduct as $key => $product) {
            $this->paypal_lib->add_field('item_name_' . $i, mb_convert_encoding($product['sm_productname'], "UTF-8", "auto"));
            $this->paypal_lib->add_field('item_number_' . $i, $product['sm_autoid']);
            $this->paypal_lib->add_field('amount_' . $i, $product['ss_price']);
            $this->paypal_lib->add_field('quantity_' . $i, $array_amount[$product['sm_autoid']]);
            $i++;
        }
        $this->paypal_lib->paypal_auto_form();
    }

    public function success_topaypal() {
        $this->check_id();

        //get the transaction data
        $paypalInfo = $this->input->post();

        $this->paypal_lib->validate_ipn();
        $triggerOn = $paypalInfo["payment_date"];
        $user_tz = 'Asia/Bangkok';
        $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz));
        $schedule_date->setTimeZone(new DateTimeZone('Asia/Bangkok'));
        $triggerOn = $schedule_date->format('H:i:s D d-M-Y');
        $save = $schedule_date->format('Y-m-d H:i:s ');

        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_date'] = $save;
        $data['payment_gross'] = $paypalInfo["mc_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        if ($paypalInfo["payment_status"] == "Completed") {
            $data['payment_status'] = "0";
        } else {
            $data['payment_status'] = "1";
        }
        $data['c_id'] = $_SESSION['customer']['id'];
        $var = $this->product_model->selectTransaction($data['txn_id']);
        if ($var == 0) {
//            if ($_SESSION['customer_address']['status_notrefresh'] == 0) {
            $this->product_model->insertTransaction($data);
            $i = 1;
            while ($i <= 1000000) {
                if (empty($paypalInfo["item_number$i"])) {
                    break;
                }
                $product['sm_autoid'] = $paypalInfo["item_number$i"];
                $product['sp_amount'] = $paypalInfo["quantity$i"];
                $product['mc_gross'] = $paypalInfo["mc_gross_$i"];
                $product['txn_id'] = $paypalInfo["txn_id"];
                $this->product_model->insert_idproduct($product);
                $balance = $this->product_model->selectforupdate_store_materials($product['sm_autoid']);
                $cut_balance = $balance[0]->sm_amount - $product['sp_amount'];
                $data_update = array('sm_amount' => $cut_balance);
                $this->product_model->update_store_materials($product['sm_autoid'], $data_update);
                $i++;
            }
            $customer["pmc_name"] = $_SESSION['customer_address']['fullname'];
            $customer["pmc_address"] = $_SESSION['customer_address']['address'] . " " . $_SESSION['customer_address']['area'] . " " . $_SESSION['customer_address']['county'] . " " . $_SESSION['customer_address']['postcode'];
            $customer["pmc_phone"] = $_SESSION['customer_address']['phone'];
            $customer["txn_id"] = $data['txn_id'];
            $this->product_model->insert_addresscustomer($customer);
            $_SESSION['customer_address']['status_notrefresh'] = 1;
//            }
        }

        $data['show_payment_date'] = $triggerOn;
        $data['customer_detail'] = $this->customer_model->select_customer($_SESSION['customer']['id']);
        $data['paymet_detail'] = $this->product_model->select_product_payment($data['txn_id'], $_SESSION['customer']['id']);

        $this->load->view('view_success', $data, $paypalInfo);
    }

    public function cancel_topaypal() {
        $this->load->view('view_cancel');
    }

    public function ipn_topaypal() {
        //paypal return transaction details array
        $paypalInfo = $this->input->post();
        $this->paypal_lib->validate_ipn();

        $data['user_id'] = $paypalInfo['custom'];
        $data['product_id'] = $paypalInfo["item_number1"];
        $data['txn_id'] = $paypalInfo["txn_id"];
        $data['payment_gross'] = $paypalInfo["payment_gross"];
        $data['currency_code'] = $paypalInfo["mc_currency"];
        $data['payer_email'] = $paypalInfo["payer_email"];
        $data['payment_status'] = $paypalInfo["payment_status"];

        $paypalURL = $this->paypal_lib->paypal_url;
        $result = $this->paypal_lib->curlPost($paypalURL, $paypalInfo);
        // log_message('error', json_encode($data));
        //check whether the payment is verified
        if (preg_match("/VERIFIED/i", $result)) {
            $this->product_model->insertTransaction($data);
            //log_message('error', json_encode($this->product->insertTransaction($data)));
        }
    }

    public function print_receipt() {
        $this->check_id();

        $txt_id = $this->input->get('txt_id');
        $c_id = $_SESSION['customer']['id'];

        $data['customer_detail'] = $this->customer_model->select_customer($c_id);
        $data['paymet_detail'] = $this->product_model->select_product_payment($txt_id, $c_id);
        $this->load->view("view_print_receipt", $data);
    }

    public function payment_history() {
        $this->check_id();
        $c_id = $_SESSION['customer']['id'];
        $data['paymet_id'] = $this->product_model->select_payment_history($c_id);
        foreach ($data['paymet_id'] as $key) {
            $data['paymet_detail'][] = $this->product_model->select_product_payment($key->txn_id, $c_id);
        }
//        print_r($data);
        $this->load->view("view_paymenthistory", $data);
    }

    public function selectlike_payment_history() {
        $this->check_id();

        $search = $this->input->post("search");
        $c_id = $_SESSION['customer']['id'];
        if ($this->input->post("type") == "1") {
            $data['paymet_id'] = $this->product_model->search_payment_history($search);
            foreach ($data['paymet_id'] as $key) {
                $data['paymet_detail'][] = $this->product_model->select_product_payment($key->txn_id, $c_id);
            }
            $this->load->view('view_search_paymenthistory', $data);
        } else {
            $data['paymet_id'] = $this->product_model->search_payment_history_event2($search);
            foreach ($data['paymet_id'] as $key) {
                $data['paymet_detail'][] = $this->product_model->select_product_payment_event2($key->txn_id, $c_id);
            }
            $this->load->view('view_search_paymenthistory_event2', $data);
        }
    }

    public function steppayment() {
        $this->check_id();
        $item_cookie = $this->input->cookie();
        $i = 0;
        $data = array();
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
                
            } else {
                $data['list_data'][$i] = $this->product_model->select_list_cart($key)[0];
                $data['amount_data'][$key] = $vaule;
            }
            $i++;
        }
        $thai_month_arr = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        $date_now = date('d');
        $mount_now = date('m');
        $date_next = date('d', strtotime("+3 days"));
        $mount_next = date('m', strtotime("+3 days"));
        $data["date_sent"] = "วันที่" . $date_now . " " . $thai_month_arr[$mount_now] . " - " . $date_next . " " . $thai_month_arr[$mount_next];


        $this->load->view('view_steppayment', $data);
    }

    public function customer_address() {
        $this->check_id();
        $this->session->unset_userdata('customer_address');
        $data_list = array(
            'payment_type' => $this->input->post("optionsRadios"),
            'fullname' => $this->input->post("fullname"),
            'address' => $this->input->post("address"),
            'postcode' => $this->input->post("postcode"),
            'area' => $this->input->post("area"),
            'county' => $this->input->post("county"),
            'phone' => $this->input->post("phone"),
            'status_notrefresh' => 0,
        );
        $this->session->set_userdata('customer_address', $data_list);
    }

    public function steppayment_3() {
        $item_cookie = $this->input->cookie();
        $i = 0;
        $data = array();
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
                
            } else {
                $data['list_data'][$i] = $this->product_model->select_list_cart($key)[0];
                $data['amount_data'][$key] = $vaule;
            }
            $i++;
        }
        $thai_month_arr = array(
            "0" => "",
            "1" => "มกราคม",
            "2" => "กุมภาพันธ์",
            "3" => "มีนาคม",
            "4" => "เมษายน",
            "5" => "พฤษภาคม",
            "6" => "มิถุนายน",
            "7" => "กรกฎาคม",
            "8" => "สิงหาคม",
            "9" => "กันยายน",
            "10" => "ตุลาคม",
            "11" => "พฤศจิกายน",
            "12" => "ธันวาคม"
        );
        $date_now = date('d');
        $mount_now = date('m');
        $date_next = date('d', strtotime("+3 days"));
        $mount_next = date('m', strtotime("+3 days"));
        $data["date_sent"] = "วันที่" . $date_now . " " . $thai_month_arr[$mount_now] . " - " . $date_next . " " . $thai_month_arr[$mount_next];


        $this->load->view("view_steppayment_3", $data);
    }

    public function buy_tobank() {
        $this->check_id();
        $this->load->helper('string');

        $triggerOn = date('Y-m-d H:i:s');
        $user_tz = 'Asia/Bangkok';
        $schedule_date = new DateTime($triggerOn, new DateTimeZone($user_tz));
        $schedule_date->setTimeZone(new DateTimeZone('Asia/Bangkok'));
        $triggerOn = $schedule_date->format('H:i:s D d-M-Y');
        $save = $schedule_date->format('Y-m-d H:i:s ');

        $item_cookie = $this->input->cookie();
        $i = 0;
        $total = 0;
        $data = array();
        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
                
            } else {
                $cal['list_data'][$key] = $this->product_model->select_list_cart($key)[0];
                $cal['amount_data'][$key] = $vaule;

                $price = $cal['list_data'][$key]->ss_price;
                $amount = $cal['amount_data'][$key];
                $sub_total = $price * $amount;
                $total = $total + $sub_total;
            }
            $i++;
        }


        $data['txn_id'] = strtoupper(random_string('alnum', 16));
        $data['payment_date'] = $save;
        $data['payment_gross'] = $total;
        $data['currency_code'] = "THB";
        $data['payer_email'] = $_SESSION['customer']['email'];
        $data['payment_status'] = "1";
        $data['c_id'] = $_SESSION['customer']['id'];
        $var = $this->product_model->selectTransaction($data['txn_id']);
        if ($var == 0) {
            if ($_SESSION['customer_address']['status_notrefresh'] == 0) {
                $this->product_model->insertTransaction($data);
                foreach ($item_cookie as $key => $vaule) {
                    if ($key == "ci_session") {
                        
                    } else {
                        $cal['list_data'][$key] = $this->product_model->select_list_cart($key)[0];
                        $cal['amount_data'][$key] = $vaule;

                        $product['sm_autoid'] = $cal['list_data'][$key]->sm_autoid;
                        $product['sp_amount'] = $cal['amount_data'][$key];
                        $product['mc_gross'] = $cal['list_data'][$key]->ss_price;
                        $product['txn_id'] = $data['txn_id'];
                        $this->product_model->insert_idproduct($product);
                        $balance = $this->product_model->selectforupdate_store_materials($product['sm_autoid']);
                        $cut_balance = $balance[0]->sm_amount - $product['sp_amount'];
                        $data_update = array('sm_amount' => $cut_balance);
                        $this->product_model->update_store_materials($product['sm_autoid'], $data_update);
                    }
                }
                $customer["pmc_name"] = $_SESSION['customer_address']['fullname'];
                $customer["pmc_address"] = $_SESSION['customer_address']['address'] . " " . $_SESSION['customer_address']['area'] . " " . $_SESSION['customer_address']['county'] . " " . $_SESSION['customer_address']['postcode'];
                $customer["pmc_phone"] = $_SESSION['customer_address']['phone'];
                $customer["txn_id"] = $data['txn_id'];
                $this->product_model->insert_addresscustomer($customer);
                $_SESSION['customer_address']['status_notrefresh'] = 1;
            } else {
                redirect("my_customer/payment_history");
            }
        }
//        $data['show_payment_date'] = $triggerOn;
//        $data['customer_detail'] = $this->customer_model->select_customer($_SESSION['customer']['id']);
//        $data['paymet_detail'] = $this->product_model->select_product_payment($data['txn_id'], $_SESSION['customer']['id']);
        redirect("my_customer/payment_history");
    }

    public function payment_confirm() {

        $this->load->view("view_confirmpayment");
    }

    public function save_img_forpayment() {
        $path = getcwd() . '/uploads/';
        $config['allowed_types'] = 'jpg|jpeg|png|tif|tiff|ai|pdf';
        $config['max_size'] = ini_get('upload_max_filesize') * 5024;
        //$new_name = date("dmyHis") . "_" . md5(uniqid(rand(), true));
        $dir = $path;
        @mkdir($dir, 0777);
        $config['upload_path'] = $dir;
        $this->load->library('upload', $config);

        if (!$this->upload->do_upload('file')) {
            $data_error = '<div id="status" style="padding:10px 10px">error</div>';
            $data_error .= '<div id="message" style="padding:0px 10px">' . $this->upload->display_errors() . '</div>';
            echo json_encode(array('view' => $data_error, 'code' => 0));
            die();
        } else {
            $new_name = date("dmyHis") . "";

            $data = array('upload_data' => $this->upload->data());
            $file_path = $data['upload_data']['file_path'];
            $full_path = $data['upload_data']['full_path'];
            $set['ext'] = strtolower($data['upload_data']['file_ext']);
            $set['imgname'] = $new_name;
            $path = getcwd() . '/img_payment/';
            // rename($full_path, $path . $new_name . $set['ext']);
            $width = $data['upload_data']["image_width"];
            $hieght = $data['upload_data']['image_height'];
            $input = $full_path;
            $output = $path . $new_name . "_backpage" . ".jpg";
            $output3 = $path . $new_name . "_payment" . ".jpg";


            $cmd2 = "magick " . $input . " -quality 85  -scale 200x130 -gravity center -extent 200x " . $output . "";
            $cmd = "magick " . $input . " -scale 300x450^ -gravity center -extent 300x450 -quality 100 " . $output3 . "";
            exec($cmd);
            exec($cmd2 . " && " . $cmd);

            $data = $this->load->view('view_img_payment', $set, true);
            echo json_encode(array('view' => $data, 'imgname' => $set['imgname']));
        }
    }

    public function showupload_payment() {
        $defulttype = $this->uri->segment(3);
        $arrimg = explode('.', $defulttype);
        $miantype = "image/jpg";

        if ($arrimg[1] == "png") {
            $miantype = "image/png";
        }
        $img = "C:\AppServ\www\myproject/branches/store/img_payment/" . $this->uri->segment(3);
        header('Pragma: public');
        header('Cache-Control: max-age=86400');
        header('Expires: ' . gmdate('D, d M Y H:i:s \G\M\T', time() + 86400));
        header('Content-Type: ' . $miantype);
        echo readfile($img);
    }

    public function payment_pending() {
        $data['pp_name'] = $this->input->post('fullname');
        $data['pp_date'] = date("Y-m-d H:i:s", strtotime($this->input->post('date')));
        $data['pp_slip'] = $this->input->post('img');
        $data['pp_phone'] = $this->input->post('phone');
        $data['pp_tobank'] = $this->input->post('bank');
        $data['pp_payment_gross	'] = $this->input->post('money');
        $data['pp_detail'] = $this->input->post('detail');
        $data['txn_id'] = $this->input->post('txn_id');
        echo $check = $this->product_model->insert_payment_pending($data);
        if ($check == 1) {
            $data_update = array('payment_status' => "2");
            $this->product_model->update_payment_status($data['txn_id'], $data_update);
        }
    }

//    public function event_view_hook() {
//        echo "sssss";
//        $this->load->view("zzz");
//    }
    
}
