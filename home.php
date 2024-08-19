<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Page</title>
    <style>
        /* Basic Reset */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        /* Body Styles */
        body {
            font-family: Arial, sans-serif;
            background-color: #111827;
            color: #f4f4f4;
            margin: 0;
            padding: 20px;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        /* Navigation Styles */
        nav {
    width: 100%;
    background-color: #f4f4f4;
    padding: 10px 0;
    margin-bottom: 20px;
}

nav ul {
    list-style-type: none;
    text-align: center;
}

nav ul li {
    display: inline;
    margin: 0 15px;
}

nav ul li a {
    color: #050505;
    text-decoration: none;
    font-size: 16px;
    padding: 8px 16px;
    border-radius: 4px;
    transition: background-color 0.3s, color 0.3s;
}

nav ul li a:hover {
    background-color: #555;
    color: #e0e0e0;
}


        /* Heading Styles */
        h1 {
            background: #fff;
            color: #333;
            padding: 20px;
            border-radius: 8px;
            box-shadow: 0 2px 4px rgba(0, 0, 0, 0.1);
            margin-top: 20px;
            text-align: left;
            width: 100%;
            max-width: 600px; /* Optional: max width for readability */
            margin: 0;
            padding: 0;
            line-height: 1.5;
        }
    </style>
</head>
<body>
    <nav>
        <ul>
            <!-- Navigation links -->
            <li><a href="logout.php">Logout</a></li>
        </ul>    
    </nav>
    <h1> Welcome, <?php echo htmlspecialchars($_SESSION['email']); ?>!</h1>

</body>
</html>
