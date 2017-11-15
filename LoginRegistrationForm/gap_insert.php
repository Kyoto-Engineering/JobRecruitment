<?php include_once "inc/header.php";?>
<?php include_once '../helpers/format.php';?>
<?php include_once "../Classes/module.php";?>

<?php
    $allM = new Module();
    $fm = new Format();
    
?>
 <?php include_once "inc/sidebar.php";?>    
<!--pagination-->
  <?php 
    $per_page = 40;
    if (isset($_GET["page"])) {
      $page = $_GET["page"];
    }else{
      $page=1;
    }
    $start_form = ($page-1)*$per_page;
  ?>
  <!--pagination-->
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
      <h1>
       All Registered People
       
      </h1>
      <ol class="breadcrumb">
        <li><a href="index.php"><i class="fa fa-dashboard"></i> Home</a></li>
        <li class="active">Dashboard</li>
      </ol>
    </section>

    <!-- Main content -->
    <section class="content">
      <!-- Small boxes (Stat box) -->
      <div class="row">
         <div class="col-md-12 col-sm-8 col-xs-6">
             <span style="color: green">
                    <?php
                        /*if (isset($deldep)) {
                            echo $deldep;
                        }*/
                    ?>
                </span>
                <table class="table">
                    <thead>
                      <tr>
                        <th>ID</th>
                        <th>UserName</th>
                         <th>Resume</th>
                        <th>Email</th>
                        <th>Phone</th>
                        <th>Age</th>
                       
                        <th>Specialization</th>
                        <th>SignUp-Time </th>
                        
                      </tr>
                    </thead>
                    
                    <tbody>
                    <?php
                      $getdept = $allM->getAllpeople($start_form, $per_page);
                       if ($getdept) {
                          $i = 0;
                           while ($value = $getdept->fetch_assoc()) {
                             $i++; 
                         
                    ?>
                      <tr>
                            <?php
                                $uId = $value['regId'];
                            ?>
                        <td><?php echo $i;?></td>
                        <td>
                            <a href="applicant_details.php?user=<?php echo $uId;?>">
                            <?php echo $value['userName'];?>
                            </a>
                            </td>
                            </div>
           
    
         

    </section>
    <!-- /.content -->
  </div>