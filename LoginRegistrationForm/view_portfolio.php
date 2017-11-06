<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();
      $userId = Session::get("userId");
        
      

?>


       

        <div class="container">
        <?php
         $getportfolio=$add->getPortfolio($userId);
         if ($getportfolio) {

          
         while ($value = $getportfolio->fetch_assoc()) {
          
        ?>
        <div class="row">
        
        
        <div class="col-md-6">
            <h2> My Portfolio </h2>
            <h5>Portfolio Link:<?php echo $value['link'] ; ?> </h5>
            <h5>UserId (if any):<?php echo $value['uId'] ; ?> </h5>
            <h5>Password (if any):<?php echo $value['password'] ;?> </h5>
            
           

             
            </div>

            <div class="col-md-6">
               <p>
                   <a href="update_myPortfolio.php">
                    <button type="button" class="btn btn-default">
                      <span class="glyphicon glyphicon-pencil"></span> Update My Portfolio
                    </button>
                    </a>
               </p>
           </div>
           
         

</div>
 <?php } } ?>

        </div>










<?php include_once "inc/footer.php";?>