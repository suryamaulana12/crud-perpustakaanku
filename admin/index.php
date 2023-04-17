<?php
session_start();
require 'functions.php';


if (isset($_POST["signin"])) {
    // menangkap dari data post
    $username = $_POST["username"];
    $password = $_POST["password"];

    $result = mysqli_query($conn, "SELECT * FROM register WHERE username ='$username'");

    // cek username
    if (mysqli_num_rows($result) === 1) {

        // cek password
        $row = mysqli_fetch_assoc($result);
        if (password_verify($password, $row["password"])) {

            // Set session
            $_SESSION["signin"] = true;
            $cek = mysqli_num_rows($result);

            if ($result > 0) {
                $_SESSION['username'] = $username;
                $_SESSION['status'] = "login";
                header("location:dashboard.php");
            } else {
                header("location:index.php?pesan=gagal");
            }
        }
        // menghitung jumlah data yang ditemukan

    }
    $error = true;
}


if (isset($_POST["signup"])) {

    if (register($_POST) > 0) {
        echo "<script>
         alert('User baru berhasil ditambahkan!');
         document.location.href = 'index.php';
        </script>";
    } else {
        echo mysqli_error($conn);
    }
}

if (!isset($username['username'])) {
    $username = '';
}

if (isset($_POST["submit"])) {
    $username = $_POST["username"];
    $result = mysqli_query($conn, "SELECT username FROM register WHERE username = '$username'");
    if (mysqli_num_rows($result) > 0) {
        $username = $_POST['username'];
        $password = mysqli_real_escape_string($conn, $_POST["password"]);
        $konfirmasi_password = mysqli_real_escape_string($conn, $_POST["konfirmasi_password"]);

        // cek konfirmasi password
        if ($password !== $konfirmasi_password) {
            echo "<script>
            alert('Konfirmasi passwrod tidak sesuai');
            window.location.href = 'index.php';
        </script>";

            return false;
        }

        // enkripsi password
        $password = password_hash($password, PASSWORD_DEFAULT);

        $query = " UPDATE register SET 
        `password` = '$password'
        WHERE username = '$username'
        ";

        if (mysqli_query($conn, $query)) {
            if (mysqli_affected_rows($conn) > 0) {
?>
                <script>
                    alert('berhasil merubah password');
                    window.location.href = "index.php";
                </script>
<?php
            } else {
                echo mysqli_error($conn);
            }
        }
    } else {
        echo "<script>alert('username tidak terdaftar');</script>";
    }
}

?>



<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <title>Login and Registration Form Example</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/normalize/5.0.0/normalize.min.css">
    <link rel='stylesheet' href='https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css'>
    <link rel="stylesheet" href="style.css">

</head>

<body>
    <!-- partial:index.partial.html -->
    <nav class="main-nav">
        <ul>
            <li><a class="signin" href="#0">Sign in</a></li>
            <li><a class="signup" href="#0">Sign up</a></li>
        </ul>
    </nav>

    <div class="user-modal">
        <div class="user-modal-container">
            <ul class="switcher">
                <li><a href="#0">Sign in</a></li>
                <li><a href="#0">New account</a></li>
            </ul>

            <?php if (isset($error)) : ?>
                <script>
                    alert('Username/Password Wrong!!');
                </script>
            <?php endif; ?>

            <div id="login">
                <form class="form" method="post">
                    <p class="fieldset">
                        <label class="image-replace username" for="signin-email">username</label>
                        <input class="full-width has-padding has-border" id="signin-email" type="text" placeholder="Username" name="username">
                        <span class="error-message">An account with this email address does not exist!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace password" for="signin-password">Password</label>
                        <input class="full-width has-padding has-border" id="signin-password" type="password" placeholder="Password" name="password">
                        <a href="#0" class="hide-password">Show</a>
                        <span class="error-message">Wrong password! Try again.</span>
                    </p>

                    <p class="fieldset" style="margin-left: 230px;">
                        <!-- HTML !-->
                        <button class="button-1" role="button" type="submit" name="signin">Login</button>
                    </p>
                </form>

                <p class="form-bottom-message"><a href="#0">Forgot your password?</a></p>
                <!-- <a href="#0" class="close-form">Close</a> -->
            </div>

            <div id="signup">
                <form class="form" method="post">
                    <p class="fieldset">
                        <label class="image-replace username" for="signup-username">Username</label>
                        <input class="full-width has-padding has-border" id="signup-username" type="text" placeholder="Username" name="username">
                        <span class="error-message">Your username can only contain numeric and alphabetic symbols!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace password" for="signup-email">E-mail</label>
                        <input class="full-width has-padding has-border" id="signup-email" type="password" placeholder="Password" name="password">
                        <a href="#0" class="hide-password">Show</a>
                        <span class="error-message">Enter a valid email address!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace password" for="signup-password">Password</label>
                        <input class="full-width has-padding has-border" id="signup-password" type="password" placeholder="Confirm Password" name="konfirmasi_password">
                        <a href="#0" class="hide-password">Show</a>
                        <span class="error-message">Your password has to be at least 6 characters long!</span>
                    </p>

                    <p class="fieldset" style="margin-left: 230px;">
                        <button class="button-2" role="button" type="submit" name="signup">Register</button>
                    </p>
                </form>

                <!-- <a href="#0" class="cd-close-form">Close</a> -->
            </div>

            <div id="reset-password">
                <p class="form-message">Pastikan username anda sudah melakukan register!</p>

                <form class="form" method="post">
                    <p class="fieldset">
                        <label class="image-replace username" for="reset-email">Username</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="text" placeholder="Masukan Username" name="username">
                        <span class="error-message">An account with this email does not exist!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace password" for="reset-email">Username</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="password" placeholder="Masukan Password baru" name="password">
                        <span class="error-message">An account with this email does not exist!</span>
                    </p>

                    <p class="fieldset">
                        <label class="image-replace password" for="reset-email">Username</label>
                        <input class="full-width has-padding has-border" id="reset-email" type="password" placeholder="Konfirmasi password baru" name="konfirmasi_password">
                        <span class="error-message">An account with this email does not exist!</span>
                    </p>


                    <p class="fieldset" style="margin-left: 210px;">
                        <button class="button-3" role="button" type="submit" name="submit">Reset password</button>
                    </p>
                </form>

                <p class="form-bottom-message"><a href="#0">Back to log-in</a></p>
            </div>
            <a href="#0" class="close-form">Close</a>

        </div>
    </div>
    <!-- partial -->
    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js'></script>
    <script src="script.js"></script>

</body>

</html>