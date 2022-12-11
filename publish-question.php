<?php 
    require "actions/questions/publishQuestionAction.php";
    require "actions/users/securityAction.php";
?>
<!DOCTYPE html>
<html lang="en">
<?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <form class="container" method="POST">
        <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Titre</label>
            <input type="text" class="form-control" name="title">
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Descritpion</label>
            <textarea class="form-control" name="description"></textarea>
        </div>
        <div class="mb-3">
            <label for="exampleInputPassword1" class="form-label">Contenu</label>
            <textarea class="form-control" name="contenu"></textarea>
        </div>
        <button type="submit" class="btn btn-primary" name="validate">Envoyer</button>
        <?php if(isset($errorMsg)) { echo '<br><p>'.$errorMsg.'</p>'; } ?> 
        <?php if(isset($successMsg)) { echo '<br><p>'.$successMsg.'</p>'; } ?> 
        <br><br>
    </form>
</body>
</html>