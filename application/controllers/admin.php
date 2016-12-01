<?php

defined('BASEPATH') OR exit('No direct script access allowed');

class Admin extends CI_Controller {

    private $limit = 50;

    public function __construct() {

        parent::__construct();
        date_default_timezone_set("Asia/Bangkok");
        $this->load->library(array('table', 'facebook', 'pagination', 'encrypt', 'form_validation'));
        $this->load->model(array('materials_model', 'employee_model'));
        $this->load->driver('cache', array('adapter' => 'file'));
        $this->load->helper('general_helper', 'form');
    }

    function check() {
        if (isset($_SESSION['sessemp']) && $_SESSION['sessemp']['id'] >= 0) {
            
        } else {
            redirect(base_url('admin'));
        }
    }

    public function index() {

        $d = date('d');
        $m = date('m');
        $Y = date('Y');
        $status = 0;
        $statusconfirm = 1;
        if (empty($_SESSION['sessemp'])) {
            
        } else {
            if (($_SESSION['sessemp']['status'] == 0)) {
                // $data['add'] = $this->materials_model->selectmaterials($status);
                // $data['add_confirm'] = $this->materials_model->selectconfirm($statusconfirm,$d,$m,$Y);
                // $data['picking'] = $this->materials_model->select_rp($status);
                // $data['picking_confirm'] = $this->materials_model->select_rp_confirm($statusconfirm,$d,$m,$Y);
                $data['mtr'] = $this->materials_model->select_mat_to_calendar($m, $Y);
                $data['rp'] = $this->materials_model->select_rp_to_calendar($m, $Y);
            } else {
                // $data['add'] = $this->materials_model->selectwaiting_emp($_SESSION['sessemp']['id']);
                // $data['add_confirm'] = $this->materials_model->selectconfirm_emp($_SESSION['sessemp']['id'],$d,$m,$Y);
                $data['mtr'] = $this->materials_model->select_mat_to_calendar_emp($m, $Y, $_SESSION['sessemp']['id']);
                $data['rp'] = $this->materials_model->select_rp_to_calendar_emp($m, $Y, $_SESSION['sessemp']['id']);
            }
        }


        $m_y = date('Y-n');
        $date = time();
        $data['day'] = date('d', $date);
        $data['month'] = date('n');
        $data['year'] = date('Y');
        $mkdate = mktime(0, 0, 0, $data['month'], 1, $data['year']);
        $data['arrDday'] = $arrDday = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $data['full_month'] = date('F', $mkdate);
        $data['weekday'] = date('w', $mkdate);
        $data['last_days'] = date('t', $mkdate);
        $data['Dday'] = date('D', $mkdate);
        $data['day'] = 1;
        $sp_m_y = explode('-', $m_y);
        $data['nextMonth'] = date('Y-n', mktime(0, 0, 0, ($sp_m_y[1] + 1), 1, $sp_m_y[0]));
        $data['prevMonth'] = date('Y-n', mktime(0, 0, 0, ($sp_m_y[1] - 1), 1, $sp_m_y[0]));
        $this->load->view('index', $data);
    }

    public function calendar() {
        $this->check();
        $m_y = $this->input->post("m_y");
        $sp_m_y = explode('-', $m_y);
        $m = $sp_m_y[1];
        $Y = $sp_m_y[0];
        $calendar['mtr'] = $this->materials_model->select_mat_to_calendar($m, $Y);
        $calendar['rp'] = $this->materials_model->select_rp_to_calendar($m, $Y);
        $date = time();
        $calendar['day'] = date('d', $date);
        $calendar['month'] = $sp_m_y[1];
        $calendar['year'] = $sp_m_y[0];
        $mkdate = mktime(0, 0, 0, $calendar['month'], 1, $calendar['year']);
        $calendar['full_month'] = date('F', $mkdate);
        $calendar['weekday'] = date('w', $mkdate);
        $calendar['last_days'] = date('t', $mkdate);
        $calendar['Dday'] = date('D', $mkdate);
        $calendar['arrDday'] = $arrDday = array('Sun', 'Mon', 'Tue', 'Wed', 'Thu', 'Fri', 'Sat');
        $calendar['day'] = 1;
        $calendar['nextMonth'] = date('Y-n', mktime(0, 0, 0, ($sp_m_y[1] + 1), 1, $sp_m_y[0]));
        $calendar['prevMonth'] = date('Y-n', mktime(0, 0, 0, ($sp_m_y[1] - 1), 1, $sp_m_y[0]));

        $view = $this->load->view('calendar-en', $calendar, true);
        echo json_encode($view, true);
    }

    public function login() {
        $login['emp_username'] = $this->input->post("username");
        $login['emp_password'] = $this->input->post("password");

        $allemp['all'] = $this->employee_model->select_emp_wh_username($login['emp_username']);
        foreach ($allemp['all'] as $value) {
            $pass = $value->emp_password;
            $id = $value->emp_autoid;
        }
        $depass = $this->encrypt->decode($pass);
        if ($depass == $login['emp_password']) {
            $data_employee['data'] = $this->employee_model->selectuser($id);

            foreach ($data_employee['data'] as $key) {
                $idemp = $key->emp_autoid;
                $fristname = $key->emp_fristname;
                $lastname = $key->emp_lastname;
                $status = $key->emp_status;
            }
            $arremp = array(
                'id' => $idemp,
                'name' => $fristname,
                'status' => $status
            );
            $this->session->set_userdata('sessemp', $arremp);
            echo ("success");
        }
    }

    public function logout() {
        session_destroy();
        redirect(base_url('admin'));
    }

    public function login_update() {
        $id = $this->input->post("id");

        $data_employee['data'] = $this->employee_model->selectlogin_update($id);
        foreach ($data_employee['data'] as $key) {
            $idemp = $key->emp_autoid;
            $fristname = $key->emp_fristname;
            $lastname = $key->emp_lastname;
            $status = $key->emp_status;
        }
        $arremp = array(
            'id' => $idemp,
            'name' => $fristname,
            'status' => $status
        );
        $this->session->set_userdata('sessemp', $arremp);
        echo "success";
    }

    public function add_product() {
        $this->check();
        $type['data_type'] = $this->materials_model->selectmtr_type();
        $rand = rand(10, 99);
        $type['id'] = date("dHs") . $rand;
        $this->load->view('view_addproduct', $type);
    }

