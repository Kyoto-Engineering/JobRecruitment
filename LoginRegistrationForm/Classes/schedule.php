<?php include_once "../lib/Database.php"; ?>
<?php include_once "../helpers/Format.php"; ?>
<?php include_once "../lib/Session.php"; ?>

<?php
	/**
	* 
	*/
	class Schedule
	{
		private $db;
		private $fm;

		public function __construct()
	
		{
			$this->db = new Database();
			$this->fm = new Format();
		}	
//createdate
		public function CreateSchedule($data){
			$date = $this->fm->validation($data['date']);
			$date = mysqli_real_escape_string($this->db->link, $date);

			
				$query = "INSERT INTO tbl_date(date) VALUES('$date')";
				$result = $this->db->insert($query);
				if ($result) {
					$msg = "Date Insert Successfully";
					return $msg;
				}else{
					$msg = "Date Not Insert Successfully";
					return $msg;
				}
			

		}
//create interview Schedule		
		public function CreateinterviewSchedule($data, $jId){
			$date = $this->fm->validation($data['interviewdate']);
			$stime = $this->fm->validation($data['starttime']);
			$endtime = $this->fm->validation($data['endtime']);
			$venue = $this->fm->validation($data['venue']);
			
			
			$date = mysqli_real_escape_string($this->db->link, $date);
			$stime    = mysqli_real_escape_string($this->db->link, $stime);
			$endtime     = mysqli_real_escape_string($this->db->link, $endtime);
			$venue		= mysqli_real_escape_string($this->db->link, $venue);
			
			//get job id matching user id from apply table
			$Jquery = "SELECT * FROM tbl_apply WHERE jId = '$jId'";
			$result = $this->db->select($Jquery)->fetch_assoc();
			$uId = $result['userId'];

			$Mquery = "SELECT * FROM tbl_user_reg WHERE regId = '$uId'";
			$result = $this->db->select($Mquery)->fetch_assoc();
			$email = $result['email'];
			$userName = $result['userName'];

			if ($date == ""|| $stime == "" || $endtime == "" || $venue == "") {
				$msg = "Field Must Not Be Empty!!";
				return $msg; 
			}else{
				$query = "INSERT INTO tbl_interview(jId, userId, interviewdate, starttime, endtime, venue) VALUES('$jId', '$uId','$date', '$stime', '$endtime', '$venue')";
				$insert_row = $this->db->insert($query);
				if ($insert_row) {
						
												?>
                                <script>
                                alert('Interview Schedule Has been Sent To this Candidate !');
                                window.location.href='create_schedule.php';
                                </script>
                            <?php


							$headers = 'From: '.$email."\r\n".
							 
							'Reply-To: '.$email."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_to = "recruitment@keal.com.bd";
							$email_subject= "Interview Schedule";
							$email_message= "This person has been registered and sent for email verification:
							Name : $userName
							Email : $email";


							$headers1 = 'From: '.$email_to."\r\n".
							 
							'Reply-To: '.$email_to."\r\n" .
							 
							'X-Mailer: PHP/' . phpversion();

							$email_subject1= "Interview Schedule";
							$email_message1= "Dear $userName,

							Thank you for your interest in career in our company
							Congratulations!!

							Your application for Internship has been accepted. We would be delighted to hold a meeting with you on 
							any of the following day:
							
								Date
								Time
								Venue
								 
								Please confirm your participation by clicking the following link:
								 
								https://recruitment.keal.com.bd/
								 
								Prior to select your option please go to the following link and register yourself please make sure that you have completed all your academic information to the following portal:
								 
								https://recruitment.keal.com.bd/
								 
								Note: Your email is your username and put your mobile number as your password
								 
								Please do not write back to this email. If you are otherwise not contacted by us your interview date is confirmed. However, if you want to change your date please write an email request or send a request using the following link:
								 
								https://recruitment.keal.com.bd/
								 
								If  you do not want to participate please do not forget to click on the following link:
								 
								 
								Please bring along the following items during the interview:
								 
								1) All your Transcripts till date
								2) An updated CV Printed. If not you may take a print out of the same on the spot during interview
								3) Your Photo Identity Document, such as Passport, NID, Birth Registration etc.
								4) Academic Credentials.
								 
								See you then,
								 
								Thank you
								 
								Recruitment Office
								Kyoto Engineering & Automation Ltd
								B2 House 64 Block B Road 3
								Niketon Gulshan Dhaka 1212
								 
								Emergency Contact Numbers:
								 
								01844046621
								01844046666
								01844046677
							 
							";

							$email_message2= 'Date'.$date."\r\n";
							mail("<$email_to>","$email_subject","$email_message","$headers");

							mail("<$email>","$email_subject1","$email_message1","$headers1");
						
						}

				}
			}


		
		//public function getapplyjobid($uId){
			
		//} 
		public function getEmail($uId){
			$Mquery = "SELECT email FROM tbl_user_reg WHERE regId = '$uId'";
			$result = $this->db->select($Mquery);
			
			return $result;
		}

		public function getInschedule(){
			//$query = "SELECT p.*, d.date, t.stime
				//FROM tbl_interview as p, tbl_date as d, tbl_time as t
				//WHERE p.id = d.id AND p.id = t.id ORDER BY p.id DESC";
			$query = "SELECT * FROM tbl_date ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getdate(){
			$query = "SELECT * FROM tbl_date ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
		}

		public function getTime(){
			$query = "SELECT * FROM tbl_time ORDER BY id DESC";
			$result = $this->db->select($query);
			return $result;
		}
		
		
	
	public function getApplicantBy(){
			$query = "SELECT p.*, u.userName
				FROM tbl_apply as p, tbl_user_reg as u
				WHERE p.userId = u.regId AND status = '1' ORDER BY p.id DESC";
	
		$result= $this->db->select($query);
		return $result;
		}


	public function getAlladdressby($uId){
			$query = "SELECT p.*, d.divName, e.distName, t.thName, b.postName 
			FROM tbl_address as p, tbl_division as d, tbl_district as e, tbl_thana as t, tbl_post as b
			WHERE p.divId= d.divId AND
			      p.distId = e.distId AND
			      p.thId = t.thId AND
			      p.postId = b.postId AND
			      p.userId = '$uId'" ;
			//$query = "SELECT * FROM tbl_school WHERE userId = '$uId'";
			$result = $this->db->select($query);
			return $result;
	}

	public function getPaddressby($uId){
			$query = "SELECT r.*, s.distName, t.thName, b.postName
			 FROM tbl_paddress as r, tbl_district as s, tbl_thana as t, tbl_post as b
			  WHERE r.distId = s.distId AND r.thId = t.thId AND r.postId = b.postId AND r.userId = '$uId'";
			//$query = "SELECT * FROM tbl_paddress WHERE userId = '$uId'";
			$result = $this->db->select($query);
			return $result;
	}	

	public function getInterview($uId, $jId){
           $query = "SELECT * FROM tbl_interview WHERE userId = '$uId' AND jId = '$jId'";
           $result = $this->db->select($query);
           return $result;
       }
       
     public function delByid($Did){

		$query = "DELETE FROM tbl_date WHERE id = '$Did' ";
		$delCart = $this->db->delete($query);
		if ($delCart) {
			echo "<script>window.location = 'schedule_create.php'</script>";
		}else{
			$msg = "Date Not Delete!";
			return $msg;
		}
      }
      public function getInterviewApplicant(){
      	
      	$query="SELECT p.*,r.userName FROM tbl_interview as p,tbl_user_reg as r WHERE p.userId=r.regId AND 
      	            p.status='1' ORDER BY p.interviewdate DESC";
      	  $result = $this->db->select($query);
           return $result;

      }
} ?>