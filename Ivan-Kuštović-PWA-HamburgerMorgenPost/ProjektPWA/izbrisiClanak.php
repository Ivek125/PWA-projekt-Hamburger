
<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
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

$article_id = $_GET['id'];

$sql = "DELETE FROM articles WHERE article_id=$article_id";

if ($conn->query($sql) === TRUE) {
    header('Location: index.php');
    exit();
} else {
    echo "Greška: " . $sql . "<br>" . $conn->error;
}

$conn->close();
?>
