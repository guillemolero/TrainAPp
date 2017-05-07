<?php

//funcion que conecta la base de datos
function connectDB(){
    
    $pdo = new PDO('mysql:host=localhost;dbname=trainapp', 'root', '');
    
    return $pdo;
    
}
//guardar los cambios al calendario
function saveCalendar(){
    
}
//guardar los datos del ejercicio
function saveExercise(){
    
}
//borrar ejercicio
function deleteExercise(){
    
}
//cargar historial
function loadHistory(){
    
}
//carga todos los Ejercicios dependiendo de la zona
function loadSelect($zona){
    
    $pdo = connectDB();
    
    $sql = $pdo->prepare("SELECT NOMBRE FROM ejercicios WHERE ZONA = ?");
    $sql->bindParam(1, $zona);
    $sql->execute();
    
    $filas = $sql->fetchAll(PDO::FETCH_COLUMN);
    
    return $filas;
    
}