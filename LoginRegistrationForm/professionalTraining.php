<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>

<?php 
  $add = new Address();
  $uId = Session::get('userId');
   if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
        $insertInfo = $add->infoInsert($_POST, $uId);
    }
 
?>

        
<div class="container">
        <div>
            <h3 style="text-align:center"> Professional Training Inclusion Form</h3> <br>
            <p> Add details about any kind of professional trainings you have attended in this section.</p>
        </div>
        <?php
            if (isset($insertInfo)) {
                echo $insertInfo;
            }
        ?>
        <div>

            <form action="" method="post" class="container">
            <p>
                    <label>Training Institution</label>
                    <input class="w3-input" name="tInstitution" type="text" placeholder="Name of the institution from which you have received training" required>
                </p>

           

                <p>
                    <label>Training Name</label>
                    <input class="w3-input" type="text" name="trainingName" placeholder="Name of the training course" required>
                </p>
                
                <br>
                
                <p>
                    <label>Training Topic</label>
                    <input class="w3-input" type="text" name="tTopic" placeholder="Topic of the training course" required>
                </p>
                
                <br>
                
                <p>

                    <label>Training Length</label>
                    <input class="w3-input" type="text" name="tLenth"  placeholder="Length of the training" required>
                </p>

                
                <br>
                
                                
                <p>
                    <button type="submit" name="submit" class="btn btn-default">Submit</button>
                </p>
                
            </form>
        </div>
</div>





<?php include_once "inc/footer.php";?>