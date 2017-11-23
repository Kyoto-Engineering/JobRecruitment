<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 
  $add = new Address();
  $userId = Session::get('userId');
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertInfo = $add->infoInsert($_POST, $userId);
    }
 
?>
<?php
      $add=new address();
       
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['academic'])) {
            
             $insertInfo = $add->infoInsert($_POST, $userId);
             $updateInfo = $add->statUpdateTraining($_POST , $userId);
        }
 
?>


        
<div class="container">
        <div>
            <h3 style="text-align:center"> Professional Training Inclusion Form</h3> <br>
            <p> Add details about any kind of professional trainings you have attended so far.</p>
        </div>
        <?php
            if (isset($insertInfo)) {
                echo $insertInfo;
            }
        ?>
         <div class="row">
            <div class="col-md-6 ">

            <form action="" method="post" class="container">
            <p>
                    <label>Training Institution</label>
                    <input class="form-control" id="usr" name="tInstitution" type="text" placeholder="Name of the institution from which you have received training" required>
                </p>

           

                <p>
                    <label>Training Name</label>
                    <input class="form-control" id="usr" type="text" name="trainingName" placeholder="Name of the training course" required>
                </p>
                
                <br>
                
                <p>
                    <label>Training Topic</label>
                    <input class="form-control" id="usr" type="text" name="tTopic" placeholder="Topic of the training course" required>
                </p>
                <p>
                    <label>Start Month</label>
                    <input class="form-control" id="usr" type="text" name="sMonth" placeholder="Ex :- Jan-2017" required>
                </p>
                <p>
                    <label>End Month</label>
                    <input class="form-control" id="usr" type="text" name="eMonth" placeholder="Ex :- Mar-2017" required>
                </p>
                
                <br>
                
                <p>

                    <label>Training Length</label>
                    <input class="form-control" id="usr"type="text" name="tLenth"  placeholder="ex :- 3 months" required>
                </p>

                
                <br>
                
                                
                <div class="row">
              <div class="col-md-4">
               <input class="form-control"  type="hidden" name="status" value="1"/> 
            <input type="submit" name="academic" value="My Professional Training Ends Here" class="btn btn-primary" >
             </div>
              <div class="col-md-4" style="margin-left: -50px;">
                <button type="submit" name="submit"  class="btn btn-primary">I have More Training to Input</button>
                
            </div>
            </div>
                
            </form>
            </div>
            <div class="col-md-6 col-md-offset-3"></div>
        </div> <!--row-->
</div>





<?php include_once "inc/footer.php";?>