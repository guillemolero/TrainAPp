<?php


function connectDB(){
    
    try
    {
            $bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', '');
            //$bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', 'q1w2e3r4t5y6');
            //$bdd = new PDO('mysql:host=localhost;dbname=id1903252_trainapp;charset=utf8', 'id1903252_guillemolero', 'guillegmg8');

    }
    catch(Exception $e)
    {
            die('Error : '.$e->getMessage());
    }
    
    return $bdd;
    
}
