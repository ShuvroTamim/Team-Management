<?php
    include_once('resources/userHeader.php');
    include_once('resources/bootstrap.php');
    include_once('resources/connection.php');

    if (isset($_POST['submit'])) {
        session_start();
        $email = $_POST['email'];
        $pass = $_POST['pass'];
        $data = $mySql->query("SELECT* FROM reg_info WHERE `email` = '$email' and `password` = '$pass' ");
        $row = $data->num_rows;

        // Form Validation
        if (empty($email) or empty($pass)) {
            $error = "Field must not be empty!";
        }elseif ($row == 1) {
            $_SESSION['email'] = $email;
            $_SESSION['password'] = $pass;
            header('location:index.php');
        }
        else {
            header('location:login.php');
            // $error = "User didn't match.Please check email or password.";
        }
    }
?>

<div class="container mt-5">

        <?php
            if (isset($error)) {
                echo "<h3 class='alert alert-danger text-center w-50 mx-auto' style='font-size:16px; padding: 2px;'>" . $error . "</h3>";
            }
            if (isset($success)) {
                echo "<h3 class='alert alert-success text-center w-50 mx-auto' style='font-size:16px; padding: 2px;'>" . $success . "</h3>";
            }
        ?>

        <h4 class="text-center">Login Form</h4>
        <form action="#" method="post" class="w-50 m-auto" enctype="multipart/form-data">
            <div class="form-group">
                <input type="email" class="form-control" name="email" placeholder="Email Address">
            </div>
            <div class="form-group">
                <input type="password" class="form-control" name="pass" placeholder="Enter Password">
            </div>
            <div class="form-group">
                <input type="submit" class="btn btn-success" name="submit" value="Login">
                <a href="reg.php" class="btn btn-primary">Register Here</a>
            </div>
        </form>
    </div>

<?php
    include_once('resources/footer.php');
?>