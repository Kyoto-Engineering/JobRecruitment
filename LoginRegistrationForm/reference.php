<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>
<?php include_once "Classes/frontclass.php";?>
<?php
$front=new Front();
$add=new Address();



?>
<?php 
 
  $uId = Session::get('userId');
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertReference = $front->refInsert($_POST, $uId);
    }
 
?>
<?php
     
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['academic'])) {
            
             $insertExp = $front->refInsert($_POST, $uId);
             $status = $_POST['status'];
             $updateRef = $add->statUpdateRef($status , $uId);
        }
 
?>
<?php
if($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['info'])){
    $status = $_POST['status'];
    $updatew = $add->refstatUpddate($status, $uId);
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
                

                
                                    
                
               
                
                               
               <div class="row">
              <div class="col-md-4">
               <input class="form-control"  type="hidden" name="ref" value="1"/> 
            <input type="submit" name="academic" value="My Working Experience Ends Here" class="btn btn-primary" >
             </div>
              <div class="col-md-4" style="margin-left: -50px;">
               <input class="form-control"  type="hidden" name="status" value="1"/> 
                <button type="submit" name="submit"  class="btn btn-primary">I have More Working Experience to Input</button>
                
            </div>
            </div>
                
                <br>
            </form>
        </div>

        <form action="" method="post">
            
            <div class="col-md-3" style="margin-left: 720px; margin-top:-43px;">
               <input  type="hidden" name="status" value="1"/> 
            <input type="submit" name="info" value="I have No Working Experience" class="btn btn-primary" >
             </div>
             
             </form>


        </div>
        
            
            
    
        









<?php include_once "inc/footer.php";?>