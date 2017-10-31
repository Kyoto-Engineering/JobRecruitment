<?php include_once "lib/Database.php"; ?>
<?php include_once "helpers/Format.php"; ?>
<?php include_once "lib/Session.php"; ?>

<?php
	/**
	* 
	*/
	class Curriculum
	{
		private $db;
		private $fm;

	public function __construct()
	
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getSchool(){
			$query  = "SELECT * FROM  tbl_school ORDER BY scId DESC";
			$result = $this->db->select($query);
			return $result; 
		}
		public function getDivission(){
			$query  = "SELECT * FROM  tbl_division ORDER BY divId DESC";
			$result = $this->db->select($query);
			return $result; 
		}
		public function getGroup(){
			$query  = "SELECT * FROM  tbl_group ORDER BY gId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getYear(){
			$query  = "SELECT * FROM  tbl_passingyear ORDER BY pyearid ASC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getGpa(){
			$query  = "SELECT * FROM  tbl_gpa ORDER BY gpaId DESC";
			$result = $this->db->select($query);
			return $result; 
		}
		public function getCollege(){
			$query  = "SELECT * FROM  tbl_college ORDER BY colid DESC";
			$result = $this->db->select($query);
			return $result; 
		}
		public function getspecilization(){
		$query = "SELECT * FROM tbl_specialization ORDER BY spId DESC";
		$result = $this->db->select($query);
		return $result;
	}

	public function getDegree(){
		$query = "SELECT * FROM tbl_degree ORDER BY degId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getCgpa(){
		$query = "SELECT * FROM tbl_cgpa ORDER BY cgpaid DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getVersity(){
		$query = "SELECT * FROM tbl_university ORDER BY uId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getDept(){
		$query = "SELECT * FROM tbl_department ORDER BY dId DESC";
		$result = $this->db->select($query);
		return $result;
	}
	public function getStudydept(){
		$query = "SELECT * FROM tbl_studydept ORDER BY studydeptId DESC";
		$result = $this->db->select($query);
		return $result;
	}
}//main class close