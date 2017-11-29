<?php include_once "inc/header.php";?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
 <?php include_once "inc/sidebar.php";?>    
 <?php include_once "../Classes/stepclass.php";?>
<?php include_once "../helpers/Format.php";?>
<?php
$fm = new Format();
$allS = new Steps();
?>
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        Attend Candidates List On Interview
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      
      <br/><br/><br/>
      
          
      <!-- /.row -->

      
      <!-- Main row -->
      <div class="row">
<table class="table">
    <thead>
      <tr>
        <th>Sl</th>
        <th>Name</th>
        <th>JObTitle</th>
        
        <th>InterviewDate</th>
        
      </tr>
    </thead>
    <tbody>
    <?php
      $success = $allS->getallsuccess();
      if ($success) {
        $i = "0";
        while ($data = $success->fetch_assoc()) {
         $i++;
    ?>
    <tr>
      <td><?php echo $i;?></td>
      <td><?php echo $data['userName'];?></td>
      <td><?php echo $data['jobtitle'];?></td>
      
      <td><?php echo $data['interviewdate'];?></td>

      <td>
        <?php
          if ($data['attend']==1) {
            echo "<span style='color:green'>Present</span>";
          }
        ?>

      </td>
    </tr>
    <?php } } ?>
    </tbody>
</table>
      </div>
           
    
         

    </section>
    <!-- /.content -->
  </div>
  <!-- /.content-wrapper -->
 <?php include_once "inc/footer.php";?> 