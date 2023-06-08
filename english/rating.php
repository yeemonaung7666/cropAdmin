<?php 
require '../init.php';

$rice20=rate('Rice','2020-2021');
$rice21=rate('Rice', '2021-2022');

$corn20 = rate('Corn', '2020-2021');
$corn21 = rate('Corn', '2021-2022');

$peanut20 = rate('Peanut', '2020-2021');
$peanut21 = rate('Peanut', '2021-2022');

$sesame20 = rate('Sesame', '2020-2021');
$sesame21 = rate('Sesame', '2021-2022');

$sunflower_seed20 = rate('Sunflower Seeds', '2020-2021');
$sunflower_seed21 = rate('Sunflower Seeds', '2021-2022');

$oil_seeds20 = rate('Oil Producing Seeds', '2020-2021');
$oil_seeds21 = rate('Oil Producing Seeds', '2021-2022');


$deccam_hemp20 = rate('Deccam Hemp', '2020-2021');
$deccam_hemp21 = rate('Deccam Hemp', '2021-2022');

$bean20 = rate('Beans', '2020-2021');
$bean21 = rate('Beans', '2021-2022');

$onion20 = rate('Onion', '2020-2021');
$onion21 = rate('Onion', '2021-2022');

$chilli20 = rate('Chilli', '2020-2021');
$chilli21 = rate('Chilli', '2021-2022');

$spice_plant20 = rate('Spice Plants', '2020-2021');
$spice_plant21 = rate('Spice Plants','2021-2022');

$cane20 = rate('Cane', '2020-2021');
$cane21 = rate('Cane', '2021-2022');

$betel_leaves20 = rate('Betel Leaves', '2020-2021');
$betel_leaves21 = rate('Betel Leaves', '2021-2022');

$herbal20 = rate('Herbal Plants', '2020-2021');
$herbal21 = rate('Herbal Plants', '2021-2022');

$yam20 = rate('Yam', '2020-2021');
$yam21 = rate('Yam', '2021-2022');

$sweet_potato20 = rate('Sweet Potato', '2020-2021');
$sweet_potato21 = rate('Sweet Potato', '2021-2022');

$vegetables20 = rate('Vegetables', '2020-2021');
$vegetables21 = rate('Vegetables', '2021-2022');

$banana20 = rate('Banana', '2020-2021');
$banana21 = rate('Banana', '2021-2022');

$coconut20 = rate('Coconut', '2020-2021');
$coconut21 = rate('Coconut', '2021-2022');

$palm20 = rate('Palm Tree', '2020-2021');
$palm21 = rate('Palm Tree', '2021-2022');

$betel_nut20 = rate('Betel Nut', '2020-2021');
$betel_nut21 = rate('Betel Nut', '2021-2022');

$fruit20 = rate('Fruit Tree', '2020-2021');
$fruit21 = rate('Fruit Tree', '2021-2022');

$non_edible20 = rate('Non_edible Plants', '2020-2021');
$non_edible21 = rate('Non_edible Plants', '2021-2022');
require '../inc/header.php';
?>

<!-- progress bar -->

<div class="row progress_container">
    <div class="col-md-1"></div>
    <div class="col-md-10">
      <h4>Yearly Production of Crops in Hinthada District</h4>
    </div>
    <div class="col-md-1"></div>

    <div class="progress_bg">
        <!-- Rice -->
        <div>
            <div class="row ">
            <div class="col-md-4">
                <h6 class="pro_crop">Rice</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width:<?php echo $rice20;?>"><?php echo $rice20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width:<?php echo $rice21;?>"><?php echo $rice21;?></div>
            </div>
            
            </div>
            </div> 
        </div>
        <hr>
        <!-- Corn -->
        
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Corn</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $corn20;?>"><?php echo $corn20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $corn21;?>"><?php echo $corn21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Peanut -->
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Peanut</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $peanut20;?>" ><?php echo $peanut20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $peanut21;?>" ><?php echo $peanut21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Sesame -->
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Sesame</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $sesame20;?>" ><?php echo $sesame20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $sesame21;?>" ><?php echo $sesame21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Sunflower_seed -->
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Sunflower Seed</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $sunflower_seed20;?>" ><?php echo $sunflower_seed20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $sunflower_seed21;?>" ><?php echo $sunflower_seed21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Total Oil Producing Seed -->
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Total Oil Producing Seed</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $oil_seeds20;?>" ><?php echo $oil_seeds20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $oil_seeds21;?>" ><?php echo $oil_seeds21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- deccam hemp -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Deccam Hemp</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $deccam_hemp20;?>" ><?php echo $deccam_hemp20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $deccam_hemp21;?>" ><?php echo $deccam_hemp21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- bean -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Beans</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $bean20;?>" ><?php echo $bean20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width:<?php echo $bean21;?>" ><?php echo $bean21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Onion -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Onion</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $onion20;?>" ><?php echo $onion20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $onion21;?>" ><?php echo $onion21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Chilli -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Chilli</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $chilli20;?>" ><?php echo $chilli20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $chilli21;?>" ><?php echo $chilli21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Total Spice Plant -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Total Spice Plants</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $spice_plant20;?>" ><?php echo $spice_plant20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $spice_plant21;?>" ><?php echo $spice_plant21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Cane -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Cane</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $cane20;?>" ><?php echo $cane20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $cane21;?>" ><?php echo $cane21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Betel Leaves -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Betel Leaves</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $betel_leaves20;?>" ><?php echo $betel_leaves20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $betel_leaves21;?>" ><?php echo $betel_leaves21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!--   herbal plants -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Herbal Plants</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $herbal20;?>" ><?php echo $herbal20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $herbal21;?>" ><?php echo $herbal21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- yam -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Yam</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $yam20;?>" ><?php echo $yam20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $yam21;?>" ><?php echo $yam21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- sweet potato -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Sweet Potato</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $sweet_potato20;?>" ><?php echo $sweet_potato20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $sweet_potato21;?>" ><?php echo $sweet_potato21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Total Vegetables -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Vegetables</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $vegetables20?>" ><?php echo $vegetables20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $vegetables21;?>" ><?php echo $vegetables21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Banana -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Banana</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $banana20;?>" ><?php echo $banana20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $banana21;?>"><?php echo $banana21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Coconut -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Coconut</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $coconut20;?>" ><?php echo $coconut20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $coconut21;?>" ><?php echo $coconut21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Palm Tree -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Palm Tree</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $palm20;?>" ><?php echo $palm20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $palm21;?>" ><?php echo $palm21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Betel Nut -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Betel Nut</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $betel_nut20;?>" ><?php echo $betel_nut20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $betel_nut21;?>" ><?php echo $betel_nut21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Total Fruit Tree -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Total Fruit Tree</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $fruit20;?>" ><?php echo $fruit20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $fruit21;?>" ><?php echo $fruit21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
        <!-- Non-edible Plants -->
    
        <div>
            <div class="row">
            <div class="col-md-4">
                <h6 class="pro_crop">Non-edible Plants</h6>
            </div>
            <div class="col-md-7">
            <p class="pro_year">2020-2021</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-danger" role="progressbar" style="width: <?php echo $non_edible20;?>" ><?php echo $non_edible20;?></div>
            </div>
            
            <p class="pro_year">2021-2022</p>
            <div class="progress">
                <div class="progress-bar progress-bar-striped bg-dark" role="progressbar" style="width: <?php echo $non_edible21;?>" ><?php echo $non_edible21;?></div>
            </div>
            
            </div>
            </div>
        </div>
        <hr>
    </div>
</div>


<?php require '../inc/footer.php';?>