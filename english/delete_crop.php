<?php
require '../init.php';

if($_GET['id'] and !empty('id')){
    $id= $_GET['id'];
    $tbl_name= $_GET['name'];
    $admin= $_SESSION['admin']->lid;
    $township= $_GET['township'];
    $year= $_GET['year'];
    switch ($tbl_name) {
        case $tbl_name == 'banana':
          $name="Banana";
          break;
        
        case $tbl_name == 'bean':
          $name="Beans";
          break;
    
        case $tbl_name == 'betel_leaves':
          $name="Betel Leaves";
          break;
    
        case $tbl_name == 'betel_nut':
          $name="Betel Nut";
          break;
    
        case $tbl_name == 'cane':
          $name="Cane";
          break;
    
        case $tbl_name == 'chilli':
          $name="Chilli";
          break;
    
        case $tbl_name == 'coconut':
          $name="coconut";
          break;
    
        case $tbl_name == 'corn':
          $name="Corn";
          break;
        case $tbl_name == 'deccam_hemp':
          $name="Deccam Hemp";
          break;
    
        case $tbl_name == 'fruit':
          $name="Fruit Tree";
          break;
    
        case $tbl_name == 'herbal':
          $name="Herbal Plants";
          break;
    
        case $tbl_name == 'non_edible':
          $name="Non_edible Plants";
          break;
    
        case $tbl_name == 'oil_seed':
          $name="Oil Producing Seed";
          break;
    
        case $tbl_name == 'onion':
          $name="Onion";
          break;
    
        case $tbl_name == 'palm':
          $name="Palm Tree";
          break;
    
        case $tbl_name == 'peanut':
          $name="Peanut";
          break;
    
        case $tbl_name == 'rice':
          $name= "Rice";
          break;
    
        case $tbl_name == 'sesame':
          $name="Sesame";
          break;
          
        case $tbl_name == 'spice_plant':
          $name="Spice Plants";
          break;
    
        case $tbl_name == 'sunflower_seed':
          $name="Sunflower Seeds";
          break;
    
        case $tbl_name == 'sweet_potato':
          $name="Sweet Potato";
          break;
    
        case $tbl_name == 'vegetables':
          $name="Vegetables";
          break;
        
        default:
          $name="Yam";
          break;
      }
       
    $delete = query("delete from $tbl_name where id=$id");
    if($delete){      
      $plant= sum("plantingArea", "$tbl_name", "$year", "$township")->result;
      $harvest = sum("harvestArea","$tbl_name", "$year", "$township")->result;
      $output = sum("output", "$tbl_name", "$year", "$township")->result;
      $yield = sum("yield", "$tbl_name", "$year", "$township")->result; 

      if($township =="Choose.." OR $unit == "Choose..." OR $year =="Choose.."){
        go("http://localhost:100/cropAdmin/english/see_statistics.php?name=$tbl_name&&delete=success");
      }else{
        query("update crops set lid= $admin, plantingArea= $plant, harvestArea = $harvest, output= $output,
        yield= $yield where name= '$name' and township = '$township' and year = '$year'");  
        go("http://localhost:100/cropAdmin/english/see_statistics.php?name=$tbl_name&&delete=success");
      }
    }
}

?>