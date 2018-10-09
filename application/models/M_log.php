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
		function getTodayPerJam($data){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT AVG($data) as $data, HOUR(record_id) as Jam ,Tanggal FROM data_log WHERE DATE_SUB(`record_id`,INTERVAL 1 HOUR) And  record_id > DATE_SUB('$date 00:00:00', INTERVAL 1 DAY) AND $data >0 GROUP BY HOUR(record_id)");
			return $query->result();
		}
		function getToday2(){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM data_log WHERE Tanggal = '$date' AND Jam BETWEEN '05:00:00' AND '18:00:00' ORDER BY record_id DESC");
			return $query->result();
		}
		function getTodaylimit($limit){
			$date = date('Y-m-d');
			$query = $this->db->query("SELECT * FROM data_log WHERE Tanggal = '$date' ORDER BY record_id DESC LIMIT $limit");
			return $query->result();
		}
		function rataRata(){
			$query = $this->db->query("SELECT Tanggal, 
				AVG(diffuse_rad) as diffuse_rad_rata2, 
				AVG(dni) as dni_rata2, 
				AVG(global_rad) as global_rad_rata2, 
				AVG(nett_rad) as nett_rad_rata2, 
				AVG(reflective_rad) as reflective_rad_rata2, 
				AVG(battery) as battery_rata2, 
				MAX(sunshine) as maxsun, 
				MAX(sunshine)/60 as ratamaxsun FROM data_log GROUP BY Tanggal ORDER BY record_id DESC LIMIT 15");
			return $query->result();
		}
		
	}



?>