<?php include_once "inc/header.php";?>
 <?php include_once "../Classes/resume.php";?>
<?php include_once '../helpers/format.php';?>

      <!-- sidebar menu: : style can be found in sidebar.less -->
 <?php include_once "inc/sidebar.php";?>    

  <?php
    $edu = new Resume();
    $fm = new Format();
    if (!isset($_GET['joid']) || $_GET['joid'] == NULL ) {
        
      }else{
        $id = $_GET['joid'];
      }

?> 
  <?php 

    
    if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])){
        $status = $_POST['status'];
        
        $CSchedule = $edu->Confirmschedule($status, $id);
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
      <span style="font-style: italic; font-family: verdana;">
          <?php
            if (isset($CSchedule)) {
              echo  $CSchedule;
            }
          ?>
        </span>
        <br/><br/>
        <table class="table">
    <thead>
    
      <tr>
        <th>Serial</th>
        <th>JobTitle</th>
        <th>Applicant Name</th>
        <th>Convenient Time</th>
        <th>Convenient Date</th>
        <th>Reason</th>
        <th></th>
        
        
      </tr>
    </thead>
    <tbody>
    <?php 
         $getSche = $edu->getscheduleJob();
          if ($getSche) {
            $i = "0";
            while ($value = $getSche->fetch_assoc()) {
              $i++;
    ?>
      <tr class="success">
        <td><?php echo $i;?></td>
        <td><?php echo $value['jobtitle'];?></td>
        <td><?php echo $value['userName'];?></td>
        <td><?php echo $fm->formatTime($value['dtime']);?></td>
        <td><?php echo $fm->formDate($value['ddate']);?></td>
        <td><?php echo $value['reason'];?></td>

        
      </tr>
      <?php } } ?>
    </tbody>
</table>
 <div class="container">
 
  <form action="" method="POST">

    <input class="w3-radio" type="radio"   name="status" value="1">
                    <label>Accept</label>
                    &nbsp;
                    <input class="w3-radio" type="radio"   name="status" value="2">
                    <label>Reject</label>
    <br/><br/>

    <p><button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Submit</button></p>

  </form>
</div>

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