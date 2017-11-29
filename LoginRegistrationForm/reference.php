<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>
<?php include_once "Classes/frontclass.php";?>
<?php
$front=new Front();


?>
<?php 
  $front = new Front();
  $uId = Session::get('userId');
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertReference = $front->refInsert($_POST, $uId);
    }
 
?>


       

        <div class="container">
            <div class="col-sm-6" id="adminForm">
            <h2>References</h2>
            <br>
           
            <form action="" method="post">
                <p>
                    <label> Name</label>
                    <input class="form-control" id="usr" type="text" name="name" placeholder="Your Referee Name" >
                </p>
                
                <br>
                
                <p>
                    <label> Organization </label>
                    <input class="form-control" id="usr" type="text" name="organization" placeholder="Your Referees Organization" required>
                </p>
                
                <br>
                
                <p>
                    <label> Designation </label>
                    <input class="form-control" id="usr" type="text" name="designation" placeholder="Your Referees  Designation" >
                </p>
                
                <br>
                
                <p>
                    <label> Email </label>
                    <input class="form-control" id="usr" type="email" name="email" placeholder="Your Referees Email" >
                </p>
                
                <br>
                
                <p>
                    <label> Phone </label>
                    <input class="form-control" id="usr" type="text" name="phone" placeholder="Your Referees Phone" >
                </p>
                
                <br>
                
                <p>
                <label> Specialization </label><br/>
                   <select class="form-control" id="exampleFormControlSelect1" name="specialization">
                   <option> Select Your Referees Specialization</option>
                   <?php
                                                 $getsp =  $front->getspecilization();
                                                    if ($getsp) {
                                                    while ($value = $getsp->fetch_assoc()) {
                                                 ?>
                     <option value="<?php echo $value['spId'];?>" ><?php echo $value['specialization'];?></option>
                      <?php } } ?>

                   </select>
                
               
                </p>
                 <br/>
                 <p>
                <label> Relationship </label><br/>
                   <select class="form-control" id="exampleFormControlSelect1" name="relationship">
                   <option > Select Your Relationship with Referees </option>
                    <?php
                                                 $getsp =  $front->getrelationship();
                                                    if ($getsp) {
                                                    while ($value = $getsp->fetch_assoc()) {
                                                 ?>
                   <option value="<?php echo $value['id'];?>" ><?php echo $value['relationType'];?></option>
                    <?php } } ?>
                   </select>
                   </p>
                
                <br>
                

                
                                    
                
               
                
                               
                
                <p>
                    <button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Submit</button>
                </p>
                
                
                
                
                <br>
            </form>
        </div>



        </div>
        
            
            </div><!-- next butn-->

        </div>
        </div>
    
        









<?php include_once "inc/footer.php";?>