<?php 
require '../init.php';

$totalPlant=getOne("select SUM(plantingArea) as result from crops where year='2021-2022'")->result;
$totalHarvest=getOne("select SUM(harvestArea) as result from crops where year='2021-2022'")->result;

if($totalPlant==0){
  $totalPlant="******";
}else{
  $totalPlant;
}

if($totalHarvest==0){
  $totalHarvest="******";
}else{
  $totalHarvest;
}

$crops = getAll("select * from crops where year='2021-2022'");

require '../inc/header.php';
?>

    <!-- list intro start-->
    <div class="list_intro">
      <p>A List of Crops In Hinthada District</p>
    </div>
    <!-- list intro end -->
    
    <!-- total list start -->
    <div class="list_text">
        <div class="row">
          <div class="col-md-2"></div>
            <div class="col-md-4 each_list">
                <h3>Planting Area - <span> <?php echo $totalPlant;?> Acres</span></h3>
            </div>
            <div class="col-md-4 each_list">
                <h3>Harvest Area - <span > <?php echo $totalHarvest;?> Acres</span></h3>
            </div>
            <div class="col-md-2"></div>
        </div>
    </div>
    <!-- total list end -->

    <!-- list btn start -->
    <div class="list_btn">
        <div class="row">
            <div class="col-md-4 each_list_btn">
              <?php
              if($url=="http://localhost:100/cropAdmin/english/list20.php"){
                echo "<a href='http://localhost:100/cropAdmin/english/list20.php'><button class='each_list_btn_active'>April,2020 - March,2021</button></a>";
              }else{
                echo "<a href='http://localhost:100/cropAdmin/english/list20.php'><button>April,2020 - March,2021</button></a>";
              }
              ?>
                
            </div>

            <div class="col-md-4 each_list_btn">
            <?php
              if($url=="http://localhost:100/cropAdmin/english/list.php"){
                echo "<a href='http://localhost:100/cropAdmin/english/list.php'><button class='each_list_btn_active'>April,2021 - March,2022</button></a>";
              }else{
                echo "<a href='http://localhost:100/cropAdmin/english/list.php'><button>April,2021 - March,2022</button></a>";
              }
              ?>
            </div>

            <div class="col-md-4 each_list_btn">
            <?php
              if($url=="http://localhost:100/cropAdmin/english/list22.php"){
                echo "<a href='http://localhost:100/cropAdmin/english/list22.php'><button class='each_list_btn_active'>April,2022 - March,2023</button></a>";
              }else{
                echo "<a href='http://localhost:100/cropAdmin/english/list22.php'><button>April,2022 - March,2023</button></a>";
              }
              ?>
            </div>
        </div>
    </div>
    <!-- list btn end -->

    <!-- list table start-->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover total_crops_table ">
                <thead>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Crops Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Planting Area</th>
                    <th scope="col">Harvest Area</th>
                    <th scope="col">Production</th>
                    <th scope="col">Yield Per Acres</th>
                    <th scope="col">Township</th>
                    <th scope="col">Years</th>
                    
                  </tr>
                </thead>
                <tbody>
                
                <?php
                  $number=1;
                  foreach($crops as $c){
                    
                ?>
                  <tr>
                    <th scope="row"> <?php echo $number;?> </th>
                    <td><?php echo $c->name;?></td>
                    <td><?php echo $c->unit;?></td>
                    <td ><?php echo $c->plantingArea;?></td>
                    <td ><?php echo $c->harvestArea;?></td>
                    <td ><?php echo $c->output;?></td>
                    <td ><?php echo $c->yield;?></td>
                    <td><?php echo $c->township;?></td>
                    <td><?php echo $c->year;?></td>    
                  </tr>
                <?php
                    $number++;
                  }
                 
                ?>
                
                </tbody>
            </table>
        </div>
    </div>
    <!-- list table end -->


<?php require '../inc/footer.php';?>