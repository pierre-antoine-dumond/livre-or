<?php 
    require_once 'actions/users/signupAction.php';
?>

<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    
    <br><br>
    <form class="container" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Pseudo</label>
            <input type="text" class="form-control" name="pseudo">
        <?php if(isset($errorMsg)) { echo '<br><p>'.$errorMsg.'</p>'; } ?> 
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="passwd">
        <?php if(isset($errorMsg)) { echo '<br><p>'.$errorMsg.'</p>'; } ?> 
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Password</label>
            <input type="password" class="form-control" name="confpasswd">
            <?php if(isset($errorMsg)) { echo '<br><p>'.$errorMsg.'</p>'; } ?> 
        </div>
        <button type="submit" class="btn btn-primary" name="validate">S'inscire</button>
        <?php if(isset($errorMsg)) { echo '<br><p>'.$errorMsg.'</p>'; } ?> 
        <br><br>
        <a href="login.php"><p>J'ai déjà un compte, je me connecte</p></a>
    </form>

</body>
</html>