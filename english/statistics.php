<?php
require '../init.php';

if($_SERVER['REQUEST_METHOD'] =='POST'){
    
    $admin=$_SESSION['admin']->lid;
    $crop = $_REQUEST['crop'];
    
    if(isset($crop) and !empty($crop)){
        $crop = $_REQUEST['crop'];
        go("http://localhost:100/cropAdmin/english/insert_statistics.php?name=$crop");
    }

    $tbl_name= $_REQUEST['table_name'];
    $township= $_REQUEST['township'];
    $year = $_REQUEST['year'];
    switch ($tbl_name) {
        case $tbl_name == 'banana':
          $crop_name="Banana";
          $cid= '1';
          break;
    
        case $tbl_name == 'betel_leaves':
          $crop_name="Betel Leaves";
          $cid= '2';
          break;
    
        case $tbl_name == 'betel_nut':
          $crop_name="Betel Nut";
          $cid= '3';
          break;
    
        case $tbl_name == 'cane':
          $crop_name="Cane";
          $cid= '4';
          break;
    
        case $tbl_name == 'chilli' :
          $crop_name="Chilli";
          $cid= '5';
          break;
    
        case $tbl_name == 'coconut':
          $crop_name="Coconut";
          $cid= '6';
          break;
    
        case $tbl_name == 'corn' :
          $crop_name="Corn";
          $cid= '7';
          break;
    
        case $tbl_name == 'deccam_hemp':
          $crop_name="Deccam Hemp";
          $cid= '8';
          break;
    
        case $tbl_name == 'herbal':
          $crop_name="Herbal Plants";
          $cid= '9';
          break;
    
        case $tbl_name == 'non_edible':
          $crop_name="Non_edible Plants";
          $cid= '10';
          break;
    
        case $tbl_name == 'oil_seed':
          $crop_name="Oil Producing Seeds";
          $cid= '11';
          break;
    
        case $tbl_name == 'onion':
          $crop_name="Onion";
          $cid= '12';
          break;
    
        case $tbl_name == 'palm':
          $crop_name="Palm Tree";
          $cid= '13';
          break;
    
        case $tbl_name == 'peanut':
          $crop_name="Peanut";
          $cid= '14';
          break;
    
        case $tbl_name == 'rice':
          $crop_name="Rice";
          $cid= '15';
          break;
    
        case $tbl_name == 'sesame':
          $crop_name="Sesame";
          $cid= '16';
          break;
          
        case $tbl_name == 'spice_plant':
          $crop_name="Spice Plants";
          $cid= '17';
          break;
    
        case $tbl_name == 'sunflower_seed':
          $crop_name="Sunflower Seeds";
          $cid= '18';
          break;
    
        case $tbl_name == 'sweet_potato':
          $crop_name="Sweet Potato";
          $cid= '19';
        break;
    
        case $tbl_name == 'vegetables' :
          $crop_name="Vegetables";
          $cid= '20';
          break;
    
        case $tbl_name == 'bean' :
          $crop_name="Beans";
          $cid= '21';
          break;
    
        case $tbl_name == 'fruit':
          $crop_name="Fruit Tree";
          $cid= '22';
          break;
    
        case $tbl_name == 'yam':
          $crop_name="Yam";
          $cid= '23';
          break;
    }
    if(isset($tbl_name) and isset($township) and isset($year)and isset($crop)){

        $plant= sum("plantingArea", "$tbl_name", "$year", "$township")->result;
        $harvest = sum("harvestArea", "$tbl_name", "$year", "$township")->result;
        $output = sum("output", "$tbl_name", "$year", "$township")->result;
        $yield = sum("yield", "$tbl_name", "$year", "$township")->result;

        if($plant== 0 OR $harvest== 0 OR $output == 0 OR $yield == 0){
            setError("There Is No Statistics, Please Insert Statistics For The First");
        }else{
            $unit= getOne("select unit from $tbl_name")->unit;
            $query= query("insert into crops (cid,lid, name, plantingArea, harvestArea, output, yield, unit, township,  year) values 
            ( ?, ?, ?, ?, ?, ?, ?, ?, ? ,?)", 
            [$cid, $admin,$crop_name, $plant, $harvest, $output, $yield, $unit, $township, $year]);
        
            if($query){
            go('http://localhost:100/cropAdmin/english/statistics.php?calculate=success');
            
            }
        }
        
    }  
}


