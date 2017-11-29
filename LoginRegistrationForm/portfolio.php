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
<?php
        $userId = Session::get("userId");
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['academic'])) {
            $infoAdd = $add->portfolio($_POST , $userId);
        }
 
?>
<?php
        
        if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_POST['update'])) {
            $infoAdd = $add->portfoliostatupdate($_POST , $userId);
        }
 
?>


 <div class="container">
        <div class="row">
        <div class="col-md-10">
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
                    <label>UserId (if any)</label>
                    <input class="form-control" id="usr" type="text"  name="uId" placeholder="userId" >
                </p>
                <p>
                    <label>Password (if any)</label>
                    <input class="form-control" id="usr" type="text"  name="password" placeholder="password" >
                </p>

                 <p>
                     <div class="col-md-4" style="margin-left: -50px;">
            <input class="form-control"  type="hidden" name="status" value="1"/> 
            <input type="submit" name="submit" value="My Portfolio link Insert Ends Here" class="btn btn-primary" >
            </div>
                </p>
                
                <p> <div class="col-md-4" style="margin-left: 50px;">
                <a href= 'portfolio.php'><button type="submit" name="academic"  class="btn btn-primary">I have More link to Input</button>
                </a>
                </div></p>
                </form>
               
        </div>
        <br/><br/>
         <form action="" method="post">
             <br/><br/>
                <p> <div class="col-md-4" style="margin-top:-35px; margin-left: 535px;">
               <input class="form-control"  type="hidden" name="status" value="1"/> 
            <input type="submit" name="update" value="I dont have any portfolio" class="btn btn-primary" >
             </div></p>
                
             </form>   
        </div>
        
        </div>





<?php include_once "inc/footer.php";?>