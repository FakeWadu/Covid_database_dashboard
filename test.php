<?php include('inc/header.php'); ?>
<?php if(isset($_POST['submit'])){
    $tempr = $_POST['tempr'];
    if(is_numeric($tempr) == false){
        echo "error";
    } else {
        echo "success";
    }

    
} ?>

    <form action="<?php echo $_SERVER['PHP_SELF']; ?>" method="POST">
       <div class="mb-3 col-md">
                        <label for="exampleInputEmail1" class="form-label">tempr</label>
                        <input type="text" name="tempr" maxlength="3" class="form-control" id="exampleInputEmail1"
                            aria-describedby="emailHelp" required>
                      
                    </div>
                    <input type="submit" value="Submit" name="submit" class="btn">
    </form>
</body>
</html>