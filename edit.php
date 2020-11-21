<?php
    include_once('resources/header.php');
    include_once('resources/connection.php');
    $id = $_GET['id'];
    $data = $mySql->query("SELECT* FROM member_info WHERE ID = $id");

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];

        $old_image = $_POST['old_image'];
        $image_final_name = $old_image;
        if (!empty($_FILES['image']['name'])) {
            $image_name = $_FILES['image']['name'];
            $image_tmp_name = $_FILES['image']['tmp_name'];
            $image_name_array = explode('.', $image_name);
            $image_ext = end($image_name_array);
            if (in_array($image_ext, ['jpg', 'png', 'jpeg', 'gif']) == false) {
                $error = "Image is invalid.";
            }else {
                $image_final_name = time() . md5($image_name) . "." . $image_ext;
                move_uploaded_file($image_tmp_name, 'images/' . $image_final_name);
                unlink("images/$old_image");
            }
        }else {
            $image_final_name = $old_image;
        }

        $job = $_POST['job'];
        $desc = $_POST['description'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];

        // Form Validation
        if (!empty($error)) {
            echo "";
        }elseif (empty($name) or empty($job) or empty($desc)) {
            $error = "Field must not be empty!";
        }else {
            $mySql->query("UPDATE member_info SET `Name`='$name',
             `Image` = '$image_final_name', `Job`='$job', `Description`='$desc', 
             `Location`='$location', `Salary`='$salary' WHERE ID = $id ");
            $success = "Data Updated Successfully.";
        }
    }
?>

    <div class="container mt-3">

        <?php
            if (isset($error)) {
                echo "<h3 class='alert alert-danger text-center w-50 mx-auto' style='font-size:16px; padding: 2px;'>" . $error . "</h3>";
            }
            if (isset($success)) {
                echo "<h3 class='alert alert-success text-center w-50 mx-auto' style='font-size:16px; padding: 2px;'>" . $success . "</h3>";
            }
        ?>

        <form action="#" method="post" class="w-50 m-auto" enctype="multipart/form-data">
        <?php while ($dt = $data->fetch_assoc()) { ?>
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Member Name" 
                value="<?php echo $dt['Name']; ?>">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="image">
                <input type="hidden" name="old_image" value="<?php echo $dt['Image']; ?>">
                <img src="images/<?php echo $dt['Image']; ?>" alt="" style="Width:100px; height:100px;">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="job" placeholder="Enter Job Title"
                value="<?php echo $dt['Job']; ?>">
            </div>
            <div class="form-group">
                <textarea name="description" id="" rows="6" class="form-control" placeholder="Enter Description">
                <?php echo $dt['Description']; ?></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="location" placeholder="Enter Location"
                value="<?php echo $dt['Location']; ?>">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="salary" placeholder="Enter Salary"
                value="<?php echo $dt['Salary']; ?>">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Update">
            </div>
        <?php }?>
        </form>
    </div>

<?php
    include_once('resources/footer.php');
?>