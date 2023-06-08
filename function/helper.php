<?php

$_SESSION['errors'] =[];

function setError($message){
    $_SESSION['errors'][] = $message;
}


function showError(){
    $errors = $_SESSION['errors'];
    $_SESSION['errors'] = [];
    if(count($errors)){
        foreach($errors as $e){
        
        echo "
            <div class='alert alert-danger form-control' id='hide_alert' style='text-align: center; font-size: 22px; margin-top: 10px; font-weight:bold;'>".
            $e
            ."<i class='bi bi-x-circle-fill alert_i' id='cross'></i>
            </div></html>";
     }
    }
}

function hasError(){
    $errors = $_SESSION['errors'];
    // $_SESSION['errors'] = [];

    if(count($errors)){
        return true;
    }
    return false;
}


$_SESSION['message']=[];
function setMessage($message){
    $_SESSION['message'][]= $message;

}

function showMessage(){
    $message = $_SESSION['message'];
    $_SESSION['message'] = [];
    if(count($message)){
        foreach($message as $m){
            echo "
            <div class='alert alert-warning form-control' id='hide_alert' style='text-align: center; font-size: 22px; margin-top: 10px; font-weight:bold;'>".
            $m
            ."<i class='bi bi-x-circle-fill alert_i' id='cross'></i>
            </div></html>"; 
            
        }
    }
}

function go($path){
    header("Location:$path");
}

function countDigits($number){
    return (int)log10(abs($number))+1;
}
?>



