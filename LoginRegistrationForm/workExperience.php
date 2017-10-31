<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 
  $add = new Address();
  $uId = Session::get('userId');
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertAdd = $add->expInsert($_POST, $uId);
    }
 
?>


        
<div class="container">
        <?php
            if(isset($insertAdd)){
                echo $insertAdd;
            }
        ?>
        <div id="adminForm" style="margin:10px">
            
            <form action="" method="post" class="container">
                
                <p>
                    <label> <h2> Work Experience Details </h2> </label>
                </p>
                
                <br>
                
                <p>
                    <label>Name of Company</label>
                    <input class="w3-input" type="text" name="companyName" placeholder="Name of the company of your previous employment" required>
                </p>
                
                <br>
                
                <p>
                    <label>Designation</label>
                    <input class="w3-input" type="text" name="designation" placeholder="Your designation during the employment period" required>
                </p>
                
                <br>
                
                <p>
                    <label>Employment Length (in Months)</label>
                    <input class="w3-input" type="text" name="workingPeriod" placeholder="Length of your employment" required>
                    
                    <!--<input class="w3-radio" type="radio" name="length" value="day">
                    <label>Day(s)</label>
                    
                    <input class="w3-radio" type="radio" name="length" value="week">
                    <label>Week(s)</label>
                    
                    <input class="w3-radio" type="radio" name="length" value="month">
                    <label>Month(s)</label>-->
                </p>
                
                <br>
                
                                
                <p>
                    <button class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding" type="submit" name="submit" class="btn btn-default">Submit</button>
                </p>
                
            </form>
        </div>
</div>
        






















<?php include_once "inc/footer.php";?>