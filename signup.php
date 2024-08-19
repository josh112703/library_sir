<?php
require('db.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['submit'])) {
    $name = filter_var($_POST['name'], FILTER_SANITIZE_STRING);
    $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
    $password = $_POST['password'];

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        echo '<script>alert("Invalid email format.")</script>';
        echo "<script>window.location.href ='signup.php'</script>";
        exit();
    }
    $query = "INSERT INTO `accounts` (name, email, password) VALUES (?, ?, ?)";
    if ($stmt = mysqli_prepare($conn, $query)) {
        mysqli_stmt_bind_param($stmt, "sss", $name, $email, $password);
        if (mysqli_stmt_execute($stmt)) {
            echo '<script>alert("Successfully Created Account.")</script>';
            echo "<script>window.location.href ='login.php'</script>";
        } else {
            echo '<script>alert("Error: Could not create account.")</script>';
            echo "<script>window.location.href ='signup.php'</script>";
        }
        mysqli_stmt_close($stmt);
    } else {
        echo '<script>alert("Error preparing the SQL statement.")</script>';
        echo "<script>window.location.href ='signup.php'</script>";
    }
    mysqli_close($conn);
}
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sign Up</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #111827;
            margin: 0;
            padding: 20px;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
        }

        form {
            background: #fff;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        label {
            display: block;
            margin-bottom: 8px;
            font-weight: bold;
        }

        input[type="text"],
        input[type="email"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-bottom: 12px;
            border: 1px solid #ddd;
            border-radius: 4px;
            box-sizing: border-box;
        }

        input[type="submit"] {
            background-image: linear-gradient(92.88deg, #455EB5 9.16%, #5643CC 43.89%, #673FD7 64.72%);
            color: white;
            border: none;
            padding: 10px;
            border-radius: 4px;
            cursor: pointer;
            width: 100%;
            font-size: 16px;
        }

        input[type="submit"]:hover {
        box-shadow: rgba(80, 63, 205, 0.5) 0 1px 30px;
        transition-duration: .1s;

        }

        
    </style>
</head>
<body>
<form id="sign_up" action="" method="post">
    <h2>Sign up</h2>
        <label for="name">Name</label>
        <input type="text" id="name" name="name" required>
        <br>
        <label for="email">Email</label>
        <input type="email" id="email" name="email" required>
        <br>
        <label for="password">Password</label>
        <input type="password" id="password" name="password" required>
        <br>
        <input type="submit" name="submit" value="Submit">
        <div class="m-t-25 m-b--5 align-center">
                        <a href="login.php">You already have a Account?</a>
                    </div>
    </form>
</body>
</html>