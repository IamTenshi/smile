<?php 
    session_start();

    if (!isset($_SESSION['user'])) {
        echo '
            <script>
                alert("You must sign in");
                window.location = "../index.html";
            </script>
        ';
        session_destroy();
        die();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Smile</title>
</head>
<body>
    <h1>Welcome to Smile, I hope you be happy and smile!</h1>
</body>
</html>