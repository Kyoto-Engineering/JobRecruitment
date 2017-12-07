<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();
      $userId = Session::get("userId");

?>

<div class="container">
<h3><center>References</center></h3>
<?php
         $getstatinfo=$add->getAllStatRef($userId) ;
         if ($getstatinfo) {
          
         while ($data = $getstatinfo->fetch_assoc()) {
?>
<?php
        if ($data['status']=="1") { 
          echo " <span style='color:green;'> <center> <h2>Thank You for Completing This Section.</h2></center></span>";

         $getinfo=$add->getRef($userId);
         if ($getinfo) {
        $i = "0";
          
         while ($value = $getinfo->fetch_assoc()) {
            $i++;
        ?>
 



          <div class="container">
         
        <div class="row">
   
       
          <div class="col-md-4">
           
            <h5> Name:<?php echo $value['name'] ; ?> </h5>
            <h5>Organization:<?php echo $value['organization'] ; ?> </h5>
            <h5>Designation:<?php echo $value['designation'] ;?> </h5>
            <h5>Email:<?php echo $value['email'] ;?> </h5>
            <h5>Phone:<?php echo $value['phone'] ;?> </h5>
             <h5>Specialization:<?php echo $value['specialization'] ;?> </h5>
            
            <h5>Relationship:<?php echo $value['relationType'] ;?> </h5>
            
            
  
        </div>
     
        <div class="col-md-8">
        <br/><br/>
               <p>
                   <a href="update_experience.php">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-pencil"></span> Update My References
                    </button>
                    </a>
               </p>
           </div>
       
        
   
</div>
</div>
       
<?php } } } ?>
  <?php } } ?>
             
<br/><br/>

<?php 
 $getinfo=$add-> getRefer($userId) ;
if (!$getinfo) { 
 echo "<span style='color:red;'><center><h2>You have not Completed This Section</h2></center></span>";
}
?>

</div>


<?php include_once "inc/footer.php";?>