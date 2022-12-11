<?php
    require 'actions/database.php';

    $getAllMyQuestion = $bdd->prepare('SELECT `id`,`titre`,`description`,`contenu` FROM questions WHERE id_author = ?');
    $getAllMyQuestion->execute([$_SESSION['id']]);
?>