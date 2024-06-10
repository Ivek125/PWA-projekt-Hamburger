<?php
session_start();

if (!isset($_SESSION['loggedin']) || $_SESSION['loggedin'] !== true) {
    header('Location: admin_login.php');
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "HamburgerMorgenDB";

// Kreiraj konekciju
$conn = new mysqli($servername, $username, $password, $dbname);

// Provjeri konekciju
if ($conn->connect_error) {
    die("Konekcija nije uspjela: " . $conn->connect_error);
}

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $article_id = $_POST['article_id'];
    $title = $conn->real_escape_string($_POST['title']);
    $content = $conn->real_escape_string($_POST['content']);
    $shortContent = $conn->real_escape_string($_POST['shortContent']);
    $category = $conn->real_escape_string($_POST['category']);
    $image = $conn->real_escape_string($_POST['existing_image']); // Preuzmi postojeću sliku iz hidden input polja

    // Provjera i prijenos slike
    if (isset($_FILES['image']) && $_FILES['image']['error'] == UPLOAD_ERR_OK) {
        $target_dir = "slike/";
        $image_name = basename($_FILES["image"]["name"]);
        $target_file = $target_dir . $image_name;

        // Premjesti prenesenu datoteku u ciljni direktorij
        if (move_uploaded_file($_FILES['image']['tmp_name'], $target_file)) {
            $image = $image_name; // Ažuriraj naziv slike
        }
    }

    // Ažuriraj SQL upit kako bi uključio novi naziv slike ili zadržao postojeći
    $sql = "UPDATE articles SET title='$title', content='$content', shortContent='$shortContent', category='$category', image='$image' WHERE article_id=$article_id";

    if ($conn->query($sql) === TRUE) {
        header('Location: index.php');
        exit();
    } else {
        echo "Greška: " . $sql . "<br>" . $conn->error;
    }
} else {
    $article_id = $_GET['id'];
    $sql = "SELECT * FROM articles WHERE article_id=$article_id";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $article = $result->fetch_assoc();
    } else {
        echo "Članak nije pronađen.";
        exit();
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
    <title>Uredi članak</title>
    <style>
        form {
            width: 100%;
        }
        label {
            display: block;
            margin-top: 10px;
            color: #555;
        }
        input[type="text"],
        textarea,
        select {
            width: 100%;
            padding: 10px;
            margin-top: 5px;
            border: 1px solid #ddd;
            border-radius: 5px;
            box-sizing: border-box;
            background: #f9f9f9;
            font-size: 14px;
        }
        input[type="file"] {
            margin-top: 10px;
        }
        img {
            margin-top: 10px;
            max-width: 200px;
            max-height: 200px;
        }
        .stvarajMali {
            background-color: #28a745;
            color: white;
            border: none;
            padding: 10px 15px;
            cursor: pointer;
            border-radius: 5px;
            font-size: 16px;
            margin-top: 20px;
        }
        .stvarajMali:hover {
            background-color: #218838;
        }
        body{
            padding:0;
            margin 0;
        }
    </style>
     <script>
        function previewImage(event) {
            var reader = new FileReader();
            reader.onload = function(){
                var output = document.getElementById('imagePreview');
                output.src = reader.result;
                output.style.display = 'block';
            };
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
</head>
<body>
<?php
    require "./header.php";
    ?>
    <div class="container">
        <h1>Uredi članak</h1>
        <form action="urediClanak.php" method="POST" enctype="multipart/form-data">
            <input type="hidden" name="article_id" value="<?php echo $article['article_id']; ?>">
            <input type="hidden" name="existing_image" value="<?php echo htmlspecialchars($article['image']); ?>">
            <label for="title">Naslov:</label>
            <input type="text" id="title" name="title" value="<?php echo htmlspecialchars($article['title']); ?>" required>

            <label for="content">Sadržaj:</label>
            <textarea id="content" name="content" rows="10" required><?php echo htmlspecialchars($article['content']); ?></textarea>

            <label for="shortContent">Kratki sadržaj:</label>
            <textarea id="shortContent" name="shortContent" rows="5" required><?php echo htmlspecialchars($article['shortContent']); ?></textarea>

            <label for="category">Kategorija:</label>
            <select id="category" name="category" required>
                <option value="Sport" <?php if ($article['category'] == 'Sport') echo 'selected'; ?>>Sport</option>
                <option value="Tech" <?php if ($article['category'] == 'Tech') echo 'selected'; ?>>Tech</option>
                <option value="Show" <?php if ($article['category'] == 'Show') echo 'selected'; ?>>Show</option>
            </select>

            <label for="image">Promijeni sliku:</label>
            <input type="file" id="image" name="image" accept="image/*" onchange="previewImage(event)">
            <img id="imagePreview" src="slike/<?php echo $article['image']; ?>" alt="Trenutna slika">
           
            <input class="stvarajMali" type="submit" value="Spremi">
        </form>
    </div>
</body>
</html>
