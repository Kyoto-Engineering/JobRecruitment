<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>


<?php 

      $add = new Address();

?>
<?php
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $infoAdd = $add->portfolio($_POST , $userId);
        }
 
?>


 <div class="container">
        <div class="row">
        <div class="col-md-6">
            <h2> My Portfolio </h2>
             <?php
                if (isset($infoAdd)) {
                    echo $infoAdd;
                }
            ?>

            <form action="" method="post" >
                <p>
                    <label>Portfolio Link</label>
                    <input class="form-control" id="usr" type="url"  name="link" placeholder="Your Portfolio Link" required>
                </p>
                
                <br>
                 <p>

                    <button type="submit" name="submit" >Submit</button>


                </p>
                
        </div>
        </div>
        </div>





<?php include_once "inc/footer.php";?>