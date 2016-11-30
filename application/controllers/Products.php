<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Products extends CI_Controller {

    function __construct() {
        parent::__construct();
        $this->load->library('paypal_lib');
        $this->load->model('product');
    }

    function index() {
        $data = array();
        //get products data from database
        $data['products'] = $this->product->getRows();
        //pass the products data to view
        $this->load->view('products/index', $data);
    }

    function buy() {
        //Set variables for paypal form

        $returnURL = base_url() . 'paypal/success'; //payment success url
        $cancelURL = base_url() . 'paypal/cancel'; //payment cancel url
        $notifyURL = base_url() . 'paypal/ipn'; //ipn url
        //get particular product data
        $item_cookie = $this->input->cookie();

        foreach ($item_cookie as $key => $vaule) {
            if ($key == "ci_session") {
                
            } else {
                $array_amount[$key] = $vaule;
                $arrayproduct[] = $this->product->getRows($key);
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

}
