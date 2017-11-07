<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>
<?php include_once "Classes/frontclass.php";?>
<?php include_once "lib/Database.php"; ?>

            <?php
                $db = new Database();
                     $userId = Session::get("userId");
                    
                    $iplogfile = 'logs/ip-address-mainsite.html';
                    $ipaddress = $_SERVER['REMOTE_ADDR'];
                    $webpage = $_SERVER['SCRIPT_NAME'];
                    $timestamp = date('d/m/Y h:i:s');
                    $browser = $_SERVER['HTTP_USER_AGENT'];
                    /*$fp = fopen($iplogfile, 'a+');
                    chmod($iplogfile, 0777);
                    fwrite($fp, '['.$timestamp.']: '.$ipaddress.' '.$webpage.' '.$browser. "\n<br><br>");
                    fclose($fp);*/
                    $Iquery = "INSERT INTO tbl_urecord(userId, ip, browser) VALUES('$userId', '$ipaddress', '$browser')";
                    $insert_row = $db->insert($Iquery);
            
            ?>
<?php
    $allF = new Front();
    /* if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $userjob = $allM->jobInput($_POST);
    }*/
?>
                        <div class="container-fluid">
                          <img class="img-responsive" src="../assets/images/recruitment1.jpg" alt="Banner">
                         </div>
<?php 

    //$userId = Session::get("userId");
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $jsid = $_POST['jsId'];
        
        $addApply = $allF->applyForjob($userId, $jsid);
    }
 
?>

        

        
<br/><br/>
        
        
        <div class="container">
            <h3> Welcome to Kyoto Recruitment Portal</h3>
            
            <br>
            
            <div class="row">
                <div class="col-md-8">
                    <div>
                <p>
                    Complete the following steps to complete your CV. Without completing CV, there will be no job interview. You <strong>must</strong> provide the following informations.
                </p>

                <br>

                <ol>
                    <li> Your <b> Personal</b> Infomation. </li>
                    <li> Information about your <b> Address</b>. </li>
                    <li> Your <b> Educational </b> details. </li>
                </ol>

            </div>
                </div>
                <div class="col-md-4">
                    <div class="row">
                        <div class="col-md-6">
                            <?php 
                    $getdata = $allF->getAlluserdata($userId);
                    if ($getdata) {
                    while($value = $getdata->fetch_assoc()){
       
                    ?>
                    <div class="img_box2">
                        <img src="<?php echo $value['image'];?>" alt="image" height="160" width="120px" />
                    </div>
                    <?php } } ?>
                        </div>
                        <div class="col-md-6">
                    <?php 
                    $getdata = $allF->getAlluserdata($userId);
                    if ($getdata) {
                    while($value = $getdata->fetch_assoc()){
       
                    ?>
                        <h5>Name:&nbsp;<?php echo $value['userName'];?></h5>
                        <h5>Age:&nbsp;<?php 
                            $userDob =  $value['dob'];

//Create a DateTime object using the user's date of birth.
$dob = new DateTime($userDob);

//We need to compare the user's date of birth with today's date.
$now = new DateTime();

//Calculate the time difference between the two dates.
$difference = $now->diff($dob);

//Get the difference in years, as we are looking for the user's age.
$age = $difference->y;

//Print it out.
echo $age;?>Years
                        </h5>
                        <?php } }?>

                        <h5>Address:
                        <?php
        $getadd = $allF->getAlladdressby($userId);
        if (!$getadd) {
            echo "<span style='color:red;'> You have not give your address</span>";
            
        }else{
            echo "<span style='color:green;'>completed</span>";
        }
         
        
             ?>
      </h5>
                        </div>
                    </div>
                </div>
            </div>
            
            
            <br>
             <div class="row">
                <div class="col-md-4">
                    <a href="my_jobs.php" ><button type="button" class="btn btn-primary " >My Applied Jobs</button></a> 
                </div>
                <div class="col-md-4">
                     <a href="resume.php" ><button type="button" class="btn btn-primary  ">My Resume</button></a>
                     <h5>Provide Your information by Clicking this Button</h5>
                 </div>

                 <?php
                    $getTime = $allF->getreschuduleMassege($userId);
                    if ($getTime) {
                        while ($data = $getTime->fetch_assoc()) {
                 ?>
                 <div class="col-md-4">
                     <?php 
                        if($data['status'] == "0"){
                           echo "<span style='color:red;'>Notice :- Your Re-Scheduled Date For Interview till now pending!!</span>";
                        }elseif ($data['status'] == "1") {
                             echo "<span style='color:green;'>Notice :- Your Re-Scheduled Date For Interview Has Been Accepted.</span>";
                        }else{
                            echo "<span style='color:red;'>Notice :- Sorry!! Your Re-Scheduled Date For Interview Has Been Rejected!!</span>";
                        }
                     ?>
                 </div>
                 <?php } } ?>
            </div><!-- row -->
            <header>
                <h3>Choose Your Job From List</h3>
            </header>
            <div>
            <span style="color:green; font-size: 18px;">
            <?php
               if (isset($addApply)) {
                   echo $addApply;
            }
            ?>
            </span>
                <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>Job Title</td>
        <td>Department</td>
        <td>Job level</td>
        <td>Last date of Application</td>
        <td>Education</td>
        
        <td>Min Compansation</td>
        <td>Max Compansation</td>
        <td>Expected Joining Date</td>
        <td>Pre-requisite For Joining:</td>
        <td>Action</td>
        

      </tr>
    </thead>
    <tbody>
    <?php
        $getAjobs = $allF->getjobList();
        if ($getAjobs) {
            $i = 0;
            while($value = $getAjobs->fetch_assoc()){
                $i++;

    ?>
      <tr>
           <?php
            $jId = $value['jId'];
            $vd = $value['ldApplication'];
         ?>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['jobtitle'];?></td>
        <td><?php echo $value['deptName'];?></td>
        <td><?php echo $value['levelName'];?></td>
        <td><?php echo $value['ldApplication'];?></td>
        <td><?php echo $value['degName'];?></td>
        <td><?php echo $value['mimcomp'];?></td>
        <td><?php echo $value['mxmcomp'];?></td>
        <td><?php echo $value['expDate'];?></td>
        <td><?php echo $value['prerequisite'];?></td>
        <td><?php echo $value['joblocation'];?></td>

<td>
        <form action="" method="post">
    
        <input type="hidden" name="jsId" value="<?php echo $value['jsId'];?>"/>
        <!--<input type="submit" name="submit" value="Apply"/>
        <input name="submit" type="button" value="Apply" />-->
         <?php
                    $date = date('Y-m-d');

                if ($date > $vd){ ?>
                    <input name="Disabled" type="button" disabled="disabled" value="Expired" />
                    <?php }else{ ?>
                     
                     <input type="submit" name="submit" value="Apply"/>
               
               <?php } ?>
                
            
      
        </form>
  </td>     

      </tr>
   <?php } } ?>
    </tbody>
  </table>
            </div>
            
        </div>
       <br> <br>

<?php include_once "inc/footer.php";?>