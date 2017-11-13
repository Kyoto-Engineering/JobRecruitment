<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();
      $userId = Session::get("userId");
        
      

?>


       

        <div class="container">
        <?php
         $getinfo=$add->getTraining($userId);
         if ($getinfo) {

          
         while ($value = $getinfo->fetch_assoc()) {
          
        ?>
        <div class="row">
        
        
        <div class="col-md-4">
            <h2> Professional Training </h2>
            <h5>Training Institution:<?php echo $value['tInstitution'] ; ?> </h5>
            <h5>Training Name:<?php echo $value['trainingName'] ; ?> </h5>
            <h5>Training Topic:<?php echo $value['tTopic'] ;?> </h5>
            <h5>Training Length:<?php echo $value['tLenth'] ;?> </h5>
              <h5>Starting Month:<?php echo $value['sMonth'] ;?> </h5>
            <h5>Ending Month:<?php echo $value['eMonth'] ;?> </h5>

            
           

             
            </div>
            <div class="col-md-8">
        <br/><br/>
               <p>
                   <a href="update_training.php">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-pencil"></span> Update My professional Training
                    </button>
                    </a>
               </p>
           </div>

</div>
<?php } } ?>
         

        </div>










<?php include_once "inc/footer.php";?>