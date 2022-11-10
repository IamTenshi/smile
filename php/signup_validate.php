<?php 
    //*validar email
    //Revisa que el campo del email no este vacio
    if (empty($email)) {
        array_push($error, 'Email must be filled');
        echo '
            <script>
                alert("Email must be filled");
                window.location = "../index.html";
            </script>
        ';
    }

    //Revisa que el email este disponible
    $email_user_check_query = "SELECT * FROM users WHERE email = '$email' LIMIT 1";
    $email_result = mysqli_query($conn, $email_user_check_query);
    $user = mysqli_fetch_assoc($email_result);

    if ($user) {
        if ($user['email'] === $email) {
            array_push($error, "Email already exists");
            echo '
                <script>
                    alert("Email already exists");
                    window.location = "../index.html";
                </script>
            ';
        }
    }

    //Revisa que el email sea valido
    $email = filter_var($email, FILTER_SANITIZE_EMAIL);

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        array_push($error, "Invalid Email address");
        echo '
            <script>
                alert("Invalid Email address");
                window.location = "../index.html";
            </script>
        ';
    }

    //*Validar nombre y apellidos
    //Revisa que el nombre este lleno
    if (empty($name)) {
        array_push($error, 'Name must be filled');
        echo '
            <script>
                alert("Name must be filled");
                window.location = "../index.html";
            </script>
        ';
    }

    $name = filter_var($name, FILTER_SANITIZE_STRING);

    //Revisa que el nombre no tenga ciertos caracteres y especifica el rango de caracteres
    if (!preg_match("/^(?=.{3,18}$)[a-záéíóúñüA-ZÁÉÍÓÚÑÜ](\s?[a-záéíóúñüA-ZÁÉÍÓÚÑÜ])*$/", $name)) {
        array_push($error, "The name is too long or contains invalid characters");
        echo '
            <script>
                alert("The name is too long or contains invalid characters");
                window.location = "../index.html";
            </script>
        ';
    }

    //Revisa que el apellido este lleno
    if (empty($last_name)) {
        array_push($error, 'Last name must be filled');
        echo '
            <script>
                alert("Last name must be filled");
                window.location = "../index.html";
            </script>
        ';
    }

    $last_name = filter_var($last_name, FILTER_SANITIZE_STRING);

    //Revisa que el apellido no tenga ciertos caracteres y especifica el rango de caracteres
    if (!preg_match("/^(?=.{3,36}$)[a-záéíóúñüA-ZÁÉÍÓÚÑÜ](\s?[a-záéíóúñüA-ZÁÉÍÓÚÑÜ])*$/", $last_name)) {
        array_push($error, "The last name is too long or contains invalid characters");
        echo '
            <script>
                alert("The last name is too long or contains invalid characters");
            </script>
        ';
    }

    //*validar la contraseña
    if(!empty($password)) {
        if (strlen($password) < '8') {
            array_push($error, "Your Password Must Contain At Least 8 Characters");
            echo '
                <script>
                    alert("Your Password Must Contain At Least 8 Characters!");
                    window.location = "../index.html";
                </script>
            ';
        }
        elseif(!preg_match("#[0-9]+#",$password)) {
            array_push($error, "Your Password Must Contain At Least 1 Number");
            echo '
                <script>
                    alert("Your Password Must Contain At Least 1 Number!");
                    window.location = "../index.html";
                </script>
            ';
        }
        elseif(!preg_match("#[A-Z]+#", $password)) {
            array_push($error, "Your Password Must Contain At Least 1 Capital Letter");
            echo '
                <script>
                    alert("Your Password Must Contain At Least 1 Capital Letter!");
                    window.location = "../index.html";
                </script>
            ';
        }
        elseif(!preg_match("#[a-z]+#",$password)) {
            array_push($error, "Your Password Must Contain At Least 1 Lowercase Letter");
            echo '
                <script>
                    alert("Your Password Must Contain At Least 1 Lowercase Letter!");
                    window.location = "../index.html";
                </script>
            ';
        }

    } else {
        array_push($error, "Password must be filled");
        echo '
            <script>
                alert("Password must be filled");
            </script>
        ';
    }
?>