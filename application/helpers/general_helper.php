<?php

function product_url() {
    $CI = & get_instance();
    $base_product = $CI->config->item('product_url');
    return $base_product;
}

function product_list_url() {
    $CI = & get_instance();
    $base_product_list = $CI->config->item('product_url') . "list-cart";
    return $base_product_list;
}

function product_login_url() {
    $CI = & get_instance();
    $base_product_login = $CI->config->item('product_url') . "login";
    return $base_product_login;
}

function customer_url() {
    $CI = & get_instance();
    $base_product_login = $CI->config->item('customer_url') . "profile";
    return $base_product_login;
}