if(isset($_GET['create'])){
    setMessage("Successfully Entering Statistics!");
}

if(isset($_GET['update'])){
    setMessage("Successfully Updated Statistics!");
}

if(isset($_GET['delete'])){
    setMessage("Successfully Deleted Statistics!");
}

if(isset($_GET['calculate'])){
  setMessage("Statistics Calculation Completed Successfully!");
}



require '../inc/header.php';
?>

<!-- statistcs start-->
    <table class="table table-hover stat_tbl">
        <?php 
        showError();
        showMessage();
        
        ?>
        
        <!-- Rice -->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_rice.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Rice</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Rice (Summer)">Rice (Summer)</option>
                                        <option value="Rice (Rainy)">Rice (Rainy)</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=rice" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="rice" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=rice&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Corn -->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_corn.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Corn</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Out Of Seed Corn">Out Of Seed Corn</option>
                                        <option value="Maize">Maize</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=corn" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="corn" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=corn&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Vegetables-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_vegetables.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Vegetables</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Cabbage">Cabbage</option>
                                        <option value="Cauliflower">Cauliflower</option>
                                        <option value="Lettuce">Lettuce</option>
                                        <option value="Mustard Leaves">Mustard Leaves</option>
                                        <option value="Tomato">Tomato</option>
                                        <option value="White Radish">White Radish</option>
                                        <option value="Gourd">Gourd</option>
                                        <option value="Asparagus">Asparagus</option>
                                        <option value="Other Vegetables">Other Vegetables</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=vegetables" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="vegetables" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=vegetables&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Peanut-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_peanut.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Peanut</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Peanut">Peanut</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=peanut" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="peanut" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=peanut&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Sesame-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_sesame.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Sesame</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Sesame">Sesame</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=sesame" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="sesame" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=sesame&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Sunflower Seeds-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_sunflower.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Sunflower Seeds</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Sunflower Seeds">Sunflower Seeds</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=sunflower_seed" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="sunflower_seed" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=sunflower_seed&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

         <!-- beans-->
         <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_totalBeans.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Beans</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Black Bean">Black Bean</option>
                                        <option value="Green Gram">Green Gram</option>
                                        <option value="Lima Bean">Lima Bean</option>
                                        <option value="Cowpea">Cowpea</option>
                                        <option value="Soy Bean">Soy Bean</option>
                                        <option value="Chickpea">Chickpea</option>
                                        <option value="Pigeon Pea">Pigeon Pea</option>
                                        <option value="Lablab Bean">Lablab Bean</option>
                                        <option value="Vatana Bean">Vatana Bean</option>
                                        <option value="Mung Bean">Mung Bean</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=bean" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="bean" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=bean&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Oil Producing Seeds-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_oil.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Oil Producing Seeds</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Canola">Canola</option>
                                        <option value="Oil Radish">Oil Radish</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=oil_seed" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="oil_seed" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=oil_seed&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Deccam Hemp-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_deccamHemp.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Deccam Hemp</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Deccam Hemp">Deccam Hemp</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=deccam_hemp" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="deccam_hemp" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=deccam_hemp&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Onion-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_onion.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Onion</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Onion">Onion</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=onion" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="onion" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=onion&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Chilli-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_chilli.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Chilli</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Wet Chilli">Wet Chilli</option>
                                        <option value="Dry Chilli">Dry Chilli</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=chilli" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="chilli" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=chilli&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Spice Plants-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_spice_plant.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Spice Plants</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Turmeric">Turmeric</option>
                                        <option value="Ginger">Ginger</option>
                                        <option value="Peppers">Peppers</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=spice_plant" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="spice_plant" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=spice_plant&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Cane-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_cane.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Cane</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Cane">Cane</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=cane" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="cane" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=cane&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Betel_leaves-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_betel_leaves.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Betel Leaves</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Betel Leaves">Betel Leaves</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=betel_leaves" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="betel_leaves" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=betel_leaves&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr> 

        <!-- herbal plants-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_herbal.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Herbal Plants</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Herbal Plants">Herbal Plants</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=herbal" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="herbal" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=herbal&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr> 
        
        <!-- Yam-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_yam.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Yam</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Yam">Yam</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=yam" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" disabled>2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="yam" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=yam&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>
        
        <!-- Sweet Potato-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_sweet_potato.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Sweet Potato</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Sweet Potato">Sweet Potato</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=sweet_potato" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="sweet_potato" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=sweet_potato&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Banana-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_banana.png" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Banana</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Banana">Banana</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=banana" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="banana" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=banana&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Coconut-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_coconut.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Coconut</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Coconut">Coconut</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=coconut" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="coconut" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=coconut&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Palm-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_palm.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Palm Tree</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Palm">Palm</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=palm" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="palm" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=palm&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Betel Nut-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_betel_nut.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Betel Nut</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Betel Nut">Betel Nut</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=betel_nut" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="betel_nut" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=betel_nut&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- Fruits-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_fruit.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Fruits</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Mango">Mango</option>
                                        <option value="Lemon And Lime">Lemon And Lime</option>
                                        <option value="Pomelo And Mandarin">Pomelo And Mandarin</option>
                                        <option value="Orange">Orange</option>
                                        <option value="Pineapple">Pineapple</option>
                                        <option value="Custard Apple">Custard Apple</option>
                                        <option value="Cashew Nut">Cashew Nut</option>
                                        <option value="Plum">Plum</option>
                                        <option value="Tamarind">Tamarind</option>
                                        <option value="Watermelon">Watermelon</option>
                                        <option value="Other Fruits">Other Fruits</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=fruit" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="fruit" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=fruit&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>

        <!-- non_edible-->
        <tr>
            <td>
                <div class="crop_statistics">
                    <div class="stat_img">
                    <img src="<?php echo $root?>images/s_nonedible.jpg" alt="...">
                    </div>
                    <div class="stat-item">
                        <div class="row">
                            <h5>Non_edible Plants</h5>
                            <div class="col-md-4">

                                <form action="" method="post">
                                                
                                    <select name="crop">
                                        <option value="Thatch">Thatch</option>
                                        <option value="Flowers">Flowers</option>
                                        <option value="Other Plants">Other Plants</option>
                                    </select>
                                    <button class="btn btn-dark" type="submit">Insert</button>
                                </form>
                                <a href="<?php echo $root_eng?>see_statistics.php?name=non_edible" class="stat_link">See Statistics <i class="bi bi-arrow-right"></i></a>

                            </div>

                            <div class="col-md-8">
                                <form action="" method="post">
                                    <select name="township">
                                        <option value="Hinthada">Hinthada</option>
                                        <option value="Zalun">Zalun</option>
                                        <option value="Lay Myat Hnar">Lay Myat Hnar</option>
                                    </select>
                                    
                                    <select  name="year">
                                        <option value="2020-2021">2020-2021</option>
                                        <option value="2021-2022">2021-2022</option>
                                        <option value="2022-2023">2022-2023</option>
                                        <option value="2023-2024" >2023-2024</option>                                                
                                        <option value="2024-2025" disabled>2024-2025</option>
                                   </select>
                                   <input type="text" value="non_edible" class="table_name" name="table_name">
                                   <input type="text" value="" class="table_name" name="crop">
                                    <button type="submit" class="btn btn-dark">Calculate</button>
                                </form>
                                <a href="<?php echo $root_eng?>check_statistics.php?name=non_edible&&check=success" class="stat_link">Check Statistics <i class="bi bi-arrow-right"></i></a>    
                            </div>
                        </div> 
                    </div>
                </div>
            </td>
        </tr>
        
        
    </table>
    
    
    <!-- statistice end -->



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
