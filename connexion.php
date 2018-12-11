<?php
    try
    {
        $bdd = new PDO('mysql:host=localhost;dbname=blog;charset=utf8','root','urban521');
    }
    catch(Exception $e)
    {
        die('Erreur : '.$e->getMessage());
    }