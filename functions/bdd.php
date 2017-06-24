<?php


function connectDB(){
    
    try
    {
            $bdd = new PDO('mysql:host=mysql.hostinger.es;dbname=u825469985_train;charset=utf8', 'u825469985_admin', 'trainapp123.');
            //$bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', 'q1w2e3r4t5y6');
            //$bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', '');

    }
    catch(Exception $e)
    {
            die('Error : '.$e->getMessage());
    }
    
    return $bdd;
    
}
