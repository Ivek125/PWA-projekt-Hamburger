<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true || $_SESSION['role'] != 'admin') {
    header('Location: adminLogin.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HamburgerMorgenDB";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}

$message = '';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $new_username = $conn->real_escape_string($_POST['new_username']);
    $new_password = password_hash($_POST['new_password'], PASSWORD_BCRYPT);
    $role = $conn->real_escape_string($_POST['role']);

    
    $check_sql = "SELECT * FROM users WHERE username = '$new_username'";
    $check_result = $conn->query($check_sql);

    if ($check_result->num_rows > 0) {
        $message = "Korisničko ime već postoji. Molimo odaberite drugo korisničko ime.";
    } else {
        $sql = "INSERT INTO users (username, password, role) VALUES ('$new_username', '$new_password', '$role')";
        if ($conn->query($sql) === TRUE) {
            $message = "Novi admin korisnik je uspješno dodan!";
        } else {
            $message = "Greška: " . $sql . "<br>" . $conn->error;
        }
    }
}

$sql = "SELECT * FROM users";
$result = $conn->query($sql);

$conn->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Dodaj korisnika</title>
    <style>
        input[type="password"] {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background: #f7f7f7;
            font-size: 16px;
            margin-bottom:10px;
        }
        input[type="text"] {
            margin-bottom:10px;
        }
      
        .container{
            width: 60%;
        }

        select{
            margin-top:10px;
            margin-bottom:10px;
        }
        label{
            margin-top:10px;
            margin-bottom:10px;
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
        table{
            width: 30%;
            text-align:center;
        }
        
    </style>
    <script>
        function validateForm() {
            var username = document.getElementById("new_username").value;
            var password = document.getElementById("new_password").value;
            if (username.length < 4 || username.length > 11) {
                alert("Korisničko ime mora imati između 4 i 11 znakova.");
                return false;
            }
            if (password.length <= 5) {
                alert("Lozinka mora imati više od 5 znakova.");
                return false;
            }
            return true;
        }
    </script>
</head>
<body>
<?php
    require "./header.php";
    ?>
    <div class="container">
        <h1>Upravljanje admin korisnicima</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Korisničko ime</th>
                <th>Uloga</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['id']; ?></td>
                <td><?php echo $row['username']; ?></td>
                <td><?php echo $row['role']; ?></td>
            </tr>
            <?php endwhile; ?>
        </table>
        <form class="add-user-form" action="dodajKOrisnika.php" method="POST" onsubmit="return validateForm()">
            <h2>Dodaj novog admin korisnika</h2>
            <label for="new_username">Korisničko ime:</label>
            <input type="text" id="new_username" name="new_username" required>
            <label for="new_password">Lozinka:</label>
            <input type="password" id="new_password" name="new_password" required>
            <label for="role">Uloga:</label>
            <select id="role" name="role">
                <option value="admin">Administrator</option>
                <option value="editor">Editor</option>
            </select>
            <input type="submit" value="Dodaj korisnika">
        </form>
        <?php if ($message): ?>
            <p class="message"><?php echo $message; ?></p>
        <?php endif; ?>
    </div>
</body>
</html>
