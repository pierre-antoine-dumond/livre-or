<?php
    require 'actions/database.php';

    // Check form is send.
    if(isset($_POST['validate'])) {
        if(!empty($_POST['pseudo']) && !empty($_POST['passwd'])) {
            $user_pseudo = htmlspecialchars($_POST['pseudo']);
            $user_passwd = htmlspecialchars($_POST['passwd']); 

            // Check user exist in db.
            $checkLoginAndPasswdInsideDB = $bdd->prepare('SELECT * FROM utilisateurs WHERE login = ?');
            $checkLoginAndPasswdInsideDB->execute(array($user_pseudo));
            // Make a fetchArray with data inside database to confront enter data of user 
            if($checkLoginAndPasswdInsideDB->rowCount() > 0) {
                $userInfos = $checkLoginAndPasswdInsideDB->fetch();
                (password_verify($user_passwd, $userInfos['password']));
                    // Authentication of user.
                    $_SESSION['auth'] = true;
                    $_SESSION['id'] = $userInfos['id'];
                    $_SESSION['login'] = $userInfos['login'];

                    header('Location: index.php');
            } else {
                    $errorMsg = "Le login ou le mot de passe est incorrect gros pd";
        }} else {
            $errorMsg = "Veuillez remplir tous les champs !";
    }}

    // echo '<pre>';
    // var_dump($checkLoginAndPasswdInsideDB);
    // print_r($checkLoginAndPasswdInsideDB);
    // echo '</pre>';
?>