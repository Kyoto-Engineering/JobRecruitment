<?php include_once "../lib/Database.php"; ?>
<?php include_once "../helpers/Format.php"; ?>
<?php include_once "../lib/Session.php"; ?>
<?php
/**
* 
*/
class Steps
{
		private $db;
		private $fm;

		public function __construct()
	
		{
			$this->db = new Database();
			$this->fm = new Format();
		}	

		/*public function getonlyregisterd(){
			$query = "SELECT p.*, s.specialization
				FROM tbl_user_reg as p, tbl_specialization as s
				WHERE p.spId = s.spId AND applyresult = '0'  ORDER BY regId DESC ";
				$result= $this->db->select($query);
				return $result;
		}*/
		public function getonlyregisterd($start_form, $per_page){

				$query = "SELECT p.*, s.specialization
				FROM tbl_user_reg as p, tbl_specialization as s
				WHERE p.spId = s.spId AND applyresult = '0' ORDER BY regId DESC limit $start_form , $per_page";
				$result= $this->db->select($query);
				return $result;
	}

	public function sendProcess($userId, $info){
		$userId = mysqli_real_escape_string($this->db->link, $userId);
		$info = mysqli_real_escape_string($this->db->link, $info);
		

		$Mquery = "SELECT * FROM tbl_user_reg WHERE regId = '$userId'";
			$result = $this->db->select($Mquery)->fetch_assoc();
			$email = $result['email'];
			$userName = $result['userName'];

	

		$query = "INSERT INTO tbl_processnote(userId, info) VALUES('$userId', '$info')";
		$insert_row = $this->db->insert($query);
		if ($insert_row) {
			 						?>
			 					<script>
                                alert('How to Complete your Application & Process Note Has Sent');
                                window.location.href='step0.php';
                                </script>
                            <?php


							$headers = 'From: '.$email."\r\n".
							 
							'Reply-To: '.$email."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_to = "recruitment@keal.com.bd";
							$email_subject= "How to Complete your Application & Process Note";
							$email_message= "
Dear $userName,
Welcome Aboard!!
 
Thank you for signing up in our recruitment program.
							 
If you have received this email successfully we have verified your email address
properly. Please click the following link to confirm your acknowledgement of
receiving the email:
							 
https:\\www.recruitment.keal.com.bd
							 
Please note that the recruitment process would ideally take the following cours:

Step 1: Apply for the job which is available for you and best suits your career
intent.

Step 2: You need to complete your resume/CV/biodata according to prescribed
format. You may also upload your resume in pdf format.The file size should be
between 100-300 kb.

Step 3: Now, the Recruitment Officer may select you for an interview.

Step 4: Come for the interview on the due date if you are selected for intervie.

Step 5: If you want to reschedule the date you may request for a Reschedule.

Step 6: HR may or may not approve your request for reschedule. If you are absent
for the interview you may all start over from Step 1.
							 
Please note that in every step you will be notified by email. Please do not
forget to check your Spam or Junk mailbox for the emails and react to them in
time.
 
We are excited to have you on board with us in the journey of career development
							 
Good Luck!!";


							$headers1 = 'From: '.$email_to."\r\n".
							 
							'Reply-To: '.$email_to."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_subject1= "How to Complete your Application & Process Note";
							$email_message1= "
Dear $userName,

Welcome Aboard!!
 
Thank you for signing up in our recruitment program.
							 
If you have received this email successfully we have verified your email address
properly. Please click the following link to confirm your acknowledgement of
receiving the email:
							 
https:\\www.recruitment.keal.com.bd
							 
Please note that the recruitment process would ideall take the following course:

Step 1: Apply for the job which is available for you and best suits your career
intent.

Step 2: You need to complete your resume/CV/biodata according to prescribed
format. You may also upload your resume in pdf format.The file size should be
between 100-300 kb.

Step 3: Now, the Recruitment Officer may select you for an interview.

Step 4: Come for the interview on the due date if you are selected for intervie.

Step 5: If you want to reschedule the date you may request for a Reschedule.

Step 6: HR may or may not approve your request for reschedule. If you are absent
for the interview you may all start over from Step 1.
							 
Please note that in every step you will be notified by email. Please do not
forget to check your Spam or Junk mailbox for the emails and react to them in
time.
 
We are excited to have you on board with us in the journey of career development
							 
Good Luck!!";

							$email_message2= 'Date'.$date."\r\n";
							mail("<$email_to>","$email_subject","$email_message","$headers");

							mail("<$email>","$email_subject1","$email_message1","$headers1");	
		}


	}
	
	public function getallData(){
		$query = "SELECT p.*, c.userName
				FROM tbl_apply as p, tbl_user_reg as c
				WHERE p.userId = c.regId ORDER BY userId DESC";
			//$query = "SELECT * FROM tbl_school WHERE userId = '$uId'";
			$result = $this->db->select($query);
			return $result;
	}

	public function getallInfo($userId){
		$query = "SELECT status FROM tbl_personalinfo WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;

	}

	public function getalladdress($userId){
		$query = "SELECT status FROM tbl_address WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;

	}

	public function getallssc($userId){
		$query = "SELECT status FROM tbl_school WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;

	}

	public function getallhsc($userId){
		$query = "SELECT status FROM tbl_hsc WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;

	}
	public function getalltraining($userId){
		$query = "SELECT status FROM tbl_training WHERE userId = '$userId' LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}
	public function getallexp($userId){
		$query = "SELECT status FROM tbl_workingexperience WHERE userId = '$userId' LIMIT 1";
		$result = $this->db->select($query);
		return $result;

	}
	public function getallportfolio($userId){
		$query = "SELECT status FROM tbl_portfolio WHERE userId = '$userId'";
		$result = $this->db->select($query);
		return $result;

	}
	public function getApplicant(){
		$query = "SELECT p.*, c.levelName, j.jobtitle, r.degName, s.deptName, a.userName
				FROM tbl_apply as p, tbl_job_level as c, tbl_jobtitle as j, tbl_degree as r, tbl_department as s, tbl_user_reg as a
				WHERE p.levelId = c.levelId AND p.jId = j.jId AND p.degId = r.degId AND p.dId = s.dId AND p.userId = a.regId AND
				status = '1'
				ORDER BY p.id DESC";

				$value = $this->db->select($query);
				return $value;
	}

	 public function getinterdate($uId, $jId){
            $query = "SELECT * FROM tbl_interview WHERE userId = '$uId' AND jId = '$jId'";
			$result = $this->db->select($query);
			return $result;
        }
      public function getApplicantforminterviewlist(){
     	$query = "SELECT p.*,  j.jobtitle,  a.userName
				FROM tbl_interview as p,  tbl_jobtitle as j,  tbl_user_reg as a
				WHERE  p.jId = j.jId AND p.userId = a.regId
				
				ORDER BY p.id DESC";

				$value = $this->db->select($query);
				return $value;
     }
     public function getallsuccess(){
     	/*$query = "SELECT p.*,  j.jobtitle, s.deptName, a.userName
				FROM tbl_interview as p,  tbl_jobtitle as j, tbl_department as s, tbl_user_reg as a
				WHERE  p.jId = j.jId AND p.userId = a.regId ORDER BY p.id DESC";*/
		$query = "SELECT p.*, j.jobtitle, a.userName FROM tbl_interview as p, tbl_jobtitle as j, tbl_user_reg as a
					 WHERE p.jId = j.jId AND p.userId = a.regId AND attend = '1' ORDER BY p.id DESC";

				$value = $this->db->select($query);
				return $value;
     }
}
?>