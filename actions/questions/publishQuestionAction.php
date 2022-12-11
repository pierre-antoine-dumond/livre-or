<?php
    require 'actions/database.php';

    if(isset($_POST['validate'])) {
        if(!empty($_POST['title']) && !empty($_POST['description']) && !empty($_POST['contenu'])) {
            $question_title = htmlspecialchars($_POST['title']);
            $question_descritpion = nl2br(htmlspecialchars($_POST['description']));
            $question_contenu = nl2br(htmlspecialchars($_POST['contenu'])); 
            $question_date = date('d/m/Y');
            $question_id_author = $_SESSION['id'];
            $question_login_author = $_SESSION['login'];

            $insertQuery = $bdd->prepare('INSERT INTO questions(titre, description, contenu, login_author, id_author, date_publication) 
            VALUES (?,?,?,?,?,?)');
            $insertQuery->execute([$question_title, 
            $question_descritpion,
            $question_contenu,
            $question_login_author,
            $question_id_author,
            $question_date]);

            $successMsg = "Votre article a bien été publié";
        } else {
            $errorMsg = 'Veuillez compléter tous les champs';
        }
    }
?>