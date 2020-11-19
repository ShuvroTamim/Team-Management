<?php
    include_once('resources/userHeader.php');
    include_once('resources/connection.php');
    $data = $mySql->query("SELECT* FROM member_info");

?>

    <div class="container">
        <h2 class="text-center my-3">Our Team Member</h2>
        <div class="row">
            <?php  while ($dt = $data->fetch_assoc()) { ?>        
                <div class="col col-md-4">
                    <div class="card h-100">
                        <img src="images/<?php echo $dt['Image'];?>" alt="" class="card-img-top" style="height:300px;">
                        <div class="card-header py-2" style="height:65px;">
                            <h5 class="card-title"><?php echo $dt['Name'];?></h5>
                            <h6 class="card-subtitle"><?php echo $dt['Job'];?></h6>
                        </div>
                        <div class="card-body">
                            <div class="card-text">
                                <p>
                                    <?php echo $dt['Description'];?>
                                </p>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>

<?php
    include_once('resources/footer.php');
?>