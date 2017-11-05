<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();
      $userId = Session::get("userId");
        
      

?>


       

        <div class="container">
        <div class="row">
        
        <?php
         $getinfo=$add->getPersonalInfo($userId);
         if ($getinfo) {

          
         while ($value = $getinfo->fetch_assoc()) {
          
        ?>
        <div class="col-md-6">
            <h2> Personal Information </h2>
            <h5>Full Name:<?php echo $value['perName'] ; ?> </h5>
            <h5>Email:<?php echo $value['perEmail'] ; ?> </h5>
            <h5>Phone:<?php echo $value['perPhone'] ;?> </h5>
            <h5> Date of Birth:<?php echo $value['dob'] ; ?></h5>
            <h5>Gender  : <?php echo $value['gender'] ; ?> </h5>
            <h5>National ID: <?php echo $value['nId'] ; ?> </h5>
            <h5>Marital Status: <?php echo $value['maritalStatus'] ; ?> </h5>
           

             
            </div>
            <?php } } ?>
         

</div>

        </div>










<?php include_once "inc/footer.php";?>