       <?php include_once "inc/header.php";?>
 <?php include_once "../Classes/resume.php";?>
 <?php include_once "../helpers/Format.php";?>
          <?php
            $edu = new Resume();
            $fm = new Format();
          ?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
 <?php include_once "inc/sidebar.php";?>    

  <!-- Content Wrapper. Contains page content -->
<?php
    if (!isset($_GET['user']) || $_GET['user'] == NULL ) {
        echo "<script>window.location = 'applied_job.php'</script>";
      }else{
        $uId = $_GET['user'];
      }

?> 
<?php 

    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $status = $_POST['status'];
        
        $addcomment = $edu->updateStatus($status, $uId);
    }
 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Applicant Details & Resume
       
      </h1>
      <h3><?php
      if (isset($addcomment)) {
        echo $addcomment;
      }

      ?></h3>
      <ol class="breadcrumb">
        <li><a href="#"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
          <div class="row">
     <?php 
        $getU = $edu->getUser($uId);
        if ($getU) {
          while($value = $getU->fetch_assoc()){


      ?>
        <div class="col-md-8">
          <h5>Name:<?php echo $value['userName'];?></h5>
          <h5>Email:<?php echo $value['email'];?></h5>
          <h5>Phone:<?php echo $value['phone'];?></h5>
          <h5>BirthDate:<?php echo $value['dob'];?></h5>

        </div>
        <div class="col-md-4">
          <img src="../<?php echo $value['image'];?>" alt="image" height="150" width="120px"/>
        </div>
        <?php } } ?>  
    </div>
          <div class="row">
          <div class="col-md-4">
            <?php
               $getdata = $edu->getdocument($uId);
               if ($getdata) {
                   while ($data = $getdata->fetch_assoc()) {
                 
          ?> 
        
           <a href="../<?php echo $data['resume'] ?>" target="_blank">
             <img src="image/adobe-pdf-icon.png" alt="pdf" height="80px" width="85px">
             <h5 style="margin-left: 20px; margin-top: -3px;">Resume.pdf</h5>
           </a>
        
        <?php } } ?>
          </div>
        </div>
      <?php
        $getschool = $edu->getSchoolinfoby($uId);
        if ($getschool) {
            $i = 0;
            while($value = $getschool->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>School Name</td>
        <td>Group</td>
        <td>cgpa</td>
        <td>Passing Year</td>
        <td>Board</td>
      </tr>
    </thead>
    <tbody>
    <h3>Secondary School Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['name'];?></td>
          <td><?php echo $value['GName'];?></td>
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
        <td><?php echo $value['divName'];?></td>
      </tr>
   
    </tbody>
  </table>
      </div>
    <?php } } ?>
      <!-- /.row -->
<!-- /2nd row -->
<?php
        $geto = $edu->getoLevelinfoby($uId);
        if ($geto) {
            $i = 0;
            while($value = $geto->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>Institute</td>
        
        <td>cgpa</td>
        <td>Passing Year</td>
        <td>Board</td>
      </tr>
    </thead>
    <tbody>
    <h3>O-level Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['name'];?></td>
        
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
        <td><?php echo $value['divName'];?></td>
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
<!-- /2nd row end-->


      <!-- /3rd row -->
<?php
        $geth = $edu->gethscinfoby($uId);
        if ($geth) {
            $i = 0;
            while($value = $geth->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>Institute</td>
        
        <td>cgpa</td>
        <td>Passing Year</td>
        <td>Board</td>
      </tr>
    </thead>
    <tbody>
    <h3>Heigher Secondary (12years) schooling </h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['name'];?></td>
       
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
        <td><?php echo $value['divName'];?></td>
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
<!-- /3rd row end-->

      <!-- /4th row -->
<?php
        $getdip = $edu->getdiplomainfoby($uId);
        if ($getdip) {
            $i = 0;
            while($value = $getdip->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>Institute</td>
        
        <td>cgpa</td>
        <td>Passing Year</td>
        <td>Board</td>
      </tr>
    </thead>
    <tbody>
    <h3>Diploma Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['name'];?></td>
        <td><?php echo $value['degName'];?></td>
         <td><?php echo $value['deptName'];?></td>
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
        <td><?php echo $value['divName'];?></td>
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
<!-- /4th row end-->

          <!-- /5th row -->
<?php
        $getver = $edu->getgraduationby($uId);
        if ($getver) {
            $i = 0;
            while($value = $getver->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>University</td>
        <td>Department Of Study</td>
        <td>cgpa</td>
        <td>Passing Year</td>
        
        
      </tr>
    </thead>
    <tbody>
    <h3>Under Graduate Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['uName'];?></td>
        <td><?php echo $value['studyDept'];?></td>
        
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
       
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
<!-- /5th row end-->
 <!-- 6th row -->
<?php
        $getver = $edu->getpgraduationby($uId);
        if ($getver) {
            $i = 0;
            while($value = $getver->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>University</td>
        <td>Department Of Study</td>
        <td>cgpa</td>
        <td>Passing Year</td>
        
        
      </tr>
    </thead>
    <tbody>
    <h3>Postgraduate Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['uName'];?></td>
        <td><?php echo $value['studyDept'];?></td>
        
        <td><?php echo $value['cgpa'];?></td>
        <td><?php echo $value['pyear'];?></td>
       
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
 <!-- /6th row end-->



      <!-- 7th row -->
<?php
        $gettr = $edu->gettrainingby($uId);
        if ($gettr) {
            $i = 0;
            while($value = $gettr->fetch_assoc()){
                $i++;

    ?>
      <div class="row">
       <table class="table">
    <thead>
      <tr>
        <td>SL</td>
        <td>Training Institute</td>
        <td>Training Name</td>
        <td>Training Topic</td>
        <td>Length</td>
        
        
      </tr>
    </thead>
    <tbody>
    <h3>Professional Training Information</h3>
    
      <tr>
        <td><?php echo $i ;?></td>
        <td><?php echo $value['tInstitution'];?></td>
        <td><?php echo $value['trainingName'];?></td>
        
        <td><?php echo $value['tTopic'];?></td>
        <td><?php echo $value['tLenth'];?></td>
        
      </tr>
   
    </tbody>
  </table>
      </div>
      <?php } } ?>
<!-- /7th row end-->

      <!-- Main row -->
    <div class="container">
      <div class="row">
      <div class="col-md-6">
  <h3>Select Your Option For This Candidate</h3>
  
  <form action="" method="post">
   <label>Slecet Your Comment</label>
    <br>
                    <input class="w3-radio" type="radio"   name="status" value="1" checked>
                    <label>Select</label>
                    &nbsp;
                    <input class="w3-radio" type="radio"   name="status" value="2">
                    <label>Deselect</label>
                    
   <p><button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Submit</button></p>
  </form> 
 </div>
 <div class="col-md-6">
    <?php 
       $getid = $edu->getApplicantid($uId);
        if ($getid) {
            
            while($value = $getid->fetch_assoc()){
               
    ?>

   
   <a href="address.php?application=<?php echo $value['userId'];?>" class="btn btn-default add-to-cart">Address Of This Applicant</a>
                        
  
   <?php } } ?>
 </div>
      </div>
    </div>      
    
         

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once "inc/footer.php";?> 