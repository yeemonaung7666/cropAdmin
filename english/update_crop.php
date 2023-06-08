<?php
require '../init.php';

if($_GET['id'] and !empty('id')){
    $admin= $_SESSION['admin']->lid;
    $id= $_GET['id'];
    $tbl_name= $_GET['name'];
    $get=getOne("select * from $tbl_name where id=$id");
    $year=$get->year;
    $township=$get->township;

    
    
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
       
    if($_SERVER['REQUEST_METHOD'] =='POST'){
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
      
        
        $update= query("update $tbl_name set lid= $admin, plantingArea= $plant, harvestArea = $harvest, output= $output,
        yield= $yield, unit= '$unit', township = '$township', year = '$year' where id = $id");  
           
        if($update){
          $plant= sum("plantingArea", "$tbl_name", "$year", "$township")->result;
          $harvest = sum("harvestArea", "$tbl_name", "$year", "$township")->result;
          $output = sum("output", "$tbl_name","$year", "$township")->result;
          $yield = sum("yield", "$tbl_name","$year", "$township")->result;
          echo $admin."<br>";
          echo $plant."<br>";
          echo $harvest."<br>";
          echo $output."<br>";
          echo $yield."<br>";
          echo $name."<br>";
          echo $township."<br>";
          echo $year."<br>";
      
        
        query("update crops set lid= $admin, plantingArea= $plant, harvestArea = $harvest, output= $output,
        yield= $yield where name= '$name' and township = '$township' and year = '$year'");
          go("http://localhost:100/cropAdmin/english/see_statistics.php?name=$tbl_name&&update=success");
        }else{
          setMessage("Something Wrong! PLease Try Again.");
        }
        
    }

        
require '../inc/header.php';
}
?>

<!-- insert start -->
<div class="crop_insert_form">

    <div class="row">

    <div class="col-md-1"></div>
    

    <div class="col-md-10">
        <form action="" method="post">
            <table class="table table-hover">
            <thead>
                <tr>
                <td scope="col" colspan="2">

                    <h4><?php echo $get->name;?></h4>
                </td>
                </tr>
            </thead>
            <tbody>
                <tr>
                <td> <label for="">Planting Area</label> </td>
                <td> <input type="number" class="form-control" name="plant" value="<?php echo $get->plantingArea?>" required> </td>
                </tr>

                <tr>
                <td> <label for="">Harvest Area</label> </td>
                <td> <input type="number" class="form-control" name="harvest" value="<?php echo $get->harvestArea?>" required></td>
                </tr>

                <tr>
                <td> <label for="">Production</label> </td>
                <td> <input type="number" class="form-control" name="output" value="<?php echo $get->output?>" required> </td>
                </tr>

                <tr>
                <td>Unit</td>
                <td colspan="3">
                    <select class="col-md-12 " id="" name="unit" required>
                    <option selected><?php echo $get->unit?></option>
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
                    <select class="col-md-12" id="" name="township" required>
                    <option selected><?php echo $get->township?></option>
                    <option value="Hinthada">Hinthada</option>
                    <option value="Zalun">Zalun</option>
                    <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                    </select>
                </td>
                </tr>

                <tr>
                <td>Year</td>
                <td colspan="2">
                    <select class="col-md-12" id="" name="year" required>
                    <option selected><?php echo $get->year?></option>
                    <option value="2020-2021">2020-2021</option>
                    <option value="2021-2022">2021-2022</option>
                    <option value="2022-2023">2022-2023</option>
                    <option value="2023-2024" disabled>2023-2024</option>
                    <option value="2024-2025" disabled>2024-2025</option>
                    </select>
                </td>
                </tr>

                <tr>
                <td></td>
                <td colspan="2"> <button type="submit" class="btn btn-secondary btn-sm col-md-12">Edit</button> </td>
                </tr>
            </tbody>
            </table>
        </form>
    </div>

    <div class="col-md-1"></div>

    </div>
</div>
<!-- insert end -->

<!-- back button -->
  <div class="back_arrow">
    <a href="http://localhost:100/cropAdmin/english/statistics.php" class="btn btn-secondary"><i class= "bi bi-arrow-left"></i>Back</a>
  </div>

<?php

require '../inc/footer.php';
?>
