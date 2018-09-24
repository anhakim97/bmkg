<?php
    defined('BASEPATH') OR exit ('No direct script access allowed');
    require APPPATH . 'libraries/REST_Controller.php';
    class Api extends REST_Controller{
        function __construct($config='rest'){
            parent::__construct($config);
            $this->load->model(array('m_log'));
        }
        public function users_get() {
            $id = $this->get('id');
            if ($id == '') {
                $produk = $this->m_log->getLog();
            } else {
                
            }
            $this->response($produk, 200);
        }
        public function getByDate_get($date) {
            $id = $this->get('id');
            if ($id == '') {
                $produk = $this->m_log->getLogByDate($date);
            } else {
                
            }
            $this->response($produk, 200);
        }
        public function today_get() {
            $id = $this->get('id');
            if ($id == '') {
                $produk = $this->m_log->getToday();
            } else {
                
            }
            $this->response($produk, 200);
        }


    }


?>