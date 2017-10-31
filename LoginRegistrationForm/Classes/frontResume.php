<?php include_once "lib/Database.php"; ?>
<?php include_once "helpers/Format.php"; ?>
<?php include_once "lib/Session.php"; ?>

<?php
	/**
	* 
	*/
	class FrontResume
	{
		
		private $db;
		private $fm;
	public function __construct()
	
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getSchoolinfoby($uId){
		    $query = "SELECT p.*, c.pyear, j.divName, g.GName
				FROM tbl_school as p, tbl_passingyear as c, tbl_division as j, tbl_group as g
				WHERE p.divId = j.divId AND p.gId = g.gId AND p.pyearid = c.pyearid AND userId = '$uId'";
			//$query = "SELECT * FROM tbl_school WHERE userId = '$uId'";
			$result = $this->db->select($query);
			return $result;
		}

		public function getoLevelinfoby($uId){
			$query = "SELECT p.*, c.pyear, j.divName
				FROM tbl_olevel as p, tbl_passingyear as c, tbl_division as j
				WHERE p.divId = j.divId AND p.pyearid = c.pyearid AND userId = '$uId'";
			$result = $this->db->select($query);
			return $result;
		}

			public function gethscinfoby($uId){
			$query = "SELECT p.*, c.pyear, j.divName
				FROM tbl_hsc as p, tbl_passingyear as c, tbl_division as j
				
				WHERE p.divId = j.divId  AND p.pyearid = c.pyearid AND userId = '$uId'";

		
		$value = $this->db->select($query);
		return $value;
		}

		public function getdiplomainfoby($uId){
			$query = "SELECT p.*, c.pyear, j.divName, d.deptName, g.degName
				FROM tbl_diploma as p, tbl_passingyear as c, tbl_division as j, tbl_department as d, tbl_degree as g
				WHERE p.divId = j.divId AND p.pyearid = c.pyearid AND p.degId = g.degId AND p.dId = d.dId AND userId = '$uId'";

		
		$value = $this->db->select($query);
		return $value;
		}

		public function getgraduationby($uId){
			$query = "SELECT p.*, c.pyear, d.studyDept, u.uName
				FROM tbl_grad as p, tbl_passingyear as c, tbl_studydept as d, tbl_university as u
				WHERE p.pyearid = c.pyearid AND p.studydeptId = d.studydeptId AND p.uId = u.uId AND userId = '$uId'";
			$value = $this->db->select($query);
			return $value;
		}

		public function gettrainingby($uId){
		$query = "SELECT * FROM tbl_training WHERE userId = '$uId'";
		$result = $this->db->select($query);
		return $result;
		}

		public function getAlluserdata($uId){
			$query = "SELECT * FROM tbl_user_reg WHERE regId = '$uId'";
			$result = $this->db->select($query);
			return $result;
		}
		
		public function getworkby($uId){
			$query = "SELECT * FROM tbl_workingexperience WHERE userId = '$uId'";
		$result = $this->db->select($query);
		return $result;
		    
		
		}

}?>