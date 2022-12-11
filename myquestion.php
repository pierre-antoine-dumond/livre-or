<?php
    require 'actions/questions/myQuestionAction.php';
    require 'actions/users/securityAction.php';
?>
<!DOCTYPE html>
<html lang="en">
    <?php include 'includes/head.php'; ?>
<body>
    <?php include 'includes/navbar.php'; ?>
    <br><br>
    <div class="class container">
        <?php
        
            while($question = $getAllMyQuestion->fetch()) {
                ?>
                    <div class="card">
                        <div class="card-header">
                            <?= $question['titre']; ?>
                        </div>
                        <div class="card-header">
                            <p class="card-text">
                                <?= "Objet :"." ".$question['description'] ?>
                            </p>
                        </div>
                        <div class="card-body">
                            <p class="card-text">
                                <?= $question['contenu']; ?>
                            </p>
                        </div>
                        <div class="card-footer">
                            <p class="card-text">
                                <a href="#" class="btn btn-primary">Accéder à l'article</a>
                                <a href="#" class="btn btn-warning">Modifier l'article</a>
                            </p>
                        </div>
                    </div>
                <?php
            } 
        
        ?>
    </div>
</body>
</html>