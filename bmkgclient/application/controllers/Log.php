<?php
    if (! defined("BASEPATH")) exit ("No Direct script access allowed");
    class Log extends CI_Controller{
        var $API ="";

        function __construct(){
            parent::__construct();
            $this->API = "http://192.168.0.12/bmkg/index.php/api/";
        }

        //menampilkan data log

        function index(){
            $koneksi = $this->curl->simple_get($this->API.'/today/');
            if ($koneksi) {
            $date = date('Y-m-d');
            file_put_contents('json_array.txt', $koneksi);
            $data['datalog'] = json_decode($koneksi);
            $this->load->view("bmkg/data",$data);
            }else{
                //Retrieve the data from our text file.
                $fileContents = file_get_contents('json_array.txt');
                 
                //Convert the JSON string back into an array.
                $data['datalog'] = json_decode($fileContents);
                $this->load->view("bmkg/data",$data);
            }

        }

    }


?>