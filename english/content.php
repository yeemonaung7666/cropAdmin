<?php
require '../init.php';

if(isset($_GET['create'])){
    setMessage("Successfully Created A Content!");
}

if(isset($_GET['update'])){
    setMessage("Successfully Updated A Content!");
}

if(isset($_GET['delete'])){
    setMessage("Successfully Deleted A Content!");
}

$query =getAll("select * from info");
require '../inc/header.php';
?>

    <div class="crop_content">
        
        <a href="<?php echo $root_eng?>create_content.php" class="create"><button>Create A Content</button></a>
            <div class="crop_option">
                <table class="table table-hover option_tbl">
                <?php
                    showMessage();
                    showError();
                ?>
                    <thead>
                        <tr>
                            <td>No</td>
                            <td>Image</td>
                            <td>Name</td>
                            <td class="start_life">Start Planting Month</td>
                            <td class="start_life">Life Time Of Plant</td>
                            <td>Plant Harvesting Condition (or) Month</td>
                            <td>Storage Space Or Form</td>
                            <td>Options</td>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $no=1;
                            foreach($query as $q){
                        ?>
                            <tr>
                                <td><?php echo $no;?></td>
                                <td><?php echo $q->name?></td>
                                <td>
                                    <div class="content_img">
                                        <img src="<?php echo $root?>img/<?php echo $q->img?>" alt="">
                                    </div>
                                            
                                </td>
                                <td><?php echo $q->plant?></td>
                                <td><?php echo $q->life?></td>
                                <td><?php echo $q->harvest?></td>
                                <td><?php echo $q->store?></td>
                                    
                                <td>
                                    <a href="<?php echo $root_eng?>update_content.php?id=<?php echo $q->id?>" type="button" class="btn btn-warning"><i class="bi bi-pencil-square"></i></a><hr>
                                    <a href="<?php echo $root_eng?>delete_content.php?id=<?php echo $q->id?>" type="button" class="btn btn-danger"><i class="bi bi-trash"></i></a>

                                </td>
                            </tr>
                        <?php
                        $no++;
                            }
                        ?>
                                    
                                    
                                
                            </tbody>
                        </table>
                    </div>
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