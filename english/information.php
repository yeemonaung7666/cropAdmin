<?php
require '../init.php';

$crop_info=getAll("select * from info");

require '../inc/header.php';
?>

<!-- body -->
<div class="row">
    <div class="col-md-1"></div>
    <div class="col-md-10">

    <?php
    foreach($crop_info as $c){
        $id =$c->id;
        $image=$root.'img/'.$c->img;
        
        if($id % 2 ==0){
            echo "<div class='crops_info'>
            <h4>$c->name</h4>
            <div class='holder'>
                <div class='content'>
                    <ul>
                        <li><i>Start Planting Month -></i>$c->plant</li>
                        <li><i>Life Time Of Plant(General)-></i>$c->life</li>
                        <li><i>Plant Harvesting Condition (or) Month-></i>$c->harvest </li>
                        <li><i>Storage Space Or Form-></i> $c->store</li>
                    </ul>
                </div>
                <div class='image_holder'>
                    <img src='$image' alt=''>
                </div>
            </div>
        </div>";
        }else{
            echo "<div class='crops_info'>
            <h4>$c->name</h4>
            <div class='holder'>
                <div class='image_holder'>
                    <img src='$image' alt=''>
                </div>
                <div class='content'>
                    
                    <ul>
                        <li><i>Start Planting Month -></i>$c->plant</li>
                        <li><i>Life Time Of Plant(General)-></i>$c->life</li>
                        <li><i>Plant Harvesting Condition (or) Month-></i>$c->harvest </li>
                        <li><i>Storage Space Or Form-></i> $c->store</li>
                    </ul>
                </div>
            </div>
        </div>";
        }
    }
    ?>
    </div>
    <div class="col-md-1"></div>
</div>
<?php require '../inc/footer.php';?>