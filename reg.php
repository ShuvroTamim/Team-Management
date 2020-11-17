<?php
    include_once('resources/bootstrap.php');
    include_once('resources/connection.php');

    if (isset($_POST['submit'])) {
        $name = $_POST['name'];
        $email = $_POST['email'];
        $image_name = $_FILES['image']['name'];
        $image_tmp_name = $_FILES['image']['tmp_name'];
        $image_name_array = explode('.', $image_name);
        $image_ext = end($image_name_array);
        $image_final_name = time() . md5($image_name) . "." . $image_ext;
        $pass = $_POST['pass'];
        $conpass = $_POST['conpass'];

        // Form Validation
        if (empty($name) or empty($email) or empty($pass) or empty($conpass)) {
            $error = "Field must not be empty!";
        }elseif (in_array($image_ext, ['jpg', 'png', 'jpeg', 'gif']) == false) {
            $error = "Image is invalid.";
        }elseif ($pass != $conpass) {
            $error = "Password didn't match";
        }
        else {
            $mySql->query("INSERT INTO reg_info(`name`, `email`, `image`, `password`, `confirm_password`) 
            VALUES('$name', '$email', '$image_final_name', '$pass', '$conpass')");
            move_uploaded_file($image_tmp_name, 'images/' . $image_final_name);
            $success = "Registration Completed";
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

        <h4 class="text-center">Registration Form</h4>
        <form action="#" method="post" class="w-50 m-auto" enctype="multipart/form-data">
            <div class="form-group">
                <input type="text" class="form-control" name="name" placeholder="User Name">
            </div>
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="file" class="form-control" name="image">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="conpass" placeholder="Confirm Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Register">
                <a href="login.php" class="btn btn-primary">Login Here</a>
            </div>
        </form>
    </div>

<?php
    include_once('resources/footer.php');
?>