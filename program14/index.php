<?php
// Establish MySQL connection
$conn = mysqli_connect("localhost", "root", "", "mydb");

// Check for connection error
if (!$conn) {
    die("Connection Failed: " . mysqli_connect_error());
}


// Serve the image if an ID is provided in the URL
if (isset($_GET['id'])) {
    $id = intval($_GET['id']); // Sanitize input
    $stmt = $conn->prepare("SELECT image_type, image_data FROM images WHERE id = ?");
    $stmt->bind_param('i', $id);
    $stmt->execute();
    $stmt->bind_result($imageType, $imageData);

    if ($stmt->fetch()) {
        header("Content-Type: " . $imageType);
        echo $imageData;
    } else {
        echo "Image not found.";
    }

    $stmt->close();
    exit;
}

// Handle image upload via POST request
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_FILES["image"])) {
    if ($_FILES["image"]["error"] == 0) { // Check for file upload errors
        $imageData = file_get_contents($_FILES["image"]["tmp_name"]);
        $imageName = $_FILES["image"]["name"];
        $imageType = $_FILES["image"]["type"];

        $stmt = $conn->prepare("INSERT INTO images (image_name, image_type, image_data) VALUES (?, ?, ?)");
        $stmt->bind_param("sss", $imageName, $imageType, $imageData);

        if ($stmt->execute()) {
            echo "Image uploaded successfully!";
        } else {
            echo "Failed to upload image: " . $stmt->error;
        }

        $stmt->close();
    } else {
        echo "Error uploading file: " . $_FILES["image"]["error"];
    }
}

// Function to display uploaded images
function displayImages($conn)
{
    $sql = "SELECT id, image_name FROM images";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        while ($row = $result->fetch_assoc()) {
            echo "<img src='?id=" . $row["id"] . "' alt='" . htmlspecialchars($row["image_name"], ENT_QUOTES) . "'><br>";
        }
    } else {
        echo "No images uploaded yet.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Image Upload and Display</title>
</head>
<body>
    <h1>Upload and Display Images</h1>
    <form method="post" enctype="multipart/form-data">
        <label for="image">Select image to upload:</label>
        <input type="file" name="image" id="image" required>
        <input type="submit" value="Upload Image" name="submit">
    </form>

    <h2>Uploaded Images:</h2>
    <?php displayImages($conn); ?>

    <?php $conn->close(); ?>
</body>
</html>
