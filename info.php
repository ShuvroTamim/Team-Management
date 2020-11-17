<?php
    include_once('resources/header.php');
    include_once('resources/connection.php');
    $data = $mySql->query("SELECT* FROM member_info");

?>

    <div class="container">
        <h2 class="text-center my-3">Member Information</h2>
        <hr>
        <table class="table table-striped">
            <tr>
                <th>Sl</th>
                <th>Name</th>
                <th>Image</th>
                <th>Job Title</th>
                <th style="width: 450px">Description</th>
                <th>Action</th>
            </tr>
            <?php 
            $i = 1;
            while($dt = $data->fetch_assoc()) {?>
            <tr>
                <td><?php echo $i++; ?></td>
                <td><?php echo $dt['Name']; ?></td>
                <td><img src="images/<?php echo $dt['Image']; ?>" alt="" style="width: 100px; height: 100px"></td>
                <td><?php echo $dt['Job']; ?></td>
                <td><?php echo $dt['Description']; ?></td>
                <td>
                    <a href="edit.php?id=<?php echo $dt['ID']?>" class="btn btn-primary">Edit</a>
                    <button type="button" class="btn btn-danger" data-toggle="modal" data-target="#exampleModal<?php echo $dt['ID']; ?>">
                        Delete
                    </button>
                </td>
            </tr>

            <!-- Modal -->
            <div class="modal fade" id="exampleModal<?php echo $dt['ID']; ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Are you sure?</h5>
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                    </button>
                </div>
                <div class="modal-body">
                    Delete permanently
                </div>
                <div class="modal-footer">
                    <a href="delete.php?id=<?php echo $dt['ID']; ?>" class="btn btn-danger">Yes</a>
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">No</button>
                </div>
                </div>
            </div>
            </div>

            <?php }?>
        </table>
    </div>

<?php
    include_once('resources/footer.php');
?>