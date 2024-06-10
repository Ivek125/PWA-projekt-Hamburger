<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HamburgerMorgenDB";


$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}

$title = $_POST['title'];
$content = $_POST['content'];
$shortContent = $_POST['shortContent'];
$category = $_POST['category'];
$image = $_FILES['image'];

$sql = "SELECT MAX(article_id) AS max_id FROM articles";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $next_id = $row['max_id'] + 1;
} else {
    $next_id = 1; 
}

$target_dir = "slike/";
$image_name = basename($image["name"]);
$target_file = $target_dir . $image_name;

if (move_uploaded_file($image["tmp_name"], $target_file)) {
    
    $sql = "INSERT INTO articles (title, image, content, shortContent, category, article_id) VALUES ('$title', '$image_name', '$content', '$shortContent', '$category', '$next_id')";

    if ($conn->query($sql) === TRUE) {
        echo "Novi članak je uspješno dodan!";
        header("Location: index.php");
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
} else {
    echo "Greška pri uploadu slike.";
}

$conn->close();
?>
