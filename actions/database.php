<?php 
    try {
        session_start();
        $bdd = new PDO('mysql:host=localhost;dbname=livreor;','root', 'root');
    } catch(Exception $e) {
        die('Erreur'. $e->getMessage());
    }
?>