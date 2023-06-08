<?php
$conn = new PDO("mysql:host=localhost; dbname=croplist", 'root', '');
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


function query($sql, $params = []){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt->execute($params);
    return $stmt;
}

function getAll($sql, $params = []){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt -> execute($params);
    return $stmt->fetchAll(PDO::FETCH_OBJ);
}

function getOne($sql, $params = []){
    global $conn;
    $stmt = $conn->prepare($sql);
    $stmt -> execute($params);
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function sum($column, $name,$year, $township=[]){
    global $conn;
    $sql = "select SUM($column) as result from $name where year= '$year' and township= '$township'";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function sumChart($name, $year){
    global $conn;
    $sql = "select SUM(output) as result from crops where name= '$name' and year= '$year' ";
    $stmt = $conn->prepare($sql);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function total($year){
    global $conn;
    return $total=getOne("select SUM(output) as result from crops where year = '$year'")->result;
    $stmt = $conn->prepare($total);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function cropSum($name,$year){
    global $conn;
    return $sumResult= getOne("select SUM(output) as result from crops where name= '$name' and year= '$year'")->result;
    $stmt = $conn->prepare($sumResult);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
}

function rate($name, $year){
    global $conn;
    $total=getOne("select SUM(output) as result from crops where name = '$name'")->result;
    $cropSum= getOne("select SUM(output) as result from crops where name= '$name' and year= '$year'")->result;
    if($cropSum == 0){
        $rate = 0;
    }else{
        $rate = ($cropSum/$total)*100;
    }
    return $rateCrop = (int)$rate.'%';
    echo $rateCrop. "<br>";
    $stmt = $conn->prepare($total,$cropSum,$rate,$rateCrop);
    $stmt->execute();
    return $stmt->fetch(PDO::FETCH_OBJ);
    
}

// $sesame20 = rate('Vegetables', '2020-2021');
// echo $sesame20."<br>";


?>