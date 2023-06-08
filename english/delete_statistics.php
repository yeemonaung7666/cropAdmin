<?php
require '../init.php';

if($_GET['id'] and !empty('id')){
    $id= $_GET['id'];
    $get=getOne("select * from crops where id=$id");
    $name= $get->name;
    switch ($name) {
        case $name == 'Banana':
          $tbl_name="banana";
          break;
    
        case $name == 'Betel Leaves':
          $tbl_name="betel_leaves";
          break;
    
        case $name == 'Betel Nut':
          $tbl_name="betel_nut";
          break;
    
        case $name == 'Cane':
          $tbl_name="cane";
          break;
    
        case $name == 'Chilli':
          $tbl_name="chilli";
          break;
    
        case $name == 'Coconut':
          $tbl_name="coconut";
          break;
    
        case $name == 'Corn':
          $tbl_name="corn";
          break;
    
        case $name == 'Deccam Hemp':
          $tbl_name="deccam_hemp";
          break;
    
        case $name == 'Herbal Plants':
          $tbl_name="herbal";
          break;
    
        case $name == 'Non_edible Plants':
          $tbl_name="non_edible";
          break;
    
        case $name == 'Oil Producing Seeds':
          $tbl_name="oil_seed";
          break;
    
        case $name == 'Onion':
          $tbl_name="onion";
          break;
    
        case $name == 'Palm Tree':
          $tbl_name="palm";
          break;
    
        case $name == 'Peanut':
          $tbl_name="peanut";
          break;
    
        case $name == 'Rice':
          $tbl_name="rice";
          break;
    
        case $name == 'Sesame':
          $tbl_name="sesame";
          break;
          
        case $name == 'Spice Plants':
          $tbl_name="spice_plant";
          break;
    
        case $name == 'Sunflower Seeds':
          $tbl_name="sunflower_seed";
          break;
    
        case $name == 'Sweet Potato':
          $tbl_name="sweet_potato";
        break;
    
        case $name == 'Vegetables':
          $tbl_name="vegetables";
          break;
    
        case $name == 'Beans':
          $tbl_name="bean";
          break;
    
        case $name == 'Fruit Tree' :
          $tbl_name="fruit";
          break;
    
        case $name == 'Yam':
          $tbl_name="yam";
          break;
    }
    
    $delete = query("delete from crops where id=$id");
    if($delete){
        go("http://localhost:100/cropAdmin/english/check_statistics.php?name=$tbl_name&&check=success&&delete=success");
    }
}

?>