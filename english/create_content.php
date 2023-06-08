<?php
require '../init.php';

if($_SERVER['REQUEST_METHOD'] =='POST'){
    $admin = $_SESSION['admin']->lid;
    $name= $_REQUEST['name'];
    $plant= $_REQUEST['plant'];
    $life= $_REQUEST['life'];
    $harvest= $_REQUEST['harvest'];
    $store= $_REQUEST['store'];
    $image_name = $_FILES['image']['name'];
    $tmp_name = $_FILES['image']['tmp_name'];
    $path = "../img/".$image_name;
    $user_path= "D:/xampp/htdocs/cropUser/img/".$image_name;
    
    //file upload
    move_uploaded_file($tmp_name,$path);
    copy($path,$user_path);

    $query=query("insert into info (lid, name, plant, life, harvest, store, img) values (?,?,?,?,?,?,?)",
    [$admin, "$name", "$plant", "$life", "$harvest", "$store", "$image_name"]);
    if($query){
        go("http://localhost:100/cropAdmin/english/content.php?create=success");
    } 
}

require '../inc/header.php';
?>

<!-- insert start -->
<div class="crop_insert_form">

    <div class="row">

    <div class="col-md-1"></div>
    

    <div class="col-md-10">
        <form action="" method="post" enctype="multipart/form-data">
            <table class="table table-hover">
            <thead>
            </thead>
            <tbody>
                <tr>
                <td> <label for="">Name</label> </td>
                <td><input type="text" class="form-control" placeholder="Name" name="name" required></td>
                </tr>

                <tr>
                <td> <label for="">Start Planting Month</label> </td>
                <td> 
                    <textarea rows="3" class="form-control msg-box" placeholder="Start Planting Month" name="plant" required></textarea>
                </td>
                </tr>

                <tr>
                <td> <label for="">Life Time Of Plant(General)</label> </td>
                <td> 
                    <textarea rows="3" class="form-control msg-box" placeholder="Life Time Of Plant(General)" name="life" required></textarea>
                </td>
                </tr>

                <tr>
                <td>Plant Harvesting Condition (or) Month</td>
                <td colspan="3">
                    <textarea rows="3" class="form-control msg-box" placeholder="Plant Harvesting Condition (or) Month" name="harvest" required></textarea>
                </td>
                </tr>

                <tr>
                <td>Storage Space Or Form</td>
                <td colspan="2">
                    <textarea rows="3" class="form-control msg-box" placeholder="Storage Space Or Form"name="store" required></textarea>
                </td>
                </tr>

                <tr>
                <td>Choose Image</td>
                <td colspan="2">
                    <input type="file" name="image" class="form-control" required>
                </td>
                </tr>

                <tr>
                <td></td>
                <td colspan="2"> <button type="submit" class="content_btn col-md-12">INSERT</button> </td>
                </tr>
            </tbody>
            </table>
        </form>
    </div>

    <div class="col-md-1"></div>

    </div>
</div>
<!-- insert end -->

<?php
require '../inc/footer.php';
?>
