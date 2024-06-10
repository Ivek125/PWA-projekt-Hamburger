<?php
session_start();

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HamburgerMorgenDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $username = $_POST['username'];
    $password = $_POST['password'];

    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $admin = $result->fetch_assoc();
        if (password_verify($password, $admin['password'])) {
            $_SESSION['loggedin'] = true;
            $_SESSION['username'] = $admin['username'];
            $_SESSION['role'] = $admin['role'];
            header('Location: index.php');
            exit();
        } else {
            echo '<p style="color: red; text-align: center;">Pogrešno korisničko ime ili lozinka</p>';
        }
    } else {
        echo '<p style="color: red; text-align: center;">Pogrešno korisničko ime ili lozinka</p>';
    }
}

$conn->close();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Admin Login</title>
    <style>
        
        .login-container {
            margin: 20px auto;
            background: #fff;
            padding: 30px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
            border-radius: 8px;
            width: 800px;
        }
        h1 {
            text-align: center;
            color: #333;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input[type="text"],
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background: #f9f9f9;
            font-size: 14px;
        }
        input[type="submit"] {
            background-color: #007bff;
            color: #fff;
            border: none;
            padding: 10px 15px;
            margin-top: 20px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            transition: background-color 0.3s;
        }
        input[type="submit"]:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>
<?php
    require "./header.php";
    ?>

    <div class="login-container">
        <h1>Admin Login</h1>
        <form action="adminLogin.php" method="POST">
            <label for="username">Korisničko ime:</label>
            <input type="text" id="username" name="username" value="admin" required>

            <label for="password">Lozinka:</label>
            <input type="password" id="password" name="password" value="password" required>

            <input type="submit" value="Prijavi se">
        </form>
    </div>
</body>
</html>

