<?php
require '../init.php';
if($_SERVER["REQUEST_METHOD"]=="POST"){
    $admin = $_SESSION['admin']->lid;

    echo $admin;
    $plant = $_REQUEST['plant'];
    $harvest = $_REQUEST['harvest'];
    $output = $_REQUEST['output'];
    if($plant==0 OR $harvest ==0 OR $output == 0){
      $yield=0;
    }else{
      $yield = round($output / $harvest, 2);
    }
    
    $unit = $_REQUEST['unit'];
    $township = $_REQUEST['township'];

    $lastYear = date("Y", strtotime("-1 Year"));
    $thisYear = date("Y");
    $realYear= $lastYear."-".$thisYear;

    $year = $_REQUEST['year'];
    if($realYear <= $year){
        $year= $realYear;
    }else{
        $year= $year;
    }

    if(isset($_GET['name'])){
    
      $name= $_GET['name'];
      
      switch ($name) {
        case $name == 'Banana':
          $tbl_name="banana";
          $crop_name="Banana";
          $cid= '1';
          break;
    
        case $name == 'Betel Leaves':
          $tbl_name="betel_leaves";
          $crop_name="Betel Leaves";
          $cid= '2';
          break;
    
        case $name == 'Betel Nut':
          $tbl_name="betel_nut";
          $crop_name="Betel Nut";
          $cid= '3';
          break;
    
        case $name == 'Cane':
          $tbl_name="cane";
          $crop_name="Cane";
          $cid= '4';
          break;
    
        case $name == 'Wet Chilli' OR $name== 'Dry Chilli':
          $tbl_name="chilli";
          $crop_name="Chilli";
          $cid= '5';
          break;
    
        case $name == 'Coconut':
          $tbl_name="coconut";
          $crop_name="Coconut";
          $cid= '6';
          break;
    
        case $name == 'Out Of Seed Corn' OR $name =='Maize':
          $tbl_name="corn";
          $crop_name="Corn";
          $cid= '7';
          break;
    
        case $name == 'Deccam Hemp':
          $tbl_name="deccam_hemp";
          $crop_name="Deccam Hemp";
          $cid= '8';
          break;
    
        case $name == 'Herbal Plants':
          $tbl_name="herbal";
          $crop_name="Herbal Plants";
          $cid= '9';
          break;
    
        case $name == 'Thatch' OR $name == 'Flowers' OR $name == 'Other Plants':
          $tbl_name="non_edible";
          $crop_name="Non_edible Plants";
          $cid= '10';
          break;
    
        case $name == 'Canola' OR $name =='Oil Radish':
          $tbl_name="oil_seed";
          $crop_name="Oil Producing Seeds";
          $cid= '11';
          break;
    
        case $name == 'Onion':
          $tbl_name="onion";
          $crop_name="Onion";
          $cid= '12';
          break;
    
        case $name == 'Palm':
          $tbl_name="palm";
          $crop_name="Palm";
          $cid= '13';
          break;
    
        case $name == 'Peanut':
          $tbl_name="peanut";
          $crop_name="Peanut";
          $cid= '14';
          break;
    
        case $name == 'Rice (Summer)' OR $name == 'Rice (Rainy)':
          $tbl_name="rice";
          $crop_name="Rice";
          $cid= '15';
          break;
    
        case $name == 'Sesame':
          $tbl_name="sesame";
          $crop_name="Sesame";
          $cid= '16';
          break;
          
        case $name == 'Turmeric' OR $name =='Ginger' OR $name =='Peppers':
          $tbl_name="spice_plant";
          $crop_name="Spice Plants";
          $cid= '17';
          break;
    
        case $name == 'Sunflower Seeds':
          $tbl_name="sunflower_seed";
          $crop_name="Sunflower Seeds";
          $cid= '18';
          break;
    
        case $name == 'Sweet Potato':
          $tbl_name="sweet_potato";
          $crop_name="Sweet Potato";
          $cid= '19';
        break;
    
        case $name == 'Cabbage' OR $name=='Cauliflower' OR $name=='Lettuce' OR $name=='Mustard Leaves' OR $name=='Tomato' OR $name=='White Radish'  OR $name=='Gourd' OR $name=='Asparagus' OR $name=='Other Vegetables':
          $tbl_name="vegetables";
          $crop_name="Vegetables";
          $cid= '20';
          break;
    
        case $name == 'Black Bean' OR $name=='Green Gram' OR $name=='Lima Bean' OR $name=='Cowpea' OR $name=='Soy Bean' OR $name=='Chickpea' OR $name=='Pigeon Pea' OR $name=='Lablab Bean' OR $name=='Vatana Bean' OR $name=='Mung Bean':
          $tbl_name="bean";
          $crop_name="Beans";
          $cid= '21';
          break;
    
        case $name == 'Mango' OR $name=='Lemon And Lime' OR $name=='Pomelo And Mandarin' OR $name=='Orange' OR $name=='Pineapple' OR $name=='Custard Apple' OR $name=='Cashew Nut' OR $name=='Plum' OR $name=='Tamarind' OR $name=='Watermelon' OR $name=='Other Fruits' :
          $tbl_name="fruit";
          $crop_name="Fruits";
          $cid= '22';
          break;
    
        case $name == 'Yam':
          $tbl_name="yam";
          $crop_name="Yam";
          $cid= '23';
          break;
      }

      $query= query("insert into $tbl_name (lid, cid, name, plantingArea, harvestArea, output, yield, unit, township,  year) values 
      ( ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)", 
     [$admin, $cid, $name, $plant, $harvest, $output, $yield, $unit, $township, $year]);
      //print_r($query);
      if($query){
        go("http://localhost:100/cropAdmin/english/insert_statistics.php?name=$name&&create=success");
        //setMessage("Entering Statistics is Successfull !");
      }else{
        setError("Something Wrong. Please Try Again!");
      }
    }
    
}
if(isset($_GET['create'])){
  setMessage("Successfully Entering Statistics!");
}  
 




