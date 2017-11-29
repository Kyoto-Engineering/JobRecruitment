<?php include_once "inc/header.php";?>
      <!-- sidebar menu: : style can be found in sidebar.less -->
      <?php include_once "../Classes/stepclass.php";?>
 <?php include_once "inc/sidebar.php";?>    

  <!-- Content Wrapper. Contains page content -->


  <?php 
  $allS = new Steps();
  ?>
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
        All Applied But Not Complete Resume
       
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
      
      <!-- Main row -->
      <div class="row">
        <table class="table">
    <thead>
      <tr>
        <th>Sl</th>
        <th>Name</th>
        <th>Info</th>
        <th>Address</th>
        <th>SSC</th>
        <th>O-level</th>
        <th>HSC</th>
        <th>Professional Training</th>
        <th>Working Experience</th>
        <th>portfolio</th>
      </tr>
    </thead>
    <tbody>
    <?php 
      $getapply = $allS->getallData();
      if ($getapply) {
        $i = "0";
        while ($data = $getapply->fetch_assoc()) {
          $i++;
    ?>
      <tr>
      <?php
        $userId = $data['userId'];
        $jId = $data['jId'];
      ?>
        <td><?php echo $i;?></td>
        <td> <a href="applicant_details.php?user=<?php echo urlencode($userId);?>;&amp;jId=<?php echo urlencode($jId);?>"><?php echo $data['userName']?></a></td>
    <?php 
      $getinfo = $allS->getallInfo($userId);
      if ($getinfo) {
        
        while ($data = $getinfo->fetch_assoc()) {
          
    ?>
    <?php 
    if ($data['status'] == "1") {?>
      <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
   <?php }else{?>
     <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
     <?php } ?>
        
        <?php } } ?>

        <?php 
      $getadd = $allS->getalladdress($userId);
      if ($getadd) {
        
        while ($value = $getadd->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>


    <?php 
      $getssc = $allS->getallssc($userId);
      if ($getssc) {
        
        while ($value = $getssc->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>
    
    <?php 
    //ssc for vocational
      $getssc = $allS->getallssc($userId);
      if ($getssc) {
        
        while ($value = $getssc->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>
       
    <?php 
      $getssc = $allS->getallhsc($userId);
      if ($getssc) {
        
        while ($value = $getssc->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>


        <?php 
      $gettraining = $allS->getalltraining($userId);
      if ($gettraining) {
        
        while ($value = $gettraining->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>


    <?php 
      $getwork = $allS->getallexp($userId);
      if ($getwork) {
        
        while ($value = $getwork->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;" class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>

    <?php 
      $getport = $allS->getallportfolio($userId);
      if ($getport) {
        
        while ($value = $getport->fetch_assoc()) {
          
    ?>
    <?php
      if ($value['status'] == "1") {?>
        <td><p><span style="color:green;"  class="glyphicon glyphicon-ok"></span></p></td>
      <?php }else{?>
        <td><p><span style="color:red;"  class="glyphicon glyphicon-remove"></span></p></td>
    <?php } ?>
        

    <?php } } ?>
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