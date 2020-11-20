<?php
    include_once('resources/header.php');
    include_once('resources/connection.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name_array = explode('.', $image_name);
        $image_ext = end($image_name_array);
        $image_final_name = time() . md5($image_name) . "." . $image_ext;
        $job = $_POST['job'];
        $desc = $_POST['description'];
        $location = $_POST['location'];
        $salary = $_POST['salary'];

        // Form Validation
        if (empty($name) or empty($image_name) or empty($job) or empty($desc) or empty($location) or empty($salary)) {
            $error = "Field must not be empty!";
        }elseif (in_array($image_ext, ['jpg', 'png', 'jpeg', 'gif']) == false) {
            $error = "Image is invalid.";
        }else {
            $mySql->query("INSERT INTO member_info(`Name`, `Image`, `Job`, `Description`, `Location`, `Salary`) 
            VALUES('$name', '$image_final_name', '$job', '$desc', '$location', $salary)");
            move_uploaded_file($image_tmp_name, 'images/' . $image_final_name);
            $success = "Data Inserted Successfully.";
        }
    }
?>

    <div class="container mt-5">

        <?php
            if (isset($error)) {
                echo "<h3 class='alert alert-danger text-center w-75 mx-auto'>" . $error . "</h3>";
            }
            if (isset($success)) {
                echo "<h3 class='alert alert-success text-center w-75 mx-auto'>" . $success . "</h3>";
            }
        ?>

        <form action="#" method="post" class="w-50 m-auto" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="Enter Member Name">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="job" placeholder="Enter Job Title">
            </div>
            <div class="form-group">
                <textarea name="description" id="" rows="6" class="form-control" placeholder="Enter Description"></textarea>
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="location" placeholder="Enter Location">
            </div>
            <div class="form-group">
                <input type="text" class="form-control" name="salary" placeholder="Enter Salary">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit">
            </div>
        </form>
    </div>

<?php
    include_once('resources/footer.php');
?>