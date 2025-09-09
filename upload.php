<?php
$host = "localhost";
$db = "galeria";
$user = "root";
$pass = "";

$conn = new mysqli($host, $user, $pass, $db);
if ($conn->connect_error) {
    die("Błąd połączenia: " . $conn->connect_error);
}

if (isset($_POST['submit']) && isset($_FILES['image'])) {
    $uploadDir = 'images/';
    $filename = basename($_FILES['image']['name']);
    $targetPath = $uploadDir . $filename;
    $fileType = $_FILES['image']['type'];

    $allowed = [
        'image/jpeg',
        'image/png',
        'image/gif',
        'image/webp',
        'video/mp4'
    ];

    if (in_array($fileType, $allowed)) {
        if (move_uploaded_file($_FILES['image']['tmp_name'], $targetPath)) {
            $stmt = $conn->prepare("INSERT INTO images (filename, path, type) VALUES (?, ?, ?)");
            $stmt->bind_param("sss", $filename, $targetPath, $fileType);
            $stmt->execute();
            $stmt->close();
            header("Location: index.php");
            exit();
        } else {
            echo "Błąd przy zapisie pliku.";
        }
    } else {
        echo "Dozwolone tylko obrazy JPG/PNG/GIF/WEBP oraz wideo MP4.";
    }
}

$conn->close();
?>
