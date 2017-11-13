<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 
    $add = new Address();
    $userId = Session::get('userId');
    if ($_SERVER['REQUEST_METHOD'] == "POST" && isset($_POST['submit'])) {
      $addImage = $add->uploadpicture($userId, $_FILES);
    }
?>
          <div class="container" style="margin-bottom: 350px;">


              <div class="row">
                    <div class=col-md-4>
                        <div class="dropdown">
                            <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Secondary Schooling Information
                            <span class="caret"></span></button>
                            <ul class="dropdown-menu">
                             <li><a href="secondarySchooling.php"> Secondary Schooling (S.S.C) </a></li>
                             <li><a href="oLevel.php"> Junior Schooling (J.S.C) </a></li>
                             <li><a href="vocational.php"> Vocational </a></li>
                            </ul>
                        </div>    
                    </div>
                    
                

                  <div class=col-md-4>
                    <div class="dropdown">
                     <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Higher Secondary Schooling Information
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="hsc.php">Higher Secondary (H.S.C)</a></li>
                            <li><a href="diploma.php"> Diploma</a></li>
                            <li><a href="aLevel.php">  A - Level </a></li>
                        </ul>
                    </div>
                  </div>

                  <div class=col-md-4>
                      <div class="dropdown">
                        <button class="btn btn-primary dropdown-toggle" type="button" data-toggle="dropdown">Graduation Information
                        <span class="caret"></span></button>
                        <ul class="dropdown-menu">
                            <li><a href="under_graduate.php">Under Graduate</a></li>
                            <li><a href="post_graduate.php">Post Graduate</a></li>
                        </ul>
                    </div>
                  </div>
              </div>

              <br/><br/><br/>
              </div>
             
              
              <!--<form action="" method="post" enctype="multipart/form-data">
              <div class="row">
                  <div class="col-md-12 text-center">
                    <h3>Upload Your Picture</h3>
                     <span style="color:green">
              <?php 
                //if (isset($addImage)) {
                  //echo $addImage;
                //}
              ?>
                    <hr/>
                    <div class="col-sm-12" style="margin-bottom:20px;">
                      <label class="btn-bs-file btn btn-lg btn-primary">           
                    <input type="file" name="image" />
                    <input class="buton" type="submit" name="submit" value="Upload"/>
            </label>
                  </div>
              </div>

          </div>
          </form>-->

                                








<?php include_once "inc/footer.php";?>