require '../inc/header.php';
?>

<!-- insert start -->
<div class="crop_insert_form">

    <div class="row">

    <div class="col-md-1"></div>
    

    <div class="col-md-10">
    <?php 
      showMessage();
      
      
    ?>
        <form action="" method="post">
            <table class="table table-hover">
              
            <thead>
                <tr>
                <td scope="col" colspan="2">

                    <h4><?php echo $_GET['name'];?></h4>
                </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td> <label for="">Planting Area</label> </td>
                <td> <input type="number" class="form-control" placeholder="Enter the planting area" name="plant" required> </td>
                </tr>

                <tr>
                <td> <label for="">Harvest Area</label> </td>
                <td> <input type="number" class="form-control" placeholder="Enter the harvest area" name="harvest" required> </td>
                </tr>

                <tr>
                <td> <label for="">Production</label> </td>
                <td> <input type="number" class="form-control" placeholder="Enter the production of plants" name="output" required> </td>
                </tr>

                <tr>
                <td>Unit</td>
                <td colspan="3">
                    <select class="col-md-12 "  name="unit" required>
                    <option selected>Choose...</option>
                    <option value="Tin">Tin</option>
                    <option value="Seed Weight">Seed Weight</option>
                    <option value="Vizz">Vizz</option>
                    <option value="Ton">Ton</option>
                    <option value="Kilograms">Kilograms</option>
                    </select>
                </td>
                </tr>

                <tr>
                <td>Township</td>
                <td colspan="2">
                    <select class="col-md-12"  name="township" required>
                    <option selected>Choose..</option>
                    <option value="Hinthada">Hinthada</option>
                    <option value="Zalun">Zalun</option>
                    <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                    </select>
                </td>
                </tr>

                <tr>
                <td>Year</td>
                <td colspan="2">
                    <select class="col-md-12"  name="year" required>
                    <option selected>Choose..</option>
                    <option value="2020-2021">2020-2021</option>
                    <option value="2021-2022">2021-2022</option>
                    <option value="2022-2023">2022-2023</option>
                    <option value="2023-2024"  disabled>2023-2024</option>
                    <option value="2024-2025" disabled>2024-2025</option>
                    </select>
                </td>
                </tr>

                <tr>
                <td></td>
                <td colspan="2"> <button type="submit" class="btn btn-secondary btn-sm col-md-12">INSERT</button> </td>
                </tr>
            </tbody>
            </table>
        </form>
    </div>
  </div>
    <div class="col-md-1"></div>
</div>
<!-- insert end -->

<!-- back button -->
      <div class="back_arrow">
        <a href="http://localhost:100/cropAdmin/english/statistics.php" class="btn btn-secondary"><i class= "bi bi-arrow-left"></i>Back</a>
      </div>
      

<?php
require '../inc/footer.php';
?>

<script>
  var cross= document.querySelector("#cross");
  var hide_alert= document.querySelector("#hide_alert");
  cross.addEventListener('click', function(){
    hide_alert.remove();
  });
</script>