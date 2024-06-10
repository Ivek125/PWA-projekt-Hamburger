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

$sql = "SELECT * FROM articles";
$result = $conn->query($sql);

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    <title>Upravljanje člancima</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f9;
            margin: 0;
        }
        .container {

            max-width: 800px;
            margin: 0 auto;
            margin-top: 20px;
            background: #fff;
            padding: 20px;
            border-radius: 8px;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }
        th, td {
            border: 1px solid #d1d1d1dd;
            padding: 8px;
            text-align: left;
        }
        th {
            background-color: #f2f2f2;
        }
        .edit-btn, .delete-btn {
            margin: 5px;
            display: inline-block;
            padding: 5px 10px;
            color: #fff;
        }
    
    </style>
</head>
<body>
<?php
    require "./header.php";
    ?>
    <div class="container">
        <h1>Upravljanje člancima</h1>
        <table>
            <tr>
                <th>ID</th>
                <th>Naslov</th>
                <th>Kategorija</th>
                <th>Akcije</th>
            </tr>
            <?php while ($row = $result->fetch_assoc()): ?>
            <tr>
                <td><?php echo $row['article_id']; ?></td>
                <td><?php echo $row['title']; ?></td>
                <td><?php echo $row['category']; ?></td>
                <td>
                    <a class="edit-btn" href="urediClanak.php?id=<?php echo $row['article_id']; ?>">Uredi</a>
                    <a class="delete-btn" href="izbrisiClanak.php?id=<?php echo $row['article_id']; ?>" onclick="return confirm('Jeste li sigurni da želite obrisati ovaj članak?');">Izbriši</a>
                </td>
            </tr>
            <?php endwhile; ?>
        </table>
    </div>
</body>
</html>

<?php
$conn->close();
?>