    public function type_category() {
        $this->check();

        $type_id = $this->input->post('type_id');

        $category['data_category'] = $this->materials_model->selectmtr_category($type_id);
        $data_category = array();
        foreach ($category['data_category'] as $rs) {
            $data_category[] = '<option value ="' . $rs->ct_auto . '">' . $rs->ct_name . '</option>';
        }
//print_r($data_category);
        echo json_encode($data_category, true);
    }

    public function new_category() {
        $this->check();

        $type_id = $this->input->get('datatype');
        $type['data_all'] = $this->materials_model->selectmtr_typefor_name($type_id);
//print_r($type);
        $this->load->view('view_addcategory', $type);
    }

    public function inset_category() {
        $inset_category['ct_name'] = $this->input->post('product_category_name');
        $inset_category['ty_id'] = $this->input->post('product_type_id');
        $this->materials_model->inserttmtr_category($inset_category);
        echo 'เพิ่มประเภทแล้ว';
    }

    public function add_materials() {
        $rpo_id = $this->input->post("rpo_id");
        $rpo_status = 0;
        $update['rpo_status'] = 1;

        $data['od'] = $this->materials_model->select_rpo_od_whid_status($rpo_id, $rpo_status);

        foreach ($data['od'] as $value) {
            $add_materials = Array(
                'mtr_date' => date('Y-m-d H:i:s'),
                'sm_autoid' => $value->sm_autoid,
                'mtr_productname' => $value->od_productname,
                'ty_id' => $value->ty_id,
                'ct_id' => $value->ct_id,
                'mtr_quantity' => $value->od_amount,
                'mtr_description' => $value->od_detail,
                'mtr_image' => $value->od_image,
                'emp_autoid' => $_SESSION['sessemp']['id'],
                'mtr_status' => 0,
                'mtr_product_status' => $value->mtr_product_status,
            );
            $this->materials_model->add_material($add_materials);
        }

        $this->materials_model->update_status_rpo($rpo_id, $update);
        echo "success";
    }

    public function save_img() {

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
            $path = getcwd() . '/img/';
            // rename($full_path, $path . $new_name . $set['ext']);
            $width = $data['upload_data']["image_width"];
            $hieght = $data['upload_data']['image_height'];
            $input = $full_path;
            $output = $path . $new_name . "_backpage" . ".jpg";
            $output2 = $path . $new_name . "_fontpage_slide" . ".jpg";
            $output3 = $path . $new_name . "_fontpage_list" . ".jpg";

            $cmd1 = "magick " . $input . " -quality 85  -scale 200x130 -gravity center -extent 200x " . $output . "";
            $cmd2 = "magick " . $input . " -scale 300x260^ -gravity center -extent 300x260 -quality 80 " . $output2 . "";
            $cmd3 = "magick " . $input . " -scale 300x240^ -gravity center -extent 300x240 -quality 80 " . $output3 . "";
            exec($cmd3 . " && " . $cmd2 . " && " . $cmd1);

            // if ($width > $hieght) {
            // $cmd1 = "magick " . $input . " -quality 85  -scale 200x130 -gravity center -extent x130 " . $output . "";
            // } else {
            // $cmd1 = "magick " . $input . " -quality 85  -scale 200x130 -gravity center -extent 200x " . $output . "";
            // }
            $data = $this->load->view('view_img', $set, true);
            echo json_encode(array('view' => $data, 'imgname' => $set['imgname']));
        }
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

    public function approval() {
        $this->check();
        $perpage = 10;
        if (isset($_GET['page']) && $_GET['key'] == 1) {
            $page1 = $_GET['page'];
            $page2 = 1;
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        } else if (isset($_GET['page']) && $_GET['key'] == 2) {
            $page1 = 1;
            $page2 = $_GET['page'];
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        } else if (isset($_GET['page']) && $_GET['key'] == 3) {
            $page1 = 1;
            $page2 = 1;
            $page3 = $_GET['page'];
            $page4 = 1;
            $this->session->unset_userdata('total');
        } else if (isset($_GET['page']) && $_GET['key'] == 4) {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = $_GET['page'];
            $this->session->unset_userdata('total');
        } else {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        }
        $start1 = ($page1 - 1) * $perpage;
        $start2 = ($page2 - 1) * $perpage;
        $start3 = ($page3 - 1) * $perpage;
        $start4 = ($page4 - 1) * $perpage;
        if ($_SESSION['sessemp']['status'] == 0) {

            $approval['data'] = $this->materials_model->select_mareialsall($perpage, $start1);

            $row = $this->materials_model->get_count_select_mareialsall();
            $total_page = ceil($row / $perpage);
            $datatotal = array(
                'total' => $total_page,
                'amountpage' => $page1,
            );
            $this->session->set_userdata('page', $datatotal);

            $approval['data2'] = $this->materials_model->select_mareialsall_confirm($perpage, $start2);

            $row = $this->materials_model->get_count_select_mareialsall_confirm();
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );
            $this->session->set_userdata('page2', $datatotal2);


            // $approval['data3'] = $this->materials_model->select_picking($perpage, $start3);
            // $row = $this->materials_model->get_count_select_picking();
            // $total_page = ceil($row / $perpage);
            // $datatotal3 = array(
            //     'total' => $total_page,
            //     'amountpage' => $page3,
            // );
            // $this->session->set_userdata('page3', $datatotal3);
            // //print_r($datatotal3);
            // $approval['data4'] = $this->materials_model->select_picking_confirm($perpage, $start4);
            // $row = $this->materials_model->get_count_select_picking_confirm();
            // $total_page = ceil($row / $perpage);
            // $datatotal4 = array(
            //     'total' => $total_page,
            //     'amountpage' => $page4,
            // );
            // $this->session->set_userdata('page4', $datatotal4);
            $this->load->view('view_approval', $approval);
        } else {

            $id = $_SESSION['sessemp']['id'];

            $approval['data'] = $this->materials_model->select_mareialsall_emp($id, $perpage, $start1);

            $row = $this->materials_model->get_count_select_mareialsall_emp($id);
            $total_page = ceil($row / $perpage);
            $datatotal = array(
                'total' => $total_page,
                'amountpage' => $page1,
            );
            $this->session->set_userdata('page', $datatotal);

            $approval['data2'] = $this->materials_model->select_mareialsall_confirm_emp($id, $perpage, $start2);
            $row = $this->materials_model->get_count_select_mareialsall_confirm_emp($id);
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );
            $this->session->set_userdata('page2', $datatotal2);

