<?php include_once "inc/header.php";?>
 <?php include_once "../Classes/resume.php";?>

      <!-- sidebar menu: : style can be found in sidebar.less -->
 <?php include_once "inc/sidebar.php";?>    
 <?php
      $edu = new Resume();
      if (isset($_GET['delete'])) {
      $Did = $_GET['delete'];
      $delCat = $edu->delByid($Did);
    }
  ?>
  <?php
    if (!isset($_GET['application']) || $_GET['application'] == NULL ) {
        
      }else{
        $applicationId = $_GET['application'];
      }

?> 
  <?php 

    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        
        
        $rSchedule = $edu->scheduleRequest($_POST,  $applicationId);
    }
 
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>Interview Re-Scheduling</h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
     
      <div class="row">
      

      <div class="col-md-9">

        <table class="table">
    <thead>
    
      <tr>
        <th>JobTitle</th>
        <th>Applicant Name</th>
        
        <th>Action</th>
        
      </tr>
    </thead>
    <tbody>
    <?php 
         $getSche = $edu->getscheduleJob();
          if ($getSche) {
            while ($value = $getSche->fetch_assoc()) {
       
    ?>
      <tr class="success">
        <td><?php echo $value['jobtitle'];?></td>
        <td><?php echo $value['userName'];?></td>
        
        <td><a href="reschedule_details.php?joid=<?php echo $value['id'];?>"><input type="button" name="button" value="View Details"/></a></td>
        
      </tr>
      <?php } } ?>
    </tbody>
</table>

      </div>
      </div>
      <!-- /.row -->

      
      <!-- Main row -->
      <div class="row">
        
            </div>
           
    
         

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once "inc/footer.php";?> 