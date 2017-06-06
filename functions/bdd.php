<?php


function connectDB(){
    
    try
    {
            $bdd = new PDO('mysql:host=localhost;dbname=trainapp;charset=utf8', 'root', 'q1w2e3r4t5y6');
    }
    catch(Exception $e)
    {
            die('Error : '.$e->getMessage());
    }
    
    return $bdd;
    
}