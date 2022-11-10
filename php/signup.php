<?php
    //*Insert data into database(Sign up)
    session_start();
    require('config.php');

    if (isset($_POST['signup'])) {
        $name = mysqli_real_escape_string($conn, $_POST['name']);
        $last_name = mysqli_real_escape_string($conn, $_POST['last_name']);
        $email = mysqli_real_escape_string($conn, $_POST['email-signup']);
        $password = mysqli_real_escape_string($conn, $_POST['password-signup']);

        require('signup_validate.php');

        //Enviar datos a la base de datos
        if (count($error) == 0) {
            $query = "INSERT INTO users(name, last_name, email, password) 
            VALUES('$name', '$last_name', '$email', '$password')";

            mysqli_query($conn, $query);

            echo '
                <script>
                    alert("A new user has been created");
                </script>
            ';
        }
        exit;
    }

    $conn->close();
?>