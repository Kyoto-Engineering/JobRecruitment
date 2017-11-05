<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 
  $add = new Address();
  $uId = Session::get('userId'); 
?>

       

        <div class="container">
            <div class="row">
            <?php
              $getadd = $add->getuseraddressBy($uId);
              if ($getadd) {
                while ($data = $getadd->fetch_assoc()) {
               
            ?>
              <div class="col-md-6">
                <h2>Present Address</h2>
                  <br>
                  <h5>Flat:<?php echo $data['flat']; ?></h5>
                  <h5>Holding:<?php echo $data['holding']; ?></h5>
                  <h5>Building:<?php echo $data['building']; ?></h5>
                  <h5>Road:<?php echo $data['road']; ?></h5>
                  <h5>Block:<?php echo $data['block']; ?></h5>
                  <h5>Area:<?php echo $data['area']; ?></h5>
                  <h5>Divission:<?php echo $data['divName']; ?></h5>
                  <h5>District:<?php echo $data['distName']; ?></h5>
                  <h5>Thana:<?php echo $data['thName']; ?></h5>
                  <h5>Post:<?php echo $data['postName']; ?></h5>

              </div><!--address end-->
              <?php } } ?>
 <?php
              $getadd = $add->getpermanentuseraddressBy($uId);
              if ($getadd) {
                while ($data = $getadd->fetch_assoc()) {
               
            ?>
              <div class="col-md-6">
                <h2>Permanent Address</h2>
                  <br>
                 
                  <h5>Flat:<?php echo $data['flat']; ?></h5>
                  <h5>Holding:<?php echo $data['holding']; ?></h5>
                  <h5>Building:<?php echo $data['building']; ?></h5>
                  <h5>Road:<?php echo $data['road']; ?></h5>
                  <h5>Block:<?php echo $data['block']; ?></h5>
                  <h5>Area:<?php echo $data['area']; ?></h5>
                  <h5>Divission:<?php echo $data['divId']; ?></h5>
                  <h5>District:<?php echo $data['distName']; ?></h5>
                  <h5>Thana:<?php echo $data['thName']; ?></h5>
                  <h5>Post:<?php echo $data['postName']; ?></h5>
                  
              </div><!--address end-->
            <?php } } ?>
           
            </div>

        </div>
       
    
        









<?php include_once "inc/footer.php";?>