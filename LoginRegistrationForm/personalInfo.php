<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 

      $add = new Address();

?>
<?php
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $infoAdd = $add->personalInfo($_POST , $userId);
        }
 
?>

       

        <div class="container">
            <h2> Personal Information </h2>
            <?php
                if (isset($infoAdd)) {
                    echo $infoAdd;
                }
            ?>

             <form action="" method="post" class="w3-container">
                <p>
                    <label>Full Name</label>
                    <input class="w3-input" type="text"  name="perName" placeholder="Your Full Name" required>
                </p>
                
                <br>
                <p>
                    <label>Email</label>
                    <input class="w3-input" type="email"   name="perEmail" placeholder="Your Email" required>
                </p>
                 <br>
                <p>
                    <label>Phone</label>
                    <input class="w3-input" type="phone"   name="perPhone"  placeholder="Your Phone" required>
                </p>
                <br>
                <p>
                    <label> Date of Birth </label>
                    <input class="w3-input" type="date"   name="dob" placeholder="Your Birthdate" required>
                </p>
                
                <br>
                

                <p>
                    <label> <b> Gender </b> </label> <br>
                    <input class="w3-radio" type="radio"   name="gender" value="male" checked>
                    <label>Male</label>
                    &nbsp;
                    <input class="w3-radio" type="radio"   name="gender" value="female">
                    <label>Female</label>
                </p>
                
                <br>
                 <p>
                    <label> National ID </label>
                    <input class="w3-input" id="nid" type="number"  name="nId" required placeholder="National ID card no">
                </p>
                
                <br>

                <p>
                    <label> <b> Marital Status </b> </label> <br>
                    <input class="w3-radio" type="radio" name="maritalStatus" value="married">
                    <label>Married</label>
                    &nbsp;
                    <input class="w3-radio" type="radio" name="maritalStatus" value="single" checked>
                    <label>Single</label>
                </p>
                
                <br>
                                  
                <p>

                    <button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Submit</button>


                </p>
            </form>
        </div>










<?php include_once "inc/footer.php";?>