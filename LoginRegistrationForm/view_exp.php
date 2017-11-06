<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();
      $userId = Session::get("userId");
        
      

?>


       

        <div class="container">
         <?php
         $getinfo=$add->getAllExp($userId) ;
         if ($getinfo) {

          
         while ($value = $getinfo->fetch_assoc()) {
          
        ?>
        <div class="row">
        
       
        <div class="col-md-6">
            <h2> Working Experience</h2>
            <h5>Company Name:<?php echo $value['companyName'] ; ?> </h5>
            <h5>Designation:<?php echo $value['designation'] ;?> </h5>
            <h5>Employment Length:<?php echo $value['workingPeriod'] ; ?> </h5>
            
            
           

             
            </div>
           
         

</div>
 <?php } } ?>

        </div>










<?php include_once "inc/footer.php";?>