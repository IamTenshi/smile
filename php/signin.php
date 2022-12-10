<?php 
    //*Validate user
    require_once('config.php');
    session_start();

    $email = mysqli_real_escape_string($conn, $_POST['email-signin']);
    $password = mysqli_real_escape_string($conn, $_POST['password-signin']);
    
    $validate_signin = mysqli_query($conn, "SELECT * FROM users WHERE email = '$email' AND password = '$password'");

    if (mysqli_num_rows($validate_signin) > 0) {
        $_SESSION['user'] = $email;
        header("location: ../views/welcome.php");
        exit;
    } else {
        echo '
            <script>
                alert("The user does not exist, please check your data");
            </script>
        ';
        header("location: ../views/welcome.php");
        exit;
    }

    session_destroy();
    $conn->close();
?>