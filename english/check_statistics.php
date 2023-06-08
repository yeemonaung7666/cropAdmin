<?php
require '../init.php';

if(isset($_GET['name']) and isset($_GET['check'])){
    $name = $_GET['name'];
    switch ($name) {
      case $name == 'banana':
        $name="Banana";
        break;
      
      case $name == 'bean':
        $name="Beans";
        break;
  
      case $name == 'betel_leaves':
        $name="Betel Leaves";
        break;
  
      case $name == 'betel_nut':
        $name="Betel Nut";
        break;
  
      case $name == 'cane':
        $name="Cane";
        break;
  
      case $name == 'chilli':
        $name="Chilli";
        break;
  
      case $name == 'coconut':
        $name="coconut";
        break;
  
      case $name == 'corn':
        $name="Corn";
        break;
      case $name == 'deccam_hemp':
        $name="Deccam Hemp";
        break;
  
      case $name == 'fruit':
        $name="Fruit Tree";
        break;
  
      case $name == 'herbal':
        $name="Herbal Plants";
        break;
  
      case $name == 'non_edible':
        $name="Non_edible Plants";
        break;
  
      case $name == 'oil_seed':
        $name="Oil Producing Seeds";
        break;
  
      case $name == 'onion':
        $name="Onion";
        break;
  
      case $name == 'palm':
        $name="Palm Tree";
        break;
  
      case $name == 'peanut':
        $name="Peanut";
        break;
  
      case $name == 'rice':
        $name= "Rice";
        break;
  
      case $name == 'sesame':
        $name="Sesame";
        break;
        
      case $name == 'spice_plant':
        $name="Spice Plants";
        break;
  
      case $name == 'sunflower_seed':
        $name="Sunflower Seeds";
        break;
  
      case $name == 'sweet_potato':
        $name="Sweet Potato";
        break;
  
      case $name == 'vegetables':
        $name="Vegetables";
        break;
      
      default:
        $name="Yam";
        break;
    }
    $crop=getAll("select * from crops where name='$name'");
    // query("select * from crop ORDER by year ASC");
    
}

if(isset($_GET['delete'])){
  setError("Data Deleted Successfully!");
}

require '../inc/header.php';
?>
    
    <div class="title">
        <h2>Total <?php echo $name;?></h2>
    </div>

    <!-- list table start-->
    <div class="row">
        <div class="col-md-12">
            <table class="table table-hover total_crops_table ">
              <?php 
              showError();
              showMessage();
              ?>
                <thead>
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
                    <th scope="col">Option</th>
                    
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
                    <td><a href="<?php echo $root_eng?>delete_statistics.php?id=<?php echo $c->id?>">
                      <i class="bi bi-trash btn btn-danger"></i></a></td>
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