            // $approval['data3'] = $this->materials_model->select_picking_emp($id, $perpage, $start3);
            // $row = $this->materials_model->get_count_select_picking_emp($id);
            // $total_page = ceil($row / $perpage);
            // $datatotal3 = array(
            //     'total' => $total_page,
            //     'amountpage' => $page3,
            // );
            // $this->session->set_userdata('page3', $datatotal3);
            // $approval['data4'] = $this->materials_model->select_picking_confirm_emp($id, $perpage, $start4);
            // $row = $this->materials_model->get_count_select_picking_confirm_emp($id);
            // $total_page = ceil($row / $perpage);
            // $datatotal4 = array(
            //     'total' => $total_page,
            //     'amountpage' => $page4,
            // );
            // $this->session->set_userdata('page4', $datatotal4);



            $this->load->view('view_approval', $approval);
        }
    }

    public function savestore() {
        $this->check();

        $array = $this->input->post('chk');
        // print_r($array);
        foreach ($array as $value) {
            $data['data_select'] = $this->materials_model->select_where_mareialsall($value);

            foreach ($data['data_select'] as $key) {

                if ($key->mtr_product_status == 0) {
                    $datastore = Array(
                        'sm_autoid' => $key->sm_autoid,
                        'sm_productname' => $key->mtr_productname,
                        'sm_typeid' => $key->ty_id,
                        'sm_categoryid' => $key->ct_id,
                        'sm_amount' => $key->mtr_quantity,
                        'sm_productdetail' => $key->mtr_description,
                        'sm_image' => $key->mtr_image
                    );
                    $datasubstore = Array(
                        'ssm_autoid' => $key->sm_autoid,
                        'ssm_productname' => $key->mtr_productname,
                        'ssm_typeid' => $key->ty_id,
                        'ssm_categoryid' => $key->ct_id,
                        'ssm_amount' => $key->mtr_quantity,
                        'ssm_productdetail' => $key->mtr_description,
                        'ssm_image' => $key->mtr_image
                    );

                    $this->materials_model->insert_store($datastore);
                    $this->materials_model->insert_substore($datasubstore);
                    echo "Insert Success";
                } else {

                    $id = $key->sm_autoid;
                    $amount_materials = $key->mtr_quantity;
                    $amount['data_store'] = $this->materials_model->select_where_store($id);

                    foreach ($amount['data_store'] as $rs) {
                        $amount_store = $rs->sm_amount;
                    }
                    $total = $amount_store + $amount_materials;
                    $newamount = Array(
                        'sm_amount' => $total,
                    );
                    $newamount_ssm = Array(
                        'ssm_amount' => $total,
                    );

                    $this->materials_model->update_store($id, $newamount);
                    $this->materials_model->update_sub_store($id, $newamount_ssm);
                    echo "Update Success";
                }
            }

            $status = Array(
                'mtr_status' => 1,
            );

            $this->materials_model->update_status_mareialsall($value, $status);

            $this->cache->clean();
        }
    }

    public function report_store() {

        $frist_day = $this->input->get("frist_id");
        $end_day = $this->input->get("end_id");
        //print_r($data);
        $select_day = $this->input->get("approval");

        if ($select_day == "day") {
            $day['data2'] = $this->materials_model->select_day_material($frist_day, $end_day);
            // print_r($day
        } else if ($select_day == "month") {
            $year = date('Y', strtotime($frist_day));
            $timeDate = strtotime($end_day);
            $lastDay = date("t", $timeDate);
            $day['data2'] = $this->materials_model->select_month_material($year, $frist_day, $end_day, $lastDay);
        } else if ($select_day == "year") {
            $year = $frist_day;
            $day['data2'] = $this->materials_model->select_year_material($year);
        } else if ($select_day == "error") {
            $day['data2'] = $this->materials_model->select_error_materials();
        } else {
            
        }
        //print_r($day);
        ini_set('display_errors', 1);
        ini_set('display_startup_errors', 1);
        error_reporting(E_ALL);

        $this->load->library("Excel/PHPExcel");

        $objPHPExcel = new PHPExcel();
        $objPHPExcel->setActiveSheetIndex(0)
                ->mergeCells('A2:H2')
                ->setCellValue('A2', 'รายการที่ได้รับการอนุมัติแล้ว')
                ->setCellValue('A3', 'ลำดับ')
                ->setCellValue('B3', 'วันที่')
                ->setCellValue('C3', 'ชื่อพนักงาน')
                ->setCellValue('D3', 'รหัส')
                ->setCellValue('E3', 'ชื่อ')
                ->setCellValue('F3', 'ประเภท')
                ->setCellValue('G3', 'หมวด')
                ->setCellValue('H3', 'จำนวน');

        $objPHPExcel->getActiveSheet()
                ->setTitle('Test Excel')
                ->getStyle('A2:H256')
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        $i = 4;
        $num = 1;

        foreach ($day['data2'] as $key) {
            $objPHPExcel->setActiveSheetIndex(0)
                    ->setCellValue('A' . $i . '', $num)
                    ->setCellValue('B' . $i . '', $key->mtr_date)
                    ->setCellValue('C' . $i . '', $key->emp_fristname)
                    ->setCellValue('D' . $i . '', $key->sm_autoid)
                    ->setCellValue('E' . $i . '', $key->mtr_productname)
                    ->setCellValue('F' . $i . '', $key->ty_name)
                    ->setCellValue('G' . $i . '', $key->ct_name)
                    ->setCellValue('H' . $i . '', $key->mtr_quantity);

            $styleArray = array(
                'borders' => array(
                    'allborders' => array(
                        'style' => PHPExcel_Style_Border::BORDER_THIN
                    )
                )
            );

            $objPHPExcel->getActiveSheet()
                    ->getStyle('A2:H' . $i . '')
                    ->applyFromArray($styleArray);
            unset($styleArray);

            $objPHPExcel->getActiveSheet()->getColumnDimension('A')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('B')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('C')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('D')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('E')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('F')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('G')->setAutoSize(true);
            $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

            $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');
            $i++;
            $num++;
        }
        $a = $i - 1;
        $objPHPExcel->setActiveSheetIndex(0)
                ->setCellValue('G' . $i . '', 'ผลรวม')
                ->setCellValue('H' . $i . '', '=SUM(H4:H' . $a . ')');
        $objPHPExcel->getActiveSheet()
                ->getStyle('G' . $i . '')
                ->getAlignment()
                ->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER);

        $styleArray = array(
            'borders' => array(
                'allborders' => array(
                    'style' => PHPExcel_Style_Border::BORDER_THIN
                )
            )
        );

        $objPHPExcel->getActiveSheet()
                ->getStyle('G' . $i . ':H' . $i . '')
                ->applyFromArray($styleArray);
        unset($styleArray);

        $styleColor = array(
            'font' => array(
                'bold' => true,
                'color' => array('rgb' => 'FF0000'),
                'size' => 8,
                'name' => 'Verdana'
        ));
        $objPHPExcel->getActiveSheet()->getStyle('H' . $i . '')->applyFromArray($styleColor);
        unset($styleColor);
        $objPHPExcel->getActiveSheet()->getColumnDimension('H')->setAutoSize(true);

        $objWriter = PHPExcel_IOFactory::createWriter($objPHPExcel, 'Excel2007');

        header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
        header("Cache-Control: no-store, no-cache, must-revalidate");
        header("Cache-Control: post-check=0, pre-check=0", false);
        header("Pragma: no-cache");
        header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');

        header('Content-Disposition: attachment;filename="Test Report Excel.xlsx"');

        $objWriter->save("php://output");
    }

    public function select_type_day() {
        $perpage = 10;
        if (isset($_GET['page']) && $_GET['key'] == 2) {
            $page1 = 1;
            $page2 = $_GET['page'];
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        } else if (isset($_GET['page']) && $_GET['key'] == 4) {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = $_GET['page'];
            $this->session->unset_userdata('total');
        } else {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        }
        $start2 = ($page2 - 1) * $perpage;
        $start4 = ($page4 - 1) * $perpage;

        $frist_day = $this->input->post("frist_id");
        $end_day = $this->input->post("end_id");
        //print_r($data);
        $select_day = $this->input->post("approval");

        if ($select_day == "day") {

            $day['data2'] = $this->materials_model->select_day_material($frist_day, $end_day, $perpage, $start2);

            $row = $this->materials_model->get_count_select_day_material();
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );
            $this->session->set_userdata('page2', $datatotal2);
            //print_r($datatotal2);
            $this->load->view('view_show', $day);
        } else if ($select_day == "month") {
            $year = date('Y', strtotime($frist_day));
            $timeDate = strtotime($end_day);
            $lastDay = date("t", $timeDate);

            $day['data2'] = $this->materials_model->select_month_material($year, $frist_day, $end_day, $lastDay, $perpage, $start2);

            $row = $this->materials_model->get_count_select_month_material();
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );
            $this->session->set_userdata('page2', $datatotal2);

            $this->load->view('view_show', $day);
        } else if ($select_day == "year") {
            $year = $frist_day;

            $day['data2'] = $this->materials_model->select_year_material($year, $perpage, $start2);

            $row = $this->materials_model->get_count_select_year_material();
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );

            $this->session->set_userdata('page2', $datatotal2);

            $this->load->view('view_show', $day);
        } else if ($select_day == "error") {
            $day['data2'] = $this->materials_model->select_error_material($perpage, $start2);

            $row = $this->materials_model->get_count_select_error_material();
            $total_page = ceil($row / $perpage);
            $datatotal2 = array(
                'total' => $total_page,
                'amountpage' => $page2,
            );
            $this->session->set_userdata('page2', $datatotal2);

            $this->load->view('view_show', $day);
        } else {
            
        }
    }

    public function select_type_day1() {
        $perpage = 10;
        if (isset($_GET['page']) && $_GET['key'] == 4) {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = $_GET['page'];
            $this->session->unset_userdata('total');
        } else {
            $page1 = 1;
            $page2 = 1;
            $page3 = 1;
            $page4 = 1;
            $this->session->unset_userdata('total');
        }
        $start4 = ($page4 - 1) * $perpage;

        $frist_day = $this->input->post("frist_id");
        $end_day = $this->input->post("end_id");
        $select_day = $this->input->post("approval1");

        if ($select_day == "day") {
            $day['data4'] = $this->materials_model->select_day_material1($frist_day, $end_day, $perpage, $start4);

            $row = $this->materials_model->get_count_select_day_material1();
            $total_page = ceil($row / $perpage);
            $datatotal4 = array(
                'total' => $total_page,
                'amountpage' => $page4,
            );
            $this->session->set_userdata('page4', $datatotal4);

            $this->load->view('view_show1', $day);
        } else if ($select_day == "month") {
            $year = date('Y', strtotime($frist_day));
            $timeDate = strtotime($end_day);
            $lastDay = date("t", $timeDate);
            $day['data4'] = $this->materials_model->select_month_material1($year, $frist_day, $end_day, $lastDay, $perpage, $start4);

            $row = $this->materials_model->get_count_select_month_material1();
            $total_page = ceil($row / $perpage);
            $datatotal4 = array(
                'total' => $total_page,
                'amountpage' => $page4,
            );
            $this->session->set_userdata('page4', $datatotal4);

            $this->load->view('view_show1', $day);
        } else if ($select_day == "year") {
            $year = $frist_day;

            $day['data4'] = $this->materials_model->select_year_material1($year, $perpage, $start4);

            $row = $this->materials_model->get_count_select_year_material1();
            $total_page = ceil($row / $perpage);
            $datatotal4 = array(
                'total' => $total_page,
                'amountpage' => $page4,
            );
            $this->session->set_userdata('page4', $datatotal4);


            $this->load->view('view_show1', $day);
        } else if ($select_day == "error") {
            $day['data4'] = $this->materials_model->select_error_material1($perpage, $start4);

            $row = $this->materials_model->get_count_select_error_material1();
            $total_page = ceil($row / $perpage);
            $datatotal4 = array(
                'total' => $total_page,
                'amountpage' => $page4,
            );
            $this->session->set_userdata('page4', $datatotal4);

            $this->load->view('view_show1', $day);
        } else {
            
        }
    }

    public function search_product() {
        $this->check();
        $key = $this->input->post('key');
        if (empty($key)) {
            echo "not found";
        } else {
            $data['T01'] = $this->materials_model->product_search1($key,'T01');
            $data['T02'] = $this->materials_model->product_search2($key,'T02');
            $data['T03'] = $this->materials_model->product_search3($key,'T03');
            $data['T04'] = $this->materials_model->product_search4($key,'T04');
            $data['T05'] = $this->materials_model->product_search5($key,'T05');
            $this->load->view('ajax_autocomplete', $data);
        }
    }

    // public function picking_product() {
    //     $data['rp_amount'] = $this->input->post("amount");
    //     $ssm = $this->input->post("smamount");
    //     $data['rp_date'] = $this->input->post("date");
    //     $data['emp_id'] = $this->input->post("pickingby");
    //     $data['rp_productname'] = $this->input->post("productname");
    //     $data['ty_id'] = $this->input->post("typeid");
    //     $data['ct_auto'] = $this->input->post("categoryid");
    //     $data['sm_autoid'] = $this->input->post("smid");
    //     $data['rp_image'] = $this->input->post("image");
    //     $data['rp_status'] = 0;

    //     if ($ssm == 0) {
    //         echo "fail";
    //     } else if ($data['rp_amount'] > $ssm) {
    //         echo "more than";
    //     } else {
    //         $total['ssm_amount'] = $ssm - $data['rp_amount'];
    //         $this->materials_model->add_report_picking($data);
    //         $this->materials_model->update_sub_store($data['sm_autoid'], $total);
    //         echo 'success';
    //     }
    // }

    public function view_amount() {
        $this->check();

        $id_emp = $this->input->get("id_emp");
        $id_pro = $this->input->get("id_pro");
        $day = time();
        $data['data_date'] = date('Y-m-d', $day);
        $data['data_type'] = $this->materials_model->selectmtr_type();

        $data['data'] = $this->materials_model->selectmtr_type_emp($id_emp, $id_pro);
        foreach ($data['data'] as $key) {
            $type_id = $key->ty_id;
        }

        $data['data_pop'] = $this->materials_model->selectmtr_typefor_name($type_id);

        $this->load->view('view_amount', $data);
    }

    public function update_amount() {

        $id_pro = $this->input->post("idproduct");
        $id_emp = $this->input->post("iduser");
        $update_mtr['mtr_date'] = date('Y-m-d H:i:s');
        $update_mtr['mtr_id'] = $this->input->post("idproduct");
        $update_mtr['mtr_productname'] = $this->input->post("product_name");
        $update_mtr['ty_id'] = $this->input->post("product_type");
        $update_mtr['ct_id'] = $this->input->post("product_categorie");
        $update_mtr['mtr_quantity'] = $this->input->post("available_quantity");
        $update_mtr['mtr_description'] = $this->input->post("product_description");
        $update_mtr['emp_autoid'] = $this->input->post("iduser");
        $update_mtr['mtr_image'] = $this->input->post("sm_image");

        $this->materials_model->update_data_materials($id_emp, $id_pro, $update_mtr);
    }

    public function delete_mtr() {
        $this->check();

        if ($_SESSION['sessemp']['status'] == 0) {
            $array = $this->input->post('chk');
            if (!empty($array)) {
                foreach ($array as $value) {
                    $this->materials_model->delete_data_materials_admin($value);
                }
            } else {
                $id_pro = $this->input->get("id_pro");
                $this->materials_model->delete_data_materials_admin($id_pro);
            }
        } else {
            $id = $_SESSION['sessemp']['id'];
            $array = $this->input->post('chk');
            if (!empty($array)) {
                foreach ($array as $value) {
                    $this->materials_model->delete_data_materials($id, $value);
                }
            } else {
                $id_emp = $this->input->get("id_emp");
                $id_pro = $this->input->get("id_pro");
                $this->materials_model->delete_data_materials($id_emp, $id_pro);
            }
        }
        redirect(base_url('admin/approval'));
    }

    public function updatestore() {
        $this->check();

        $radio_id = $this->input->post('rad');

        $picking['data'] = $this->materials_model->select_picking_id($radio_id);

        foreach ($picking['data'] as $key) {
            $sm_autoid = $key->sm_autoid;
            $new_amount = $key->rp_amount;
        }
        $store['data'] = $this->materials_model->select_store_product($sm_autoid);

        foreach ($store['data'] as $key) {
            $old_amount = $key->sm_amount;
        }
        if ($old_amount == 0) {
            $this->materials_model->delete_rp_whid($radio_id);
            echo 'สินค้าหมด ลบรายการ';
        } else if ($old_amount > $new_amount) {
            $total = $old_amount - $new_amount;
            $status = Array(
                'rp_status' => 1,
            );
            $amount = Array(
                'sm_amount' => $total,
            );
            $this->materials_model->update_rp($radio_id, $status);
            $this->materials_model->update_store_rp($sm_autoid, $amount);
            redirect('admin/approval');
        } else {
            $total = $new_amount - $old_amount;
            $status = Array(
                'rp_status' => 1,
            );
            $amount = Array(
                'sm_amount' => $total,
            );
            $this->materials_model->update_rp($radio_id, $status);
            $this->materials_model->update_store_rp($sm_autoid, $amount);
            redirect('admin/approval');
        }
    }

    public function one_product() {
        $this->check();
        $id = $this->input->get("id");
        $data["row"] = $this->materials_model->select_store_product($id);
        $this->load->view("one_product", $data);
    }

    public function delete_ssm_whid() {

        $id = $this->input->get("rp_id");
        $amount['rp_amount'] = $this->input->get("rp_amount");

        $select['rp'] = $this->materials_model->select_rpid($id);
        foreach ($select['rp'] as $value) {
            $smid = $value->sm_autoid;
        }
        $select['ssm'] = $this->materials_model->select_substore_product($smid);
        foreach ($select['ssm'] as $value) {
            $ssmamount = $value->ssm_amount;
        }
        $total['ssm_amount'] = $ssmamount + $amount['rp_amount'];
        $this->materials_model->delete_rp_whid($id);
        $this->materials_model->update_sub_store($smid, $total);
        redirect('admin/approval');
    }

    public function order() {
        $this->check();

        $od_status = 0;
        $data['od'] = $this->materials_model->select_od_wh_empid_stt($od_status, $_SESSION['sessemp']['id']);
        $row = count($data['od']);
        $data['row'] = array(
            'row' => $row,
        );

        $row_rpo = "RPO" . date('dmyHis');
        $data['row_rpo'] = array(
            'row_rpo' => $row_rpo,
        );

        $data['ty'] = $this->materials_model->selectmtr_type();
        $this->load->view("order", $data);
    }

    public function select_ct() {
        $this->check();

        $id = $this->input->post("id");
        $data['ct'] = $this->materials_model->selectmtr_category($id);
        $view = $this->load->view("select_ct", $data, true);
        echo $view;
    }

    public function select_sm() {
        $this->check();

        $id = $this->input->post("id");
        $data['sm'] = $this->materials_model->select_sm_whct_auto($id);
        $view = $this->load->view("select_sm", $data, true);
        echo $view;
    }

    public function select_sm_show() {
        $this->check();

        $id = $this->input->get("id");
        $data['sm'] = $this->materials_model->select_store_product($id);
        $view = $this->load->view("select_sm_show", $data, true);
        echo $view;
    }

    public function add_order() {
        $add['od_image'] = $this->input->post("sm_image");
        $add['od_amount'] = $this->input->post("amount");
        $add['od_productname'] = $this->input->post("name");
        $add['od_detail'] = $this->input->post("detail");
        $add['emp_autoid'] = $this->input->post("emp_autoid");
        $add['sm_autoid'] = $this->input->post("sm_autoid");
        $add['ty_id'] = $this->input->post("product_type");
        $add['ct_id'] = $this->input->post("product_categorie");
        $add['od_status'] = 0;
        $add['mtr_product_status'] = $this->input->post("mtr_product_status");

        $this->materials_model->add_order($add);
        $data['od'] = $this->materials_model->select_od_wh_empid_stt($add['od_status'], $_SESSION['sessemp']['id']);
        $one['one'] = $this->materials_model->row_od_wh_empid_stt($add['od_status'], $_SESSION['sessemp']['id']);
        $one['row'] = count($data['od']);
        $rand = rand(10, 99);
        $one['id'] = date("dHs") . $rand;
        echo json_encode($one);
    }

    public function build_report_order() {
        $this->check();

        $data['row_rpo'] = $this->input->get("row_rpo");
        $status_od = 0;
        $data['od'] = $this->materials_model->select_od_wh_empid_stt($status_od, $_SESSION['sessemp']['id']);
        $row = count($data['od']);
        $data['row'] = array(
            'row' => $row,
        );
        $this->load->view("build_report_order", $data);
    }

    public function add_rpo_od() {
        $od['rpo_autoid'] = $this->input->post("id");
        $od['od_status'] = 1;
        $status_od = 0;
        $rpo['rpo_date'] = date("Y-m-d H:i:s");
        $rpo['rpo_autoid'] = $this->input->post("id");
        $rpo['rpo_status'] = 0;
        $rpo['emp_autoid'] = $_SESSION['sessemp']['id'];
        $this->materials_model->update_rpo_id_to_od($od, $status_od, $_SESSION['sessemp']['id']);
        $this->materials_model->add_rpo($rpo);
        echo "บันทึกรายการแล้ว";
    }

    public function delete_row_od() {
        $id = $this->input->post("id");
        $this->materials_model->delete_row_od($id);
        $status = 0;
        $data['od'] = $this->materials_model->select_od_wh_empid_stt($status, $_SESSION['sessemp']['id']);
        $data['row'] = count($data['od']);
        echo json_encode($data);
    }

    public function add_product_to_sale() {
        $this->check();
        $id = $this->input->get("id");
        $data['one_row'] = $this->materials_model->select_store_product($id);
        $this->load->view("add_oneproduct_to_sale", $data);
    }

    public function save_to_sale() {
        $this->check();
        $data['ss_price'] = $this->input->post("price");
        $data['ss_unit'] = $this->input->post("unit");
        $data['sm_autoid'] = $this->input->post("sm_autoid");
        $sm_sale['sm_sale'] = 1;
        $this->materials_model->save_to_sale($data);
        $this->materials_model->update_sm_sale($sm_sale, $data['sm_autoid']);
        $this->cache->clean();
    }

    public function report_order() {
        $this->check();
        $data['rpo'] = $this->materials_model->select_all_rpo();
                 
        $this->load->view('report_order', $data);

    }

    public function order_show() {
        $this->check();

        $data['id'] = $this->input->get("id");
        $data['rpo_od'] = $this->materials_model->select_rpo_od_whid($data['id']);
        $this->load->view('order_show', $data);
    }

    public function order_print() {
        $this->check();

        $id = $this->input->get("id");
        $data['rpo_od'] = $this->materials_model->select_rpo_od_whid($id);
        $this->load->view('order_print', $data);
    }

    public function add_new_order() {
        $this->check();

        $this->load->view('add_new_order');
    }

    public function report_store_sale($order_column = 'sm_autoid', $order_type = 'asc', $sort = 2, $offset = 0) {
        $this->check();
        if ($sort == 1) {
            $data['sort'] = 'Highest ID';
        } elseif ($sort == 2) {
            $data['sort'] = 'Lowest ID';
        } elseif ($sort == 3) {
            $data['sort'] = 'Highest Price';
        } else {
            $data['sort'] = 'Lowest Price';
        }

        $config['base_url'] = base_url() . "admin/report_store_sale" . '/' . $order_column . '/' . $order_type . '/' . $sort . '/';
        $config['total_rows'] = $this->materials_model->count_store_sale();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $cacheID = "page_product_sale";
        if (!$foo['data'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort)) {
            $data['ss'] = $this->materials_model->select_ss_sm($this->limit, $offset, $order_column, $order_type);
            $this->cache->save($cacheID . $order_column . $order_type . $offset . $sort, $data['ss'], 6000);
        } else {
            $data['ss'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort, 6000);
        }

        $this->load->view('report_store_sale', $data);
    }

    public function delete_row_ss() {
        $ss_autoid = $this->input->post("ss_autoid");
        $sm_autoid = $this->input->post("sm_autoid");
        $sm_sale['sm_sale'] = 0;
        $this->materials_model->delete_row_ss($ss_autoid);
        $this->materials_model->update_sm_sale($sm_sale, $sm_autoid);
        $this->cache->clean();
        echo "ok";
    }

    public function edit_row_ss() {
        $this->check();
        $id = $this->input->get("id");
        $data['row'] = $this->materials_model->select_ss_smwhid($id);
        $this->load->view("edit_store_sale", $data);
    }

    public function update_store_sale() {
        $this->check();
        $data['ss_price'] = $this->input->post("ss_price");
        $data['ss_unit'] = $this->input->post("ss_unit");
        $ss_autoid = $this->input->post("ss_autoid");
        $this->materials_model->update_store_sale($ss_autoid, $data);
        $this->cache->clean();
    }

    public function view_updatepicking() {
        $this->check();

        $rp_id = $this->input->get("id_autoid");
        $ty_id = $this->input->get("ty_id");
        $ct_auto = $this->input->get("ct_auto");
        $emp_id = $this->input->get("id_emp");
        $ssm_autoid = $this->input->get("sup_mtr");


        $data['data'] = $this->materials_model->select_repicking($emp_id, $rp_id);
        $data['sup_mtr'] = $this->materials_model->select_sub_store_materials($ssm_autoid);
        $data['type_name'] = $this->materials_model->selectmtr_typefor_name($ty_id);
        $data['category_name'] = $this->materials_model->selectmtr_category_name($ct_auto);

        $this->load->view('view_updatepicking', $data);
    }

    function store($order_column = 'sm_autoid', $order_type = 'asc', $sort = 2, $offset = 0) {
        $this->check();
        if ($sort == 1) {
            $data['sort'] = 'Highest ID';
        } elseif ($sort == 2) {
            $data['sort'] = 'Lowest ID';
        } elseif ($sort == 3) {
            $data['sort'] = 'Highest Amount';
        } elseif ($sort == 4) {
            $data['sort'] = 'Lowest Amount';
        } elseif ($sort == 5) {
            $data['sort'] = 'A-Z';
        } else {
            $data['sort'] = 'Z-A';
        }

        $config['base_url'] = base_url() . "admin/store" . '/' . $order_column . '/' . $order_type . '/' . $sort . '/';
        $config['total_rows'] = $this->materials_model->count_sm();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $cacheID = "store";
        if (!$foo['data'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort)) {
            $data['sm'] = $this->materials_model->select_sm_limit($this->limit, $offset, $order_column, $order_type);
            $this->cache->save($cacheID . $order_column . $order_type . $offset . $sort, $data['sm'], 6000);
        } else {
            $data['sm'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort, 6000);
        }

        $this->load->view('all_store', $data);
    }

    function employ($order_column = 'emp_autoid', $order_type = 'asc', $offset = 0) {
        $this->check();

        // if (empty($offset)) $offset = 0;
     
        $User = $this->employee_model->get_paged_list($this->limit, $offset, $order_column, $order_type);

        // generate pagination
        $config['base_url'] = base_url('admin/employ/' . $order_column . '/' . $order_type);
        $config['total_rows'] = $this->employee_model->count_all();
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 5;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        // generate table data
        $this->table->set_empty("&nbsp;");
        $new_order = ($order_type == 'asc' ? 'desc' : 'asc');
        $this->table->set_heading(
                'No', anchor(base_url('admin/employ/emp_autoid/' . $new_order . '/' . $offset), 'รหัส'), anchor(base_url('admin/employ/emp_fristname/' . $new_order . '/' . $offset), 'ชื่อ'), 'นามสกุล', 'เลขบัตรประชาชน', 'วันกิด', 'เบอร์โทรศัทพ์', 'ตำแหน่ง', 'ดู','แก้ไข','ลบ'
        );
        $i = 0 + $offset;
        foreach ($User as $value) {
            $this->table->add_row( ++$i, $value->emp_autoid, $value->emp_fristname, $value->emp_lastname, $value->emp_id, $value->emp_birthday, $value->emp_phone, $value->emp_status == 0 ? 'admin' : 'employee', 
               '<button>'. 
                anchor(base_url('admin/view/?id=' . $value->emp_autoid), '<i class="icon-search-1"></i>', array('class' => 'emp_views')),
                
               '<button>'. 
                anchor(base_url('admin/update/?id=' . $value->emp_autoid), '<i class="icon-edit"></i>', array('class' => 'emp_edits')),
                
               '<button>'. 
                anchor(base_url('admin/delete/?id=' . $value->emp_autoid), '<i class="icon-trash-empty"></i>', array('class' => 'emp_deletes', 'onclick' => "return confirm('ลบ   $value->emp_fristname ?')"))
            );
        }
        $data['table'] = $this->table->generate();

        $data['num_show'] = $i;
        $data['total_rows'] = $config['total_rows'];
        $this->load->view('empList', $data);
    }

    function add() {
        $this->check();

        // set common properties
        // $data['title'] = 'เพิ่มพนักงาน';
        $data['action'] = base_url('admin/add');

        $data['link_back'] = anchor(base_url('admin/employ/'), 'กลับ', array('class' => 'emp_back'));
        // run validation
        if (empty($_POST)) {
            // $data['message'] = '';
            // set common properties
            $data['title'] = 'เพิ่มพนักงาน';
            $data['message'] = '';
            $data['Student']['emp_autoid'] = '';
            $data['Student']['emp_fristname'] = '';
            $data['Student']['emp_lastname'] = '';
            $data['Student']['emp_id'] = '';
            $data['Student']['emp_birthday'] = '';
            $data['Student']['emp_phone'] = '';
            $data['Student']['emp_email'] = '';
            $data['Student']['emp_status'] = '';
            $data['Student']['emp_username'] = '';
            $data['Student']['emp_password'] = '';
            $data['Student']['confirm'] = '';



            $data['link_back'] = anchor(base_url('admin/employ/'), 'กลับ', array('class' => 'emp_back'));
            $this->load->view('empEdit', $data);
        } else {

            $Student = array(
                'emp_fristname' => $this->input->post('emp_fristname'),
                'emp_lastname' => $this->input->post('emp_lastname'),
                'emp_id' => $this->input->post('emp_id'),
                'emp_birthday' => $this->input->post('emp_birthday'),
                'emp_phone' => $this->input->post('emp_phone'),
                'emp_email' => $this->input->post('emp_email'),
                'emp_status' => $this->input->post('emp_status'),
                'emp_username' => $this->input->post('emp_username'),
                'emp_password' => $this->encrypt->encode($this->input->post('emp_password'))
            );
            $this->employee_model->save($Student);
        }
    }

    function view() {
        $this->check();

        $id = $this->input->get("id");

        // set common properties
        $data['title'] = 'ข้อมูลพนักงาน';
        $data['link_back'] = anchor(base_url('admin/employ/'), 'กลับ', array('class' => 'emp_back'));

        // get Student details
        $data['user'] = $this->employee_model->get_by_id($id)->row();

        // load view
        $this->load->view('empView', $data);
    }

    function update() {
        $this->check();

        $id = $this->input->get("id");
        // set common properties
        $data['title'] = 'แก้ไขข้อมูล';
        // set validation properties
        $data['action'] = ('admin/update/?id=' . $id);
        // run validation

        if (empty($_POST)) {

            $data['message'] = '';
            $data['Student'] = (array) $this->employee_model->get_by_id($id)->row();
            if (count($data['Student']) == 0) {
                
            } else {
                $data['Student']['emp_password'] = $this->encrypt->decode($data['Student']['emp_password']);
            }

            // set common properties
            $data['title'] = 'แก้ไขข้อมูล';
        } else {
            // save data
            $id = $this->input->post('emp_autoid');
            $Student = array(
                'emp_fristname' => $this->input->post('emp_fristname'),
                'emp_lastname' => $this->input->post('emp_lastname'),
                'emp_id' => $this->input->post('emp_id'),
                'emp_birthday' => $this->input->post('emp_birthday'),
                'emp_phone' => $this->input->post('emp_phone'),
                'emp_email' => $this->input->post('emp_email'),
                'emp_status' => $this->input->post('emp_status'),
                'emp_username' => $this->input->post('emp_username'),
                'emp_password' => $this->encrypt->encode($this->input->post('emp_password'))
            );
            $this->employee_model->update($id, $Student);
            $data['Student'] = (array) $this->employee_model->get_by_id($id)->row();
            // set user message
            $data['message'] = 'อัพเตดแล้ว';
        }
        $data['link_back'] = anchor(base_url('admin/employ/'), 'กลับ', array('class' => 'emp_back'));
        $data['link_view'] = anchor(base_url('admin/view/?id=' . $id), '<i class="icon-search-1"></i>', array('class' => 'emp_view'));
        // load view
        $this->load->view('empEdit', $data);
    }

    function delete() {
        $this->check();

        $id = $this->input->get("id");
        $this->employee_model->delete($id);
        redirect(base_url('admin/employ/'));
    }

    public function order_new_product() {
        $type['data_type'] = $this->materials_model->selectmtr_type();
        $rand = rand(10, 99);
        $type['id'] = date("dHs") . $rand;
        $this->load->view('order_new_product', $type);
    }

    public function product_sale($order_column = 'sm_autoid', $order_type = 'asc', $sort = 2, $offset = 0) {
        $this->check();
        if ($sort == 1) {
            $data['sort'] = 'Highest ID';
        } elseif ($sort == 2) {
            $data['sort'] = 'Lowest ID';
        } elseif ($sort == 3) {
            $data['sort'] = 'Highest Amount';
        } elseif ($sort == 4) {
            $data['sort'] = 'Lowest Amount';
        } elseif ($sort == 5) {
            $data['sort'] = 'A-Z';
        } else {
            $data['sort'] = 'Z-A';
        }
        $sm_sale = 0;
        $config['base_url'] = base_url() . "admin/product_sale" . '/' . $order_column . '/' . $order_type . '/' . $sort . '/';
        $config['total_rows'] = $this->materials_model->count_sm_smsale0($sm_sale);
        $config['per_page'] = $this->limit;
        $config['uri_segment'] = 6;
        $this->pagination->initialize($config);
        $data['pagination'] = $this->pagination->create_links();

        $cacheID = "product_sale";
        if (!$foo['data'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort)) {
            $data['sm'] = $this->materials_model->select_sm_limit_sm_sale0($this->limit, $offset, $order_column, $order_type, $sm_sale);
            $this->cache->save($cacheID . $order_column . $order_type . $offset . $sort, $data['sm'], 6000);
        } else {
            $data['sm'] = $this->cache->get($cacheID . $order_column . $order_type . $offset . $sort, 6000);
        }

        $this->load->view("product_sale", $data);
    }

    public function delete_row_sm() {
        $id = $this->input->post("id");
        $sm_sale = 0;
        $success = $this->materials_model->delete_row_sm($id, $sm_sale);
        if ($success == 1) {
            $this->materials_model->delete_row_ssm($id);
            $this->cache->clean();
            echo "success";
        } else {
            echo "false";
        }
    }

    public function edit_row_sm() {
        $this->check();
        $id = $this->input->get("id");
        $ty_id = $this->input->get("ty_id");
        $data['data_type'] = $this->materials_model->selectmtr_type();
        $data['data_category'] = $this->materials_model->selectmtr_category($ty_id);
        $data['data'] = $this->materials_model->select_store_product($id);

        $this->load->view("edit_product", $data);
    }

    public function update_product() {
        $data = $this->input->post();
        $id = $this->input->post('sm_autoid');
        $this->materials_model->update_store($id, $data);
        $this->cache->clean();
        echo "success";
    }

    public function payment_verify() {
        $this->load->model('product_model');
        $data["verify"] = $this->product_model->select_paymentforverify();
        //print_r($data);
        $this->load->view("view_admintverify", $data);
    }

    public function check_verify() {
        $this->load->model(array('product_model', 'customer_model'));
        $txtid = $this->input->get('transactions');
        $c_id = $this->input->get('customer');

        $data["select_payment"] = $this->product_model->select_payment($txtid, $c_id);
        $this->load->view("view_admincheckstatusverify", $data);
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

    public function approval_customer() {
        $this->load->model('product_model');

        $txn_id = $this->input->post('txn_id');
        $c_id = $this->input->post('c_id');
        $data = array('payment_status' => "0");
        $this->product_model->update_statuspayment($txn_id, $c_id, $data);
    }

    public function notapproval_customer() {
        $this->load->model('product_model');
        $txn_id = $this->input->post('txn_id');
        $c_id = $this->input->post('c_id');

        $data['select'] = $this->product_model->select_payment_forupdate($txn_id, $c_id);

        foreach ($data['select'] as $key) {
            $key->sm_autoid;
            $key->sp_amount;
            $data['select_mtr'] = $this->product_model->select_store_materials_forupdate($key->sm_autoid);
            $dataupdate = array('sm_amount' => $key->sp_amount + $data['select_mtr'][0]->sm_amount);
            $this->product_model->update_amountmtr($key->sm_autoid, $dataupdate);
        }
        $datastatus = array('payment_status' => "3");
        $this->product_model->update_statuspayment($txn_id, $c_id, $datastatus);
    }

    public function test() {

        $this->load->view("zzz");
    }

}
