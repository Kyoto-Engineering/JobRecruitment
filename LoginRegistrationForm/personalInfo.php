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
        <div class="row">
        <div class="col-md-6">
            <h2> Personal Information </h2>
            <?php
                if (isset($infoAdd)) {
                    echo $infoAdd;
                }
            ?>

             <form action="" method="post" class="w3-container">
                <p>
                    <label>Full Name</label>
                    <input class="form-control" id="usr" type="text"  name="perName" placeholder="Your Full Name" required>
                </p>
                
                <br>
                <p>
                    <label>Email</label>
                    <input class="form-control" type="email"  id="usr"   name="perEmail" placeholder="Your Email" required>
                </p>
                 <br>
                <p>
                    <label>Phone</label>
                    <input class="form-control" type="phone"  id="usr"   name="perPhone"  placeholder="Your Phone" required>
                </p>
                <br>
                <p>
                    <label> Date of Birth </label>
                    <input class="form-control" type="date"  id="usr"   name="dob" placeholder="Your Birthdate" required>
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
                    <input type="text" class="form-control" id="usr"  name="nId" required placeholder="National ID card no">
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
                    
                    
                    <button type="submit" name="submit" class="w3-button w3-block w3-section w3-blue w3-ripple w3-padding">Submit </button> 

               </p>
               </form>

                <?php
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['next'])) {
            $updatestat = $add->statUpdate($_POST , $userId);
        }
 
?>


            <form action="" method="post">
            <input class="form-control"  type="hidden" name="status" value="1"/> 
            <input type="submit" name="next" value="next">
            </form>

                    
          


                
            
            </div>
             <div class="col-md-6 ">
<?php 
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
      $addImage = $add->uploadpicture($userId, $_FILES);
    }
?>
             <form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-12 text-center colm">
                    <h3>Upload Your Picture</h3>
                     
                    <hr/>
                    <span style="color:green">
              <?php 
                if (isset($addImage)) {
                  echo $addImage;
                }
              ?>
              </span>
                    <div class="col-sm-12 colm2" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-lg btn-primary">           
                    <input type="file" name="image" />
                    <input class="buton" type="submit" name="submit" value="Upload"/>
            </label>
                  </div>
              </div>


          </div>
          <hr/>
          </form>
          </div>

</div>

        </div>










<?php include_once "inc/footer.php";?>