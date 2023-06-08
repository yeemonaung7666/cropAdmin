<?php
require '../init.php';

if(isset($_GET['name']) and !empty($_GET['name'])){
  
  $name = $_GET['name'];
    
  switch ($name) {
    case $name == 'banana':
      $name_crop="Banana";
      break;
    
    case $name == 'bean':
      $name_crop="Beans";
      break;

    case $name == 'betel_leaves':
      $name_crop="Betel Leaves";
      break;

    case $name == 'betel_nut':
      $name_crop="Betel Nut";
      break;

    case $name == 'cane':
      $name_crop="Cane";
      break;

    case $name == 'chilli':
      $name_crop="Chilli";
      break;

    case $name == 'coconut':
      $name_crop="Coconut";
      break;

    case $name == 'corn':
      $name_crop="Corn";
      break;
    case $name == 'deccam_hemp':
      $name_crop="Deccam Hemp";
      break;

    case $name == 'fruit':
      $name_crop="Fruit Tree";
      break;

    case $name == 'herbal':
      $name_crop="Herbal Plants";
      break;

    case $name == 'non_edible':
      $name_crop="Non_edible Plants";
      break;

    case $name == 'oil_seed':
      $name_crop="Oil Producing Seed";
      break;

    case $name == 'onion':
      $name_crop="Onion";
      break;

    case $name == 'palm':
      $name_crop="Palm Tree";
      break;

    case $name == 'peanut':
      $name_crop="Peanut";
      break;

    case $name == 'rice':
      $name_crop= "Rice";
      break;

    case $name == 'sesame':
      $name_crop="Sesame";
      break;
      
    case $name == 'spice_plant':
      $name_crop="Spice Plants";
      break;

    case $name == 'sunflower_seed':
      $name_crop="Sunflower Seed";
      break;

    case $name == 'sweet_potato':
      $name_crop="Sweet Potato";
      break;

    case $name == 'vegetables':
      $name_crop="Vegetables";
      break;
    
    default:
    $name_crop="Yam";
      break;
  }
  $crop = getAll("select * from $name");
}

if(isset($_GET['delete'])){
  setError("Data Deleted Successfully!");
}

if(isset($_GET['update'])){
  setMessage("Data Updated Successfully!");
}

require '../inc/header.php';
?>
    
    <div class="title">
        <h2><?php echo $name_crop;?></h2>
    </div>

    <!-- list table start-->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover total_crops_table ">
                <thead>
                  <?php 
                  showError();
                  showMessage();
                  ?>
                  <tr>
                    <th scope="col">No</th>
                    <th scope="col">Crops Name</th>
                    <th scope="col">Unit</th>
                    <th scope="col">Planting Area</th>
                    <th scope="col">Harvest Area</th>
                    <th scope="col">Production</th>
                    <th scope="col">Yield Per Acre</th>
                    <th scope="col">Township</th>
                    <th scope="col">Years</th>
                    <th>Options</th>
                    
                  </tr>
                </thead>
                <tbody>
                  <?php
                  $no=1;
                  foreach($crop as $c){
                  ?>
                    <tr>
                    <th scope="row"> <?php echo $no;?> </th>
                    <td><?php echo $c->name;?></td>
                    <td><?php echo $c->unit;?></td>
                    <td><?php echo $c->plantingArea;?></td>
                    <td><?php echo $c->harvestArea;?></td>
                    <td><?php echo $c->output;?></td>
                    <td><?php echo $c->yield;?></td>
                    <td><?php echo $c->township;?></td>
                    <td><?php echo $c->year;?></td>
                    <td>
                      <a href="<?php echo $root_eng?>update_crop.php?id=<?php echo $c->id?>&&name=<?php echo $name?>" class="btn btn-outline-primary" role="button">
                      <i class="bi bi-pencil-square"> Edit</i></a>

                      <a href="<?php echo $root_eng?>delete_crop.php?id=<?php echo $c->id?>&&name=<?php echo $name?>&&year=<?php echo $c->year?>&&township=<?php echo $c->township?>" 
                      class="btn btn-outline-danger" role="button"><i class="bi bi-trash"></i></a>
                  </td> 
                  <?php
                  $no++;
                  }
                  ?>            
                </tbody>
            </table>
        </div>
    </div>
    <!-- list table end -->

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

