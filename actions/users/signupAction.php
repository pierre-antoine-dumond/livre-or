<?php
    require 'actions/database.php';

    // Check form is send.
    if(isset($_POST['validate'])) {
        // Check info is correct.
        if(!empty($_POST['pseudo']) && !empty($_POST['passwd'] 
            && !empty($_POST['confpasswd']))) {
                // Protection faille XSS, hash wordpass and check data similarity.
                 $user_pseudo = htmlspecialchars($_POST['pseudo']);
                    if($_POST['passwd'] == $_POST['confpasswd']) {
                        $user_passwd = password_hash($_POST['passwd'], PASSWORD_ARGON2I);
                        $user_passwd_check = true; 
                    } else {
                        $errorMsg = "Veuillez saisir un mot de passe identique !";
                        $user_passwd_check = false; 
                    }
                // Check user exit inside database.
                $checkUsersAlreadyExist = $bdd->prepare('SELECT login FROM utilisateurs WHERE login = ?');
                $checkUsersAlreadyExist->execute(array($user_pseudo));
                    // All check is fine, send data in database.
                    if($checkUsersAlreadyExist->rowCount() == 0 && $user_passwd_check == true) {
                        $insertUserOnWebsite = $bdd->prepare('INSERT INTO utilisateurs(`login`, `password`) VALUES(?,?)');
                        $insertUserOnWebsite->execute(array($user_pseudo, $user_passwd));
                        
                        // Preparation at authentification
                        $getInfoOfUserQuery = $bdd->prepare('SELECT id, `login` FROM utilisateurs WHERE `login = ?`');
                        $getInfoOfUserQuery->execute(array($user_pseudo));
                        $userInfos = $getInfoOfUserQuery->fetch();
                        
                        $_SESSION['auth'] = true;
                        $_SESSION['id'] = $userInfos['id'];
                        $_SESSION['login'] = $userInfos['login'];
                        // Redirection at index.php
                        header('Location: index.php');
                    } else {
                        $errorMsg = "Le login est déjà prit";
                    }
        } else {
            $errorMsg = "Veuillez remplir tous les champs !";
        }
    }
?>