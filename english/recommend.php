<?php
require '../init.php';

$query=getAll("select * from contact");

require '../inc/header.php';
?>

    <div class="crop_content">
                    <div class="crop_option">
                        <table class="table table-hover option_tbl">
                            <thead>
                                <tr>
                                    <td>No</td>
                                    <td>Name</td>
                                    <td>Email</td>
                                    <td>Subject</td>
                                    <td>Message</td>
                                </tr>
                            </thead>
                            <tbody>
                                
                                <?php
                                $no=1;
                                foreach($query as $q){
                                ?>
                                    <tr>
                                        <td><?php echo $no?></td>
                                        <td><?php echo $q->name;?></td>
                                        <td><?php echo $q->email;?></td>
                                        <td><?php echo $q->subject;?></td>
                                        <td><?php echo $q->message;?></td>
                                        
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