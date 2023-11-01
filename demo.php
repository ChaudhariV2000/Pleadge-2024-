<?php
// Check if the form is submitted
if (isset($_POST['submit'])) {
    // Check if a file was uploaded
    if (isset($_FILES['image']) && $_FILES['image']['error'] === UPLOAD_ERR_OK) {
        $uploadDir = 'upload/';
        $uploadFile = $uploadDir . basename($_FILES['image']['name']);

        // Move the uploaded file to the server directory
        if (move_uploaded_file($_FILES['image']['tmp_name'], $uploadFile)) {
            // File upload was successful

            // Store the file path in a database or display it
            $imagePath = $uploadFile;
            echo "Image uploaded successfully. File path: $imagePath<br>";

            // Display the uploaded image
            echo '<img src="' . $imagePath . '" alt="Uploaded Image">';
        } else {
            echo "Error uploading the file.";
        }
    } else {
        echo "No file uploaded.";
    }
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Image Upload</title>
</head>
<body>
    <h2>Upload an Image</h2>
    <form action="demo.php" method="POST" enctype="multipart/form-data">
        <input type="file" name="image" accept="image/*" required>
        <input type="submit" name="submit" value="Upload">
    </form>
</body>
</html>
