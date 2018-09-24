<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

	class M_log extends CI_Model{
		private $table = "data_log";
		function getLog(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM data_log ");
			return $query->result();
		}
		function getLogByDate($date){
			$query = $this->db->query("SELECT * FROM data_log WHERE Tanggal = '$date' ORDER BY record_id DESC");
			return $query->result();
		}
		function getToday(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM data_log WHERE Tanggal = '$date' ORDER BY record_id DESC");
			return $query->result();
		}
	}



?>