<?php include_once "inc/header.php";?>
<?php include_once "Classes/address.php";?>


<?php 

      $add = new Address();

?>
<?php
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['submit'])) {
            $portUpdate = $add->updatePortfolio($_POST , $userId);
        }
 
?>


 <div class="container">
        <div class="row">
        <div class="col-md-6">
            <h2> My Portfolio </h2>
             <?php
                if (isset($portUpdate)) {
                    echo $portUpdate;
                }
            ?>
             <?php
                $editPort = $add->editPortfolio($userId);
                if($editPort){
                    while($data = $editPort->fetch_assoc()){
                        
                  
            ?>

            <form action="" method="post" >
                <p>
                    <label>Portfolio Link</label>
                    <input class="form-control" id="usr" type="url"  name="link" value="<?php echo $data['link']?>"required>
                </p>
                
                <br>
                <p>
                    <label>UserId (if any)</label>
                    <input class="form-control" id="usr" type="text"  name="uId" value="<?php echo $data['uId']?>" >
                </p>
                <p>
                    <label>Password (if any)</label>
                    <input class="form-control" id="usr" type="text"  name="password" value="<?php echo $data['password']?>" >
                </p>

                 <p>


                    <button type="submit" name="submit" >Submit</button>


                </p>
                </form>
                <?php } } ?>
                
        </div>
        </div>
        </div>





<?php include_once "inc/footer.php";?>