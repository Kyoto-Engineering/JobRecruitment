<?php include_once "lib/Database.php"; ?>
<?php include_once "helpers/Format.php"; ?>
<?php include_once "lib/Session.php"; ?>

<?php
	/**
	* 
	*/
	class Address
	{
		
		private $db;
		private $fm;
	public function __construct()
	
		{
			$this->db = new Database();
			$this->fm = new Format();
		}

		public function getDivission(){
			$query  = "SELECT * FROM  tbl_division ORDER BY divId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getDistrict(){
			$query  = "SELECT * FROM  tbl_district ORDER BY distId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getThana(){
			$query  = "SELECT * FROM  tbl_thana ORDER BY thId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getpostName(){
			$query  = "SELECT * FROM  tbl_post ORDER BY postId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getPCode(){
			$query  = "SELECT * FROM  tbl_pcode ORDER BY codeId DESC";
			$result = $this->db->select($query);
			return $result; 
		}

		public function getsameadd(){
			$query  = "SELECT * FROM  tbl_same ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
		}
        public function expInsert($data, $uId){
            $companyName 		 = $this->fm->validation($data['companyName']);
            $designation		 = $this->fm->validation($data['designation']);
            $workingPeriod 		 = $this->fm->validation($data['workingPeriod']);
          
            
            $companyName		 = mysqli_real_escape_string($this->db->link, $companyName);
            $designation		 = mysqli_real_escape_string($this->db->link, $designation);
            $workingPeriod		 = mysqli_real_escape_string($this->db->link, $workingPeriod);
           
           
               $query = "INSERT INTO tbl_workingexperience(userId, companyName, designation, workingPeriod) VALUES('$uId', '$companyName', '$designation', '$workingPeriod')";
               $insert_row = $this->db->insert($query);
               if($insert_row){
                   $msg= "Your Working Experience Added Successfully";
                   return $msg;
               }else{
                    $msg= "Your Working Experience Not Added!!";
                   return $msg;
               }
           
            
        }
		public function addressInsert($uId, $data){
			$flat 		 = $this->fm->validation($data['flat']);
			$holding 	 = $this->fm->validation($data['holding']);
			$building 	 = $this->fm->validation($data['building']);
			$block 		 = $this->fm->validation($data['block']);
			$area 		 = $this->fm->validation($data['area']);
			
			$divId 		 = $this->fm->validation($data['divId']);
			$distId 	 = $this->fm->validation($data['distId']);
			$thId 		 = $this->fm->validation($data['thId']);
			$postId 	 = $this->fm->validation($data['postId']);
			/*$codeId 	 = $this->fm->validation($data['codeId']);*/

			$flat		 = mysqli_real_escape_string($this->db->link, $flat);
			$holding	 = mysqli_real_escape_string($this->db->link, $holding);
			$building	 = mysqli_real_escape_string($this->db->link, $building);
			$block		 = mysqli_real_escape_string($this->db->link, $block);
			$area		 = mysqli_real_escape_string($this->db->link, $area);

			$divId		 = mysqli_real_escape_string($this->db->link, $divId);
			$distId		 = mysqli_real_escape_string($this->db->link, $distId);
			$thId		 = mysqli_real_escape_string($this->db->link, $thId);
			$postId		 = mysqli_real_escape_string($this->db->link, $postId);
			

			
				$query ="INSERT INTO tbl_address(userId, flat, holding, building, block, area, divId, distId, thId, postId) VALUES ('$uId', '$flat', '$holding', '$building', '$block', '$area', '$divId', '$distId', '$thId', '$postId')";
				$result = $this->db->insert($query);
				if ($result) {
					header("Location:permanent_address.php");
				}else{
					$msg = "Your present Address not recorded";
					return $msg;
				}
			

		}

		public function paddressInsert($uId, $data){

			$id 	     = $this->fm->validation($data['id']);
			$flat 		 = $this->fm->validation($data['flat']);
			$holding 	 = $this->fm->validation($data['holding']);
			$building 	 = $this->fm->validation($data['building']);
			$road 		 = $this->fm->validation($data['road']);
			$block 		 = $this->fm->validation($data['block']);
			$area 		 = $this->fm->validation($data['area']);
			
			$divId 		 = $this->fm->validation($data['divId']);
			$distId 	 = $this->fm->validation($data['distId']);
			$thId 		 = $this->fm->validation($data['thId']);
			$postId 	 = $this->fm->validation($data['postId']);
			/*$codeId 	 = $this->fm->validation($data['codeId']);*/

			$id		 	 = mysqli_real_escape_string($this->db->link, $id);
			$flat		 = mysqli_real_escape_string($this->db->link, $flat);
			$holding	 = mysqli_real_escape_string($this->db->link, $holding);
			$building	 = mysqli_real_escape_string($this->db->link, $building);
			$road		 = mysqli_real_escape_string($this->db->link, $road);
			$block		 = mysqli_real_escape_string($this->db->link, $block);
			$area		 = mysqli_real_escape_string($this->db->link, $area);

			$divId		 = mysqli_real_escape_string($this->db->link, $divId);
			$distId		 = mysqli_real_escape_string($this->db->link, $distId);
			$thId		 = mysqli_real_escape_string($this->db->link, $thId);
			$postId		 = mysqli_real_escape_string($this->db->link, $postId);

			$query = "INSERT INTO tbl_paddress(userId, id,flat, holding, building,road, block, area, divId, distId, thId, postId) VALUES('$uId','$id','$flat', '$holding', '$building','$road', '$block','$area', 'divId', '$distId', '$thId', '$postId')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "Your Permanent Address has been recorded";
					return $msg;
				}else{
					$msg = "Your Permanent Address not recorded";
					return $msg;
				}
		}

		public function infoInsert($data, $userId){
			$tInstitution 	= $this->fm->validation($data['tInstitution']);
			$trainingName 	= $this->fm->validation($data['trainingName']);
			$tTopic 		= $this->fm->validation($data['tTopic']);
			$tLenth 		= $this->fm->validation($data['tLenth']);

			$tInstitution = mysqli_real_escape_string($this->db->link, $tInstitution);
			$trainingName = mysqli_real_escape_string($this->db->link, $trainingName);
			$tTopic		  = mysqli_real_escape_string($this->db->link, $tTopic);
			$tLenth		  = mysqli_real_escape_string($this->db->link, $tLenth);

			if ($tInstitution == "" || $trainingName == "" || $tTopic == ""	|| $tLenth == "") {
				$msg = "Field Must Not be Empty!!";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_training(userId, tInstitution, trainingName, tTopic, tLenth) VALUES('$userId','$tInstitution', '$trainingName', '$tTopic', '$tLenth')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "Inserted";
					return $msg;
				}else{
					$msg = "Not Inserted";
					return $msg;
				}
			}

		}
		public function personalInfo($data, $userId){
			
			$perName 		= $this->fm->validation($data['perName']);
			$perEmail 		= $this->fm->validation($data['perEmail']);
			$perPhone 		= $this->fm->validation($data['perPhone']);
			$dob 			= $this->fm->validation($data['dob']);
			$gender 		= $this->fm->validation($data['gender']);
			$nId 		= $this->fm->validation($data['nId']);
			$maritalStatus 	= $this->fm->validation($data['maritalStatus']);

			
			$perName = mysqli_real_escape_string($this->db->link, $perName);
			$perEmail = mysqli_real_escape_string($this->db->link, $perEmail);
			$perPhone = mysqli_real_escape_string($this->db->link, $perPhone);
			$dob = mysqli_real_escape_string($this->db->link, $dob);
			$gender = mysqli_real_escape_string($this->db->link, $gender);
			$nId = mysqli_real_escape_string($this->db->link, $nId);
			$maritalStatus = mysqli_real_escape_string($this->db->link, $maritalStatus);

			if ($perName == "" || $perEmail == "" || $perPhone == "" || $dob == "" || $gender == "" || $nId == "" || $maritalStatus == "") {

				$msg = "Field Must Not be Empty!!";
				return $msg;
			}else{
				$query = "INSERT INTO tbl_personalinfo(userId, perName, perEmail, perPhone, dob, gender, nId, maritalStatus) VALUES('$userId','$perName', '$perEmail', '$perPhone', '$dob', '$gender', '$nId', '$maritalStatus')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "Personal Info recorded";
					return $msg;
				}else{
					$msg = "Personal Info not recorded";
					return $msg;
				}
			}


		}

		//upload image

		public function uploadpicture($userId, $file){
			  $permited  = array('jpg', 'jpeg', 'png', 'gif');
			  $file_name = $file['image']['name'];
			  $file_size = $file['image']['size'];
			  $file_temp = $file['image']['tmp_name'];

		      $div            = explode('.', $file_name);
		      $file_ext       = strtolower(end($div));
		      $unique_image   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_image = "admin/uploads/".$unique_image;


		    if ($uploaded_image == "") {
		    	 
		    	 $errmsg = "Browse Your Picture First And Submit";
		    	 return $errmsg;

		    	}elseif ($file_size >1048567) {
			     echo "<span>Image Size should be less then 1MB!</span>";

   			 	} elseif (in_array($file_ext, $permited) === false) {

		     	echo "<span>You can upload only:-".implode(', ', $permited)."</span>";

    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_image);
			    	 $query = "UPDATE tbl_user_reg 
			    	 			SET 
			    	 			image = '$uploaded_image'

			    	 			WHERE regId = '$userId'";
			    	 $update_row = $this->db->update($query);
			    	 if ($update_row) {
			    	 	$msg = "<span>Image Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span>Image Upload Not complete</span>";
			    	 	return $msg;
			    	 }
			    	}
		}

		
	
		
		public function uploadresume($userId, $file){


			  $permited  = array('pdf');
			  $file_name = $file['resume']['name'];
			  $file_size = $file['resume']['size'];
			  $file_temp = $file['resume']['tmp_name'];

		      $div           = explode('.', $file_name);
		      $file_ext      = strtolower(end($div));
		      $unique_file   = substr(md5(time()), 0, 10).'.'.$file_ext;
		      $uploaded_file = "admin/Resume/".$unique_file;

		      if ($uploaded_file == "") {
		    	 
		    	 $errmsg = "Browse Your Resume First And Submit";
		    	 return $errmsg;

		    	}elseif ($file_size >102400) {
			     $msg = "<span style='color:red'>Pdf Size should be not more then 100KB!</span>";
			     return $msg;
   			 	} elseif (in_array($file_ext, $permited) === false) {

		     	$msg = "<span style='color:red'>You can upload only:-".implode(', ', $permited)."</span>";
		     	return $msg;
    			} else {
			    	 move_uploaded_file($file_temp, $uploaded_file);
			    	 $query = "INSERT INTO tbl_upload(userId, resume) VALUES('$userId', '$uploaded_file')";
			    	 $insert_row = $this->db->update($query);
			    	 if ($insert_row) {
			    	 	$msg = "<span style='color:green'>Resume Upload complete</span>";
			    	 	return $msg;
			    	 }else{
			    	 	$msg = "<span style='color:red'>Resume Upload Not complete</span>";
			    	 	return $msg;
			    	 }
			    	}

		}

	}//main class
?>